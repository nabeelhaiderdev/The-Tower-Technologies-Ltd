<?php

/**
 * Template Name: Contact
 * Template Post Type: page
 *
 * This template is for displaying contact page.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package The Tower Technologies Ltd.
 * @since 1.0.0
 *
 */
// Include header
get_header();

// Global variables
global $option_fields;
global $pID;
global $fields;

$ttl_cpo_title = (isset($fields['ttl_cpo_title'])) ? $fields['ttl_cpo_title'] : get_the_title();
$ttl_cpo_description = (isset($fields['ttl_cpo_description'])) ? $fields['ttl_cpo_description'] : null;
$ttl_cpo_button = (isset($fields['ttl_cpo_button'])) ? $fields['ttl_cpo_button'] : null;
// if(!$ttl_pagetitle){
// 	$ttl_pagetitle = get_the_title();
// }
?>

<!-- Intro -->
<section class="section-intro subpage">
	<canvas></canvas>
	<div class="container">
		<div class="intro-holder">
			<div class="text-box" data-aos="zoom-out" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="500" data-aos-easing="ease-in-out">
				<h1><?php echo html_entity_decode($ttl_cpo_title); ?></h1>
				<p><?php echo $ttl_cpo_description; ?></p>
				<div class="btn-block">
					<?php
					if ($ttl_cpo_button) :
						echo glide_acf_button($ttl_cpo_button, 'btn btn-primary-fancy');
					endif;
					?>

				</div>
			</div>
		</div>
	</div>
</section>

<section id="page-section" class="page-section">
	<!-- Content Start -->

	<?php while (have_posts()) {
		the_post();
		//Include specific template for the content.
		get_template_part('partials/content', 'page');
	} ?>

	<div class="clear"></div>
	<div class="ts-80"></div>

	<!-- Content End -->
</section>

<?php get_footer(); ?>
