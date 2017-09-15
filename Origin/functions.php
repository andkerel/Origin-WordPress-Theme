<?php
//----------------------------------------------------------------
//  Origin Core Functions
//----------------------------------------------------------------
require_once("origin-core-functions.php");

disable_wp_emojis("true"); // Disable WordPress Emojis - true/false
enable_wp_menus("true"); // Activate WordPress Menus in the Appearance section - true/false
scripts("true"); // Minified script will be loaded by wp_footer, change to "false" if you would prefer it loaded by wp_head.
enable_acf_options_page("true"); // If using Advanced Custom Fields Pro, enable the Options page - true/false. Plugin must be installed & active.
enable_acf_custom_styles("true");

remove_action("wp_head", "rsd_link"); // Removes Really Simple Discovery link
remove_action("wp_head", "wlwmanifest_link"); // Removes wlwmanifest.xml (needed to support Windows Live Writer)
remove_action("wp_head", "wp_generator"); // Remove wordpress version
remove_action("wp_head", "rest_output_link_wp_head"); // Removes REST API Output
remove_action("wp_head", "wp_oembed_add_discovery_links"); // Removes oEmbed discovery links
remove_action("template_redirect", "rest_output_link_header"); // Removes a link header for the REST API
remove_action("wp_head", "feed_links", 2); // Removes rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
remove_action("wp_head", "feed_links_extra", 3); // Removes all extra rss feed links


//----------------------------------------------------------------
//  Add your custom functions below this line.
//----------------------------------------------------------------


?>