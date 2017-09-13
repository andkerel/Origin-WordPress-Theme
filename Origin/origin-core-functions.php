<?php
//----------------------------------------------------------------
//  Origin Utility Functions
//----------------------------------------------------------------
class Origin {

	// Includes function
	public static function get_includes( $parts = array() ) {
		foreach( $parts as $part ) {
			get_template_part( $part );
		};
	}

	// Add ID to body class
	public static function get_id_from_path( $path ) {
		$page = get_page_by_path( $path );

		if( $page ) {
			return $page->ID;
		} else {
			return null;
		};
	}

	// Add slug to body class
	public static function add_slug_to_body_class( $classes ) {
		global $post;

		if( is_page() ) {
			$classes[] = sanitize_html_class( $post->post_name );
		} elseif(is_singular()) {
			$classes[] = sanitize_html_class( $post->post_name );
		};

		return $classes;
	}

	// Add category to body class
	public static function get_category_id( $cat_name ){
		$term = get_term_by( "name", $cat_name, "category" );
		return $term->term_id;
	}
}

// Adds an array of classes to the body of each page & post
add_filter("body_class", array("Origin", "add_slug_to_body_class")); 

// Adds theme support for thumbnails
add_theme_support("post-thumbnails"); // Add theme support for post thumbnails.


//----------------------------------------------------------------
//  CSS / Styles
//----------------------------------------------------------------
function origin_css_enqueuer() {
	wp_register_style("screen", get_stylesheet_directory_uri()."/style.css");
	wp_enqueue_style("screen");
}
add_action("wp_enqueue_scripts", "origin_css_enqueuer");


//----------------------------------------------------------------
//  Scripts
//----------------------------------------------------------------
function scripts($tf) {

	if(!is_admin()) {

		// Modernizr - it's generally advized that Modernizr be initialized before all other Javascript.
		wp_register_script("modernizr", get_template_directory_uri() . "/_/js/dist/modernizr.js", null, null, false);

		// Remove default jQuery
		wp_deregister_script("jquery");

		if($tf === "true") {
			wp_register_script("site-min.js", get_template_directory_uri() . "/_/js/dist/site-min.js", null, null, true);
		} else {
			wp_register_script("site-min.js", get_template_directory_uri() . "/_/js/dist/site-min.js", null, null, false);
		}
	}

	if(!is_admin()){
		wp_enqueue_script("modernizr");
		wp_enqueue_script("site-min.js");
	}
}


//----------------------------------------------------------------
//  Advanced Custom Fields Pro
//----------------------------------------------------------------
include_once(ABSPATH . "wp-admin/includes/plugin.php");

// Enable Options Page
function enable_acf_options_page($tf) {

	if($tf === "true") {

		if(is_plugin_active( "advanced-custom-fields-pro/acf.php")) {

			if(function_exists("acf_add_options_page")) {
				acf_add_options_page();
			}
		}
	}
}

// Enable Custom Styles PHP
function enable_acf_custom_styles($tf) {

	if(is_plugin_active( "advanced-custom-fields-pro/acf.php")) {

		function generate_custom_css() {
			$ss_dir = get_stylesheet_directory();
			ob_start();
			require($ss_dir . "/custom-style.php");
			$css = ob_get_clean();
			file_put_contents($ss_dir . "/custom-style.css", $css, LOCK_EX);
		}

		add_action( "acf/save_post", "generate_custom_css");

		if(!is_admin()){
			wp_enqueue_style("custom-style", get_template_directory_uri() . "/custom-style.css"); 
		}
	}
}


//----------------------------------------------------------------
//  Disable WordPress Emojis
//----------------------------------------------------------------
function disable_wp_emojis($tf){

	if($tf === "true") {
		
		function my_deregister_scripts(){
			wp_deregister_script("wp-embed");
		}

		add_filter("emoji_svg_url", "__return_false");
		add_action("wp_footer", "my_deregister_scripts");
		remove_action("wp_print_styles", "print_emoji_styles");
		remove_action("admin_print_scripts", "print_emoji_detection_script" );
		remove_action("admin_print_styles", "print_emoji_styles");
		remove_action("wp_head", "print_emoji_detection_script", 7);
	}
}


//----------------------------------------------------------------
//  WordPress Menus
//----------------------------------------------------------------
function enable_wp_menus($tf){

	if($tf === "true") {
		
		function register_wp_menus() {
			register_nav_menus(
				array("navigation-menu" => __("Navigation Menu"))
			);
		}

		add_action("init", "register_wp_menus");
	}
}
?>