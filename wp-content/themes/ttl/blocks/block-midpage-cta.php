<?php
/**
 * Block Name: Midpage CTA
 *
 * The template for displaying the custom gutenberg block named Midpage CTA.
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

$ttl_blk_mpcta_title = ( isset( $block_fields['ttl_blk_mpcta_title'] ) ) ? $block_fields['ttl_blk_mpcta_title'] : null;
$ttl_blk_mpcta_kicker = ( isset( $block_fields['ttl_blk_mpcta_kicker'] ) ) ? $block_fields['ttl_blk_mpcta_kicker'] : null;
$ttl_blk_mpcta_text = ( isset( $block_fields['ttl_blk_mpcta_text'] ) ) ? $block_fields['ttl_blk_mpcta_text'] : null;
$ttl_blk_mpcta_bgimage = ( isset( $block_fields['ttl_blk_mpcta_bgimage'] ) ) ? $block_fields['ttl_blk_mpcta_bgimage'] : null;
$ttl_blk_mpcta_button = ( isset( $block_fields['ttl_blk_mpcta_button'] ) ) ? $block_fields['ttl_blk_mpcta_button'] : null;
if($ttl_blk_mpcta_button){
	$link_url = $ttl_blk_mpcta_button['url'];
    $link_title = $ttl_blk_mpcta_button['title'];
    // $link_target = $ttl_blk_mpcta_button['target'] ? $link['target'] : '_self';
}

?>
<div id="<?php echo $id; ?>"
	class="<?php echo $align_class . ' ' . $class_name. ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

	<!-- Section Life -->
	<section class="section section-info">
		<div class="section-frame">
			<div class="img-area" style="background-image: url(<?php echo $ttl_blk_mpcta_bgimage; ?>);"></div>
			<div class="container" data-aos="fade-down" data-aos-duration="700">
				<h5><?php echo $ttl_blk_mpcta_kicker; ?></h5>
				<h2><?php echo $ttl_blk_mpcta_kicker; ?></h2>
				<p><?php echo $ttl_blk_mpcta_text; ?></p>
				<a href="<?php echo $link_url; ?>" class="btn btn-primary btn-lg"><?php echo $link_title; ?> <i
						class="ico"><img
							src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ico-long-arrow.svg"
							alt="" width="32" height="9"></i></a>
			</div>
		</div>
	</section>

</div>
