<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The Tower Technologies Ltd.
 * @since 1.0.0
 *
 */

?>
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
			if ( $query_latest->have_posts() ) {
				while ( $query_latest->have_posts() ) {
					$query_latest->the_post(); 
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
