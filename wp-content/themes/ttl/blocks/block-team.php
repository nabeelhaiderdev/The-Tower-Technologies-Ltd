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
$ttl_blk_tk = ( isset( $block_fields['ttl_blk_tk'] ) ) ? $block_fields['ttl_blk_tk'] : null;
$ttl_blk_tt = ( isset( $block_fields['ttl_blk_tt'] ) ) ? $block_fields['ttl_blk_tt'] : null;
$ttl_blk_td = ( isset( $block_fields['ttl_blk_td'] ) ) ? $block_fields['ttl_blk_td'] : null;
$ttl_blk_team_members = ( isset( $block_fields['ttl_blk_team_members'] ) ) ? $block_fields['ttl_blk_team_members'] : array();
/*
echo '<pre>';
print_r($block_fields);
echo '</pre>';
*/
?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name. ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">
<section class="section section-team">
				<div class="section-frame">
					<div class="container">
						<header class="section-head" data-aos="fade-down" data-aos-duration="700">
							<h3><?php echo $ttl_blk_tk;?></h3>
							<h2><?php echo $ttl_blk_tt;?></h2>
                            <p><?php echo $ttl_blk_td;?></p>
						</header>
						<div class="team-members">
							<?php  
							if(count($ttl_blk_team_members) > 0){
								foreach($ttl_blk_team_members as $team){

									?>
									<div class="member-box" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="100">
										<div class="box-holder">
											<div class="img-holder">
												<img src="<?php echo $team['ttl_blk_ti'];?>" alt="">
											</div>
											<div class="text-box">
												<h5><?php echo $team['ttl_blk_t_name'];?></h5>
												<h6><?php echo $team['ttl_blk_team_designation'];?></h6>
											</div>
										</div>
									</div>
									<?php
								}
							}
							?>
						</div>
					</div>
				</div>
			</section>

</div>
