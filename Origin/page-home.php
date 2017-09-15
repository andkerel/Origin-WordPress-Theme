<?php
//----------------------------------------------------------------
// Template Name: Home
//----------------------------------------------------------------
Origin::get_includes( 
	array(
		"_/includes/html-header", 
		"_/includes/header"
	)
);
?>

<?php if ( have_posts()) while ( have_posts()) : the_post(); ?>
<main>
	<h1><?php the_title(); ?></h1>
	<?php the_content(); ?>
</main>
<?php endwhile; ?>

<?php 
Origin::get_includes(
	array(
		"_/includes/footer",
		"_/includes/html-footer"
	)
);
?>