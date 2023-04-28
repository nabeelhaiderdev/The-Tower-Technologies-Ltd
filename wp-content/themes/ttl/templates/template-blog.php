<?php
/**
 * Template Name: Blog
 * Template Post Type: page
 *
 * This template is for displaying blog page.
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


$ttl_pagetitle = (isset($fields['ttl_tbpo_title']) && $fields['ttl_tbpo_title']!='' ) ? $fields['ttl_tbpo_title'] : get_the_title();
$ttl_tbpo_description = ( isset( $fields['ttl_tbpo_description'] ) ) ? $fields['ttl_tbpo_description'] : null;
$ttl_tbpo_button = ( isset( $fields['ttl_tbpo_button'] ) ) ? $fields['ttl_tbpo_button'] : null;

$ttl_post_catagories = get_categories($pID);

?>

<!-- Intro -->
<section class="section-intro subpage">
	<canvas></canvas>
	<div class="container">
		<div class="intro-holder">
			<div class="text-box" data-aos="zoom-out" data-aos-anchor-placement="top-bottom" data-aos-duration="1000"
				data-aos-delay="500" data-aos-easing="ease-in-out">
				<h1><?php echo html_entity_decode($ttl_pagetitle); ?> </h1>
				<p><?php echo $ttl_tbpo_description; ?></p>
				<div class="btn-block">
					<?php
						if( $ttl_tbpo_button ) :
							echo glide_acf_button( $ttl_tbpo_button, 'btn btn-primary-fancy' );
						endif;
					?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php

$args = array(
	'post_type'              => array( 'post' ),
	'posts_per_page'         => get_option('posts_per_page'), //how many posts you need
	'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
);
// The Query
$query = new WP_Query( $args );
?>
<!-- Main Content -->
<main id="main" class="main">
	<div id="content-twocols">
		<div class="container">
			<div id="content">
				<?php 	if ( $query->have_posts() ) { ?>
				<div class="posts-block">
					<?php 
					while ( $query->have_posts() ) {
						$query->the_post(); 
						//Include specific template for the content.
						get_template_part( 'partials/content', 'archive-post' );
					} 
					?>
				</div>
				<?php } ?>
			</div>
			<?php get_template_part( 'partials/content', 'blog-aside' ); ?>
		</div>
	</div>
</main>

<?php get_footer();
