<?php 

require_once('theme-options.php');

// Load the theme styles
function theme_styles() {
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
	wp_enqueue_style('nerve-slider', get_template_directory_uri().'/css/nerveSlider.css');
	wp_enqueue_style('fontawesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css');
	wp_enqueue_style( 'ajax-load-more-css', get_template_directory_uri() . '/ajax-load-more/css/ajax-load-more.css' );
	wp_enqueue_style('main', get_template_directory_uri().'/style.css');
}

//Load JS files 
function theme_js() {
	wp_enqueue_script('bootstrap', get_template_directory_uri(). '/js/bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script('mixitup', get_template_directory_uri(). '/js/jquery.mixitup.js', array('jquery', 'jqui'), '', true );
	wp_enqueue_script('jqui', get_template_directory_uri(). '/js/jquery-ui-1.10.4.custom.min.js', array('jquery'), '', true );
	wp_register_script( 'nerveslider', get_template_directory_uri(). '/js/jquery.nerveSlider.min.js', array('jquery'), '', true);
	wp_enqueue_script('ajax-load-more', get_template_directory_uri() . '/ajax-load-more/js/ajax-load-more.js', 'jquery', '1.0', true);
	wp_enqueue_script('nerveslider');
	wp_enqueue_script('theme_js', get_template_directory_uri(). '/js/theme.js', array('jquery'), '', true );
	
}

add_action('wp_enqueue_scripts', 'theme_js');
add_action('wp_enqueue_scripts', 'theme_styles');


// Custom Menus
add_theme_support('menus');


function SearchFilter($query) {
    // If 's' request variable is set but empty
    if (isset($_GET['s']) && empty($_GET['s']) && $query->is_main_query()){
        $query->is_search = true;
        $query->is_home = false;
    }
    return $query;
}
add_filter('pre_get_posts','SearchFilter');

function count_cat_post($category) {
	if(is_string($category)) {
		$catID = get_cat_ID($category);
	} 
elseif(is_numeric($category)) {
	$catID = $category;
} else {
	return 0;
}
$cat = get_category($catID);
return $cat->count;
}

//Return a resource icon
function resource_icon($type){
	switch ($type) {
		case 'white-paper':
			return get_bloginfo('template_directory')."/img/icons/pdf.gif";
			break;

		case 'webcast':
			return get_bloginfo('template_directory')."/img/icons/webcast.gif";
			break;

		case 'video':
			return get_bloginfo('template_directory')."/img/icons/video.gif";
			break;

		case 'brochure':
			return get_bloginfo('template_directory')."/img/icons/pdf.gif";
			break;
		
		
	}
}

/**
 * Hide ACF menu item from the admin menu
 */
 
function remove_acf_menu()
{
 
    // provide a list of usernames who can edit custom field definitions here
    $admins = array( 
        'admin', 
        'johndoe'
    );
 
    // get the current user
    $current_user = wp_get_current_user();
 
    // match and remove if needed
    if( !in_array( $current_user->user_login, $admins ) )
    {
        remove_menu_page('edit.php?post_type=acf');
    }
 
}

//Custom logo on login page
function grid_login_logo() {
    echo '<style type="text/css">
		body {background: #ff0000 url('.get_bloginfo('stylesheet_directory').'/img/) no-repeat 0 0!important; background-size: 100% 100%!important;}
        h1 a { background-image:url('.get_bloginfo('stylesheet_directory').'/img/oracle-logo.png) !important; height:40px!important; width: 121px!important; background-size: 121px 40px!important; }
    </style>';
}

add_action('login_head', 'grid_login_logo');
 
add_action( 'admin_menu', 'remove_acf_menu', 999 );


// handle ajax check for sso-uid and notifySSO
add_action('wp_ajax_sso', 'sso');
add_action('wp_ajax_nopriv_sso', 'sso');
function sso() {

    if(session_id()=='') session_start();

        // log activity
        if(isset($_GET['data']['url'])){
            $url = $_GET['data']['url'];
            parse_str(parse_url($url,PHP_URL_QUERY), $vars);

            // notify SSO
            require_once 'sso.class.php';
            $sso = new SSO();
            $sso->notifySSO($_SESSION['uid'], $vars['activity'], $vars['details'], $vars['campaign_code']);
            die(json_encode($vars));
            // check for sso-uid
        } else {
            die(json_encode(array('success'=>isset($_SESSION['uid']))));
        }


}