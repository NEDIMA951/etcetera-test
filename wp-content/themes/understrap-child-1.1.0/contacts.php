<?php

/**
 *Template Name: Наши контакты
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
defined('ABSPATH') || exit;

get_header();

?>
<section class="contacts">
	<div class="container-xxl">
		<div class="contacts-inner">
			<h2 class="text-center"><?php single_post_title(); ?></h2>
			<picture class="picture">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/about.jpg" class="img-fluid" alt="image descr">
			</picture>
			<p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque voluptatum fugit iste odit vero porro ad et laborum quas nihil iure blanditiis minus sunt impedit officia nesciunt aliquid, debitis fuga!
				Fugit, dolorum! Ut eos voluptatum perferendis sequi numquam ad eum nostrum similique dolorem. Obcaecati, dolorum necessitatibus quam laboriosam corporis natus autem aperiam nulla, ea facere optio vel repudiandae veniam porro.
				Eaque, optio. Labore voluptas tempore vitae quisquam eligendi amet quas obcaecati rem est nulla architecto quam beatae dolorem repellat provident tenetur id possimus, natus praesentium nostrum. Repellat, nesciunt totam. Praesentium!</p>
		</div>
	</div>
</section>
<section class="map">
		<div class="map__inner">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d162757.7258273428!2d30.392608628224863!3d50.40217023842684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4cf4ee15a4505%3A0x764931d2170146fe!2z0JrQuNC10LIsIDAyMDAw!5e0!3m2!1sru!2sua!4v1643874540737!5m2!1sru!2sua" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		</div>
</section>
<?php

get_footer();
