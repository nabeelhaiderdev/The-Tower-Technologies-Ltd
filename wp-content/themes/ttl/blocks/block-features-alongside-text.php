<?php
/**
 * Block Name: Features Alongside Text
 *
 * The template for displaying the custom gutenberg block named Features Alongside Text.
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

$title_start = ( isset( $block_fields['title_start'] ) ) ? $block_fields['title_start'] : null;
$ttl_blk_fat_title = ( isset( $block_fields['ttl_blk_fat_title'] ) ) ? $block_fields['ttl_blk_fat_title'] : null;
$ttl_blk_fat_kicker = ( isset( $block_fields['ttl_blk_fat_kicker'] ) ) ? $block_fields['ttl_blk_fat_kicker'] : null;
$ttl_blk_fat_features = ( isset( $block_fields['ttl_blk_fat_features'] ) ) ? $block_fields['ttl_blk_fat_features'] : null;

?>
<div id="<?php echo $id; ?>"
	class="<?php echo $align_class . ' ' . $class_name. ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

	<!-- Section Outsourcing -->
	<section class="section section-outsourcing">
		<div class="section-frame">
			<div class="container">
				<header class="section-head" data-aos="fade-down" data-aos-duration="700">
					<h3><?php echo $ttl_blk_fat_kicker; ?></h3>
					<h2><?php echo $title_start; ?> <span><?php echo $ttl_blk_fat_title; ?></span><span
							class="sign-line"></span></h2>
				</header>
				<?php if($ttl_blk_fat_features){ ?>
				<ul class="content-boxes">
					<?php foreach ($ttl_blk_fat_features as $feature ) { 
						$feature_title = $feature['title'];
						$feature_text = $feature['text'];
						$feature_image = $feature['image'];
						?>
					<li>
						<div class="text-box" data-aos="fade-right" data-aos-duration="700" data-aos-delay="100">
							<h4><?php echo $feature_title; ?></h4>
							<p><?php echo $feature_text; ?></p>
						</div>
						<div class="ico-bar-holder" data-aos="fade-left" data-aos-duration="700" data-aos-delay="100">
							<div class="ico-bar">
								<div class="ico-area">
									<img src="<?php echo $feature_image; ?>" alt="<?php echo $feature_title; ?>	"
										width="61" height="61">
								</div>
								<div class="text-bar"><strong><?php echo $feature_title; ?></strong></div>
							</div>
						</div>
					</li>
					<?php } ?>
				</ul>
				<?php } ?>
			</div>
		</div>
	</section>
</div>
