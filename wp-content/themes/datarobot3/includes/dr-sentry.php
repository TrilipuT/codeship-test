<?php

function dr_raven_init(){
  require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/datarobot3/includes/vendor/sentry/Raven/Autoloader.php';
  Raven_Autoloader::register();
}

function dr_raven_stripe_report($user, $e){
  dr_raven_init();

  $sentryClient = new Raven_Client(get_field('sentry_client', 'options'));

  $sentryClient->user_context($user);

  $sentryClient->captureMessage('Stripe Payment error', $e);
}

?>
