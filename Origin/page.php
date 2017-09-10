<?php Origin::get_includes( array( "_/includes/html-header", "_/includes/header" ) ); ?>

<main>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<h2><?php the_title(); ?></h2>
	<?php the_content(); ?>
	<?php endwhile; ?>
</main>

<?php Origin::get_includes( array( '_/includes/footer','_/includes/html-footer' ) ); ?>