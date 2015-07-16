<?php
/*
Plugin Name: Awesomelytics
Version: 0.1.3
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

function awesomelytics_management_page() {
  add_options_page( 'Awesomelytics', 'Awesomelytics', 'activate_plugins', 'awesomelytics', 'awesomelytics_settings' );
}
add_action('admin_menu', 'awesomelytics_management_page');

// ### Maybe ###
function add_awesomelytics_action_links ( $links ) {
  $settings_link = '<a href="' . admin_url( 'options-general.php?page=awesomelytics' ) . '">' . 'Settings' . '</a>';
  array_unshift( $links, $settings_link ); // before other links
  return $links;
}
add_filter( 'plugin_action_links', 'add_awesomelytics_action_links' );

function awesomelytics_settings() {
  echo '<div class="wrap">';
  echo '<h2>Awesomelytics</h2>';
  echo '<p>';
  echo '<a href="https://www.awesomelytics.com/join?domain=' . get_site_url() . '" target="_blank">Be sure to register your site at Awesomelytics!</a>';
  echo '</p>';
  echo '</div>';
}
?>
