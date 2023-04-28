<?php

/**
 * Block Name: Portfolios
 *
 * The template for displaying the custom gutenberg block named Portfolios.
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
$number_of_items = $block_fields['number_of_items'];
$number_of_items = $number_of_items < 1 ? 2 : $number_of_items;

$args = array(
	'post_type' => 'portfolio',
	'posts_per_page' => $number_of_items,
	'post_status' => 'publish',
	'fields' => 'ids',
	'orderby' => 'date',
    'order' => 'DESC',
);

$post_query = new WP_Query($args);

$portfolio_posts = $post_query->posts;

if (!empty($portfolio_posts)) {
?>
<section class="portfolio-section">
	<div class="portfolio-fixed">
		<div class="fixed-holder">
			<div class="portfolio-numbers swiperSlider2">
				<div class="swiper-wrapper">
					<?php
						$countr = 1;
						foreach ($portfolio_posts as $portfolio_id) {
							$subtitle = get_post_meta($portfolio_id, 'ttl_sport_sub_title', true);
						?>
					<div class="number-slide swiper-slide">
						<div class="number-slide-frame">
							<strong class="number"><span class="figure">0</span><span
									class="figure"><?php echo ($countr) ?></span></strong>
							<h2><?php echo ($subtitle) ?></h2>
						</div>
					</div>
					<?php
							$countr++;
						}
						?>
				</div>
			</div>
		</div>
	</div>
	<div class="portfolio-content">
		<div class="content-slides swiperSlider">
			<div class="slider-scrollbar"></div>
			<div class="swiper-wrapper">
				<?php
					foreach ($portfolio_posts as $portfolio_id) {
						$portfolio_post = get_post($portfolio_id);
						$item_type = get_post_meta($portfolio_id, 'ttl_sport_type', true);

						$img_url = '';
						$post_attach_id = get_post_thumbnail_id($portfolio_id);
						if ($post_attach_id > 0) {
							$img_url = wp_get_attachment_image_url($post_attach_id, 'full');
						}
					?>
				<div class="content-slide swiper-slide">
					<div class="portfolio-block-main">
						<div class="portfolio-block">
							<header class="section-head">
								<h3><?php echo ($item_type) ?></h3>
								<h2><?php echo ($portfolio_post->post_title) ?></h2>
							</header>
							<div class="img-corner-holder reverse smaller light">
								<div class="img-corner-frame">
									<div class="img-frame">
										<?php
												if ($img_url != '') {
												?>
										<img src="<?php echo ($img_url) ?>" alt="">
										<?php
												}
												?>
									</div>
								</div>
							</div>
							<div class="text-box">
								<?php echo ($portfolio_post->post_excerpt) ?>
							</div>
						</div>
					</div>
				</div>
				<?php
					}
					?>
			</div>
		</div>
	</div>
	<div class="portfolio-range">
		<strong class="number-text">01</strong>
		<div class="range-bar slider-scrollbar2"></div>
		<strong class="number-text">0<span class="js-all-slide"><?php echo ($post_query->found_posts) ?></span></strong>
	</div>
</section>
<?php
}
