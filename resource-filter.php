<?php
/*
Plugin Name: Resource Filter
Author: Mansi Prajapati
Version: 1.0
*/

if(!defined('ABSPATH')){
   exit;
}

require_once plugin_dir_path(__FILE__) . '/includes/cpt.php';
require_once plugin_dir_path(__FILE__) . '/includes/custom-functions.php';

function pre_print_pre($data, $exit = false)
{
	echo '<pre>';
	print_r($data);
	echo '</pre>';
	if ($exit) {
		exit();
	}
}

function register_page_template( $templates ) {
	$templates['templates/page-resource.php'] = 'Resource Archive Page';
	return $templates;
}
add_filter( 'theme_page_templates', 'register_page_template' );

function add_page_template( $template ) {
	if ( get_page_template_slug() == 'templates/page-resource.php' ) {
		$template = plugin_dir_path( __FILE__ ) . 'templates/page-resource.php';
	}
	return $template;
}
add_filter( 'template_include', 'add_page_template' );


