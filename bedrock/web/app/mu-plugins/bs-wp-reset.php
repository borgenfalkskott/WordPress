<?php
  /*
    Plugin Name:  B&S WordPress Reset
    Plugin URI:   https://github.com/Borgenfalk-Skott/WordPress/blob/main/bedrock/web/app/mu-plugins/bs-wp-reset.php
    Description:  A reset plugin to make WordPress tight.
    Version:      1.0.0
    Author:       Borgenfalk & Skott
    Author URI:   https://borgenfalk.se
    License:      MIT
    License URI:  https://github.com/Borgenfalk-Skott/WordPress/blob/main/LICENSE
    Text Domain:  bs
    Domain Path:  /languages
  */

  defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

  /**
   * Remove WordPress version from meta
   */
  remove_action('wp_head', 'wp_generator');


  /**
   * Disable XML-RPC
   */
  add_filter( 'xmlrpc_enabled', '__return_false' );


  /**
   * Remove RSS meta
   */
  add_filter('the_generator', '__return_empty_string');


  /**
   * Hide admin bar on frontend
   */
  add_filter( 'show_admin_bar', '__return_false' );


  /**
   * Login page: Change logo link url
   */
  add_filter('login_headerurl', function(){
    return esc_url(get_home_url());
  });


  /**
   * Login page: Change logo link alt text
   */
  add_filter('login_headertext', function(){
    return esc_attr(get_bloginfo('name'));
  });


  /**
   * Login page: Change login error message
   */
  add_filter('login_errors', function(){
    return _x('Error, wrong credentials!', 'Login error message', 'bs');
  });


  /**
   * Dequeue and deregister jQuery from frontend
   */
  add_action( 'wp_enqueue_scripts', function(){
    wp_dequeue_script('jquery');
    wp_deregister_script('jquery');
  });
?>