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
$block_fields = get_fields_escaped($block['id']);
// $block_fields = get_fields_escaped( $block['id'] ,'sanitize_text_field' ); // if want to remove all html

// Set the block name for it's ID & class from it's file name
$block_glide_name = $block['name'];
$block_glide_name = str_replace("acf/", "", $block_glide_name);

// Set the preview thumbnail for this block for gutenberg editor view.
if (isset($block['data']['preview_image_help'])) {    /* rendering in inserter preview  */
	echo '<img src="' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
}

// create align class ("alignwide") from block setting ("wide").
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = (isset($block['className'])) ? $block['className'] : null;

// Making the unique ID for the block.
$id = 'block-' . $block_glide_name . "-" . $block['id'];

// Making the unique ID for the block.
if ($block['name']) {
	$block_name = $block['name'];
	$block_name = str_replace("/", "-", $block_name);
	$name = 'block-' .  $block_name;
}

// Block variables
// $custom_field_of_block = html_entity_decode($block_fields['custom_field_of_block']); // for keeping html from input
// $custom_field_of_block = html_entity_remove($block_fields['custom_field_of_block']); // for removing html from input
$ttl_blk_tc_title = (isset($block_fields['ttl_blk_tc_title'])) ? $block_fields['ttl_blk_tc_title'] : null;
$ttl_blk_tc_tabs = (isset($block_fields['ttl_blk_tc_tabs'])) ? $block_fields['ttl_blk_tc_tabs'] : null;
?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name . ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

	<!-- Section What we do -->
	<section class="section section-whatwedo">
		<div class="section-frame">
			<div class="container">
				<header class="section-head" data-aos="fade-down" data-aos-duration="700">
					<h2><?php echo $ttl_blk_tc_title; ?><span class="sign-line"></span></h2>
				</header>
				<?php //if ($ttl_blk_tc_tabs) {
				//$counter = 1;
				?>
				<div class="tabs-services tabsMain" data-aos="fade-up" data-aos-duration="700">
					<div class="tabs-listing-wrap">
						<ul class="tabs-listing">

							<?php
							$count = 1;
							foreach ($ttl_blk_tc_tabs as $tabs) {
								if ($count == 1) {
									$class = 'class="tabActive"';
								} else {
									$class = '';
								}
							?>
								<li <?php echo $class; ?>><a class="tabOpener" href="#tab-what-<?php echo $count
																								?>"><?php echo $tabs['title']; ?></a></li>

							<?php $count++;
							}

							?>
						</ul>
					</div>
					<div class="tab-frame">
						<?php
						$count = 1;
						foreach ($ttl_blk_tc_tabs as $tabs) {
							if ($count == 1) {
								$class = "tabContentActive";
							} else {
								$class = '';
							}
							$content = (isset($tabs['content'])) ? $tabs['content'] : array();
						?>
							<div class="tab-holder tabsMainContent <?php echo $class; ?> " id="tab-what-<?php echo $count; ?>">
								<div class="features-item">
									<?php
									foreach ($content as $key => $con1) {
										$icon = (isset($con1['icon'])) ? $con1['icon'] : null;
										$title = (isset($con1['title'])) ? $con1['title'] : null;
										$description = (isset($con1['description'])) ? $con1['description'] : null;
									?>
										<div class="item-box">
											<div class="item-holder">
												<div class="ico-holder">
													<img src="<?php echo $icon; ?>" alt="" width="80" height="80">
												</div>
												<h5><?php echo $title; ?></h5>
												<p><?php echo $description; ?></p>
											</div>
										</div>
									<?php }
									?>
								</div>
							</div>
						<?php
							$count++;
						}
						?>
					</div>

				</div>

			</div>
		</div>
	</section>
</div>
