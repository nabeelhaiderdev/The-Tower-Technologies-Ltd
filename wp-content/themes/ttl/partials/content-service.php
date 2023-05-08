<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The Tower Technologies Ltd.
 * @since 1.0.0
 */


$post_data=get_queried_object();
$pID  = get_the_ID();
if (function_exists('get_fields') && function_exists('get_fields_escaped')) {
	$post_fields = get_fields_escaped( $pID );
}

// Post Tags & Categories
// $ttl_post_tags = get_the_tags($pID);
$ttl_post_categories = get_categories($pID);

$ttl_posttitle=glide_page_title('ttl_posttitle');

$ttl_ssbo_detail_page_options = ( isset( $post_fields['ttl_ssbo_detail_page_options'] ) ) ? $post_fields['ttl_ssbo_detail_page_options'] : null;

$ttl_ssbo_projects_section = ( isset( $post_fields['ttl_ssbo_projects_section'] ) ) ? $post_fields['ttl_ssbo_projects_section'] : null;
	$projects_section_heading = ( isset( $ttl_ssbo_projects_section['heading'] ) ) ? $ttl_ssbo_projects_section['heading'] : null;
	$projects_section_subheading = ( isset( $ttl_ssbo_projects_section['subheading'] ) ) ? $ttl_ssbo_projects_section['subheading'] : null;
	$projects_section_projects = ( isset( $ttl_ssbo_projects_section['projects'] ) ) ? $ttl_ssbo_projects_section['projects'] : null;

	
$ttl_ssbo_faq_section = ( isset( $post_fields['ttl_ssbo_faq_section'] ) ) ? $post_fields['ttl_ssbo_faq_section'] : null;
	$faq_section_heading = ( isset( $ttl_ssbo_faq_section['heading'] ) ) ? $ttl_ssbo_faq_section['heading'] : null;
	$faq_section_subheading = ( isset( $ttl_ssbo_faq_section['subheading'] ) ) ? $ttl_ssbo_faq_section['subheading'] : null;
	$faq_section_faqs = ( isset( $ttl_ssbo_faq_section['faqs'] ) ) ? $ttl_ssbo_faq_section['faqs'] : null;

	
	
$detail_page_heading = $ttl_ssbo_detail_page_options['heading'];
$detail_page_subheading = $ttl_ssbo_detail_page_options['subheading'];
$detail_page_image = $ttl_ssbo_detail_page_options['image'];

?>
<div id="service-main"></div>
<!-- Breadcrumb -->
<div class="breadcrumb-holder">
	<div class="container">
		<div class="breadcrumb-frame">
			<?php my_breadcrumbs(); ?>
		</div>
	</div>
</div>
<!-- Content Two Columns -->
<div id="content-twocols">
	<div class="container">
		<!-- Content -->
		<div id="content">
			<!-- Service Details -->
			<article class="service-details">
				<?php if($detail_page_image){ ?>
				<div class="img-holder">
					<img src="<?php echo $detail_page_image; ?>" alt="">
				</div>
				<?php } ?>
				<?php if($detail_page_heading){ ?>
				<h2><?php echo $detail_page_heading; ?> <span class="sign-line"></span></h2>
				<?php } ?>
				<?php if($detail_page_subheading){ ?>
				<h4><?php echo $detail_page_subheading; ?></h4>
				<?php } ?>
				<?php the_content(); ?>
			</article>
		</div>
		<!-- Sidebar -->
		<?php get_template_part( 'partials/content', 'service-aside' ); ?>
	</div>
</div>
<!-- Section Projects -->
<?php if($projects_section_heading || $projects_section_subheading || $projects_section_projects){ ?>
<section class="section section-projects">
	<div class="section-frame">
		<div class="container">
			<header class="section-head">
				<?php if($projects_section_heading){ ?>
				<h3><?php echo $projects_section_heading; ?></h3>
				<?php } ?>
				<?php if($projects_section_subheading){ ?>
				<h2><?php echo $projects_section_subheading; ?><span class="sign-line white"></span></h2>
				<?php } ?>
			</header>
			<?php 
			global $post;
			$lp_select_posts = array();
			$lp_select_posts_posts = $projects_section_projects;
			
			if ( $lp_select_posts_posts ) { ?>
			<div class="projects-wrap">
				<div class="projects-main">
					<div class="project-slides projectsSlider">
						<?php 
						foreach ( $lp_select_posts_posts as $lp_posts ) {
							$post = $lp_posts;
							setup_postdata( $post );
							$pID         = $post->ID;
							$post_fields = get_fields( $pID );
							$ttl_spo_type  = $post_fields['ttl_spo_type'];
							$src         = wp_get_attachment_image_src( get_post_thumbnail_id( $pID ), 'full', false );
							if ( ! $src ) {
								$src = get_template_directory_uri() . '/assets/images/defaults/default-project-image.png';
							} else {
								$src = $src[0];
							}
						?>
						<div class="project-slide">
							<a class="project-frame" href="#">
								<div class="img-holder">
									<img src="<?php echo $src; ?>" alt="<?php the_title(); ?>">
								</div>
								<div class="text-box">
									<h6><?php echo $ttl_spo_type; ?></h6>
									<h3><?php the_title(); ?></h3>
								</div>
							</a>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php } wp_reset_query(); wp_reset_postdata(); ?>
		</div>
	</div>
</section>
<?php } ?>
<!-- Section FAQs -->
<?php 
	global $post;
	$lp_select_posts = array();
	$lp_select_posts_faqs = $faq_section_faqs;
?>
<?php if($faq_section_heading || $faq_section_subheading ||  $faq_section_faqs){ ?>
<section class="section section-faqs pt-0">
	<div class="section-frame">
		<div class="container">
			<header class="section-head">
				<?php if($faq_section_heading){ ?>
				<h2><?php echo $faq_section_heading; ?> <span class="sign-line"></span></h2>
				<?php } ?>
				<p><?php echo $faq_section_subheading; ?></p>
			</header>
			<?php if($lp_select_posts_faqs){ ?>
			<ul class="accordion-faqs accordionMain">
				<?php 
					foreach ( $lp_select_posts_faqs as $lp_posts ) {
						$post = $lp_posts;
						setup_postdata( $post );
						$pID         = $post->ID;
						$post_fields = get_fields( $pID );
						$src         = wp_get_attachment_image_src( get_post_thumbnail_id( $pID ), 'full', false );
						if ( ! $src ) {
							$src = get_template_directory_uri() . '/assets/images/defaults/default-project-image.png';
						} else {
							$src = $src[0];
						}
					?>
				<li>
					<h4><a class="accordionOpener" href="javascript:;"><span><?php the_title(); ?></span><i
								class="ico-plus"></i></a></h4>
					<div class="accordion-slide accContent">
						<div class="accordion-frame ">
							<?php echo html_entity_decode(get_the_content()); ?>
						</div>
					</div>
				</li>
				<?php } ?>
			</ul>
			<?php } wp_reset_query(); wp_reset_postdata();?>
		</div>
	</div>
</section>
<?php } ?>