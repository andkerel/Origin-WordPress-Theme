<?php
/**
 * Origin functions and definitions
	 * @package 	WordPress
	 * @subpackage 	Origin
	 * @since 		Origin 1.0
 */


/* ========================================================================================================================
Externals
======================================================================================================================== */
require_once( '_/includes/utilities.php' );


/* ========================================================================================================================
Register WP Menu
======================================================================================================================== */
function register_my_menus() {
	register_nav_menus(
		array( 'navigation-menu' => __( 'Navigation Menu' ) )
	);
}
add_action( 'init', 'register_my_menus' );


/* ========================================================================================================================
Actions, Filters & Theme Support
======================================================================================================================== */
add_action( 'wp_enqueue_scripts', 'origin_script_enqueuer' );
add_theme_support('post-thumbnails'); // Add theme support for post thumbnails.
add_filter( 'body_class', array( 'Origin_Utilities', 'add_slug_to_body_class' ) ); // Adds body classes

remove_action('wp_head', 'rsd_link'); // Remove really simple discovery link
remove_action('wp_head', 'wp_generator'); // Remove wordpress version
remove_action('wp_head', 'index_rel_link'); // Removes link to index page
remove_action('wp_head', 'wlwmanifest_link'); // Removes wlwmanifest.xml (needed to support windows live writer)
//remove_action('wp_head', 'feed_links', 2); // Removes rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
//remove_action('wp_head', 'feed_links_extra', 3); // Removes all extra rss feed links


/* ========================================================================================================================
Script & CSS Enqueuer
======================================================================================================================== */
function origin_script_enqueuer() {
	wp_register_style( 'screen', get_stylesheet_directory_uri().'/_/css/style.css', '', '', 'screen' );
    wp_enqueue_style( 'screen' );
}


/* ========================================================================================================================
Comments
======================================================================================================================== */
/**
 * Custom callback for outputting comments 
 *
 * @return void
 * @author Keir Whitaker
 */
function origin_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; 
	?>
	<?php if ( $comment->comment_approved == '1' ): ?>	
	<li>
		<article id="comment-<?php comment_ID() ?>">
			<?php echo get_avatar( $comment ); ?>
			<h4><?php comment_author_link() ?></h4>
			<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
			<?php comment_text() ?>
		</article>
	<?php endif;
}
?>