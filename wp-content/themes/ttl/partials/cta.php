<?php
/**
 * Template part for footer cta
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/
 *
 * @package The Tower Technologies Ltd.
 * @since 1.0.0
 */

$ttl_page_cta_pagevisibility = ( isset( $fields['ttl_page_cta_pagevisibility'] ) ) ? $fields['ttl_page_cta_pagevisibility'] : null;


 $ttl_to_cta_headline = ( isset( $fields['ttl_to_cta_headline'] ) ) ? $option_fields['ttl_to_cta_headline'] : null;
$ttl_ftrcta_headline  = ( isset( $fields['ttl_page_cta_headline'] ) ) ? $fields['ttl_page_cta_headline'] : $ttl_to_cta_headline;
?>

<section id="cta-section" class="cta-section">
	<!-- cta Start -->
	<div class="cta-single">
		<div class="wrapper">
			<h4><?php echo $ttl_ftrcta_headline; ?></h4>
		</div>
	</div>
	<!-- cta End -->
</section>
