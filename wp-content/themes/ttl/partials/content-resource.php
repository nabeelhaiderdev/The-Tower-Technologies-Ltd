<?php
/**
 * Template part for displaying single resource
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The Tower Technologies Ltd.
 * @since 1.0.0
 */


$post_data=get_queried_object();
$pID  = get_the_ID();
if (function_exists('get_fields') && function_exists('get_fields_escaped')) {
	$post_fields = get_fields_escaped( $pID );
}

// Post Tags & Categories
// $ttl_post_tags = get_the_tags($pID);
$ttl_post_categories = get_categories($pID);

$ttl_posttitle=glide_page_title('ttl_posttitle');

?>

<div class="container-980">
	<div class="wrapper">
		<div class="post-image">
			<a href="<?php the_permalink(); ?>"> <?php if ( has_post_thumbnail() ) { ?> <div class="thumb"> <?php the_post_thumbnail(
							'thumb_1200',
							array(
								'alt'   => get_the_title(),
								'title' => get_the_title(),
							)
						); ?> </div> <?php } else { ?> <img
					src="<?php echo get_template_directory_uri(); ?>/assets/img/admin/defaults/default-image.webp" class=""
					alt="<?php get_the_title(); ?>" title="<?php get_the_title(); ?>"> <?php } ?> </a>
		</div><!-- .post-image -->
		<div class="post-meta d-flex justify-content-between align-items-center">
			<!-- /.post-tags -->
			<?php if($ttl_post_categories){ ?>
				<div class="post-cat">
					<?php foreach ($ttl_post_categories as $category ) { ?>
						<a href="<?php echo get_category_link($category); ?>"><?php echo $category->name; ?></a>
					<?php } ?>
				</div>
				<!-- /.post-cat -->
			<?php } ?>
			<div class="post-shares">
				<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title();?>" target="_blank"
					rel="noopener" rel="noreferrer"
					onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img
						src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/facebook-icon.svg" alt="Facebook"
						class="post-fb-share"></a>
				<a href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php the_title();?>&amp;url=<?php the_permalink();?>"
					target="_blank" rel="noopener" rel="noreferrer"
					onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img
						src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/linkedin-icon.svg" alt="Linked In"
						class="post-li-share"></a>
						<a href="http://twitter.com/intent/tweet?text=Currently reading <?php the_title();?>&amp;url=<?php the_permalink();?>"
					target="_blank" rel="noopener" rel="noreferrer"
					onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img
						src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/twitter-icon.svg" alt="Twitter"
						class="post-tw-share"></a>
			</div>
			<!-- /.post-shares -->
		</div>


		<article id="post-<?php the_ID(); ?>" <?php post_class('post-ctn'); ?>>
				<?php get_template_part( 'partials/content' ); ?>
				<div class="clear"></div>
				<div class="post-details">
					<div class="post-pagination"> <?php the_posts_pagination() ?> </div>
					<div class="post-comments"> <?php
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
						?>
					</div>
				</div>
				<div class="ts-80"></div>
			</div>

			<?php
			wp_reset_query();
			wp_reset_postdata();

			$ttl_rp_selection_criteria = isset($fields['ttl_rp_selection_criteria']) ? $fields['ttl_rp_selection_criteria'] : null;
			if($ttl_rp_selection_criteria == 'random'){

				$args = array(
					'posts_per_page' => 3,
					'post__not_in'   => array( $post->ID ),
					'orderby'        => 'rand',
				);

				$query = new WP_Query( $args );

				// The Loop
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
						//Include specific template for the content.
						get_template_part( 'partials/content', 'archive-post' );
					}
				?> <div class="clear"></div> <?php
				}
			}
			else {
				global $post;
				$ttl_selected_posts = array();
				$ttl_selected_posts = isset($fields['ttl_rp_selected_posts']) ? $fields['ttl_rp_selected_posts'] : null;
				if ( $ttl_selected_posts ) { ?> <div class="related-posts ">
				<h3><?php _e( 'Related Posts', 'ttl_td' ) ?></h3> <?php
								foreach ( $ttl_selected_posts as $ttl_post ) {
									$post = $ttl_post;
									setup_postdata( $post );
									$pID         = $post->ID;
									$post_fields = get_fields( $pID );
									$custom_field  = $post_fields['custom_field'];
									$src         = wp_get_attachment_image_src( get_post_thumbnail_id( $pID ), 'thumb_600', false );
									if ( ! $src ) {
										$src = get_template_directory_uri() . '/assets/img/admin/defaults/default-image.webp';
									} else {
										$src = $src[0];
									}
										get_template_part( 'partials/content', 'archive-post' );
								}
							?>
			</div> <?php } wp_reset_query();
				wp_reset_postdata();
				}
				?>
		</article>
	</div>
</div>
