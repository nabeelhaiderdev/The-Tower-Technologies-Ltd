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
			<div class="text-box" data-aos="zoom-out" data-aos-anchor-placement="top-bottom" data-aos-duration="1000"
				data-aos-delay="500" data-aos-easing="ease-in-out">
				<h2><?php echo $ttl_sport_type; ?> <strong><?php the_title(); ?></strong></h2>
				<p>It is a long established fact that a reader will be distracted by the readable content of a page when
					looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
					distribution of letters.</p>

			</div>
			<div class="img-box" data-aos="zoom-out" data-aos-anchor-placement="top-bottom" data-aos-duration="1000"
				data-aos-delay="1000" data-aos-easing="ease-in-out">
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
<?php } elseif ($current_post_type == 'service') { 
	$ttl_ssbo_title = ( isset( $fields['ttl_ssbo_title'] ) ) ? $fields['ttl_ssbo_title'] : get_the_title();
	$ttl_ssbo_text = ( isset( $fields['ttl_ssbo_text'] ) ) ? $fields['ttl_ssbo_text'] : null;
	$ttl_ssbo_button_text = ( isset( $fields['ttl_ssbo_button_text'] ) ) ? $fields['ttl_ssbo_button_text'] : 'DEVELOP With Us';
	$ttl_ssbo_detail_page_options = ( isset( $fields['ttl_ssbo_detail_page_options'] ) ) ? $fields['ttl_ssbo_detail_page_options'] : null;
	?>

<!-- Intro -->
<section class="section-intro-landing">
	<div class="container">
		<div class="text-box" data-aos="zoom-out" data-aos-anchor-placement="top-bottom" data-aos-duration="1000"
			data-aos-delay="500" data-aos-easing="ease-in-out">
			<h2><?php echo $ttl_ssbo_title; ?> <strong class="border-line"></strong></h2>
			<p><?php echo $ttl_ssbo_text; ?></p>
			<?php if($ttl_ssbo_button_text){ ?>
			<div class="btn-block">
				<a href="#service-main" class="btn btn-secondary-fancy"><?php echo $ttl_ssbo_button_text; ?></a>
			</div>
			<?php } ?>
		</div>
		<div class="img-area" data-aos="zoom-out" data-aos-anchor-placement="top-bottom" data-aos-duration="1000"
			data-aos-delay="500" data-aos-easing="ease-in-out">
			<div class="img-corner-holder reverse circular">
				<div class="img-corner-frame">
					<div class="img-frame">
						<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full'); ?>" height="" alt=""
							width="368">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php }  else { 
	$ttl_posttitle = ( isset( $fields['ttl_posttitle'] ) ) ? $fields['ttl_posttitle'] : null;
	$ttl_spost_short_description = ( isset( $fields['ttl_spost_short_description'] ) ) ? $fields['ttl_spost_short_description'] : null;
	$ttl_posttitle = ( isset( $fields['ttl_posttitle'] ) ) ? $fields['ttl_posttitle'] : null;
	?>
<!-- Intro -->
<section class="section-intro subpage">
	<canvas></canvas>
	<div class="container">
		<div class="intro-holder">
			<div class="text-box" data-aos="zoom-out" data-aos-anchor-placement="top-bottom" data-aos-duration="1000"
				data-aos-delay="500" data-aos-easing="ease-in-out">
				<h1><?php echo html_entity_decode($ttl_posttitle); ?></h1>
				<?php if ($ttl_spost_short_description) { ?>
				<p><?php echo $ttl_spost_short_description; ?></p>
				<?php } ?>
				<div class="btn-block">
					<a href="#single-post-content" class="btn btn-primary-fancy">see details</a>
				</div>
			</div>
		</div>
</section>

<?php } ?>

<!-- Main Content -->
<main id="main" class="main">
	<?php if ($current_post_type != 'service') {  ?>
	<!-- Content Two Columns -->
	<div id="content-twocols">
		<div class="container">
			<?php } ?>
			<?php while (have_posts()) { 
					the_post();
					//Include specific template for the content.
					get_template_part('partials/content', get_post_type());
				} ?> <div class="clear">
			</div>
			<div class="ts-80"></div>
			<?php if ($current_post_type != 'service') {  ?>
		</div>
	</div>
	<?php } ?>
</main>

<?php get_footer();
