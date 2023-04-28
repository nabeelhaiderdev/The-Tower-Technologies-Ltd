<?php
/**
 * Block Name: FAQs
 *
 * The template for displaying the custom gutenberg block named FAQs.
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

$ttl_blk_faqs_title = ( isset( $block_fields['ttl_blk_faqs_title'] ) ) ? $block_fields['ttl_blk_faqs_title'] : null;
$ttl_blk_faqs_kicker = ( isset( $block_fields['ttl_blk_faqs_kicker'] ) ) ? $block_fields['ttl_blk_faqs_kicker'] : null;
$ttl_blk_faqs_text = ( isset( $block_fields['ttl_blk_faqs_text'] ) ) ? $block_fields['ttl_blk_faqs_text'] : null;
$ttl_blk_faqs_faqs = ( isset( $block_fields['ttl_blk_faqs_faqs'] ) ) ? $block_fields['ttl_blk_faqs_faqs'] : null;
$ttl_blk_faqs_image = ( isset( $block_fields['ttl_blk_faqs_image'] ) ) ? $block_fields['ttl_blk_faqs_image'] : null;

?>
<div id="<?php echo $id; ?>"
	class="<?php echo $align_class . ' ' . $class_name. ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

	<!-- Section FAQs -->
	<section class="section bg-gray section-about reverse">
		<div class="section-frame">
			<div class="container">
				<div class="about-content">
					<div class="img-holder" data-aos="fade-left" data-aos-duration="700">
						<div class="img-frame"><img src="<?php echo $ttl_blk_faqs_image; ?>" alt=""></div>
					</div>
					<div class="text-block" data-aos="fade-right" data-aos-duration="700">
						<header class="section-head">
							<h5><?php echo $ttl_blk_faqs_kicker; ?></h5>
							<h2><?php echo $ttl_blk_faqs_title; ?><span class="sign-line"></span></h2>
						</header>
						<p><?php echo $ttl_blk_faqs_text; ?></p>
						<?php if($ttl_blk_faqs_faqs){ ?>
						<ul class="accordion-faq accordionMain">
							<?php foreach ($ttl_blk_faqs_faqs as $faq ) { ?>
							<li data-aos="fade-right" data-aos-duration="500" data-aos-delay="100">
								<h5><a class="accordionOpener" href="javascript:;"><i class="ico"></i>
										<span><?php echo $faq['question']; ?></span></a></h5>
								<div class="faq-content accContent">
									<div class="faq-holder">
										<p><?php echo $faq['answer']; ?>
										</p>
									</div>
								</div>
							</li>
							<?php } ?>
						</ul>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>
