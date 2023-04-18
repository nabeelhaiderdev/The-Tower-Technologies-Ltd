<?php
/**
 * Block Name: Image Alongside Text
 *
 * The template for displaying the custom gutenberg block named Image Alongside Text.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package The Tower Technologies Ltd.
 * @since 1.0.0
 */


// Get all the fields from ACF for this block ID

$block_fields = get_fields_escaped( $block['id'] );
// $block_fields = get_fields_escaped( $block['id'] ,'sanitize_text_field' ); // if want to remove all html


// Set the block name for it's ID & class from it's file name
$block_glide_name = $block['name'];
$block_glide_name = str_replace( 'acf/', '', $block_glide_name );

// Set the preview thumbnail for this block for gutenberg editor view.
if ( isset( $block['data']['preview_image_help'] ) ) {    /* rendering in inserter preview  */
	echo '<img src="' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
}

// create align class ("alignwide") from block setting ("wide").
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = ( isset( $block['className'] ) ) ? $block['className'] : null;

// Making the unique ID for the block.
$id = 'block-' . $block_glide_name . '-' . $block['id'];

// Making the unique ID for the block.
if ( $block['name'] ) {
	$block_name = $block['name'];
	$block_name = str_replace( '/', '-', $block_name );
	$name       = 'block-' . $block_name;
}

// Block variables

$ttl_iat_title        = $block_fields['ttl_iat_title'];
$ttl_blk_iat_design        = $block_fields['ttl_blk_iat_design'];
$ttl_blk_iat_image        = $block_fields['ttl_blk_iat_image'];
$ttl_blk_iat_kicker        = $block_fields['ttl_blk_iat_kicker'];
$ttl_blk_iat_description        = $block_fields['ttl_blk_iat_description'];
$ttl_blk_iat_features        = $block_fields['ttl_blk_iat_features'];


?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name . ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

<?php if($ttl_blk_iat_design == 'features'){ ?>
<!-- Section About -->
<section class="section section-about">
	<div class="section-frame">
		<div class="container">
			<div class="about-content">
				<div class="img-holder" data-aos="fade-right" data-aos-duration="700" data-aos-delay="500">
					<?php if($ttl_blk_iat_image){ ?>
						<img src="<?php echo $ttl_blk_iat_image; ?>" alt="" width="534" height="696" alt="<?php echo $ttl_iat_title; ?>">
					<?php } ?>
				</div>
				<div class="text-block" data-aos="fade-left" data-aos-duration="700" data-aos-delay="1000">
					<header class="section-head">
						<?php if($ttl_blk_iat_kicker){ ?>
							<h5><?php echo $ttl_blk_iat_kicker; ?></h5>
						<?php } ?>
						<h2><?php echo $ttl_iat_title; ?><span class="sign-line"></span></h2>
					</header>
					<?php 
						if($ttl_blk_iat_description){
							echo html_entity_decode($ttl_blk_iat_description);
						}
					?>
					<?php if($ttl_blk_iat_features){ ?>
					<ul class="services-list">
						<?php foreach ($ttl_blk_iat_features as $feature ) { 
							$feature_title = $feature['title'];
							$feature_text = $feature['text'];
							$feature_icon = $feature['icon'];
							?>
						<li>
							<div class="ico"><img src="<?php echo $feature_icon; ?>" alt="" width="59" height="59" alt="<?php echo $feature_title; ?>"></div>
							<h5><?php echo $feature_title; ?></h5>
							<p><?php echo $feature_text; ?></p>
						</li>
						<?php } ?>
					</ul>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php } elseif($ttl_blk_iat_design == 'overlap'){ ?>

<?php } elseif($ttl_blk_iat_design == 'frame'){ ?>

<?php } ?>

</div>
