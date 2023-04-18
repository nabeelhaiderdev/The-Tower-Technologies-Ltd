<?php
/**
 * Template part for footer cta
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/
 *
 * @package The Tower Technologies Ltd.
 * @since 1.0.0
 */
// Global variables
global $option_fields;
global $p_id;
global $fields;

$ttl_page_cta_pagevisibility = ( isset( $fields['ttl_page_cta_pagevisibility'] ) ) ? $fields['ttl_page_cta_pagevisibility'] : null;


//  $ttl_to_cta_headline = ( isset( $fields['ttl_to_cta_headline'] ) ) ? $option_fields['ttl_to_cta_headline'] : null;
// $ttl_ftrcta_headline  = ( isset( $fields['ttl_page_cta_headline'] ) ) ? $fields['ttl_page_cta_headline'] : $ttl_to_cta_headline;

$ttl_ftr_cta_heading = ( isset( $option_fields['ttl_ftr_cta_heading'] ) ) ? $option_fields['ttl_ftr_cta_heading'] : null;
$ttl_ftr_cta_text = ( isset( $option_fields['ttl_ftr_cta_text'] ) ) ? $option_fields['ttl_ftr_cta_text'] : null;
$ttl_ftr_cta_phone = ( isset( $option_fields['ttl_ftr_cta_phone'] ) ) ? $option_fields['ttl_ftr_cta_phone'] : null;
?>
<!-- Aside Call-->
<aside class="aside-call">
	<div class="container">
		<div class="call-content">
			<div class="text-box">
				<h3><?php echo html_entity_decode($ttl_ftr_cta_heading); ?></h3>
			</div>
			<div class="call-area">
				<span class="ico-arrow"></span>
				<i class="ico-call"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ico-call.svg" alt="" width="24" height="24"></i>
				<div class="call-box">
					<h5><?php echo $ttl_ftr_cta_text; ?></h5> 
					<strong class="phone"><a href="tel:+<?php echo preg_replace( '/[^0-9]/', '', $ttl_ftr_cta_phone ); ?>"><?php echo $ttl_ftr_cta_phone; ?></a></strong>
				</div>
			</div>
		</div>
	</div>
</aside>
