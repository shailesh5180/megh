<?php
/**
 *
 * Plugin Name:   Custom Post List
 * Plugin URI:    https://xyz.in/
 * Description:   testing
 * Version:       1.9.8
 * Author:        Shailesh Parmar
 * Author URI:    http://www.xyz.in
 * Text Domain:   cplist
 * Domain Path:   /languages
 *
 */



class CustomPostList {
	private $custom_post_list_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'custom_post_list_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'custom_post_list_page_init' ) );
	}

	public function custom_post_list_add_plugin_page() {
		add_plugins_page(
			'Custom Post List', // page_title
			'Custom Post List', // menu_title
			'manage_options', // capability
			'custom-post-list', // menu_slug
			array( $this, 'custom_post_list_create_admin_page' ) // function
		);
	}

	public function custom_post_list_create_admin_page() {
		$this->custom_post_list_options = get_option( 'custom_post_list_option_name' ); ?>

		<div class="wrap">
			<h2>Custom Post List</h2>
			<p>custom post list</p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'custom_post_list_option_group' );
					do_settings_sections( 'custom-post-list-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function custom_post_list_page_init() {
		register_setting(
			'custom_post_list_option_group', // option_group
			'custom_post_list_option_name', // option_name
			array( $this, 'custom_post_list_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'custom_post_list_setting_section', // id
			'Settings', // title
			array( $this, 'custom_post_list_section_info' ), // callback
			'custom-post-list-admin' // page
		);

		add_settings_field(
			'custom_post_list_0', // id
			'custom post list', // title
			array( $this, 'custom_post_list_0_callback' ), // callback
			'custom-post-list-admin', // page
			'custom_post_list_setting_section' // section
		);

		add_settings_field(
			'posttype_1', // id
			'posttype', // title
			array( $this, 'posttype_1_callback' ), // callback
			'custom-post-list-admin', // page
			'custom_post_list_setting_section' // section
		);

		add_settings_field(
			'category_2', // id
			'category', // title
			array( $this, 'category_2_callback' ), // callback
			'custom-post-list-admin', // page
			'custom_post_list_setting_section' // section
		);

		add_settings_field(
			'thumbnail_3', // id
			'thumbnail', // title
			array( $this, 'thumbnail_3_callback' ), // callback
			'custom-post-list-admin', // page
			'custom_post_list_setting_section' // section
		);

		add_settings_field(
			'author_4', // id
			'author', // title
			array( $this, 'author_4_callback' ), // callback
			'custom-post-list-admin', // page
			'custom_post_list_setting_section' // section
		);

		add_settings_field(
			'date_5', // id
			'date', // title
			array( $this, 'date_5_callback' ), // callback
			'custom-post-list-admin', // page
			'custom_post_list_setting_section' // section
		);

		add_settings_field(
			'filter_6', // id
			'filter', // title
			array( $this, 'filter_6_callback' ), // callback
			'custom-post-list-admin', // page
			'custom_post_list_setting_section' // section
		);
	}

	public function custom_post_list_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['custom_post_list_0'] ) ) {
			$sanitary_values['custom_post_list_0'] = sanitize_text_field( $input['custom_post_list_0'] );
		}

		if ( isset( $input['posttype_1'] ) ) {
			$sanitary_values['posttype_1'] = $input['posttype_1'];
		}

		if ( isset( $input['category_2'] ) ) {
			$sanitary_values['category_2'] = $input['category_2'];
		}

		if ( isset( $input['thumbnail_3'] ) ) {
			$sanitary_values['thumbnail_3'] = $input['thumbnail_3'];
		}

		if ( isset( $input['author_4'] ) ) {
			$sanitary_values['author_4'] = $input['author_4'];
		}

		if ( isset( $input['date_5'] ) ) {
			$sanitary_values['date_5'] = $input['date_5'];
		}

		if ( isset( $input['filter_6'] ) ) {
			$sanitary_values['filter_6'] = $input['filter_6'];
		}

		return $sanitary_values;
	}

	public function custom_post_list_section_info() {
		
	}

	public function custom_post_list_0_callback() {
		printf(
			'<input class="regular-text" type="text" name="custom_post_list_option_name[custom_post_list_0]" id="custom_post_list_0" value="%s">',
			isset( $this->custom_post_list_options['custom_post_list_0'] ) ? esc_attr( $this->custom_post_list_options['custom_post_list_0']) : ''
		);
	}

	public function posttype_1_callback() {
		?> <select name="custom_post_list_option_name[posttype_1]" id="posttype_1">
			<?php $selected = (isset( $this->custom_post_list_options['posttype_1'] ) && $this->custom_post_list_options['posttype_1'] === 'news') ? 'selected' : '' ; ?>
			<option value="news" <?php echo $selected; ?>>news</option>
			<?php $selected = (isset( $this->custom_post_list_options['posttype_1'] ) && $this->custom_post_list_options['posttype_1'] === 'sports') ? 'selected' : '' ; ?>
			<option value="sports" <?php echo $selected; ?>>sports</option>
			<?php $selected = (isset( $this->custom_post_list_options['posttype_1'] ) && $this->custom_post_list_options['posttype_1'] === 'movies') ? 'selected' : '' ; ?>
			<option value="movies" <?php echo $selected; ?>>movies</option>
		</select> <?php
	}

	public function category_2_callback() {
		?> <select name="custom_post_list_option_name[category_2]" id="category_2">
			<?php $selected = (isset( $this->custom_post_list_options['category_2'] ) && $this->custom_post_list_options['category_2'] === 'politics') ? 'selected' : '' ; ?>
			<option value="politics" <?php echo $selected; ?>>politics</option>
			<?php $selected = (isset( $this->custom_post_list_options['category_2'] ) && $this->custom_post_list_options['category_2'] === 'game') ? 'selected' : '' ; ?>
			<option value="game" <?php echo $selected; ?>>sports</option>
			<?php $selected = (isset( $this->custom_post_list_options['category_2'] ) && $this->custom_post_list_options['category_2'] === 'gujaratnews') ? 'selected' : '' ; ?>
			<option value="gujaratnews" <?php echo $selected; ?>>gujaratnews</option>
			<?php $selected = (isset( $this->custom_post_list_options['category_2'] ) && $this->custom_post_list_options['category_2'] === '') ? 'selected' : '' ; ?>
			<option <?php echo $selected; ?>></option>
		</select> <?php
	}

	public function thumbnail_3_callback() {
		?> <fieldset><?php $checked = ( isset( $this->custom_post_list_options['thumbnail_3'] ) && $this->custom_post_list_options['thumbnail_3'] === 'on' ) ? 'checked' : '' ; ?>
		<label for="thumbnail_3-0"><input type="radio" name="custom_post_list_option_name[thumbnail_3]" id="thumbnail_3-0" value="on" <?php echo $checked; ?>> on</label><br>
		<?php $checked = ( isset( $this->custom_post_list_options['thumbnail_3'] ) && $this->custom_post_list_options['thumbnail_3'] === 'off' ) ? 'checked' : '' ; ?>
		<label for="thumbnail_3-1"><input type="radio" name="custom_post_list_option_name[thumbnail_3]" id="thumbnail_3-1" value="off" <?php echo $checked; ?>> off</label></fieldset> <?php
	}

	public function author_4_callback() {
		?> <fieldset><?php $checked = ( isset( $this->custom_post_list_options['author_4'] ) && $this->custom_post_list_options['author_4'] === 'on' ) ? 'checked' : '' ; ?>
		<label for="author_4-0"><input type="radio" name="custom_post_list_option_name[author_4]" id="author_4-0" value="on" <?php echo $checked; ?>> on</label><br>
		<?php $checked = ( isset( $this->custom_post_list_options['author_4'] ) && $this->custom_post_list_options['author_4'] === 'off' ) ? 'checked' : '' ; ?>
		<label for="author_4-1"><input type="radio" name="custom_post_list_option_name[author_4]" id="author_4-1" value="off" <?php echo $checked; ?>> off</label></fieldset> <?php
	}

	public function date_5_callback() {
		?> <fieldset><?php $checked = ( isset( $this->custom_post_list_options['date_5'] ) && $this->custom_post_list_options['date_5'] === 'on' ) ? 'checked' : '' ; ?>
		<label for="date_5-0"><input type="radio" name="custom_post_list_option_name[date_5]" id="date_5-0" value="on" <?php echo $checked; ?>> on</label><br>
		<?php $checked = ( isset( $this->custom_post_list_options['date_5'] ) && $this->custom_post_list_options['date_5'] === 'off' ) ? 'checked' : '' ; ?>
		<label for="date_5-1"><input type="radio" name="custom_post_list_option_name[date_5]" id="date_5-1" value="off" <?php echo $checked; ?>> off</label></fieldset> <?php
	}

	public function filter_6_callback() {
		printf(
			'<input type="checkbox" name="custom_post_list_option_name[filter_6]" id="filter_6" value="filter_6" %s> <label for="filter_6">filter</label>',
			( isset( $this->custom_post_list_options['filter_6'] ) && $this->custom_post_list_options['filter_6'] === 'filter_6' ) ? 'checked' : ''
		);
	}

}
if ( is_admin() )
	$custom_post_list = new CustomPostList();
$custom_post_list_options = get_option( 'custom_post_list_option_name' ); // Array of All Options
print_r($custom_post_list_options);
/* 
 * Retrieve this value with:
 * $custom_post_list_options = get_option( 'custom_post_list_option_name' ); // Array of All Options
 * $custom_post_list_0 = $custom_post_list_options['custom_post_list_0']; // custom post list
 * $posttype_1 = $custom_post_list_options['posttype_1']; // posttype
 * $category_2 = $custom_post_list_options['category_2']; // category
 * $thumbnail_3 = $custom_post_list_options['thumbnail_3']; // thumbnail
 * $author_4 = $custom_post_list_options['author_4']; // author
 * $date_5 = $custom_post_list_options['date_5']; // date
 * $filter_6 = $custom_post_list_options['filter_6']; // filter
 */
