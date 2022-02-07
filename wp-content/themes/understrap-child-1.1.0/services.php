<?php
/**
 *Template Name: Наши сервисы
 *Template Post Type: page
 * 
 * The about page file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<section class="services">
	<div class="container-xxl">
		<div class="services-inner">
			<h2 class="text-center"><?php single_post_title(); ?></h2>
			<p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque voluptatum fugit iste odit vero porro ad et laborum quas nihil iure blanditiis minus sunt impedit officia nesciunt aliquid, debitis fuga!
			Fugit, dolorum! Ut eos voluptatum perferendis sequi numquam ad eum nostrum similique dolorem. Obcaecati, dolorum necessitatibus quam laboriosam corporis natus autem aperiam nulla, ea facere optio vel repudiandae veniam porro.
			Eaque, optio. Labore voluptas tempore vitae quisquam eligendi amet quas obcaecati rem est nulla architecto quam beatae dolorem repellat provident tenetur id possimus, natus praesentium nostrum. Repellat, nesciunt totam. Praesentium!</p>
		</div>
	</div>
</section>
<?php

get_footer();

