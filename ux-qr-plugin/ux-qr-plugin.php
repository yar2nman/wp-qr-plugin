<?php
/*
Plugin Name:  UX Qr Code Plugin
Plugin URI:   https://www.test.com 
Description:  QRCode app to let customers evaluate and rate any product. 
Version:      2.0
Author:       AhmedTaher 
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


 
function test_plugin_setup_menu(){
    add_menu_page( 'Test Plugin Page', 'UX Plugin', 'manage_options', 'test-plugin', 'test_init' );
}
 
function test_init(){
    $pluginUrl = plugin_dir_url('/index.html', __FILE__);

    $content .= '
            <p>
                <hr/>
                <iframe src="https://100014.pythonanywhere.com/nps/" frameborder="0" width="100%" height="700px"></iframe>
                <hr/>
            </p>
            '
            ;

    echo $content;
}

add_filter('the_content', 'wpb_follow_us'); 
register_activation_hook( __FILE__, 'ux_install' );

add_action('admin_menu', 'test_plugin_setup_menu');
