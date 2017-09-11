<?php
//----------------------------------------------------------------
//  Origin Utility Functions
//----------------------------------------------------------------
class Origin {

	public static function get_includes( $parts = array() ) {
		foreach( $parts as $part ) {
			get_template_part( $part );
		};
	}

	public static function get_id_from_path( $path ) {
		$page = get_page_by_path( $path );

		if( $page ) {
			return $page->ID;
		} else {
			return null;
		};
	}

	public static function add_slug_to_body_class( $classes ) {
		global $post;

		if( is_page() ) {
			$classes[] = sanitize_html_class( $post->post_name );
		} elseif(is_singular()) {
			$classes[] = sanitize_html_class( $post->post_name );
		};

		return $classes;
	}

	public static function get_category_id( $cat_name ){
		$term = get_term_by( "name", $cat_name, "category" );
		return $term->term_id;
	}
}


//----------------------------------------------------------------
//  Functions
//----------------------------------------------------------------
// Add WordPress Menus
function register_wp_menus() {
	register_nav_menus(
		array("navigation-menu" => __("Navigation Menu"))
	);
}

// Deregister WP Embed
function my_deregister_scripts(){
	wp_deregister_script("wp-embed");
}

// CSS
function origin_css_enqueuer() {
	wp_register_style("screen", get_stylesheet_directory_uri()."/style.css", ", ", "" );
	wp_enqueue_style("screen");
}

// Editable theme styles - usable only with ACF Pro.
include_once( ABSPATH . "wp-admin/includes/plugin.php" );

if(is_plugin_active( "advanced-custom-fields-pro/acf.php")) {

	if(function_exists("acf_add_options_page")) {
		acf_add_options_page();
	}

	function generate_options_css() {
		$ss_dir = get_stylesheet_directory();
		ob_start();
		require($ss_dir . "/custom-css.php");
		$css = ob_get_clean();
		file_put_contents($ss_dir . "/custom-css.css", $css, LOCK_EX);
	}

	add_action( "acf/save_post", "generate_options_css");

	if(!is_admin()){
		wp_enqueue_style( "custom-css", get_template_directory_uri() . "/custom-css.css" ); 
	}
}


//----------------------------------------------------------------
//  Actions, Filters & Theme Support
//----------------------------------------------------------------
add_action("init", "register_wp_menus");
add_action("wp_enqueue_scripts", "origin_css_enqueuer");
add_action("wp_footer", "my_deregister_scripts");

remove_action("wp_head", "rsd_link"); // Remove really simple discovery link
remove_action("wp_head", "wp_generator"); // Remove wordpress version
remove_action("wp_head", "index_rel_link"); // Removes link to index page
remove_action("wp_head", "wlwmanifest_link"); // Removes wlwmanifest.xml (needed to support windows live writer)
remove_action("wp_head", "print_emoji_detection_script", 7);
remove_action("wp_print_styles", "print_emoji_styles");
remove_action("admin_print_scripts", "print_emoji_detection_script" );
remove_action("admin_print_styles", "print_emoji_styles");
remove_action("wp_head", "rest_output_link_wp_head");
remove_action("wp_head", "wp_oembed_add_discovery_links");
remove_action("template_redirect", "rest_output_link_header");
// remove_action("wp_head", "feed_links", 2); // Removes rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
// remove_action("wp_head", "feed_links_extra", 3); // Removes all extra rss feed links

add_filter("emoji_svg_url", "__return_false");
add_filter("body_class", array("Origin", "add_slug_to_body_class")); // Adds body classes

add_theme_support("post-thumbnails"); // Add theme support for post thumbnails.
?>