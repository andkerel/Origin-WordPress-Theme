<!DOCTYPE HTML>
<html class="no-js" lang="en">
	<head>
		<title><?php bloginfo("name"); ?><?php wp_title("|"); ?></title>
		<meta charset="<?php bloginfo("charset"); ?>" />
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php // Consider using Open Graph meta content. For more information go to http://ogp.me/ ?>
		<?php // Add your favicons here. Consider using a Favicon generator, personally I like https://www.favicon-generator.org/ ?>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>