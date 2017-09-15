<!DOCTYPE HTML>
<html class="no-js" lang="en">
	<head>
		<title><?php bloginfo("name"); ?> | <?php the_title(); ?></title><?php // May need to be edited if SEO plugin is being used. ?>
		<meta charset="<?php bloginfo("charset"); ?>" />
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
		<?php // See http://ogp.me/ for configuration options. ?>
		<meta property="og:site_name" content="<?php bloginfo("name"); ?>" />
		<meta property="og:title" content="<?php the_title(); ?>" />
		<meta property="og:url" content="<?php the_permalink(); ?>" />
		<meta property="og:description" content="" />
		<meta property="og:image" content="" />
		<?php if(is_single()) { ?>
			<meta property="og:type" content="article" />
		<?php } ?>

		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:creator" content="" />
		<meta name="twitter:site" content="" />
		
		<?php // See http://schema.org/ for configuration options. ?>
		<script type="application/ld+json">
			{
				"@context": "http://schema.org",
				"name": "<?php bloginfo("name"); ?>",
				"@type": "Organization",
				"logo": "<?php bloginfo('template_directory'); ?>/_/icons/apple-icon-180x180.png" // Can be replaced with company logo.
				"url": "<?php echo site_url(); ?>"//,
				// "sameAs": [
				// 	"FACEBOOK PAGE URL HERE",
				// 	"TWITTER ACCOUNT",
				// 	"PUCLIC LINKEDIN PAGE",
				// 	"ETC"
				// ]
			}
		</script>

		<?php // Favions generated at http://www.favicon-generator.org/ - generate your own and place in the icons directory. ?>
		<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_directory'); ?>/_/icons/apple-icon-57x57.png" />
		<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_directory'); ?>/_/icons/apple-icon-60x60.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/_/icons/apple-icon-72x72.png" />
		<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_directory'); ?>/_/icons/apple-icon-76x76.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/_/icons/apple-icon-114x114.png" />
		<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_directory'); ?>/_/icons/apple-icon-120x120.png" />
		<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_directory'); ?>/_/icons/apple-icon-144x144.png" />
		<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_directory'); ?>/_/icons/apple-icon-152x152.png" />
		<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/_/icons/apple-icon-180x180.png" />
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php bloginfo('template_directory'); ?>/_/icons/android-icon-192x192.png" />
		<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory'); ?>/_/icons/favicon-32x32.png" />
		<link rel="icon" type="image/png" sizes="96x96" href="<?php bloginfo('template_directory'); ?>/_/icons/favicon-96x96.png" />
		<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory'); ?>/_/icons/favicon-16x16.png" />
		<link rel="manifest" href="<?php bloginfo('template_directory'); ?>/_/icons/manifest.json" />
		<meta name="msapplication-TileColor" content="#ffffff" />
		<meta name="msapplication-TileImage" content="<?php bloginfo('template_directory'); ?>/_/icons/ms-icon-144x144.png" />
		<meta name="theme-color" content="#ffffff" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>