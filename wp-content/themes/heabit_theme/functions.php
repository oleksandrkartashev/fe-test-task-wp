<?php
/**
 * heabit_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package heabit_theme
 */

if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function heabit_theme_setup()
{
    /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on heabit_theme, use a find and replace
        * to change 'heabit_theme' to the name of your theme in all the template files.
        */
    load_theme_textdomain( 'heabit_theme', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
    add_theme_support( 'title-tag' );

    /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
    add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'menu-1' => esc_html__( 'Primary', 'heabit_theme' ),
        )
    );

    /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'heabit_theme_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        )
    );
}

add_action( 'after_setup_theme', 'heabit_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function heabit_theme_content_width()
{
    $GLOBALS['content_width'] = apply_filters( 'heabit_theme_content_width', 640 );
}

add_action( 'after_setup_theme', 'heabit_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function heabit_theme_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__( 'Sidebar', 'heabit_theme' ),
            'id' => 'sidebar-1',
            'description' => esc_html__( 'Add widgets here.', 'heabit_theme' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}

add_action( 'widgets_init', 'heabit_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function heabit_theme_scripts()
{
    // Enqueue main stylesheet
    wp_enqueue_style( 'heabit_theme-style', get_template_directory_uri() . '/dist/css/main.min.css', array(), '1.0.0' );

    // Enqueue main script file
    wp_enqueue_script( 'heabit_theme-js', get_template_directory_uri() . '/dist/js/main.min.js', array(), '1.0.0', true );
    wp_localize_script( 'heabit_theme-js', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'place' => '' ) );
}

add_action( 'wp_enqueue_scripts', 'heabit_theme_scripts' );

function subscription_popup()
{
    ob_start();
    // Adding template file with markup for shortcode
    get_template_part( 'templates/shortcodes/popup-subscribe' );
    return ob_get_clean();
}
add_shortcode( 'subscription-popup', 'subscription_popup' );

function create_subscriber_cpt() {
    $args = array(
        'labels' => array(
            'name' => 'Subscribers',
            'singular_name' => 'Subscriber',
        ),
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'supports' => array( 'title', 'custom-fields' ),
        'has_archive' => false,
        'rewrite' => false,
    );

    // Creating custom post type for all who subscribed
    register_post_type( 'subscriber', $args );
}
add_action( 'init', 'create_subscriber_cpt' );

function save_subscriber() {
    // Validation for email field
    if (isset($_POST['email'])) {
        $email = sanitize_email($_POST['email']);

        if (!is_email($email)) {
            wp_send_json_error();
        }

        $subscriber = array(
            'post_title'  => $email,
            'post_type'   => 'subscriber',
            'post_status' => 'publish',
        );

        $post_id = wp_insert_post($subscriber);

        if ($post_id) {
            wp_send_json_success();
        } else {
            wp_send_json_error();
        }
    }

    wp_send_json_error();
}
add_action('wp_ajax_save_subscriber', 'save_subscriber');
add_action('wp_ajax_nopriv_save_subscriber', 'save_subscriber');
