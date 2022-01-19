<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Playschool
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
	<?php include(TEMPLATEPATH . '/assets/css/header-css.php'); ?>
	<?php if (is_singular()) {
		wp_enqueue_script('comment-reply');
	} ?>
</head>

<body <?php body_class('onecom-theme onecom-playschool'); ?>>
	<div id="oct-wrapper">
		<div id="page">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', OC_TEXT_DOMAIN); ?></a>

			<header id="masthead" class="site-header">
				<?php
				get_template_part('template-parts/header/header', 'logo');

				get_template_part('template-parts/header/header', 'navigation');
				?>

			</header><!-- #masthead -->