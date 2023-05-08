<?php
/**
 * Template part for displaying single post
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

<!-- Content -->
<div id="content">
	<div class="posts-block">
		<article class="post post-details">
			<div class="img-corner-holder reverse">
				<time class="date" datetime="2022-03-22"><strong class="date-holder">22
						<span>Mar</span></strong></time>
				<div class="img-corner-frame">
					<a href="#" class="img-frame">
						<?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail(
								'thumb_900',
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
				<ul class="meta">
					<li><a href="#"><?php display_username( get_the_author_meta( 'ID' )); ?></a></li>
					<li><time
							datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('F j, Y'); ?></time>
					</li>
				</ul>
			</div>
			<h2><?php the_title(); ?></h2>
			<?php get_template_part( 'partials/content' ); ?>
		</article>
		<div class="widget-content">
			<div class="widget-holder">
				<h4>Popular Tags</h4>
				<?php
				$tags = get_the_tags(); 
				if ( $tags ) {
					$i = 0;
				?>
				<ul class="popular-tags">
					<?php foreach ( $tags as $tag ) {
						 if ( $i >= 4 ) {
							break; // stop after the first four tags
						}
						$i++;
				 ?>
					<li><a href="<?php echo get_tag_link( $tag->term_id ); ?>"><?php echo $tag->name; ?></a></li>
					<?php } ?>
				</ul>
				<?php } ?>
			</div>
			<div class="widget-holder">
				<h4>Share Article</h4>
				<ul class="share-holder">
					<li>
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>"
							target="_blank" rel="nofollow noopener noreferrer">
							<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ico-facebook.svg"
								alt="Facebook" width="41" height="41"></a>
					</li>
					<li>
						<a href="https://twitter.com/share?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>"
							target="_blank" rel="nofollow noopener noreferrer">
							<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ico-twitter.svg"
								alt="Facebook" width="41" height="41"></a>
					</li>
					<li>
						<a href="https://wa.me/?text=<?php echo urlencode(get_the_title()); ?>%20<?php echo urlencode(get_permalink()); ?>"
							target="_blank" rel="nofollow noopener noreferrer">

							<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ico-whatsapp.svg"
								alt="Facebook" width="45" height="46"></a>
					</li>
					<li>
						<a href="mailto:?subject=<?php echo rawurlencode(get_the_title()); ?>&body=<?php echo rawurlencode('Check out this article: '.get_permalink()); ?>"
							target="_blank" rel="nofollow noopener noreferrer">

							<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ico-gmail.svg"
								alt="Facebook" width="41" height="41"></a>
					</li>
				</ul>
			</div>
		</div>
		<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || have_comments() ) {
				comments_template();  //comments.php
			}
		?>

	</div>
</div>
<!-- Sidebar -->
<?php get_template_part( 'partials/content', 'blog-aside' ); ?>
