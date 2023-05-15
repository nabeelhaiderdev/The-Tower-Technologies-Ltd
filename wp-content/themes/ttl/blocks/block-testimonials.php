<?php
/**
 * Block Name: BlockName
 *
 * The template for displaying the custom gutenberg block named BlockName.
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
$ttl_blk_tk = ( isset( $block_fields['ttl_blk_tk'] ) ) ? $block_fields['ttl_blk_tk'] : null;
$ttl_blk_tt = ( isset( $block_fields['ttl_blk_tt'] ) ) ? $block_fields['ttl_blk_tt'] : null;
$ttl_blk_rst = ( isset( $block_fields['ttl_blk_rst'] ) ) ? $block_fields['ttl_blk_rst'] : array();



global $post;
$lp_select_posts = array();
$lp_select_posts = $block_fields['ttl_blk_rst'];

?>
<div id="<?php echo $id; ?>"
	class="<?php echo $align_class . ' ' . $class_name. ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">
	<!-- Contact Form -->
	<section class="section section-testimonials" data-aos="fade-down" data-aos-duration="700">
		<div class="section-frame">
			<div class="container">
				<header class="section-head">
					<h3><?php echo $ttl_blk_tk;?></h3>
					<h2><?php echo $ttl_blk_tt;?></h2>
				</header>
				<div class="testimonials-block-frame">
					<div class="testimonials-block">
						<div class="testimonial-slider testimonialsSlider">
							<?php 
									if ( $lp_select_posts ) :
										
										foreach ( $lp_select_posts as $lp_posts ) :
											
											$post = $lp_posts;
											setup_postdata( $post );
											$pID         = $post->ID;
											$post_fields = get_fields( $pID );
											$ttl_start_rating  = isset($post_fields['ttl_start_rating']) ? $post_fields['ttl_start_rating']: 0;

											$src         = wp_get_attachment_image_src( get_post_thumbnail_id( $pID ), 'full', false );
											if ( ! $src ) {
												$src = get_template_directory_uri() . '/assets/img/default-project-image.jpg';
											} else {
												$src = $src[0];
											}
											
									?>
							<div class="testimonial-slide">
								<div class="testimonial-holder">
									<div class="img-holder">
										<img src="<?php echo $src; ?>" alt="PGC" width="106" height="129">
									</div>
									<h5><?php the_title();?></h5>
									<p><?php echo html_entity_decode(glide_excerpt_nomore( 1000 )); ?></p>
									<ul class="rating">
										<?php 
												if($ttl_start_rating>0){
													for($i=1;$i<=$ttl_start_rating;$i++){

														?>
										<li><a class="active" href="#"><i class="fa fa-star"></i></a></li>
										<?php
													}

												}
												?>
									</ul>
								</div>
							</div>

							<?php		

									endforeach; endif; wp_reset_query();
									?>


						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>