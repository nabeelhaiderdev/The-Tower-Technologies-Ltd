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
						<article class="post-small">
							<div class="img-holder">
								<a href="">
									<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/img-thumbnail-1.jpg"
										alt="">
								</a>
							</div>
							<div class="text-box">
								<time class="date" datetime="2023-07-16">JULY 16, 2023</time>
								<h5><a href="">5 Ways you can turn future into success</a></h5>
							</div>
						</article>
						<article class="post-small">
							<div class="img-holder">
								<a href="">
									<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/img-thumbnail-2.jpg"
										alt="">
								</a>
							</div>
							<div class="text-box">
								<time class="date" datetime="2023-07-16">August 02, 2023</time>
								<h5><a href="#">Master The Art OF Coding In Python</a></h5>
							</div>
						</article>
						<article class="post-small">
							<div class="img-holder">
								<a href="#">
									<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/img-thumbnail-3.jpg"
										alt="">
								</a>
							</div>
							<div class="text-box">
								<time class="date" datetime="2023-07-16">August 12, 2023</time>
								<h5><a href="#">All the technology follow chat GPT</a></h5>
							</div>
						</article>
					</div>
				</div>
				<div class="widget widget-categories">
					<div class="widget-holder">
						<h4>Blog Categories</h4>
						<ul>
							<li><a href="#">Mobile App Development(3)</a></li>
							<li><a href="#">Website Development(2)</a></li>
							<li><a href="#">Web Portals(4)</a></li>
						</ul>
					</div>
				</div>
				<div class="widget widget-tags">
					<div class="widget-holder">
						<h4>Popular Tags</h4>
						<ul>
							<li><a href="#">Python</a></li>
							<li><a href="#">C++</a></li>
							<li><a href="#">Java</a></li>
							<li><a href="#">Native</a></li>
							<li><a href="#">Hybrid</a></li>
						</ul>
					</div>
				</div>
			</aside>
		</div>
	</div>
</main>

<?php get_footer();
