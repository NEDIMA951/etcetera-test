<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

// запрос
$wpb_all_query = new WP_Query(array('post_type' => 'property', 'post_status' => 'publish', 'posts_per_page' => -1)); ?>

<?php if ($wpb_all_query->have_posts()) : ?>

	<ul>

		<!-- the loop -->
		<?php while ($wpb_all_query->have_posts()) : $wpb_all_query->the_post(); ?>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
		<!-- end of the loop -->

	</ul>

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e('Извините, нет записей, соответствуюших Вашему запросу.'); ?></p>
<?php endif; ?>

<?php
get_footer();
