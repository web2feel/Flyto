<?php
/**
 * Flyto functions and definitions
 *
 * @package Flyto
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'flyto_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function flyto_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Flyto, use a find and replace
	 * to change 'flyto' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'flyto', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'flyto' ),
	) );

	// Enable support for Post Formats.
	//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
/*
	add_theme_support( 'custom-background', apply_filters( 'flyto_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
*/



	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // flyto_setup
add_action( 'after_setup_theme', 'flyto_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function flyto_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'flyto' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'flyto_widgets_init' );



if ( !function_exists( 'of_get_option' ) ) {
function of_get_option($name, $default = false) {
	$optionsframework_settings = get_option('optionsframework');
	// Gets the unique option id
	$option_name = $optionsframework_settings['id'];
	if ( get_option($option_name) ) {
		$options = get_option($option_name);
	}
	if ( isset($options[$name]) ) {
		return $options[$name];
	} else {
		return $default;
	}
}
}

/**
 * Enqueue scripts and styles.
 */
function flyto_scripts() {
	wp_enqueue_style( 'flyto-style', get_stylesheet_uri() );
	wp_enqueue_style( 'fontawesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css');
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css');
	wp_enqueue_style( 'pushy', get_template_directory_uri() . '/css/pushy.css');
	wp_enqueue_style( 'theme', get_template_directory_uri() . '/theme.css');
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css');

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'backstretch', get_template_directory_uri() . '/js/jquery.backstretch.js', array(), '20120206', true );
	wp_enqueue_script( 'viewport', get_template_directory_uri() . '/js/viewport-checker.js', array(), '20120206', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array(), '20120206', true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.custom.71422.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'pushy', get_template_directory_uri() . '/js/pushy.min.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'flyto-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'flyto_scripts' );



function custom_styler(){ 
	$prime_color = of_get_option('accent_color','#539F10');

?>

<style type="text/css">
#masthead, .backstretch,.reply a,.pushy a:hover,h2.comments-title,.footer-widgets,.foot-button{ background: <?php echo $prime_color;?>!important; }

footer.entry-footer a, footer.entry-footer a:visited,.site-info a, .site-info a:visited,#respond a, #respond a:visited,.comment-navigation a, .comment-navigation a:visited,
.entry-content a, .entry-content a:visited, .entry-header h1.entry-title a:hover, .pagination span,.entry-header h1.entry-title { color:<?php echo $prime_color;?>!important;  }


</style>
	
<?php  }
add_action( 'wp_head', 'custom_styler' );


/* Exclude pages from search */

function SearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}

add_filter('pre_get_posts','SearchFilter');


/* Get image url */

function get_image_url(){
	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id,'large');
	$image_url = $image_url[0];
	echo $image_url;
	}	



/**
 * TGMPA
 */
require get_template_directory() . '/get-plugin.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Load pagination.
 */
require get_template_directory() . '/inc/paginate.php';