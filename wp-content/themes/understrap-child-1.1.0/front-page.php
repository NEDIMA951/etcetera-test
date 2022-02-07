<?php

/**
 * The front-page template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Understrap
 */

get_header();
?>
<section class="posts__list">
	<div class="container-xxl">
		<div class="posts__list-inner">
		<h2 class="text-center"><?php single_post_title(); ?></h2>
			<?php
			// запрос
			$wpb_all_query = new WP_Query(array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => -1)); ?>

			<?php if ($wpb_all_query->have_posts()) : ?>

				<ul>
					<!-- the loop -->
					<?php while ($wpb_all_query->have_posts()) : $wpb_all_query->the_post(); ?>
						<li class="card shadow p-3 mb-5 bg-body rounded">

							<div class="card-body">
								<a href="<?php the_permalink(); ?>">
									<h3 class="card-title"><?php the_title(); ?></h3>
								</a>
								<h4 class="card-subtitle mb-2 text-muted"><?php the_category(); ?></h4>
								<p class="card-text"><?php the_excerpt(); ?></p>
							</div>

						</li>
					<?php endwhile; ?>
					<!-- end of the loop -->
				</ul>

				<?php wp_reset_postdata(); ?>

			<?php else : ?>
				<p><?php _e('Извините, нет записей, соответствуюших Вашему запросу.'); ?></p>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php

get_footer();
