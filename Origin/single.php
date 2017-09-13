<?php Origin::get_includes( 
	array(
		"_/includes/html-header",
		"_/includes/header"
		)
	);
?>

<main>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<article>

<h2><?php the_title(); ?></h2>
<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time>
<?php the_content(); ?>			

<?php if ( get_the_author_meta( 'description' ) ) : ?>
<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
<h3>About <?php echo get_the_author() ; ?></h3>
<?php the_author_meta( 'description' ); ?>
<?php endif; ?>


</article>
<?php endwhile; ?>
</main>

<?php Origin::get_includes( array( '_/includes/footer','_/includes/html-footer' ) ); ?>