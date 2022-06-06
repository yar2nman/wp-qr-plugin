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
function wpb_follow_us($content) {

// Only do this when a single post is displayed
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
// Hook our function to WordPress the_content filter
add_filter('the_content', 'wpb_follow_us'); 

