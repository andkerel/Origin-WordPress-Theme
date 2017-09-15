<?php
Origin::get_includes(
	array(
		"_/includes/html-header", 
		"_/includes/header"
	)
);
?>

<main>
	<?php if (have_posts()): ?>

		<?php if (is_day()): ?>
			<h1>Archive: <?php echo  get_the_date("D M Y"); ?></h1>							
		<?php elseif (is_month()): ?>
			<h1>Archive: <?php echo  get_the_date("M Y"); ?></h1>	
		<?php elseif (is_year()): ?>
			<h1>Archive: <?php echo  get_the_date("Y"); ?></h1>								
		<?php else: ?>
			<h1>Archive</h1>	
		<?php endif; ?>

		<ol>
			<?php while (have_posts()) : the_post(); ?>
			<li>
				<article>
					<h2>
						<a href="<?php esc_url(the_permalink()); ?>" title="Visit - <?php the_title(); ?>">
							<?php the_title(); ?>
						</a>
					</h2>
					<time datetime="<?php the_time("Y-m-d"); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time>
				</article>
			</li>
			<?php endwhile; ?>
		</ol>
	<?php else: ?>
		<h1>No posts to display</h1>	
	<?php endif; ?>
</main>

<?php 
Origin::get_includes(
	array(
		"_/includes/footer",
		"_/includes/html-footer"
	)
);
?>