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
		$term = get_term_by( 'name', $cat_name, 'category' );
		return $term->term_id;
	}
}


//----------------------------------------------------------------
//  Register WordPress Menu
//----------------------------------------------------------------
function register_wp_menus() {
	register_nav_menus(
		array("navigation-menu" => __("Navigation Menu"))
	);
}
add_action("init", "register_wp_menus");


//----------------------------------------------------------------
//  Actions, Filters & Theme Support
//----------------------------------------------------------------
add_action( "wp_enqueue_scripts", "origin_css_enqueuer" );
add_theme_support("post-thumbnails"); // Add theme support for post thumbnails.
add_filter( "body_class", array( "Origin", "add_slug_to_body_class" ) ); // Adds body classes

remove_action("wp_head", "rsd_link"); // Remove really simple discovery link
remove_action("wp_head", "wp_generator"); // Remove wordpress version
remove_action("wp_head", "index_rel_link"); // Removes link to index page
remove_action("wp_head", "wlwmanifest_link"); // Removes wlwmanifest.xml (needed to support windows live writer)
//remove_action("wp_head", "feed_links", 2); // Removes rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
//remove_action("wp_head", "feed_links_extra", 3); // Removes all extra rss feed links


//----------------------------------------------------------------
//  Script & CSS Enqueuer
//----------------------------------------------------------------
function origin_css_enqueuer() {
	wp_register_style( "screen", get_stylesheet_directory_uri()."/style.css", ", ", "screen" );
	wp_enqueue_style( "screen" );
}
?>