<?php
/**
 * Template part for displaying posts in an archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The Tower Technologies Ltd.
 * @since 1.0.0
 */


// Global variables
global $option_fields;
global $p_id;
global $page_fields;

$page_fields        = get_fields_escaped( $p_id );


$ttl_spost_short_description = ( isset( $page_fields['ttl_spost_short_description'] ) ) ? $page_fields['ttl_spost_short_description'] : null;

?>

<article class="post">
	<div class="img-corner-holder reverse">
		<time class="date" datetime="2022-03-22"><strong class="date-holder">22 <span>Mar</span></strong></time>
		<div class="img-corner-frame">
			<a href="<?php the_permalink(); ?>" class="img-frame">
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
	</div>
	<div class="text-box">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<p><?php echo $ttl_spost_short_description; ?></p>
	</div>
	<div class="btn-block">
		<a href="<?php the_permalink(); ?>" class="btn btn-secondary-fancy">Read more</a>
	</div>
</article>
