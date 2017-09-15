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
		<h1>Search Results for &quot;<?php echo get_search_query(); ?>&quot;</h1>	
		<ol>
			<?php while (have_posts()) : the_post(); ?>
			<li>
				<article>
					<h2>
						<a href="<?php esc_url(the_permalink()); ?>" title="Visit - <?php the_title(); ?>">
							<?php the_title(); ?>
						</a>
					</h2>
					<time datetime="<?php the_time("Y-m-d" ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time>
				</article>
			</li>
			<?php endwhile; ?>
		</ol>
	<?php else: ?>
		<h1>No results found for '<?php echo get_search_query(); ?>'</h1>
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