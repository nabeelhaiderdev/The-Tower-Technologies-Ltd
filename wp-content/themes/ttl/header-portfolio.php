<?php

/**
 * The template for displaying website header
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The Tower Technologies Ltd.
 * @since 1.0.0
 */

// Global variables
global $option_fields;
global $pID;
global $fields;

$pID = get_the_ID();

if (is_home()) {
	$pID = get_option('page_for_posts');
}

if (is_404() || is_archive() || is_category() || is_search()) {
	$pID = get_option('page_on_front');
}

if (function_exists('get_fields') && function_exists('get_fields_escaped')) {
	$option_fields = get_fields_escaped('option');
	$fields        = get_fields_escaped($pID);
}
// Page Tags - Advanced custom fields variables
$tracking = (isset($option_fields['tracking_code'])) ? $option_fields['tracking_code'] : null;
$ccss     = (isset($option_fields['custom_css'])) ? $option_fields['custom_css'] : null;
$hscripts = (isset($option_fields['head_scripts'])) ? $option_fields['head_scripts'] : null;
$bscripts = (isset($option_fields['body_scripts'])) ? $option_fields['body_scripts'] : null;

// Page variables - Advanced custom fields variables
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<?php
	// Add Head Scripts
	if ($hscripts != '') {
		echo html_entity_decode($hscripts, ENT_QUOTES);
	}
	?>
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/pwa/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/pwa/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/pwa/favicon-16x16.png">
	<link rel="icon" sizes="any" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/pwa/favicon.ico">
	<link rel="icon" type="image/svg+xml" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/pwa/icon.svg">
	<link rel="manifest" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/pwa/site.webmanifest">
	<meta name="theme-color" content="#0047FE">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="application-name" content="BaseTheme Package">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton_color" content="#0047FE">
	<meta name="msapplication-TileColor" content="#0047FE">
	<meta name="msapplication-tap-highlight" content="no">
	<meta name="msapplication-TileImage" content="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/pwa/pwa-icon-144.png">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#0047FE">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<?php
	// Tracking Code
	if ($tracking != '') {
		echo html_entity_decode($tracking, ENT_QUOTES);
	}

	// Custom CSS
	if ($ccss != '') {
		echo '<style type="text/css">';
		echo html_entity_decode($ccss, ENT_QUOTES);
		echo '</style>';
	}
	?>
	<?php wp_head(); ?> <script>
		"serviceWorker" in navigator && window.addEventListener("load", function() {
			navigator.serviceWorker.register("/sw.js").then(function(e) {
				console.log("ServiceWorker registration successful with scope: ", e.scope)
			}, function(e) {
				console.log("ServiceWorker registration failed: ", e)
			})
		});
	</script>
</head>

<body <?php body_class('page-portfolio'); ?>> <?php wp_body_open(); ?>

	<div id="wrapper">
		<!-- Header Global -->
		<header id="header">
			<div class="container-full">
				<div class="header-holder">
					<div class="logo-wrap">
						<div class="logo logo-normal"><a href="./"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo-towertech-white.svg" alt="Tower Tech" width="245" height="46"></a></div>
						<div class="logo logo-fixed"><a href="./"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo-towertech.svg" alt="Tower Tech" width="245" height="46"></a></div>
					</div>
					<a href="javascript:;" class="nav-opener"><span></span></a>
				</div>
			</div>
		</header>
		<!-- Navigation-->
		<nav class="navigation">
			<div class="container-full">
				<div class="header-holder">
					<div class="logo-wrap">
						<div class="logo logo-normal"><a href="<?php echo home_url(); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo-towertech-white.svg" alt="Tower Tech" width="245" height="46"></a></div>
						<div class="logo logo-fixed"><a href="<?php echo home_url(); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo-towertech.svg" alt="Tower Tech" width="245" height="46"></a></div>
					</div>
					<a href="javascript:;" class="nav-opener"><span></span></a>
				</div>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'header-nav',
						'fallback_cb' => 'menu_fallback',
					)
				);
				?>
			</div>
			<div class="btn-holder">
				<a href="#main" class="btn-explore btnClose">Explore</a>
			</div>
		</nav>
		<main class="main" id="main">
