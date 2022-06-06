<?php
/*
Plugin Name:  UX Qr Code Plugin
Plugin URI:   https://www.test.com 
Description:  A short little description of the plugin. It will be displayed on the Plugins page in WordPress admin area. 
Version:      1.0
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

// Message you want to display after the post

$pluginUrl = plugin_dir_url('/index.html', __FILE__);

$content .= '
        <p>
            <hr>
            <iframe src="' . $pluginUrl . 'ux-qr-plugin/index.html" frameborder="0" width="100%" height="700px"></iframe>
            <hr>
        </p>
        '
        ;


// $pageHTML = file_get_contents( plugins_url( '/index.html', __FILE__ ) );
// echo $pageHTML;

} 
// Return the content
return $content; 
// return $pageHTML;

}
// Hook our function to WordPress the_content filter
add_filter('the_content', 'wpb_follow_us'); 

