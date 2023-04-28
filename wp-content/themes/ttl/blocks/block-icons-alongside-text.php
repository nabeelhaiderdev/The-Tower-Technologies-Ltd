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
$ttl_blk_Icat_title = ( isset( $block_fields['ttl_blk_Icat_title'] ) ) ? $block_fields['ttl_blk_Icat_title'] : null;
$ttl_blk_Icat_kicker = ( isset( $block_fields['ttl_blk_Icat_kicker'] ) ) ? $block_fields['ttl_blk_Icat_kicker'] : null;
$ttl_blk_Icat_design = ( isset( $block_fields['ttl_blk_Icat_design'] ) ) ? $block_fields['ttl_blk_Icat_design'] : null;
$ttl_blk_Icat_icons = ( isset( $block_fields['ttl_blk_Icat_icons'] ) ) ? $block_fields['ttl_blk_Icat_icons'] : null;
$ttl_blk_Icat_description = ( isset( $block_fields['ttl_blk_Icat_description'] ) ) ? $block_fields['ttl_blk_Icat_description'] : null;


?>

<div id="<?php echo $id; ?>"
	class="<?php echo $align_class . ' ' . $class_name. ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

	<?php if($ttl_blk_Icat_design == 'first'){ ?>
	<section class="section section-procedure p-0">
		<div class="section-frame">
			<div class="container">
				<header class="section-head" data-aos="fade-down" data-aos-duration="700">
					<h3><?php echo $ttl_blk_Icat_kicker; ?></h3>
					<h2><?php echo $ttl_blk_Icat_title; ?> <span class="sign-line"></span></h2>
				</header>
				<?php if($ttl_blk_Icat_icons){ ?>
				<div class="procedure-steps">
					<?php foreach ($ttl_blk_Icat_icons as $icons) { ?>
					<div class="step" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
						<div class="step-holder">
							<div class="ico"><img src=<?php echo $icons['icon']; ?> alt="<?php echo $icons['title']; ?>"
									width="61" height="61">
							</div>
							<h4><?php echo $icons['title']; ?></h4>
							<p><?php echo $icons['description']; ?>
							</p>
						</div>
					</div>
					<?php }?>
				</div>
				<?php }?>
			</div>
		</div>
	</section>
	<?php } elseif($ttl_blk_Icat_design == 'second'){?>

	<section class="section section-why bg-gray">
		<div class="section-frame">
			<div class="container">
				<header class="section-head" data-aos="fade-down" data-aos-duration="700">
					<h2><?php echo $ttl_blk_Icat_title; ?></h2>
					<p><?php echo $ttl_blk_Icat_description; ?></p>
				</header>
				<?php if($ttl_blk_Icat_icons){ ?>
				<ul class="features-list">
					<?php foreach ($ttl_blk_Icat_icons as $icons) { ?>
					<li data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
						<div class="ico-holder"><img src=<?php echo $icons['icon']; ?>
								alt="<?php echo $icons['title']; ?>" width="70" height="70">
						</div>
						<p><?php echo $icons['description']; ?></p>
					</li>
					<?php }?>
				</ul>
				<?php }?>
			</div>
		</div>
	</section>

	<?php } elseif($ttl_blk_Icat_design == 'third'){ ?>

	<!-- Section Goals -->
	<section class="section section-goals bg-gray">
		<div class="section-frame">
			<div class="container">
				<header class="section-head" data-aos="fade-down" data-aos-duration="700">
					<h2><?php echo $ttl_blk_Icat_title; ?></h2>
				</header>
				<?php if($ttl_blk_Icat_icons){ ?>
				<div class="featured-boxes">
					<?php foreach ($ttl_blk_Icat_icons as $icon ) {
						$icon_image = $icon['icon'];
						$icon_title = $icon['title'];
						$icon_description = $icon['description'];
						?>
					<div class="featured-box" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
						<div class="box-frame">
							<div class="ico-holder">
								<img src="<?php echo $icon_image; ?>" alt="" width="80" height="80">
							</div>
							<h5><?php echo $icon_title; ?></h5>
							<p><?php echo $icon_description; ?></p>
						</div>
					</div>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>

	<?php } ?>

</div>
