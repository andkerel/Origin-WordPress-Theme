<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Please see /_/includes/utilities.php for info on Origin_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Origin
 * @since 		Origin 1.0
 */
?>
<?php Origin_Utilities::get_template_parts( array( '_/includes/html-header', '_/includes/header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<h2><?php the_title(); ?></h2>
<?php the_content(); ?>
<?php comments_template( '', true ); ?>
<?php endwhile; ?>

<?php Origin_Utilities::get_template_parts( array( '_/includes/footer','_/includes/html-footer' ) ); ?>