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
$ttl_blk_ctitle = ( isset( $block_fields['ttl_blk_ctitle'] ) ) ? $block_fields['ttl_blk_ctitle'] : null;
$ttl_blk_cicons = ( isset( $block_fields['ttl_blk_cicons'] ) ) ? $block_fields['ttl_blk_cicons'] : array();
$ttl_blk_crs = ( isset( $block_fields['ttl_blk_crs'] ) ) ? $block_fields['ttl_blk_crs'] : array();
$ttl_blk_cf_title = ( isset( $block_fields['ttl_blk_cf_title'] ) ) ? $block_fields['ttl_blk_cf_title'] : null;
$ttl_blk_f7id = ( isset( $block_fields['ttl_blk_f7id'] ) ) ? $block_fields['ttl_blk_f7id'] : null;

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name. ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">
<!-- Contact Form -->
            <section class="section section-contact bg-gray">
                <div class="section-frame">
                    <div class="container"> 
                        <div class="contact-main">
                            <div class="awards-block contact-col" data-aos="fade-right" data-aos-duration="700">
                                <h2 class="h2-smaller"><?php echo $ttl_blk_ctitle; ?></h2>
                                <ul class="awards-list">
									<?php 
									if(count($ttl_blk_cicons)>0){
										foreach($ttl_blk_cicons as $icon){

									?>
									<li>
                                        <div class="award-frame">
                                            <img src="<?php echo $icon['ttl_blk_cricon'];?>" alt="">
                                        </div>
                                    </li>
									
									
									<?php		
										}

									}
									?>                                    
                                </ul>
                                <ul class="facts-list">
									<?php 
									if(count($ttl_blk_crs)>0){
										foreach($ttl_blk_crs as $crsRow){
											?>
											                                    <li>
                                        <h3><?php echo  $crsRow['ttl_blk_crf']; ?></h3>
                                        <p><?php echo  $crsRow['ttl_blk_cach']; ?></p>
                                    </li>
											
											<?php
										}

									}
									?>


                                </ul>
                            </div>
                            <div class="contact-col contact-form" data-aos="fade-left" data-aos-duration="700" data-aos-delay="500">
                                <?php
								echo do_shortcode('[contact-form-7 id="'.$ttl_blk_f7id.'" title="Contact form 1"]');
								?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

</div>
