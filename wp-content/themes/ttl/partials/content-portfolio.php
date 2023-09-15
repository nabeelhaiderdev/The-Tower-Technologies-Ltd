<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The Tower Technologies Ltd.
 * @since 1.0.0
 */

$pID  = get_the_ID();

$content = get_the_content($pID);

echo apply_filters('the_content', $content);