<?php
/*
Plugin Name: Ajax Contact Widget
Description: Simple Ajax Contact Form Widget
Version:     20160911
Author:      Jeff Shomali
Author URI:  http://jeffcv.tk
License:     GPL2
*/

/**
 * Include Javascript
 */
function add_scripts(){
     wp_enqueue_scripts('contact-scripts', plugins_url().'/contact-widget/js/script.js',array('jquery'), '1.0.0', false);
}

add_action('wp_enqueue_scripts', 'add_scripts'); //load javascript files

/**
 *  Include Class
 */
include('class.contact-widget.php');

/**
 *  Register The Widget
 */
function register_contact_widget(){
     register_widget('Contact_widget');
}

//Hooks a function on to a specific action.
add_action('widgets_init', 'egister_contact_widget');
