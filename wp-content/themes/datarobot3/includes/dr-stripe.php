<?php

function dr_stripeCharge(){

  $nonce = $_POST['nonce'];

  if ( ! wp_verify_nonce( $nonce, 'dr_sc_nonce' ) ){

    $er = 'WP Security token(nonce) is not valid.';
    dr_raven_stripe_report($user, $er);
    $result['error'] = true;
    $result['exit'] = true;
    $result['message'] = 'Security token check failed.';
    echo json_encode($result);
    exit;

  } else {

    require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/datarobot3/includes/vendor/stripe/init.php';

    // Set your secret key: remember to change this to your live secret key in production
    // See your keys here: https://dashboard.stripe.com/account/apikeys
    \Stripe\Stripe::setApiKey(get_field('str_secret_key', 'options'));

    // Token is created using Stripe.js or Checkout!
    // Get the payment token ID submitted by the form:
    $token = $_POST['stripeToken'];

    $name = sanitize_text_field($_POST['cardholder-name']);
    $email = sanitize_text_field($_POST['cardholder-email']);
    $phone = sanitize_text_field($_POST['cardholder-phone']);
    $pid = sanitize_text_field($_POST['pid']);

    $user = array(
      "Name" => $name,
      "Email" => $email,
      "Phone" => $phone,
    );

    $result = array();

    //Check if the amount exists and is correct. Throw error if not.
    $amount = get_field( "amount", $pid );

    if ($amount) {
      $chargeSum = $amount * 100;
    } else {
      $er = 'Charge amount is not valid';
      $result['error'] = true;
      $result['message'] = 'An unexpected error occured. Please try again later.';
      dr_raven_stripe_report($user, $er);
      echo json_encode($result);
      wp_die();
    }

    try {
      // Create a Customer:
      $customer = \Stripe\Customer::create(array(
        "description" => $name,
        "email" => $email,
        "metadata" => array(
          "name" => $name,
          "phone" => $phone,
        ),
        "source" => $token,
      ));

      // Charge the user's card:
        $charge = \Stripe\Charge::create(array(
          "amount" => intval($chargeSum),
          "currency" => "usd",
          "description" => "License of DataRobot Academic for ".$email,
          "customer" => $customer->id,
        ));
        $success = 1;
    } catch(\Stripe\Error\Card $e) {
      // Since it's a decline, \Stripe\Error\Card will be caught
        $error = $e->getMessage();
        dr_raven_stripe_report($user, $e);
    } catch (\Stripe\Error\RateLimit $e) {
      // Too many requests made to the API too quickly
        $error = $e->getMessage();
        dr_raven_stripe_report($user, $e);
    } catch (\Stripe\Error\InvalidRequest $e) {
      // Invalid parameters were supplied to Stripe's API
        $error = $e->getMessage();
        dr_raven_stripe_report($user, $e);
    } catch (\Stripe\Error\Authentication $e) {
      // Authentication with Stripe's API failed
      // (maybe you changed API keys recently)
        $error = $e->getMessage();
        dr_raven_stripe_report($user, $e);
    } catch (\Stripe\Error\ApiConnection $e) {
      // Network communication with Stripe failed
        $error = $e->getMessage();
        dr_raven_stripe_report($user, $e);
    } catch (\Stripe\Error\Base $e) {
      // Display a very generic error to the user, and maybe send
      // yourself an email
        $error = $e->getMessage();
        dr_raven_stripe_report($user, $e);
    } catch (Exception $e) {
      // Something else happened, completely unrelated to Stripe
        $error = $e->getMessage();
        dr_raven_stripe_report($user, $e);
    }

    if ($success!=1) {
      $result['error'] = true;
      $result['message'] = $error;
      echo json_encode($result);
    } else {
      $result['error'] = false;
      $result['message'] = 'Success!';
      echo json_encode($result);
    }

  }

	wp_die();

}

add_action( 'wp_ajax_nopriv_stripe_charge', 'dr_stripeCharge' );
add_action( 'wp_ajax_stripe_charge', 'dr_stripeCharge' );

?>
