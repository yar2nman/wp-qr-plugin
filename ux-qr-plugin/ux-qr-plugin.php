<?php
/*
Plugin Name:  voc_nps
Plugin URI:   https://www.test.com 
Description:  QRCode app to let customers evaluate and rate any product. 
Version:      2.0
Author:        Dowell Research
Author URI:   https://www.test.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  ux-qr
Domain Path:  /languages
*/



if ( !defined( 'ABSPATH' ) ) exit;

// Act on plugin activation
register_activation_hook( __FILE__, "activate_myplugin" );


global $ux_db_version;
$ux_db_version = '1.0';

function wpb_follow_us($content) {
    if ( is_single() ) { 

    // all Plugins directory url
    // Need to add the directory of our plugin

    $pluginUrl = plugin_dir_url('/index.html', __FILE__);

    $content .= '
            <p>
                <hr>
                <iframe src="' . $pluginUrl . 'ux-qr-plugin/index.html" frameborder="0" width="100%" height="700px"></iframe>
                <hr>
            </p>
            '
            ;
    } 
// Return the content
return $content; 
}
add_filter('the_content', 'wpb_follow_us'); 



function ux_install() {
	global $wpdb;
	// global $ux_db_version;

	$table_name = 'Ux_Qr_Table';
	
	// $charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		name text NOT NULL,
		brand text NOT NULL,
        logo MEDIUMBLOB,
		PRIMARY KEY  (id)
	)";

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	dbDelta( $sql );

	// add_option( 'ux_db_version', $ux_db_version );
}
register_activation_hook( __FILE__, 'ux_install' );



 
function ux_plugin_setup_menu(){
    add_menu_page( 'voc_nps Page', 'voc_nps Plugin', 'manage_options', 'voc_npsPluginPage', 'pluginPageInit', 'dashicons-buddicons-buddypress-logo' );
	add_submenu_page( 'voc_npsPluginPage', 'Help Plugin Page', 'voc_nps Help', 'manage_options', 'ux-plugin-help', 'uxHelpPageInit' );
	add_submenu_page( 'voc_npsPluginPage', 'about Plugin Page', 'voc_nps about', 'manage_options', 'ux-plugin-about', 'uxAboutPageInit' );
}
 
function pluginPageInit(){
    $ux_options_page_options = get_option( 'ux_options_page_option_name' ); // Array of All Options
    $location_0 = $ux_options_page_options['location_0']; // location
	$width_1 = $ux_options_page_options['width_1']; // width
	$height_2 = $ux_options_page_options['height_2']; // height
	$backgroun_3 = $ux_options_page_options['backgroun_3']; // backgroun
   
   
    $pluginUrl = plugin_dir_url('/index.html', __FILE__);

	$style = "clear: both;";
	if ($location_0 === "top left" || $location_0 === "bottom left") {
		$style = "left";
	}
	if ($location_0 === "top right" || $location_0 === "bottom right") {
		$style = "right";
	}
	if ($location_0 === "center") {
		$style = "center";
	}

    $content .= '
            <div id="pdiv" class="mcontainer" >
                <iframe class="mcontent" 
                    src="' . $pluginUrl . 'ux-qr-plugin/index.html"
                    frameborder="0"
                    ></iframe>
            </div>
			<style>
				.mcontainer {
					padding-top: 10px;
					display: flex;
					width: 85vw;
					min-height: 700px;
					flex-direction: row;
					justify-content: '. $style .';
					background-color: '. $backgroun_3 .';
								}
				
				.mcontent {
					width: ' . $width_1 .'vw;
					min-height: 50vh;
					max-height: 85vh;
								}

				/* On screens that are 600px or less, set the background color to olive */
				@media screen and (max-width: 600px) {
					.mcontainer {
						width: 95vw;
						height: 100vh;
									}
					
					.mcontent {
						width: 90vw;
						height: 100vh;
									}
				</style>
            '
            ;

    echo $content;
}

 
function uxHelpPageInit(){
   
   
    $pluginUrl = plugin_dir_url('/help.html', __FILE__);


    $content .= '
            <div id="pdiv" class="mcontainer" >
                <iframe class="mcontent" 
                    src="' . $pluginUrl . 'ux-qr-plugin/help.html"
                    frameborder="0"
                    ></iframe>
            </div>
			<style>
				.mcontainer {
					padding-top: 10px;
					display: flex;
					width: 85vw;
					min-height: 700px;
					flex-direction: row;
					justify-content: center;
					background-color: white;
								}
				
				.mcontent {
					width: 90vw;
					min-height: 50vh;
					max-height: 85vh;
								}

				/* On screens that are 600px or less, set the background color to olive */
				@media screen and (max-width: 600px) {
					.mcontainer {
						width: 95vw;
						height: 100vh;
									}
					
					.mcontent {
						width: 90vw;
						height: 100vh;
									}
				</style>
            '
            ;

    echo $content;
}

function uxAboutPageInit(){
   
   
    $pluginUrl = plugin_dir_url('/about.html', __FILE__);


    $content .= '
            <div id="pdiv" class="mcontainer" >
                <iframe class="mcontent" 
                    src="' . $pluginUrl . 'ux-qr-plugin/about.html"
                    frameborder="0"
                    ></iframe>
            </div>
			<style>
				.mcontainer {
					padding-top: 10px;
					display: flex;
					width: 85vw;
					min-height: 700px;
					flex-direction: row;
					justify-content: center;
					background-color: white;
								}
				
				.mcontent {
					width: 90vw;
					min-height: 50vh;
					max-height: 85vh;
								}

				/* On screens that are 600px or less, set the background color to olive */
				@media screen and (max-width: 600px) {
					.mcontainer {
						width: 95vw;
						height: 100vh;
									}
					
					.mcontent {
						width: 90vw;
						height: 100vh;
									}
				</style>
            '
            ;

    echo $content;
}


add_action('admin_menu', 'ux_plugin_setup_menu');


/**
 * Generated by the WordPress Option Page generator
 * at http://jeremyhixon.com/wp-tools/option-page/
 */


class UxOptionsPage {
	private $ux_options_page_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'ux_options_page_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'ux_options_page_page_init' ) );
	}

	public function ux_options_page_add_plugin_page() {
		add_plugins_page(
			'voc_nps options page', // page_title
			'voc_nps options page', // menu_title
			'manage_options', // capability
			'ux-options-page', // menu_slug
			array( $this, 'ux_options_page_create_admin_page' ) // function
		);
	}

	public function ux_options_page_create_admin_page() {
		$this->ux_options_page_options = get_option( 'ux_options_page_option_name' ); ?>

		<div class="wrap">
			<h2>voc_nps options page</h2>
			<p>Select posititon, widht and background color of the plugin</p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'ux_options_page_option_group' );
					do_settings_sections( 'ux-options-page-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }


	public function ux_options_page_page_init() {
		register_setting(
			'ux_options_page_option_group', // option_group
			'ux_options_page_option_name', // option_name
			array( $this, 'ux_options_page_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'ux_options_page_setting_section', // id
			'Settings', // title
			array( $this, 'ux_options_page_section_info' ), // callback
			'ux-options-page-admin' // page
		);

		add_settings_field(
			'location_0', // id
			'location', // title
			array( $this, 'location_0_callback' ), // callback
			'ux-options-page-admin', // page
			'ux_options_page_setting_section' // section
		);

		add_settings_field(
			'width_1', // id
			'width', // title
			array( $this, 'width_1_callback' ), // callback
			'ux-options-page-admin', // page
			'ux_options_page_setting_section' // section
		);

		// add_settings_field(
		// 	'height_2', // id
		// 	'height', // title
		// 	array( $this, 'height_2_callback' ), // callback
		// 	'ux-options-page-admin', // page
		// 	'ux_options_page_setting_section' // section
		// );

		add_settings_field(
			'backgroun_3', // id
			'backgroun', // title
			array( $this, 'backgroun_3_callback' ), // callback
			'ux-options-page-admin', // page
			'ux_options_page_setting_section' // section
		);
	}

	public function ux_options_page_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['location_0'] ) ) {
			$sanitary_values['location_0'] = $input['location_0'];
		}

		if ( isset( $input['width_1'] ) ) {
			$sanitary_values['width_1'] = $input['width_1'];
		}

		if ( isset( $input['height_2'] ) ) {
			$sanitary_values['height_2'] = $input['height_2'];
		}

		if ( isset( $input['backgroun_3'] ) ) {
			$sanitary_values['backgroun_3'] = $input['backgroun_3'];
		}


		return $sanitary_values;
	}

	public function ux_options_page_section_info() {
		
	}

	public function location_0_callback() {
		?> <select name="ux_options_page_option_name[location_0]" id="location_0">
			<?php $selected = (isset( $this->ux_options_page_options['location_0'] ) && $this->ux_options_page_options['location_0'] === 'top right') ? 'selected' : '' ; ?>
			<option <?php echo $selected; ?>>top right</option>
			<?php $selected = (isset( $this->ux_options_page_options['location_0'] ) && $this->ux_options_page_options['location_0'] === 'top left') ? 'selected' : '' ; ?>
			<option <?php echo $selected; ?>>top left</option>
			<?php $selected = (isset( $this->ux_options_page_options['location_0'] ) && $this->ux_options_page_options['location_0'] === 'center') ? 'selected' : '' ; ?>
			<option <?php echo $selected; ?>>center</option>
		</select> <?php
	}

	public function width_1_callback() {
		?> <select name="ux_options_page_option_name[width_1]" id="width_1">
			<?php $selected = (isset( $this->ux_options_page_options['width_1'] ) && $this->ux_options_page_options['width_1'] === '40') ? 'selected' : '' ; ?>
			<option <?php echo $selected; ?>>40</option>
			<?php $selected = (isset( $this->ux_options_page_options['width_1'] ) && $this->ux_options_page_options['width_1'] === '50') ? 'selected' : '' ; ?>
			<option <?php echo $selected; ?>>50</option>
			<?php $selected = (isset( $this->ux_options_page_options['width_1'] ) && $this->ux_options_page_options['width_1'] === '60') ? 'selected' : '' ; ?>
			<option <?php echo $selected; ?>>60</option>
			<?php $selected = (isset( $this->ux_options_page_options['width_1'] ) && $this->ux_options_page_options['width_1'] === '80') ? 'selected' : '' ; ?>
			<option <?php echo $selected; ?>>80</option>
		</select> <?php
	}

	public function height_2_callback() {
		?> <select name="ux_options_page_option_name[height_2]" id="height_2">
			<?php $selected = (isset( $this->ux_options_page_options['height_2'] ) && $this->ux_options_page_options['height_2'] === '300') ? 'selected' : '' ; ?>
			<option <?php echo $selected; ?>>300</option>
			<?php $selected = (isset( $this->ux_options_page_options['height_2'] ) && $this->ux_options_page_options['height_2'] === '400') ? 'selected' : '' ; ?>
			<option <?php echo $selected; ?>>400</option>
			<?php $selected = (isset( $this->ux_options_page_options['height_2'] ) && $this->ux_options_page_options['height_2'] === '500') ? 'selected' : '' ; ?>
			<option <?php echo $selected; ?>>500</option>
		</select> <?php
	}

	public function backgroun_3_callback() {
		?> <select name="ux_options_page_option_name[backgroun_3]" id="backgroun_3">
			<?php $selected = (isset( $this->ux_options_page_options['backgroun_3'] ) && $this->ux_options_page_options['backgroun_3'] === '#E59866') ? 'selected' : '' ; ?>
			<option value="#E59866" <?php echo $selected; ?>>Red</option>
			<?php $selected = (isset( $this->ux_options_page_options['backgroun_3'] ) && $this->ux_options_page_options['backgroun_3'] === '#138D75') ? 'selected' : '' ; ?>
			<option value="#138D75" <?php echo $selected; ?>>Green</option>
			<?php $selected = (isset( $this->ux_options_page_options['backgroun_3'] ) && $this->ux_options_page_options['backgroun_3'] === '#B3B6B7') ? 'selected' : '' ; ?>
			<option value="#B3B6B7" <?php echo $selected; ?>>Grey</option>
			<?php $selected = (isset( $this->ux_options_page_options['backgroun_3'] ) && $this->ux_options_page_options['backgroun_3'] === '#FFFFFF') ? 'selected' : '' ; ?>
			<option value="#FFFFFF" <?php echo $selected; ?>>White</option>
			<?php $selected = (isset( $this->ux_options_page_options['backgroun_3'] ) && $this->ux_options_page_options['backgroun_3'] === '#000000') ? 'selected' : '' ; ?>
			<option value="#000000" <?php echo $selected; ?>>black</option>
		</select> <?php
	}


}


if ( is_admin() )
	$ux_options_page = new UxOptionsPage();


 // add settings to the plugins page for ux plugin 
function my_plugin_settings_link($links) { 
	$settings_link = '<a href="plugins.php?page=ux-options-page">Settings</a>'; 
	$settings_link2 = '<a href="/wp-content/plugins/ux-qr-plugin/about.html">about</a>'; 
	$settings_link3 = '<a href="/wp-content/plugins/ux-qr-plugin/help.html">help</a>'; 
	array_push($links, $settings_link, $settings_link2, $settings_link3); 
	return $links; 
  }
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'my_plugin_settings_link' );
