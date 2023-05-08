<?php
/**
 * Template Name: Homepage
 * Template Post Type: page
 *
 * This template is for displaying home page.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package The Tower Technologies Ltd.
 * @since 1.0.0
 *
 */

// Include header
get_header();

// Global variables
global $option_fields;
global $pID;
global $fields;

$ttl_pagetitle = (isset($fields['ttl_pagetitle']) && $fields['ttl_pagetitle']!='' ) ? $fields['ttl_pagetitle'] : get_the_title();

?>

<section class="section-intro bg-intro">
	<canvas></canvas>
	<div class="container-full">
		<div class="intro-holder">
			<div class="text-box" data-aos="zoom-out" data-aos-anchor-placement="top-bottom" data-aos-duration="1000"
				data-aos-delay="500" data-aos-easing="ease-in-out">
				<h1>Innovative <span>Solutions</span></h1>
				<p>We are your trusted software development company with over 35+ years of experience and
					expertise in building next-gen software</p>
				<div class="btn-block">
					<a href="#" class="btn btn-primary-fancy">see details</a>

				</div>
			</div>
			<div class="img-box">

			</div>
		</div>
	</div>
	<div class="btn-holder" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000"
		data-aos-delay="2000">
		<a href="#main" class="btn-explore btnClose">Explore</a>
	</div>
</section>
<!-- Main Area Start -->
<div id="main"></div>

<main id="main-section" class="main-section">
	<section id="page-section" class="page-section">
		<!-- Content Start --> <?php while ( have_posts() ) { the_post();
		//Include specific template for the content.
		get_template_part( 'partials/content', 'page' );

	} ?> <div class="clear"></div>
		<div class="ts-80"></div>
		<!-- Content End -->
	</section> <?php get_footer(); ?>
