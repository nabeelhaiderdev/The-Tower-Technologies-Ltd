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

if ( is_home() ) {
	$pID = get_option( 'page_for_posts' );
}

if ( is_404() || is_archive() || is_category() || is_search() ) {
	$pID = get_option( 'page_on_front' );
}

if ( function_exists( 'get_fields' ) && function_exists( 'get_fields_escaped' ) ) {
	$option_fields = get_fields_escaped( 'option' );
	$fields        = get_fields_escaped( $pID );
}
?> <?php

// Default Footer Options

$footer_scripts = ( isset( $option_fields['footer_scripts'] ) ) ? $option_fields['footer_scripts'] : null;



// Schema Markup - ACF variables.


$ttl_schema_check = $option_fields['ttl_schema_check'];
if ( $ttl_schema_check ) {
	$ttl_schema_business_name       = html_entity_remove( $option_fields['ttl_schema_business_name'] );
	$ttl_schema_business_legal_name = html_entity_remove( $option_fields['ttl_schema_business_legal_name'] );
	$ttl_schema_street_address      = html_entity_remove( $option_fields['ttl_schema_street_address'] );
	$ttl_schema_locality            = html_entity_remove( $option_fields['ttl_schema_locality'] );
	$ttl_schema_region              = html_entity_remove( $option_fields['ttl_schema_region'] );
	$ttl_schema_postal_code         = html_entity_remove( $option_fields['ttl_schema_postal_code'] );
	$ttl_schema_map_short_link      = html_entity_remove( $option_fields['ttl_schema_map_short_link'] );
	$ttl_schema_latitude            = html_entity_remove( $option_fields['ttl_schema_latitude'] );
	$ttl_schema_longitude           = html_entity_remove( $option_fields['ttl_schema_longitude'] );
	$ttl_schema_opening_hours       = html_entity_remove( $option_fields['ttl_schema_opening_hours'] );
	$ttl_schema_telephone           = html_entity_remove( $option_fields['ttl_schema_telephone'] );
	$ttl_schema_business_email      = html_entity_remove( $option_fields['ttl_schema_business_email'] );
	$ttl_schema_business_logo       = html_entity_remove( $option_fields['ttl_schema_business_logo'] );
	$ttl_schema_price_range         = html_entity_remove( $option_fields['ttl_schema_price_range'] );
	$ttl_schema_type                = html_entity_remove( $option_fields['ttl_schema_type'] );
}
// Custom - ACF variables.
$ttl_to_ftr_css = ( isset( $option_fields['ttl_to_ftr_css'] ) ) ? $option_fields['ttl_to_ftr_css'] : null;

$ttl_ftrop_title     = ( isset( $option_fields['ttl_ftrop_title'] ) ) ? $option_fields['ttl_ftrop_title'] : null;
$ttl_ftrop_text      = html_entity_decode( $option_fields['ttl_ftrop_text'] );
$ttl_ftrop_copyright = html_entity_decode( $option_fields['ttl_ftrop_copyright'] );
$ttl_social_fb       = ( isset( $option_fields['ttl_social_fb'] ) ) ? $option_fields['ttl_social_fb'] : null;
$ttl_social_tw       = ( isset( $option_fields['ttl_social_tw'] ) ) ? $option_fields['ttl_social_tw'] : null;
$ttl_social_li       = ( isset( $option_fields['ttl_social_li'] ) ) ? $option_fields['ttl_social_li'] : null;
$ttl_social_in       = ( isset( $option_fields['ttl_social_in'] ) ) ? $option_fields['ttl_social_in'] : null;
$ttl_social_yt       = ( isset( $option_fields['ttl_social_yt'] ) ) ? $option_fields['ttl_social_yt'] : null;

?>
<?php get_template_part( 'partials/cta' ); ?> </main>
<footer id="footer" class="footer-section">
	<!-- Footer -->
	<div class="container">
		<div class="footer-content">
			<div class="footer-col box-content">
				<div class="logo">
					<a href="./"><img
							src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo-towertech.svg"
							alt="" width="330" height="46"></a>
				</div>
				<?php if($ttl_to_ftr_css){ ?>
				<ul class="contacts">
					<?php foreach ($ttl_to_ftr_css as $contact) { 
							$contact_title = $contact['title'];
							$contact_text = $contact['text'];
							$contact_type = $contact['type'];
							if($contact_type == 'Phone'){
								$contact_href = 'tel:+'. preg_replace( '/[^0-9]/', '', $contact_text );
							} else {
								$contact_href = 'mailto:' . $contact_text;
							}
							?>
					<li>
						<span class="subtitle"><?php echo $contact_title; ?></span>
						<span class="context"><a
								href="<?php echo $contact_href; ?>"><?php echo $contact_text; ?></a></span>
					</li>
					<?php } ?>
				</ul>
				<?php } ?>
			</div>
			<div class="footer-col footer-nav">
				<h4>Links</h4>
				<?php
						wp_nav_menu(
							array(
							'theme_location' => 'footer-nav-one',
							'fallback_cb' => 'menu_fallback',
							)
						);
					?>
			</div>
			<div class="footer-col newsletter">
				<h4>Follow Us</h4>
				<ul class="social-networks">
					<?php if($ttl_social_tw){ ?>
					<li><a href="<?php echo $ttl_social_tw; ?>"><i class="fab fa-twitter"></i></a></li>
					<?php } ?>
					<?php if($ttl_social_li){ ?>
					<li><a href="<?php echo $ttl_social_li; ?>"><i class="fab fa-linkedin"></i></a></li>
					<?php } ?>
					<?php if($ttl_social_fb){ ?>
					<li><a href="<?php echo $ttl_social_fb; ?>"><i class="fab fa-facebook"></i></a></li>
					<?php } ?>
					<?php if($ttl_social_yt){ ?>
					<li><a href="<?php echo $ttl_social_yt; ?>"><i class="fab fa-youtube"></i></a></li>
					<?php } ?>
				</ul>
				<h4>Subscribe</h4>
				<p>Subscribe our newsletter to get updates about our services and offers.</p>
				<form class="newsletter-form">
					<div class="form-holder">
						<input type="email" class="form-control form-control-sm" placeholder="Enter your email">
						<button type="submit" class="btn btn-tertiary btn-sm">Subscribe</button>
					</div>
				</form>

			</div>
		</div>
		<div class="copyright">
			<p>&copy; <?php the_date('Y'); ?><a href="https://thetowertech.com/"> Powered by Tower Tech </a>
				<?php echo $ttl_ftrop_copyright; ?> </p>
		</div>
	</div>
	<!-- Btn Top -->
	<a href="#wrapper" class="btn-top smoothScroll">
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ico-up.svg" alt="Go Top" width="9"
			height="18">
	</a>
	<!-- Footer End -->
	<?php
	if ( $ttl_schema_check ) {
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
		"url": "<?php echo esc_url( home_url() ); ?>",
		"image": "<?php echo $ttl_schema_business_logo; ?>",
		"legalName": "<?php echo $ttl_schema_business_legal_name; ?>",
		"priceRange": "<?php echo $ttl_schema_price_range; ?>"
	}
	</script> <?php } ?>
</footer> <?php wp_footer(); ?> <?php
if ( $footer_scripts != '' ) {
	?>
<div style="display: none;">
	<?php echo html_entity_decode( $footer_scripts, ENT_QUOTES ); ?> </div> <?php } ?>

</div>
<!-- /#wrapper -->
</body>

</html>
