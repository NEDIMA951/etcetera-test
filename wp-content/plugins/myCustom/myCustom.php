<?php

/**
 * @package My_Custom
 * @version 1.0.0
 */
/*
Plugin Name: My Custom Plugin
Plugin URI: https://portfolio.dataweb.dev/etcetera/
Description: This is a plugin for creating a custom post type, acf fields filter with widget and shortcode.
Author: Dmytro Nezdymenko
Version: 1.0.0
Author URI: https://github.com/NEDIMA951
*/



// disable Gutenberg editor for widgets
add_filter('use_widgets_block_editor', '__return_false');



// Custom post type and taxonomy init

add_action('init', 'register_faq_post_type');
function register_faq_post_type()
{

	register_taxonomy('propertyArea', ['property'], [
		'label'                 => 'Район',
		'labels'                => array(
			'name'              => 'Список Районов',
			'singular_name'     => 'Район',
			'search_items'      => 'Искать Район',
			'all_items'         => 'Все Районы',
			'parent_item'       => 'Родительский Район',
			'parent_item_colon' => 'Родительские Районы:',
			'edit_item'         => 'Редактировать Район',
			'update_item'       => 'Обновить Район',
			'add_new_item'      => 'Добавить Район',
			'new_item_name'     => 'Новый Район',
			'menu_name'         => 'Районы',
		),
		'description'           => 'Рубрики для раздела районов',
		'public'                => true,
		'show_in_nav_menus'     => false,
		'show_ui'               => true,
		'show_tagcloud'         => false,
		'hierarchical'          => true,
		'rewrite'               => array('slug' => 'property', 'hierarchical' => false, 'with_front' => false, 'feed' => false),
		'show_admin_column'     => true,
	]);


	register_post_type('property', [
		'label'               => 'Объект недвижимости',
		'labels'              => array(
			'name'          => 'Объект недвижимости',
			'singular_name' => 'Объект недвижимости',
			'menu_name'     => 'Объекты недвижимости',
			'all_items'     => 'Все объекты',
			'add_new'       => 'Добавить объект недвижимости',
			'add_new_item'  => 'Добавить новый объект недвижимости',
			'edit'          => 'Редактировать',
			'edit_item'     => 'Редактировать объект недвижимости',
			'new_item'      => 'Объект недвижимости',
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_rest'        => false,
		'rest_base'           => '',
		'show_in_menu'        => true,
		'exclude_from_search' => false,
		'capability_type'     => 'post',
		'map_meta_cap'        => true,
		'hierarchical'        => false,
		'rewrite'             => array('slug' => 'property/propertyArea', 'with_front' => false, 'pages' => false, 'feeds' => false, 'feed' => false),
		'has_archive'         => 'property',
		'query_var'           => true,
		'supports'            => array('title', 'editor'),
		'taxonomies'          => array('propertyArea'),
	]);
}



//Sidebar registration 

add_action('widgets_init', 'my_custom_wp_sidebars');

function my_custom_wp_sidebars()
{
	register_sidebar(
		array(
			'id' => 'custom_sidebar',
			'name' => 'Мой Сайдбар',
			'description' => 'Перетащите сюда виджеты, чтобы добавить их.',
			'before_widget' => '<div id="%1$s" class="foot widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
}



//Allow wildcards in meta search

function allow_wildcards($where)
{
	global $wpdb;
	$where = str_replace(
		"meta_key = 'room_$'",
		"meta_key LIKE 'room_%'",
		$wpdb->remove_placeholder_escape($where)
	);
	return $where;
}

add_filter('posts_where', 'allow_wildcards');



// Widget styles


add_action('wp_enqueue_scripts', 'theme_name_scripts');
function theme_name_scripts()
{
	wp_enqueue_style('my-custom-plugin-style', plugin_dir_url(__FILE__) . "filter.css");
}



// Widget creation

class My_Filter_Widget extends WP_Widget
{
	/*
	 * widget init
	 */
	function __construct()
	{
		parent::__construct(
			'my_filter_widget',
			'Фильтр по ACF полям',
			array('description' => 'Позволяет вывести фильтри за полями ACF постов кастомного типа.')
		);
	}


	/*
	 * widget front
	 */
	public function widget($args, $instance)
	{

		$title = apply_filters('widget_title', $instance['title']);
		$widget_id = $args['widget_id'];

		echo $args['before_widget'];

		if (!empty($title))
			echo $args['before_title'] . $title . $args['after_title'];
?>

		<div id="my-ajax-filter-search">
			<form action="" method="get">

				<?php if (have_rows('filter_1', 'widget_' . $widget_id)) :
					while (have_rows('filter_1', 'widget_' . $widget_id)) : the_row();
						if (get_sub_field('filter_check', 'widget_' . $widget_id) == '1') : ?>
							<div class="col">
								<label for="house_name"><?php echo get_sub_field('filter_title', 'widget_' . $widget_id); ?></label>
								<input type="text" name="house_name" id="house_name" class="form-control">
							</div>
						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>

				<?php if (have_rows('filter_2', 'widget_' . $widget_id)) :
					while (have_rows('filter_2', 'widget_' . $widget_id)) : the_row();
						if (get_sub_field('filter_check', 'widget_' . $widget_id) == '1') : ?>
							<div class="col">
								<label for="place_coordinate"><?php echo get_sub_field('filter_title', 'widget_' . $widget_id); ?></label>
								<input type="text" name="place_coordinate" id="place_coordinate" class="form-control">
							</div>
						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>

				<?php if (have_rows('filter_3', 'widget_' . $widget_id)) :
					while (have_rows('filter_3', 'widget_' . $widget_id)) : the_row();
						if (get_sub_field('filter_check', 'widget_' . $widget_id) == '1') : ?>
							<div class="col">
								<label for="number_floors"><?php echo get_sub_field('filter_title', 'widget_' . $widget_id); ?></label>
								<select name="number_floors" id="number_floors" class="form-select">
									<option value="">количество</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
								</select>
							</div>
						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>


				<?php if (have_rows('filter_4', 'widget_' . $widget_id)) :
					while (have_rows('filter_4', 'widget_' . $widget_id)) : the_row();
						if (get_sub_field('filter_check', 'widget_' . $widget_id) == '1') : ?>
							<div class="col">
								<label for="building_type"><?php echo get_sub_field('filter_title', 'widget_' . $widget_id); ?></label>
								<select name="building_type" id="building_type" class="form-select">
									<option value="">тип</option>
									<option value="панель">панель</option>
									<option value="кирпич">кирпич</option>
									<option value="пеноблок">пеноблок</option>
								</select>
							</div>
						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>

				<?php if (have_rows('filter_5', 'widget_' . $widget_id)) :
					while (have_rows('filter_5', 'widget_' . $widget_id)) : the_row();
						if (get_sub_field('filter_check', 'widget_' . $widget_id) == '1') : ?>
							<div class="col">
								<label for="ecology"><?php echo get_sub_field('filter_title', 'widget_' . $widget_id); ?></label>
								<select name="ecology" id="ecology" class="form-select">
									<option value="">уровень</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
							</div>
						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>

				<?php if (have_rows('filter_6', 'widget_' . $widget_id)) :
					while (have_rows('filter_6', 'widget_' . $widget_id)) : the_row();
						if (get_sub_field('filter_check', 'widget_' . $widget_id) == '1') : ?>
							<div class="col">
								<label for="house_image"><?php echo get_sub_field('filter_title', 'widget_' . $widget_id); ?></label>
								<select name="house_image" id="house_image" class="form-select">
									<option value="">все</option>
									<option value="0">Нет</option>
									<option value="1">Да</option>
								</select>
							</div>
						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>

				<?php if (have_rows('filter_7', 'widget_' . $widget_id)) :
					while (have_rows('filter_7', 'widget_' . $widget_id)) : the_row();
						if (get_sub_field('filter_check', 'widget_' . $widget_id) == '1') : ?>
							<div class="col">
								<label for="square"><?php echo get_sub_field('filter_title', 'widget_' . $widget_id); ?></label>
								<input type="number" name="square" id="square">
							</div>
						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>

				<?php if (have_rows('filter_8', 'widget_' . $widget_id)) :
					while (have_rows('filter_8', 'widget_' . $widget_id)) : the_row();
						if (get_sub_field('filter_check', 'widget_' . $widget_id) == '1') : ?>
							<div class="col">
								<label for="number_rooms"><?php echo get_sub_field('filter_title', 'widget_' . $widget_id); ?></label>
								<select name="number_rooms" id="number_rooms" class="form-select">
									<option value="">количество</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
								</select>
							</div>
						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>

				<?php if (have_rows('filter_9', 'widget_' . $widget_id)) :
					while (have_rows('filter_9', 'widget_' . $widget_id)) : the_row();
						if (get_sub_field('filter_check', 'widget_' . $widget_id) == '1') : ?>
							<div class="col">
								<label for="balcony"><?php echo get_sub_field('filter_title', 'widget_' . $widget_id); ?></label>
								<select name="balcony" id="balcony" class="form-select">
									<option value="">наличие</option>
									<option value="0">Нет</option>
									<option value="1">Да</option>
								</select>
							</div>
						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>

				<?php if (have_rows('filter_10', 'widget_' . $widget_id)) :
					while (have_rows('filter_10', 'widget_' . $widget_id)) : the_row();
						if (get_sub_field('filter_check', 'widget_' . $widget_id) == '1') : ?>
							<div class="col">
								<label for="bathroom"><?php echo get_sub_field('filter_title', 'widget_' . $widget_id); ?></label>
								<select name="bathroom" id="bathroom" class="form-select">
									<option value="">наличие</option>
									<option value="0">Нет</option>
									<option value="1">Да</option>
								</select>
							</div>
						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>

				<div class="col">
					<input type="submit" id="submit" name="submit" value="Search" class="btn btn-primary">
				</div>

			</form>
		</div>

	<?php echo $args['after_widget'];
	}



	/*
	 * widget back
	 */
	public function form($instance)
	{
		if (isset($instance['title'])) {
			$title = $instance['title'];
		}
	?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Заголовок</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
	<?php
	}



	/*
	 * widget saves
	 */
	public function update($new_instance)
	{
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
		return $instance;
	}
}



/*
 * widget init
 */
function true_top_posts_widget_load()
{
	register_widget('My_Filter_Widget');
}
add_action('widgets_init', 'true_top_posts_widget_load');



// Shortcode: [my_ajax_filter_search]

function my_ajax_filter_search_shortcode()
{

	my_ajax_filter_search_scripts();

	ob_start(); ?>

	<?php if (is_active_sidebar('custom_sidebar')) :
	?>

		<div id="custom-sidebar" class="sidebar">

			<?php dynamic_sidebar('custom_sidebar');
			?>

		</div>

	<?php endif;
	?>

<?php
	return ob_get_clean();
}
add_shortcode('my_ajax_filter_search', 'my_ajax_filter_search_shortcode');



// Scripts for Ajax Filter Search

function my_ajax_filter_search_scripts()
{
	wp_enqueue_script('my_ajax_filter_search', plugin_dir_url(__FILE__) . "filter.js", array(), '1.0', true);
	wp_localize_script('my_ajax_filter_search', 'ajax_url', admin_url('admin-ajax.php'));
}



// Ajax Callback

add_action('wp_ajax_my_ajax_filter_search', 'my_ajax_filter_search_callback');
add_action('wp_ajax_nopriv_my_ajax_filter_search', 'my_ajax_filter_search_callback');

function my_ajax_filter_search_callback()
{

	header("Content-Type: application/json");

	$meta_query = array('relation' => 'AND');

	if (isset($_GET['house_name'])) {
		$house_name = sanitize_text_field($_GET['house_name']);
		$meta_query[] = array(
			'key' => 'house_name',
			'value' => $house_name,
			'compare' => '='
		);
	}

	if (isset($_GET['place_coordinate'])) {
		$place_coordinate = sanitize_text_field($_GET['place_coordinate']);
		$meta_query[] = array(
			'key' => 'place_coordinate',
			'value' => $place_coordinate,
			'compare' => '='
		);
	}

	if (isset($_GET['number_floors'])) {
		$number_floors = sanitize_text_field($_GET['number_floors']);
		$meta_query[] = array(
			'key' => 'number_floors',
			'value' => $number_floors,
			'compare' => '='
		);
	}

	if (isset($_GET['building_type'])) {
		$building_type = sanitize_text_field($_GET['building_type']);
		$meta_query[] = array(
			'key' => 'building_type',
			'value' => $building_type,
			'compare' => '='
		);
	}

	if (isset($_GET['ecology'])) {
		$ecology = sanitize_text_field($_GET['ecology']);
		$meta_query[] = array(
			'key' => 'ecology',
			'value' => $ecology,
			'compare' => '='
		);
	}

	if (isset($_GET['house_image'])) {
		if ($_GET['house_image'] == 1) :
			$meta_query[] = array(
				'key'		=> 'house_image',
				'value'		=>  null,
				'compare'	=> '!='
			);
		elseif ($_GET['house_image'] == 0) :
			$meta_query[] = array(
				'key'		=> 'house_image',
				'value'		=>  null,
				'compare'	=> '='
			);
		else :
		endif;
	}

	if (isset($_GET['square'])) {
		$square = sanitize_text_field($_GET['square']);
		$meta_query[] = array(
			'key' => 'room_$_square',
			'value' => $square,
			'compare' => 'LIKE'
		);
	}

	if (isset($_GET['number_rooms'])) {
		$number_rooms = sanitize_text_field($_GET['number_rooms']);
		$meta_query[] = array(
			'key' => 'room_$_number_rooms',
			'value' => $number_rooms,
			'compare' => 'LIKE'
		);
	}

	if (isset($_GET['balcony'])) {
		$balcony = sanitize_text_field($_GET['balcony']);
		$meta_query[] = array(
			'key' => 'room_$_balcony',
			'value' => $balcony,
			'compare' => 'LIKE'
		);
	}

	if (isset($_GET['bathroom'])) {
		$bathroom = sanitize_text_field($_GET['bathroom']);
		$meta_query[] = array(
			array(
				'key' => 'room_$_bathroom',
				'value' => $bathroom,
				'compare' => 'LIKE'
			)

		);
	}

	// if (isset($_GET['room_image'])) {
	// 	if ($_GET['room_image'] = 1) {
	// 		$meta_query[] = array(
	// 			'key'		=> 'room_$_room_image',
	// 			'value'		=>  null,
	// 			'compare'	=> '!='
	// 		);
	// 	} elseif ($_GET['room_image'] = 0) {
	// 		$meta_query[] = array(
	// 			'key'		=> 'room_$_room_image',
	// 			'value'		=>  null,
	// 			'compare'	=> '='
	// 		);
	// 	} else {
	// 	}

	$args = array(
		'post_type' => 'property',
		'posts_per_page' => 5,
		'meta_query' => $meta_query,
		'meta_key'      => 'ecology', //bonus task
		'orderby' => 'meta_value',
		'order' => 'DESC',
	);

	$search_query = new WP_Query($args);

	if ($search_query->have_posts()) {

		$result = array();
		$room = array();

		$post_id = get_the_ID();

		while ($search_query->have_posts()) {
			$search_query->the_post();
			$room = get_field('room', $post_id);

			$result[] = array(
				"id" => get_the_ID(),
				"title" => get_the_title(),
				"content" => get_the_content(),
				"permalink" => get_permalink(),
				"house_name" => get_field('house_name'),
				"place_coordinate" => get_field('place_coordinate'),
				"number_floors" => get_field('number_floors'),
				"building_type" => get_field('building_type'),
				"ecology" => get_field('ecology'),
				"house_image" => get_field('house_image'),
				"square" => esc_attr($room['square']),
				"number_rooms" => esc_attr($room['number_rooms']),
				"balcony" => $room['balcony'],
				"bathroom" => $room['bathroom'],
			);
		}

		wp_reset_query();
	} else {
		// no posts found
	}

	echo json_encode($result);

	wp_die();
}



// bonus task

function my_pre_get_posts($query)
{

	// do not modify queries in the admin
	if (is_admin()) {

		return $query;
	}


	// only modify queries for 'property' post type
	if (isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'property') {

		$query->set('orderby', 'meta_value');
		$query->set('meta_key', 'ecology');
		$query->set('order', 'DESC');
	}


	// return
	return $query;
}

add_action('pre_get_posts', 'my_pre_get_posts');
