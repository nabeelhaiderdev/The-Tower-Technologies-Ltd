<?php
/**
 * Block Name: Projects
 *
 * The template for displaying the custom gutenberg block named Projects.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package The Tower Technologies Ltd.
 * @since 1.0.0
 */

// Get all the fields from ACF for this block ID
// $block_fields = get_fields( $block['id'] );
$block_fields = get_fields_escaped( $block['id'] );
// $block_fields = get_fields_escaped( $block['id'] ,'sanitize_text_field' ); // if want to remove all html

// Set the block name for it's ID & class from it's file name
$block_glide_name = $block['name'];
$block_glide_name = str_replace("acf/" , "" , $block_glide_name);

// Set the preview thumbnail for this block for gutenberg editor view.
if( isset( $block['data']['preview_image_help'] )  ) {    /* rendering in inserter preview  */
	echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
}

// create align class ("alignwide") from block setting ("wide").
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = (isset($block['className'])) ? $block['className'] : null;

// Making the unique ID for the block.
$id = 'block-' .$block_glide_name . "-" . $block['id'];

// Making the unique ID for the block.
if($block['name']){
	$block_name = $block['name'];
	$block_name = str_replace("/" , "-" , $block_name);
	$name = 'block-' .  $block_name;
}

// Block variables
// $custom_field_of_block = html_entity_decode($block_fields['custom_field_of_block']); // for keeping html from input
// $custom_field_of_block = html_entity_remove($block_fields['custom_field_of_block']); // for removing html from input
$ttl_blk_pjct_title = ( isset( $block_fields['ttl_blk_pjct_title'] ) ) ? $block_fields['ttl_blk_pjct_title'] : null;
$ttl_blk_pjct_kicker = ( isset( $block_fields['ttl_blk_pjct_kicker'] ) ) ? $block_fields['ttl_blk_pjct_kicker'] : null;

global $post;
$lp_select_posts = array();
$lp_select_posts = $block_fields['ttl_blk_pjct_projects'];

?>
<div id="<?php echo $id; ?>"
	class="<?php echo $align_class . ' ' . $class_name. ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

	<!-- Section Projects -->
	<section class="section section-projects add">
		<div class="section-frame">
			<div class="container">
				<header class="section-head" data-aos="fade-down" data-aos-duration="700">
					<h3><?php echo $ttl_blk_pjct_kicker; ?></h3>
					<h2><?php echo $ttl_blk_pjct_title; ?> <span class="sign-line white"></span></h2>
				</header>
				<?php if ( $lp_select_posts ) { ?>
				<div class="projects-wrap" data-aos="fade-up" data-aos-duration="700">
					<div class="projects-main">
						<div class="project-slides projectsSlider">
							<?php
							foreach ( $lp_select_posts as $lp_posts ) {
								$post = $lp_posts;
								setup_postdata( $post );
								$pID         = $post->ID;
								$post_fields = get_fields( $pID );
								$ttl_spo_type  = $post_fields['ttl_spo_type'];
								// $src         = wp_get_attachment_image_src( get_post_thumbnail_id( $pID ), 'full', false );
								// if ( ! $src ) {
								// 	$src = get_template_directory_uri() . '/assets/img/default-project-image.jpg';
								// } else {
								// 	$src = $src[0];
								// }
							?>
							<div class="project-slide">
								<a class="project-frame" href="<?php the_permalink(); ?>">
									<div class="img-holder">
										<?php
											if ( has_post_thumbnail() ) {
												the_post_thumbnail('full');
											} 
										?>
									</div>
									<div class="text-box">
										<h6><?php echo $ttl_spo_type; ?></h6>
										<h3><?php the_title(); ?></h3>
									</div>
								</a>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<?php }  wp_reset_query(); ?>
			</div>
		</div>
	</section>

</div>
