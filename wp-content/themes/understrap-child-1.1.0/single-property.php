<?php

/**
 * 
 * The property post type tamplate
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
$post_id = get_the_ID();
$image = get_field('house_image', $post_id);

?>
<section class="property__post">
	<div class="container-xxl">
		<div class="property__post-inner">
			<h2 class="text-center"><?php single_post_title(); ?></h2>
			<small class="breadcrumbs text-muted"><?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?></small>
			<p class="lead"><?php the_category(); ?></p>
			<picture class="picture">
				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
			</picture>
			<div class="post__meta">
				<ul class="list-group list-group-flush">
					<li class="list-group-item"><small class="text-muted"><?php echo get_field_object('house_name', $post_id)['label']; ?> : </small><?php echo get_field('house_name', $post_id); ?></li>
					<li class="list-group-item"><small class="text-muted"><?php echo get_field_object('place_coordinate', $post_id)['label']; ?> : </small><?php echo get_field('place_coordinate', $post_id); ?></li>
					<li class="list-group-item"><small class="text-muted"><?php echo get_field_object('number_floors', $post_id)['label']; ?> : </small><?php echo get_field('number_floors', $post_id); ?></li>
					<li class="list-group-item"><small class="text-muted"><?php echo get_field_object('building_type', $post_id)['label']; ?> : </small><?php echo get_field('building_type', $post_id); ?></li>
					<li class="list-group-item"><small class="text-muted"><?php echo get_field_object('ecology', $post_id)['label']; ?> : </small><?php echo get_field('ecology', $post_id); ?></li>
				
					<?php $room = get_field('room', $post_id);
					if (have_rows('room_section', $post_id)) :  while (have_rows('room_section', $post_id)) : the_row();
					?><li class="list-group-item item-room"><?php
							 if (have_rows('room', $post_id)) : while (have_rows('room', $post_id)) : the_row();
									$square = get_sub_field_object('square', $post_id);
									$number_rooms = get_sub_field_object('number_rooms', $post_id);
									$balcony = get_sub_field_object('balcony', $post_id);
									$bathroom = get_sub_field_object('bathroom', $post_id);
					?>
									
									<h3 class="room-title">Помещение/Квартира</h3>
									<p class="badge rounded-pill bg-light text-dark"><span><?php echo $square['label']; ?> :</span> <?php echo $square['value']; ?> м²</p>
									<p class="badge rounded-pill bg-light text-dark"><span><?php echo $number_rooms['label']; ?> :</span> <?php echo $number_rooms['value']; ?></p>
									<p class="badge rounded-pill bg-light text-dark"><span><?php echo $balcony['label']; ?>:</span> <?php echo $balcony['label']; ?></p>
									<p class="badge rounded-pill bg-light text-dark"><span><?php echo $bathroom['label']; ?> :</span> <?php echo $bathroom['label']; ?></p>
					<?php endwhile;
					
							endif;
							?></li><?php
						endwhile;
					endif;
					?>
				</ul>
			</div>
			<div class="post__content">
				<p class="lead"><?php the_content(); ?></p>
			</div>
		</div>
	</div>
</section>
<?php

get_footer();
