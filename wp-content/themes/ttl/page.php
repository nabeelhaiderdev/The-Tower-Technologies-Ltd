<?php

/**
 * The template for displaying all pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

$ttl_spo_title = (isset($fields['ttl_spo_title'])) ? $fields['ttl_spo_title'] : get_the_title();
$ttl_spo_description = (isset($fields['ttl_spo_description'])) ? $fields['ttl_spo_description'] : null;
$ttl_spo_button = (isset($fields['ttl_spo_button'])) ? $fields['ttl_spo_button'] : null;
// if(!$ttl_pagetitle){
// 	$ttl_pagetitle = get_the_title();
// }
?>

<!-- Intro -->
<section class="section-intro-landing">
	<div class="container">
		<div class="text-box" data-aos="zoom-out" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="500" data-aos-easing="ease-in-out">
			<h2><?php echo $ttl_spo_title; ?> <strong class="border-line"></strong></h2>
			<p><?php echo $ttl_spo_description; ?></p>
			<div class="btn-block">
				<?php
				if ($ttl_spo_button) :
					echo glide_acf_button($ttl_spo_button, 'btn btn-secondary-fancy');
				endif;
				?>
			</div>
		</div>
		<div class="img-area" data-aos="zoom-out" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="500" data-aos-easing="ease-in-out">
			<div class="img-corner-holder reverse circular">
				<div class="img-corner-frame">
					<div class="img-frame">
						<?php if (has_post_thumbnail()) {
							the_post_thumbnail('full');
						} ?>
					</div>
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
