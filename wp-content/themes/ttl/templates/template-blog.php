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
			<aside id="aside">
				<div class="widget widget-search">
					<div class="widget-holder">
						<form>
							<div class="input-holder">
								<input class="form-control" placeholder="Search">
							</div>
							<button type="submit" class="btn btn-primary"><img
									src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ico-search.svg"
									alt="Search" width="20" height="20"></button>
						</form>
					</div>
				</div>
				<div class="widget widget-posts">
					<div class="widget-holder">
						<h4>Latest Post</h4>
						<?php 
						$args_latest = array(
							'post_type'              => array( 'post' ),
							'posts_per_page'         => 3, //how many posts you need
							// 'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
							'orderby'           => 'date',
							'order'             => 'DESC',
						);
						// The Query
						$query_latest = new WP_Query( $args_latest );
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post(); 
						?>
						<article class="post-small">
							<div class="img-holder">
								<a href="">
									<?php if ( has_post_thumbnail() ) { ?>
									<?php the_post_thumbnail(
										'admin-square',
										array(
											'alt'   => get_the_title(),
											'title' => get_the_title(),
										)
									); ?>
									<?php } else { ?>
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/defaults/default-image.webp"
										class="" alt="<?php get_the_title(); ?>" title="<?php get_the_title(); ?>">
									<?php } ?>
								</a>
							</div>
							<div class="text-box">
								<time class="date"
									datetime="<?php echo get_the_date( 'Y-m-d' ); ?>"><?php echo get_the_date( 'F j, Y' ); ?></time>
								<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							</div>
						</article>
						<?php } } ?>
					</div>
				</div>
				<?php 
				// Define query args to get posts with their categories
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => -1,
					'orderby' => 'date',
					'order' => 'DESC',
					'fields' => 'ids',
				);

				// Get post IDs with their categories
				$post_ids = get_posts($args);

				// Get the latest 3 categories with posts
				$categories = array();
				foreach ($post_ids as $post_id) {
					$post_categories = get_the_category($post_id);
					foreach ($post_categories as $post_category) {
						$categories[$post_category->term_id] = $post_category;
						if (count($categories) >= 3) {
							break 2;
						}
					}
				}
				if (!empty($categories)) {
				?>
				<div class="widget widget-categories">
					<div class="widget-holder">
						<h4>Blog Categories</h4>
						<ul>
							<?php 
							 foreach ($categories as $category) {
								$category_link = get_category_link($category);
								$post_count = get_category($category->term_id)->count;
								echo '<li><a href="' . esc_url($category_link) . '">' . esc_html($category->name) . '(' . $post_count . ')' . '</a></li>';
							} ?>
						</ul>
					</div>
				</div>
				<?php } ?>
				<?php 
				// Define query args to get popular tags
				$args = array(
					'orderby' => 'count',
					'order' => 'DESC',
					'number' => 5, // Number of tags to display
				);

				// Get popular tags
				$tags = get_tags($args);

				// Output the popular tags
				if (!empty($tags)) { ?>
				<div class="widget widget-tags">
					<div class="widget-holder">
						<h4>Popular Tags</h4>
						<ul>
							<?php foreach ($tags as $tag) {
								$tag_link = get_tag_link($tag->term_id);
								echo '<li><a href="' . esc_url($tag_link) . '">' . esc_html($tag->name) . '</a></li>';
							} ?>
						</ul>
					</div>
				</div>
				<?php } ?>
			</aside>
		</div>
	</div>
</main>

<?php get_footer();
