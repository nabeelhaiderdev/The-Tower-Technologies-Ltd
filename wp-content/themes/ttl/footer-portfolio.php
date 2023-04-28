<?php

/**
 * The template for displaying website footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The Tower Technologies Ltd.
 * @since 1.0.0
 */
// Global variables
global $option_fields;
global $pID;
global $fields;

$pID = get_the_ID();

if (is_home()) {
	$pID = get_option('page_for_posts');
}

if (is_404() || is_archive() || is_category() || is_search()) {
	$pID = get_option('page_on_front');
}

if (function_exists('get_fields') && function_exists('get_fields_escaped')) {
	$option_fields = get_fields_escaped('option');
	$fields        = get_fields_escaped($pID);
}
?> <?php

	// Default Footer Options

	$footer_scripts = (isset($option_fields['footer_scripts'])) ? $option_fields['footer_scripts'] : null;



	// Schema Markup - ACF variables.


	$ttl_schema_check = $option_fields['ttl_schema_check'];
	if ($ttl_schema_check) {
		$ttl_schema_business_name       = html_entity_remove($option_fields['ttl_schema_business_name']);
		$ttl_schema_business_legal_name = html_entity_remove($option_fields['ttl_schema_business_legal_name']);
		$ttl_schema_street_address      = html_entity_remove($option_fields['ttl_schema_street_address']);
		$ttl_schema_locality            = html_entity_remove($option_fields['ttl_schema_locality']);
		$ttl_schema_region              = html_entity_remove($option_fields['ttl_schema_region']);
		$ttl_schema_postal_code         = html_entity_remove($option_fields['ttl_schema_postal_code']);
		$ttl_schema_map_short_link      = html_entity_remove($option_fields['ttl_schema_map_short_link']);
		$ttl_schema_latitude            = html_entity_remove($option_fields['ttl_schema_latitude']);
		$ttl_schema_longitude           = html_entity_remove($option_fields['ttl_schema_longitude']);
		$ttl_schema_opening_hours       = html_entity_remove($option_fields['ttl_schema_opening_hours']);
		$ttl_schema_telephone           = html_entity_remove($option_fields['ttl_schema_telephone']);
		$ttl_schema_business_email      = html_entity_remove($option_fields['ttl_schema_business_email']);
		$ttl_schema_business_logo       = html_entity_remove($option_fields['ttl_schema_business_logo']);
		$ttl_schema_price_range         = html_entity_remove($option_fields['ttl_schema_price_range']);
		$ttl_schema_type                = html_entity_remove($option_fields['ttl_schema_type']);
	}
	// Custom - ACF variables.
	$ttl_to_ftr_css = (isset($option_fields['ttl_to_ftr_css'])) ? $option_fields['ttl_to_ftr_css'] : null;

	$ttl_ftrop_title     = (isset($option_fields['ttl_ftrop_title'])) ? $option_fields['ttl_ftrop_title'] : null;
	$ttl_ftrop_text      = html_entity_decode($option_fields['ttl_ftrop_text']);
	$ttl_ftrop_copyright = html_entity_decode($option_fields['ttl_ftrop_copyright']);
	$ttl_social_fb       = (isset($option_fields['ttl_social_fb'])) ? $option_fields['ttl_social_fb'] : null;
	$ttl_social_tw       = (isset($option_fields['ttl_social_tw'])) ? $option_fields['ttl_social_tw'] : null;
	$ttl_social_li       = (isset($option_fields['ttl_social_li'])) ? $option_fields['ttl_social_li'] : null;
	$ttl_social_in       = (isset($option_fields['ttl_social_in'])) ? $option_fields['ttl_social_in'] : null;
	$ttl_social_yt       = (isset($option_fields['ttl_social_yt'])) ? $option_fields['ttl_social_yt'] : null;

	?>
</main>

<?php
if ($ttl_schema_check) {
?>
	<script type="application/ld+json">
		{
			"@context": "http://schema.org",
			"@type": "<?php echo $ttl_schema_type; ?>",
			"address": {
				"@type": "PostalAddress",
				"addressLocality": "<?php echo $ttl_schema_locality; ?>",
				"addressRegion": "<?php echo $ttl_schema_region; ?>",
				"postalCode": "<?php echo $ttl_schema_postal_code; ?>",
				"streetAddress": "<?php echo $ttl_schema_street_address; ?>"
			},
			"hasMap": "<?php echo $ttl_schema_map_short_link; ?>",
			"geo": {
				"@type": "GeoCoordinates",
				"latitude": "<?php echo $ttl_schema_latitude; ?>",
				"longitude": "<?php echo $ttl_schema_longitude; ?>"
			},
			"name": "<?php echo $ttl_schema_business_name; ?>",
			"openingHours": "<?php echo $ttl_schema_opening_hours; ?>",
			"telephone": "<?php echo $ttl_schema_telephone; ?>",
			"email": "<?php echo $ttl_schema_business_email; ?>",
			"url": "<?php echo esc_url(home_url()); ?>",
			"image": "<?php echo $ttl_schema_business_logo; ?>",
			"legalName": "<?php echo $ttl_schema_business_legal_name; ?>",
			"priceRange": "<?php echo $ttl_schema_price_range; ?>"
		}
	</script> <?php } ?>
<?php wp_footer(); ?>

</div>
</body>

</html>
