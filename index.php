<?php

exit('whoo');

//define('DEFAULT_PAGE', 'homepage.php');

$request_url_no_query_str = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$parts = explode('/', $request_url_no_query_str);
$parts = array_filter($parts);

// Load default homepage manually - not part of WordPress - if no url segments/pages specified
if(empty($parts)){

//    require_once DEFAULT_PAGE;
    echo "you are here"; exit;
    require_once 'eppm/index.php';

//    header('Location: /eppm/', true, 301);

} else {
    echo "you are here 2"; exit;

    /**
     * Front to the WordPress application. This file doesn't do anything, but loads
     * wp-blog-header.php which does and tells WordPress to load the theme.
     *
     * @package WordPress
     */

    /**
     * Tells WordPress to load the WordPress theme and output it.
     *
     * @var bool
     */
    define('WP_USE_THEMES', true);

    /** Loads the WordPress Environment and Template */
    require( dirname( __FILE__ ) . '/primavera/wp-blog-header.php' );

}


