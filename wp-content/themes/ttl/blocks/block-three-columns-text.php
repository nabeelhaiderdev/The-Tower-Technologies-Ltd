<?php
/**
 * Block Name: Three Columns Text
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
$ttl_blk_tct_title = ( isset( $block_fields['ttl_blk_tct_title'] ) ) ? $block_fields['ttl_blk_tct_title'] : null;
$ttl_blk_tct_kicker = ( isset( $block_fields['ttl_blk_tct_kicker'] ) ) ? $block_fields['ttl_blk_tct_kicker'] : null;
$ttl_blk_tct_columns = ( isset( $block_fields['ttl_blk_tct_columns'] ) ) ? $block_fields['ttl_blk_tct_columns'] : null;

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name. ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

<!-- Section Services -->
			<section class="section section-services">
				<div class="section-frame">
					<div class="container">
						<header class="section-head" data-aos="fade-down" data-aos-duration="700">
							<h5><?php echo $ttl_blk_tct_kicker; ?></h5>
							<h2><?php echo $ttl_blk_tct_title; ?></h2>
						</header>
						<?php if ($ttl_blk_tct_columns){ ?>
						<div class="services-block">
								<?php foreach ($ttl_blk_tct_columns as $col) { 
									?>
							<div class="box-service" data-aos="fade-right" data-aos-duration="700">
								<div class="box-holder">
									<div class="box-frame">
										<div class="ico"><img src=<?php echo $col['icon']; ?> alt="<?php echo $col['title']; ?>" width="70" height="70">
										</div>
										<h5><a href="#"><?php echo $col['title']; ?></a></h5>
										<p><?php echo $col['description']; ?></p>
									</div>
									<div class="btn-block">
										<a href="<?php echo $col['button']; ?>" class="btn btn-primary-outline">Read More</a>
									</div>
								</div>
							</div>
							<?php } ?>
						
						</div>
						<?php } ?>
					</div>
				</div>
			</section>
</div>
