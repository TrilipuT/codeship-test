<?php
$form_name     = get_field( 'form_name' ) ?: 'Datarobot-main';
$elqCampaignId = get_field( 'eloqua_campaign_id' ) ?: (isset( $_GET['elqCampaignId'] ) ? (int) $_GET['elqCampaignId'] : ''); ?>
    <input type="hidden" name="submittedOnUrl" id="submittedOnUrl" value="">
    <input type="hidden" name="formName" value="<?= $form_name; ?>">
    <input type="hidden" name="elqFormName" value="<?= $form_name; ?>">
    <input type="hidden" name="elqSiteID" value="2142644770">
    <input type="hidden" name="elqCustomerGUID" value="">
    <input type="hidden" name="campaignName" value="">
    <input type="hidden" name="campaignSource" value="">
    <input type="hidden" name="campaignMedium" value="">
    <input type="hidden" name="campaignContent" value="">
    <input type="hidden" name="campaignTerms" value="">
<?php if ( get_field( 'is_webinar' ) ): ?>
    <input type="hidden" name="isWebinarForm" value="1">
<?php endif; ?>
<?php if ( get_field( 'is_sales' ) ) {
	echo '<input type="hidden" name="isSalesForm" value="1">';
} ?>
<?php if ( $campaign_name_id = get_field( 'campaign_name_id' ) ): ?>
    <input type="hidden" name="campaignNameId" value="<?= $campaign_name_id ?>">
<?php endif; ?>
<?php if ( $elqCampaignId ): ?>
    <input type="hidden" name="elqCampaignId" value="<?= $elqCampaignId ?>">
<?php endif; ?>
<?php the_field( 'extra_hidden_fields' ); ?>