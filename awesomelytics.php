<?php
/*
Plugin Name: Awesomelytics
Version: 0.1.2
Plugin URI: https://www.awesomelytics.com
Author: Joshua McGee
Author URI: http://joshuamcgee.com
Description: Adds Awesomelytics tracking code
*/

function add_awesomelytics_scripts() {
  wp_register_script( 'awesomelytics-setup', plugins_url() . '/awesomelytics/js/awesomelytics-setup.js' );
  wp_enqueue_script( 'awesomelytics', 'https://www.awesomelytics.com/v1/a.js', array( 'awesomelytics-setup' ) );
}
add_action('wp_enqueue_scripts', 'add_awesomelytics_scripts');
?>
