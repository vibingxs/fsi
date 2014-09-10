<?php
/*
 * Wordpress Ajax Load More
 * https://github.com/dcooney/wordpress-ajax-load-more
 *
 * Copyright 2014 Connekt Media - http://cnkt.ca/ajax-load-more/
 * Free to use under the GPLv2 license.
 * http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Author: Darren Cooney
 * Twitter: @KaptonKaos
*/

// ---------------------------------- //
// - Load wp-load.php from the WordPress root directory
// ---------------------------------- //

define('WP_USE_THEMES', false);
require_once('../../../../wp-load.php');


// ---------------------------------- //
// - Set up our variables from ajax-load-more.js
// ---------------------------------- //

$postType = (isset($_GET['postType'])) ? $_GET['postType'] : 'post';
$category = (isset($_GET['category'])) ? $_GET['category'] : '';
$author_id = (isset($_GET['author'])) ? $_GET['author'] : '';
$taxonomy = (isset($_GET['taxonomy'])) ? $_GET['taxonomy'] : '';
$tag = (isset($_GET['tag'])) ? $_GET['tag'] : '';
$exclude = (isset($_GET['postNotIn'])) ? $_GET['postNotIn'] : '';
$numPosts = 999;
$page = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 0;

// ---------------------------------- //
// - Set up initial args
// ---------------------------------- //

$args = array(
	'post_type' 			=> $postType,
	'category_name' 		=> $category,	
	'author'				=> $author_id,
	'posts_per_page' 		=> $numPosts,
	'paged'          		=> $page,	
	'orderby'   			=> 'date',
	'order'     			=> 'DESC',
	'post_status' 			=> 'publish',
	'ignore_sticky_posts' 	=> true,
);


// ---------------------------------- //
// - Excluded Posts Example Function
// ---------------------------------- //

/* Create new array of excluded posts, for example, you may have a feature banner on the page and you may not want to incude these posts in your query.

Example post array:
$features = array('7238', '6649', '6951'); // Array of posts
if($features){			
   $postsNotIn = implode(",", $features); //Implode the posts and set a varible to pass to our data-post-not-in param.
}   
Example HTML
<ul class="listing" data-path="<?php echo get_template_directory_uri(); ?>" data-post-type="post" data-post-not-in="<?php echo $postsNotIn; ?>" data-display-posts="6" data-button-text="Load More">
*/

// - Exclude posts if needed

if(!empty($exclude)){
	$exclude=explode(",",$exclude);
	$args['post__not_in'] = $exclude;
}

// - Query by Taxonomy

if(empty($taxonomy)){
	$args['tag'] = $tag;
}else{
    $args[$taxonomy] = $tag;
}


// - query_posts as wp_query chokes on the paging.

query_posts($args); 

// ---------------------------------- //
// - Run our loop
// ---------------------------------- //

if (have_posts()) :
	$i = 0;  
	while (have_posts()): the_post();
		// - Run the repeater
		echo get_template_part( '/ajax-load-more/includes/repeater-list'); 	
	endwhile; endif;
wp_reset_query(); 
?> 