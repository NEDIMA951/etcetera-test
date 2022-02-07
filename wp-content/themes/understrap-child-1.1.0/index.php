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
?>

<section class="acf__filter">
	<div class="container-xxl">
		<div class="acf__filter-inner row">
			<div class="acf__filter-result col-md-8">
				<h2 class="text-center"><?php single_post_title(); ?></h2>
				<ul id="ajax_filter_search_results">
					<?php
					global $post;

					$query = new WP_Query([
						'post_type' => 'property',
						'posts_per_page' => -1,
					]);

					if ($query->have_posts()) {
						while ($query->have_posts()) {
							$query->the_post();
					?>
							<?php $image = get_field('house_image');
							$post_id = get_the_ID(); ?>
							<li class="shadow p-3 mb-5 bg-body rounded row">
								<div class="post__preview-img col-md-4">
									<a href="<?php the_permalink() ?>">
										<picture>
											<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
										</picture>
									</a>
								</div>
								<div class="post__preview-content col-md-8">
									<a href="<?php the_permalink() ?>">
										<h3 class="post-title"><?php the_title() ?></h3>
									</a>
									<div class="descr">
										<p class="badge rounded-pill bg-light text-dark"><span><?php echo get_field_object('house_name', $post_id)['label']; ?> :</span> <?php echo get_field('house_name', $post_id); ?></p>
										<p class="badge rounded-pill bg-light text-dark"><span><?php echo get_field_object('place_coordinate', $post_id)['label']; ?> :</span> <?php echo get_field('place_coordinate', $post_id); ?></p>
										<p class="badge rounded-pill bg-light text-dark"><span><?php echo get_field_object('number_floors', $post_id)['label']; ?> :</span> <?php echo get_field('number_floors', $post_id); ?></p>
										<p class="badge rounded-pill bg-light text-dark"><span><?php echo get_field_object('building_type', $post_id)['label']; ?> :</span> <?php echo get_field('building_type', $post_id); ?></p>
										<p class="badge rounded-pill bg-light text-dark"><span><?php echo get_field_object('ecology', $post_id)['label']; ?> :</span> <?php echo get_field('ecology', $post_id); ?></p>

										<?php $room = get_field('room', $post_id);
										if (have_rows('room_section', $post_id)) : while (have_rows('room_section', $post_id)) : the_row();
												if (have_rows('room', $post_id)) : while (have_rows('room', $post_id)) : the_row();
														$square = get_sub_field_object('square', $post_id);
														$number_rooms = get_sub_field_object('number_rooms', $post_id);
														$balcony = get_sub_field_object('balcony', $post_id);
														$bathroom = get_sub_field_object('bathroom', $post_id);
										?>
														<hr>
														<h3 class="room-title">Помещение/Квартира</h3>
														<p class="badge rounded-pill bg-light text-dark"><span><?php echo $square['label']; ?> :</span> <?php echo $square['value']; ?> м²</p>
														<p class="badge rounded-pill bg-light text-dark"><span><?php echo $number_rooms['label']; ?> :</span> <?php echo $number_rooms['value']; ?></p>
														<p class="badge rounded-pill bg-light text-dark"><span><?php echo $balcony['label']; ?>:</span> <?php echo $balcony['label']; ?></p>
														<p class="badge rounded-pill bg-light text-dark"><span><?php echo $bathroom['label']; ?> :</span> <?php echo $bathroom['label']; ?></p>
										<?php endwhile;
												endif;
											endwhile;
										endif;
										?>
									</div>
								</div>
							</li>
						<?php
						}
					} else { ?>

						<li class="callout-info">Записей не найдено</li>

					<?php }

					wp_reset_postdata();

					?>
				</ul>
			</div>
			<div class="acf__filter-form offset-lg-1 col-md-4 col-lg-3">
				<?php echo do_shortcode('[my_ajax_filter_search]'); ?>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
