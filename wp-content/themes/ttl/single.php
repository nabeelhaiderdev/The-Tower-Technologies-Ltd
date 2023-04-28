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

$ttl_posttitle = ( isset( $fields['ttl_posttitle'] ) ) ? $fields['ttl_posttitle'] : get_the_title();
$ttl_spost_short_description = ( isset( $fields['ttl_spost_short_description'] ) ) ? $fields['ttl_spost_short_description'] : null;

?>

<!-- Intro -->
<section class="section-intro subpage">
	<canvas></canvas>
	<div class="container">
		<div class="intro-holder">
			<div class="text-box" data-aos="zoom-out" data-aos-anchor-placement="top-bottom" data-aos-duration="1000"
				data-aos-delay="500" data-aos-easing="ease-in-out">
				<h1><?php echo html_entity_decode($ttl_posttitle); ?></h1>
				<?php if($ttl_spost_short_description){ ?>
				<p><?php echo $ttl_spost_short_description; ?></p>
				<?php } ?>
				<div class="btn-block">
					<a href="#single-post-content" class="btn btn-primary-fancy">see details</a>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- Main Content -->
<main id="main" class="main">
	<!-- Content Two Columns -->
	<div id="content-twocols">
		<div class="container">
			<?php while ( have_posts() ) { the_post();
				//Include specific template for the content.
				get_template_part( 'partials/content', get_post_type() );
			} ?>

			<div class="clear"></div>
			<div class="ts-80"></div>
		</div>
	</div>
</main>

<?php get_footer();
