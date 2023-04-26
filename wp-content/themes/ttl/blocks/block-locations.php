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
// $custom_field_of_block = html_entity_decode($block_fields['custom_field_of_block']); // for keeping html from input
// $custom_field_of_block = html_entity_remove($block_fields['custom_field_of_block']); // for removing html from input
$ttl_blk_lct_title = ( isset( $block_fields['ttl_blk_lct_title'] ) ) ? $block_fields['ttl_blk_lct_title'] : null;
$ttl_blk_lct_kicker = ( isset( $block_fields['ttl_blk_lct_kicker'] ) ) ? $block_fields['ttl_blk_lct_kicker'] : null;
?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name. ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

<section class="section section-map">
	
				<div class="section-frame">
					<div class="container">
						<header class="section-head" data-aos="fade-down" data-aos-duration="700">
							<h3><?php echo $ttl_blk_lct_kicker; ?></h3>
							<h2><?php echo $ttl_blk_lct_title; ?> <span class="sign-line"></span></h2>
						</header>
						<div class="map-main" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="100">
							<div class="map-frame">
								<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/img-map-2.svg" alt="Map Description" width="1406" height="570">
								<div class="map-pin pin-1">
									<a href="javascript:;" class="marker-link">
										<i class="fa fa-map-marker-alt"></i>
										<span class="text">Las Vegas</span>
									</a>
									<div class="marker-details">
										<div class="img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/img-10.jpg" alt="image description"></div>
										<div class="text-box">
											<h4>New York</h4>
											<ul class="contact-list">
												<li><a href="mailto:newyork@thetowertech.com"><i class="fa fa-envelope"></i>Newyork@thetowertech.com</a></li>
												<li><i class="fa fa-map-marker-alt"></i>123 North Rd White Plains, New York(NY), 10603</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="map-pin pin-2">
									<a href="javascript:;" class="marker-link">
										<i class="fa fa-map-marker-alt"></i>
										<span class="text">Lahore</span>
									</a>
									<div class="marker-details">
										<div class="img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/img-10.jpg" alt="image description"></div>
										<div class="text-box">
											<h4>Lahore</h4>
											<ul class="contact-list">
												<li><a href="mailto:lahore@thetowertech.com"><i class="fa fa-envelope"></i>Lahore@thetowertech.com</a></li>
												<li><i class="fa fa-map-marker-alt"></i>123 North Rd White Plains, Lahore, 10603</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="map-pin pin-3">
									<a href="javascript:;" class="marker-link">
										<i class="fa fa-map-marker-alt"></i>
										<span class="text">UK</span>
									</a>
									<div class="marker-details">
										<div class="img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/img-10.jpg" alt="image description"></div>
										<div class="text-box">
											<h4>UK</h4>
											<ul class="contact-list">
												<li><a href="mailto:uk@thetowertech.com"><i class="fa fa-envelope"></i>UK@thetowertech.com</a></li>
												<li><i class="fa fa-map-marker-alt"></i>123 North Rd White Plains, UK, 10603</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="map-pin pin-4">
									<a href="javascript:;" class="marker-link">
										<i class="fa fa-map-marker-alt"></i>
										<span class="text">Manhattan</span>
									</a>
									<div class="marker-details">
										<div class="img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/img-10.jpg" alt="image description"></div>
										<div class="text-box">
											<h4>Manhattan</h4>
											<ul class="contact-list">
												<li><a href="mailto:manhattan@thetowertech.com"><i class="fa fa-envelope"></i>Manhattan@thetowertech.com</a>
												</li>
												<li><i class="fa fa-map-marker-alt"></i>123 North Rd White Plains, Manhattan, 10603</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="map-pin pin-5">
									<a href="javascript:;" class="marker-link">
										<i class="fa fa-map-marker-alt"></i>
										<span class="text">Germany</span>
									</a>
									<div class="marker-details">
										<div class="img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/img-10.jpg" alt="image description"></div>
										<div class="text-box">
											<h4>Germany</h4>
											<ul class="contact-list">
												<li><a href="mailto:germany@thetowertech.com"><i class="fa fa-envelope"></i>Germany@thetowertech.com</a></li>
												<li><i class="fa fa-map-marker-alt"></i>123 North Rd White Plains, Germany, 10603</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="map-pin pin-6">
									<a href="javascript:;" class="marker-link">
										<i class="fa fa-map-marker-alt"></i>
										<span class="text">New York</span>
									</a>
									<div class="marker-details">
										<div class="img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/img-10.jpg" alt="image description"></div>
										<div class="text-box">
											<h4>New York</h4>
											<ul class="contact-list">
												<li><a href="mailto:newyork@thetowertech.com"><i class="fa fa-envelope"></i>NewYork@thetowertech.com</a></li>
												<li><i class="fa fa-map-marker-alt"></i>123 North Rd White Plains, New York, 10603</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="map-pin pin-7">
									<a href="javascript:;" class="marker-link">
										<i class="fa fa-map-marker-alt"></i>
										<span class="text">Mumbai</span>
									</a>
									<div class="marker-details">
										<div class="img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/img-10.jpg" alt="image description"></div>
										<div class="text-box">
											<h4>Mumbai</h4>
											<ul class="contact-list">
												<li><a href="mailto:mumbai@thetowertech.com"><i class="fa fa-envelope"></i>Mumbai@thetowertech.com</a></li>
												<li><i class="fa fa-map-marker-alt"></i>123 North Rd White Plains, Mumbai, 10603</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="map-pin pin-8">
									<a href="javascript:;" class="marker-link">
										<i class="fa fa-map-marker-alt"></i>
										<span class="text">Turkey</span>
									</a>
									<div class="marker-details">
										<div class="img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/img-10.jpg" alt="image description"></div>
										<div class="text-box">
											<h4>Turkey</h4>
											<ul class="contact-list">
												<li><a href="mailto:Turkey@thetowertech.com"><i class="fa fa-envelope"></i>Turkey@thetowertech.com</a></li>
												<li><i class="fa fa-map-marker-alt"></i>123 North Rd White Plains,
													Turkey, 10603</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="map-pin pin-9">
									<a href="javascript:;" class="marker-link">
										<i class="fa fa-map-marker-alt"></i>
										<span class="text">Dubai</span>
									</a>
									<div class="marker-details">
										<div class="img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/img-10.jpg" alt="image description"></div>
										<div class="text-box">
											<h4>Dubai</h4>
											<ul class="contact-list">
												<li><a href="mailto:Dubai@thetowertech.com"><i class="fa fa-envelope"></i>Dubai@thetowertech.com</a></li>
												<li><i class="fa fa-map-marker-alt"></i>123 North Rd White Plains, Dubai, 10603</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
</div>
