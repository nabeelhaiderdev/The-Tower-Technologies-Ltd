<?php
/**
 * Block Name: Featured Icons
 *
 * The template for displaying the custom gutenberg block named Featured Icons.
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
$ttl_blk_fi_title_start = ( isset( $block_fields['ttl_blk_fi_title_start'] ) ) ? $block_fields['ttl_blk_fi_title_start'] : null;
$ttl_blk_fi_title = ( isset( $block_fields['ttl_blk_fi_title'] ) ) ? $block_fields['ttl_blk_fi_title'] : null;
$ttl_blk_fi_top_heading = ( isset( $block_fields['ttl_blk_fi_top_heading'] ) ) ? $block_fields['ttl_blk_fi_top_heading'] : null;
$ttl_blk_fi_top_icons = ( isset( $block_fields['ttl_blk_fi_top_icons'] ) ) ? $block_fields['ttl_blk_fi_top_icons'] : null;

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name. ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

<!-- Section Logoes -->
<section class="section bg-gray section-logoes">
	<div class="section-frame">
		<div class="container">
			<header class="section-head" data-aos="fade-down" data-aos-duration="700">
				<h3><?php echo $ttl_blk_fi_top_heading; ?></h3>
				<h2><?php echo $ttl_blk_fi_title_start; ?> <span><?php echo $ttl_blk_fi_title; ?></span><span class="sign-line"></span></h2>
			</header>
			<?php if($ttl_blk_fi_top_icons){ ?>
			<div class="logoes-group">
				<ul>
					<?php foreach ($ttl_blk_fi_top_icons as $icon ) {
						$icon_title = $icon['title'];
						$icon_icon = $icon['icon'];
						$icon_link = $icon['link'];
						if($icon_link){
							$logo_link = 'href="'.$icon_link . '"';
						} else {
							$logo_link = null;
						}
						?>
					<li data-aos="zoom-in" data-aos-duration="500" data-aos-delay="100">
						<a <?php echo $logo_link; ?> class="frame">
							<div class="img-holder">
								<img src="<?php echo $icon_icon; ?>" alt="<?php echo $icon_title; ?>" width="148" height="149">
							</div>
							<span class="text"><?php echo $icon_title; ?></span>
						</a>
					</li>
					<?php } ?>
				</ul>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
</div>
