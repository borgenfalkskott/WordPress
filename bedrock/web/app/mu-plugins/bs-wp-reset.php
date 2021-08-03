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
    Text Domain:  bs-wp-reset
    Domain Path:  /languages
  */

  defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
  $txtDomain = 'bs-wp-reset';


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
   * Login alt text
   */
  add_filter('login_headertext', function(){
    return esc_attr(get_bloginfo('name'));
  });


  /**
   * Login error message
   */
  add_filter('login_errors', function(){
    return _x('Error, wrong credentials!', 'Login error message', $txtDomain);
  });


  /**
   * Dequeue and deregister jQuery from frontend
   */
  add_action( 'wp_enqueue_scripts', function(){
    wp_dequeue_script('jquery');
    wp_deregister_script('jquery');
  });
  
  
  /**
   * Disable Wp emojis
   */
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

  add_filter('tiny_mce_plugins', function($plugins){
    if(is_array($plugins)){
      return array_diff($plugins, array('wpemoji'));
    } else{
      return array();
    }
  });

  add_filter('wp_resource_hints', function($urls, $relation_type){
    if('dns-prefetch' == $relation_type){
      $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');
      $urls = array_diff($urls, array($emoji_svg_url));
    }
    return $urls;
  }, 10, 2);
?>