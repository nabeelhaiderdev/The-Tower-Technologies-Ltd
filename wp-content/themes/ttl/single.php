<?php

/**
 * The template for displaying all posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

$post_field = get_fields_escaped(get_the_ID());

$ttl_sport_type = (isset($post_field['ttl_sport_type'])) ? $post_field['ttl_sport_type'] : null;

$current_post_type = get_post_type();
?>

<?php if ($current_post_type == 'portfolio') { ?>

	<!-- Intro -->
	<section class="section-intro portfolio-subpage">
		<canvas></canvas>
		<div class="container">
			<div class="intro-holder">
				<div class="text-box" data-aos="zoom-out" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="500" data-aos-easing="ease-in-out">
					<h2><?php echo $ttl_sport_type; ?> <strong><?php the_title(); ?></strong></h2>
					<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.</p>

				</div>
				<div class="img-box" data-aos="zoom-out" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="1000" data-aos-easing="ease-in-out">
					<div class="img-corner-holder smaller light">
						<div class="img-corner-frame">
							<div class="img-frame">
								<img src="<?php the_post_thumbnail_url($post_id); ?>" alt="" width="582">

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } else { ?>
	<!-- Intro -->
	<section class="section-intro subpage">
		<canvas></canvas>
		<div class="container">
			<div class="intro-holder">
				<div class="text-box" data-aos="zoom-out" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="500" data-aos-easing="ease-in-out">
					<h1><?php echo html_entity_decode($ttl_posttitle); ?></h1>
					<?php if ($ttl_spost_short_description) { ?>
						<p><?php echo $ttl_spost_short_description; ?></p>
					<?php } ?>
					<div class="btn-block">
						<a href="#single-post-content" class="btn btn-primary-fancy">see details</a>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php } ?>

<!-- Main Content -->
<main id="main" class="main">
	<!-- Content Two Columns -->
	<div id="content-twocols">
		<div class="container">
			<?php while (have_posts()) {
				the_post();
				//Include specific template for the content.
				get_template_part('partials/content', get_post_type());
			} ?>

			<div class="clear"></div>
			<div class="ts-80"></div>
		</div>
	</div>
</main>

<?php get_footer();
