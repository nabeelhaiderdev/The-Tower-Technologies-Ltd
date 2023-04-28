<?php

/**
 * Template Name: Portfolio Page
 */

get_header('portfolio');

while (have_posts()) :
	the_post();

	the_content();

endwhile;

get_footer('portfolio');
