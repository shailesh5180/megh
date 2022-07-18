<?php
/**
 *
 * Plugin Name:   spp
 * Plugin URI:    https://xyz.in/
 * Description:   testing
 * Version:       1.9.8
 * Author:        Shailesh Parmar
 * Author URI:    http://www.xyz.in
 * Text Domain:   cplist
 * Domain Path:   /languages
 *
 */

add_action( 'admin_menu', 'cpl_add_admin_menu' );
add_action( 'admin_init', 'cpl_settings_init' );


function cpl_add_admin_menu(  ) { 

	add_options_page( 'Custom Post List', 'Custom Post List', 'manage_options', 'custom_post_list', 'cpl_options_page' );

}


function cpl_settings_init(  ) { 

	register_setting( 'pluginPage', 'cpl_settings' );

	add_settings_section(
		'cpl_pluginPage_section',  // id
		__( 'Your section description', 'cplist' ),  // title
		'cpl_settings_section_callback',  // callback
		'pluginPage' // page
	);

	add_settings_field( 
		'cpl_text_field_0', 
		__( 'Settings field description', 'cplist' ), 
		'cpl_text_field_0_render', 
		'pluginPage', 
		'cpl_pluginPage_section' 
	);

	add_settings_field( 
		'cpl_select_field_1', 
		__( 'Settings field description', 'cplist' ), 
		'cpl_select_field_1_render', 
		'pluginPage', 
		'cpl_pluginPage_section' 
	);

	add_settings_field( 
		'cpl_select_field_2', 
		__( 'Settings field description', 'cplist' ), 
		'cpl_select_field_2_render', 
		'pluginPage', 
		'cpl_pluginPage_section' 
	);

	add_settings_field( 
		'cpl_select_field_3', 
		__( 'Settings field description', 'cplist' ), 
		'cpl_select_field_3_render', 
		'pluginPage', 
		'cpl_pluginPage_section' 
	);

	add_settings_field( 
		'cpl_checkbox_field_4', 
		__( 'Settings field description', 'cplist' ), 
		'cpl_checkbox_field_4_render', 
		'pluginPage', 
		'cpl_pluginPage_section' 
	);

	add_settings_field( 
		'cpl_checkbox_field_5', 
		__( 'Settings field description', 'cplist' ), 
		'cpl_checkbox_field_5_render', 
		'pluginPage', 
		'cpl_pluginPage_section' 
	);

	add_settings_field( 
		'cpl_checkbox_field_6', 
		__( 'Settings field description', 'cplist' ), 
		'cpl_checkbox_field_6_render', 
		'pluginPage', 
		'cpl_pluginPage_section' 
	);

	add_settings_field( 
		'cpl_radio_field_7', 
		__( 'Settings field description', 'cplist' ), 
		'cpl_radio_field_7_render', 
		'pluginPage', 
		'cpl_pluginPage_section' 
	);

	add_settings_field( 
		'cpl_checkbox_field_8',   // id
		__( 'Settings field description', 'cplist' ),  // title
		'cpl_checkbox_field_8_render',  // callback
		'pluginPage',  // page
		'cpl_pluginPage_section'  // section
	);


}


function cpl_text_field_0_render(  ) { 

	$options = get_option( 'cpl_settings' );
	?>
	<input type='text' name='cpl_settings[cpl_text_field_0]' value='<?php echo $options['cpl_text_field_0']; ?>'>
	<?php

}


function cpl_select_field_1_render(  ) { 

	$options = get_option( 'cpl_settings' );
	?>
	<select name='cpl_settings[cpl_select_field_1]'>
		<option value='1' <?php selected( $options['cpl_select_field_1'], 1 ); ?>>news</option>
		<option value='2' <?php selected( $options['cpl_select_field_1'], 2 ); ?>>movies</option>
		<option value='3' <?php selected( $options['cpl_select_field_1'], 3); ?>>sports</option>
	</select>

<?php

}


function cpl_select_field_2_render(  ) { 

	$options = get_option( 'cpl_settings' );
	?>
	<select name='cpl_settings[cpl_select_field_2]'>
		<option value='1' <?php selected( $options['cpl_select_field_2'], 1 ); ?>>Option 1</option>
		<option value='2' <?php selected( $options['cpl_select_field_2'], 2 ); ?>>Option 2</option>
	</select>

<?php

}


function cpl_select_field_3_render(  ) { 

	$options = get_option( 'cpl_settings' );
	?>
	<select name='cpl_settings[cpl_select_field_3]'>
		<option value='1' <?php selected( $options['cpl_select_field_3'], 1 ); ?>>Option 1</option>
		<option value='2' <?php selected( $options['cpl_select_field_3'], 2 ); ?>>Option 2</option>
	</select>

<?php

}


function cpl_checkbox_field_4_render(  ) { 

	$options = get_option( 'cpl_settings' );
	?>
	<input type='checkbox' name='cpl_settings[cpl_checkbox_field_4]' <?php checked( $options['cpl_checkbox_field_4'], 1 ); ?> value='1'>
	<?php

}


function cpl_checkbox_field_5_render(  ) { 

	$options = get_option( 'cpl_settings' );
	?>
	<input type='checkbox' name='cpl_settings[cpl_checkbox_field_5]' <?php checked( $options['cpl_checkbox_field_5'], 1 ); ?> value='1'>
	<?php

}


function cpl_checkbox_field_6_render(  ) { 

	$options = get_option( 'cpl_settings' );
	?>
	<input type='checkbox' name='cpl_settings[cpl_checkbox_field_6]' <?php checked( $options['cpl_checkbox_field_6'], 1 ); ?> value='1'>
	<?php

}


function cpl_radio_field_7_render(  ) { 

	$options = get_option( 'cpl_settings' );
	?>
	<input type='radio' name='cpl_settings[cpl_radio_field_7]' <?php checked( $options['cpl_radio_field_7'], 1 ); ?> value='1'>
	<?php

}


function cpl_checkbox_field_8_render(  ) { 

	$options = get_option( 'cpl_settings' );
	?>
	<input type='checkbox' name='cpl_settings[cpl_checkbox_field_8]' <?php checked( $options['cpl_checkbox_field_8'], 1 ); ?> value='1'>
	<?php

}


function cpl_settings_section_callback(  ) { 

	echo __( 'This section description', 'cplist' );

}


function cpl_options_page(  ) { 

		?>
		<form action='options.php' method='post'>

			<h2>Custom Post List</h2>

			<?php
			settings_fields( 'pluginPage' ); // option_group	
			do_settings_sections( 'pluginPage' ); //page name
			submit_button();
			?>

		</form>
		<?php

}
