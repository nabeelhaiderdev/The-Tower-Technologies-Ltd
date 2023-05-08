<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The Tower Technologies Ltd.
 * @since 1.0.0
 *
 */

 // Global variables
 global $option_fields;
 global $p_id;
 global $fields;

$post_data=get_queried_object();
$pID  = get_the_ID();
if (function_exists('get_fields') && function_exists('get_fields_escaped')) {
	$post_fields = get_fields_escaped( $pID );
}


$current_taxonomies = get_the_terms( get_the_ID(), 'services' );
$first_term = $current_taxonomies[0];
$term_link = get_term_link( $first_term, 'services' );

$current_taxonomy_id = $current_taxonomies[0]->term_id;

$categories = get_terms([
    'taxonomy' => 'services',
    'hide_empty' => false,
	'exclude' => array( $current_taxonomy_id ),
]);

// var_dump($categories);


$ttl_to_sso_contact_section = ( isset( $option_fields['ttl_to_sso_contact_section'] ) ) ? $option_fields['ttl_to_sso_contact_section'] : null;
if($ttl_to_sso_contact_section['background_image'] || $ttl_to_sso_contact_section['icon'] || $ttl_to_sso_contact_section['heading'] || $ttl_to_sso_contact_section['text'] || $ttl_to_sso_contact_section['phone']){
	$contact_background_image = ( isset( $ttl_to_sso_contact_section['background_image'] ) ) ? $ttl_to_sso_contact_section['background_image'] : null;
	$contact_background_icon = ( isset( $ttl_to_sso_contact_section['icon'] ) ) ? $ttl_to_sso_contact_section['icon'] : null;
	$contact_background_heading = ( isset( $ttl_to_sso_contact_section['heading'] ) ) ? $ttl_to_sso_contact_section['heading'] : null;
	$contact_background_text = ( isset( $ttl_to_sso_contact_section['text'] ) ) ? $ttl_to_sso_contact_section['text'] : null;
	$contact_background_phone = ( isset( $ttl_to_sso_contact_section['phone'] ) ) ? $ttl_to_sso_contact_section['phone'] : null;
	$contact_background_phone_stripped = preg_replace( '/[^0-9]/', '', $contact_background_phone );
}

$ttl_to_sso_contact_form = ( isset( $option_fields['ttl_to_sso_contact_form'] ) ) ? $option_fields['ttl_to_sso_contact_form'] : null;
 if($ttl_to_sso_contact_form['heading'] || $ttl_to_sso_contact_form['form'] ){
	$contact_form_heading = ( isset( $ttl_to_sso_contact_form['heading'] ) ) ? $ttl_to_sso_contact_form['heading'] : null;
	$contact_form_selected_form = ( isset( $ttl_to_sso_contact_form['form'] ) ) ? html_entity_decode($ttl_to_sso_contact_form['form']) : null;
}


$ttl_to_sso_cta = ( isset( $option_fields['ttl_to_sso_cta'] ) ) ? $option_fields['ttl_to_sso_cta'] : null;
	$cta_heading = ( isset( $ttl_to_sso_cta['heading'] ) ) ? $ttl_to_sso_cta['heading'] : null;
	$cta_text = ( isset( $ttl_to_sso_cta['text'] ) ) ? html_entity_decode($ttl_to_sso_cta['text']) : null;
	$cta_button = ( isset( $ttl_to_sso_cta['button'] ) ) ? $ttl_to_sso_cta['button'] : null;
	$cta_button_title = null;
	if($cta_button){
		$cta_button_url = $cta_button['url'];
		$cta_button_title = $cta_button['title'];
		$cta_button_target = $cta_button['target'] ? $cta_button['target'] : '_self';
	}


?>
<aside id="aside">
	<!-- Widget Search -->
	<div class="widget widget-searchbar">
		<div class="widget-holder">
			<h5>Search</h5>
			<div class="form-holder">
				<form>
					<div class="input-holder">
						<input type="search" class="form-control" placeholder="search anything here...">
					</div>
					<button type="submit" class="btn btn-primary"><img
							src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ico-search.svg"
							alt="Search" width="20" height="20"></button>
				</form>
			</div>
		</div>
	</div>
	<!-- Widget Services -->
	<div class="widget widget-services">
		<ul>
			<li class="active">
				<a href="<?php echo esc_url( $term_link ); ?>">
					<i class="fa fa-chevron-right"></i>
					<span><?php echo esc_html( $first_term->name ); ?></span>
				</a>
			</li>
			<?php 
			if ( $categories && ! is_wp_error( $categories ) ) {
				foreach ( $categories as $category ) {
					$term_link = get_term_link( $category );
					?>
			<li>
				<a href="<?php echo esc_url( $term_link ); ?>">
					<i class="fa fa-chevron-right"></i>
					<span><?php echo esc_html( $category->name ); ?></span>
				</a>
			</li>
			<?php }
			}
			?>
		</ul>
	</div>
	<?php if($ttl_to_sso_contact_section['background_image'] || $ttl_to_sso_contact_section['icon'] || $ttl_to_sso_contact_section['heading'] || $ttl_to_sso_contact_section['text'] || $ttl_to_sso_contact_section['phone']){ ?>
	<!-- Widget Call -->
	<div class="widget widget-call">
		<div class="widget-holder" <?php if($contact_background_image) { ?>
			style="background-image: url(<?php echo $contact_background_image; ?>);" <?php } ?>>
			<?php if($contact_background_icon){ ?>
			<i class="ico-call"><img src="<?php echo $contact_background_icon; ?>"
					alt="<?php echo $contact_background_heading; ?>" width="24" height="24"></i>
			<?php } ?>
			<?php if($contact_background_heading){ ?>
			<h4><?php echo $contact_background_heading; ?></h4>
			<?php } ?>
			<?php if($contact_background_text){ ?>
			<strong class="title"><?php echo $contact_background_text; ?></strong>
			<?php } ?>
			<span class="phone"><a
					href="tel:+<?php echo $contact_background_phone_stripped; ?>"><?php echo $contact_background_phone; ?></a></span>
		</div>
	</div>
	<?php } ?>
	<?php if($ttl_to_sso_contact_form['heading'] || $ttl_to_sso_contact_form['form'] ){ ?>
	<!-- Widget Quote -->
	<div class="widget widget-quote">
		<div class="widget-holder">
			<?php if($contact_form_heading){ ?>
			<h5><?php echo $contact_form_heading; ?></h5>
			<?php } ?>

			<?php 
				if($contact_form_selected_form){
					echo $contact_form_selected_form;
				}
			?>
		</div>
	</div>
	<?php } ?>
	<!-- Widget Textblock -->
	<div class="widget widget-textbox">
		<div class="widget-holder">
			<h5><?php echo $cta_heading; ?></h5>
			<p><?php echo $cta_text; ?></p>
			<?php if($cta_button_title){ ?>
			<a href="<?php echo $cta_button_url; ?>" target="<?php echo $cta_button_target; ?>"
				class="btn btn-primary btn-sm"><?php echo $cta_button_title; ?>
				<i class="fa fa-long-arrow-alt-right"></i></a>
			<?php } ?>
		</div>
	</div>
</aside>