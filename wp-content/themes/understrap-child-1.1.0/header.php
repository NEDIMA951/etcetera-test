<?php

/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Mobile-friendly viewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<?php wp_head(); ?>

	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="images/png">

	<!-- Fonts preload -->
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/PTSans-Regular.woff2" as="font" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/PTSans-Bold.woff2" as="font" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/fontawesome-webfont.woff2?cfwfyz" as="font" crossorigin="anonymous">

</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="wrapper" class="wrapper">
		<main id="main" class="main">
			<header id="header" class="header">
				<div class="container-fluid">
					<div class="header__inner">
						<div class="header__logo">
							<a class="header__logo-link" href="<?php echo get_home_url(); ?>">
								Тестовое <span>задание</span>
							</a>
						</div>
						<div class="header__nav">
							<div class="header__mobile-btn">
								<span></span>
							</div>
							<?php wp_nav_menu(array(
								'theme_location' => 'main_menu',
								'menu_class'      => 'menu-body',
								'menu_id'            => 'header-menu',
								'container'       => 'nav',
								'container_class' => 'body',
								'container_id'    => '',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
								'before'          => '',
								'after'           => '',
								'link_before'     => '',
								'link_after'      => '',
								'items_wrap'      => '<ul id="%1$s" class="%2$s"> %3$s </ul>',
								'depth'           => 0,
								'walker'          => '',
							)); ?>
						</div>
					</div>
				</div>
			</header>