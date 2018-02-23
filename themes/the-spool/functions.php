<?php
/**
 * The spool functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package The_spool
 */

if (!function_exists('the_spool_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function the_spool_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on The spool, use a find and replace
         * to change 'the-spool' to the name of your theme in all the template files.
         */
        load_theme_textdomain('the-spool', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'the-spool'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('the_spool_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');
    }
endif;
add_action('after_setup_theme', 'the_spool_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function the_spool_content_width()
{
    $GLOBALS['content_width'] = apply_filters('the_spool_content_width', 640);
}

add_action('after_setup_theme', 'the_spool_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function the_spool_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'the-spool'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'the-spool'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'the_spool_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function the_spool_scripts()
{

    wp_register_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7');
    wp_register_style('fancybox-css', get_template_directory_uri() . '/css/jquery.fancybox.min.css', array(), '3.0.47');
    wp_enqueue_style('the-spool-style', get_stylesheet_uri(), array('bootstrap-css', 'fancybox-css'));

    wp_register_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.2.0');
    wp_register_script('fancybox-js', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array('jquery'), '3.0.47');
//    wp_register_script('the-spool-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);
    wp_register_script('the-spool-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);
    wp_enqueue_script('the-spool-script', get_template_directory_uri() . '/js/init.js', array('jquery', 'bootstrap-js', 'the-spool-skip-link-focus-fix', 'fancybox-js'), '1.2', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'the_spool_scripts');


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 *  Hide admin bar
 */

add_filter('show_admin_bar', '__return_false');


//Making jQuery Google API
function modify_jquery()
{
    if (!is_admin()) {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
        wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', false, '1.8.1');
        wp_enqueue_script('jquery');
    }
}

add_action('init', 'modify_jquery');


/* Choose Template based on user input
http://scratch99.com/wordpress/development/how-to-change-post-template-via-url-parameter/
https://developer.wordpress.org/reference/functions/add_query_arg/
 */

function the_spool_add_query_vars($vars)
{
    return array('template') + $vars;
}

add_filter('query_vars', 'the_spool_add_query_vars');

function the_spool_template($template)
{
    global $wp;
    if ($wp->query_vars['template'] == 'short') {
        return dirname(__FILE__) . '/single-short.php';
    } else {
        return $template;
    }
}

add_filter('single_template', 'the_spool_template');


/*  Get page is from slug*/
function get_id_by_slug($page_slug)
{
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}

/* Add Spool Logo on Login Page
Reference - https://codex.wordpress.org/Customizing_the_Login_Form
 */

function my_login_logo_url()
{
    return home_url();
}

add_filter('login_headerurl', 'my_login_logo_url');

function my_login_logo_url_title()
{
    return 'The Spool';
}

add_filter('login_headertitle', 'my_login_logo_url_title');


function my_login_logo()
{ ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/SpoolLogoBlack.svg);
            height: 70px;
            width: 102px;
            background-size: 102px 70px;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
    </style>
<?php }

add_action('login_enqueue_scripts', 'my_login_logo');

/* Display Most Popular Posts */

/*
 *
Show Popular Posts -
http://www.wpbeginner.com/wp-tutorials/how-to-track-popular-posts-by-views-in-wordpress-without-a-plugin/

*/


/*
 * Set post views count using post meta
 */

function wpb_set_post_views($postID)
{
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
//    echo $count;
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

//To keep the count accurate, lets get rid of prefetching
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_get_post_views($postID)
{
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

function wpb_track_post_views($post_id)
{
    if (!is_single()) return;
    if (empty ($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    wpb_set_post_views($post_id);
}

add_action('wp_head', 'wpb_track_post_views');


/* Add Settings page
https://www.sitepoint.com/create-a-wordpress-theme-settings-page-with-the-settings-api/
 */

function theme_settings_page()
{
    ?>
    <div class="wrap">
        <h1>Spool Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields("section");
            do_settings_sections("theme-options");
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function add_theme_menu_item()
{
    /*
     * https://developer.wordpress.org/reference/functions/add_menu_page/
     */
    add_menu_page("Spool Settings", "Spool Settings", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");


function display_facebook_element()
{
    ?>
    <input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>"/>
    <?php
}

function display_twitter_element()
{
    ?>
    <input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>"/>
    <?php
}

function display_instagram_element()
{
    ?>
    <input type="text" name="instagram_url" id="instagram_url" value="<?php echo get_option('instagram_url'); ?>"/>
    <?php
}

function display_footer_text()
{
    ?>
    <textarea rows="4" cols="50" name="footer_text" id="footer_text" value="<?php echo get_option('footer_text'); ?>">
        <?php echo get_option('footer_text'); ?>
    </textarea>
    <?php
}


function display_heading_text()
{
    ?>
    <textarea rows="4" cols="50" name="heading_text" id="heading_text"
              value="<?php echo get_option('heading_text'); ?>">
        <?php echo get_option('heading_text'); ?>
    </textarea>
    <?php
}


function display_theme_panel_fields()
{
    add_settings_section("section", "All Settings", null, "theme-options");
    add_settings_field("facebook_url", "Facebook URL", "display_facebook_element", "theme-options", "section");
    add_settings_field("twitter_url", "Twitter URL", "display_twitter_element", "theme-options", "section");
    add_settings_field("instagram_url", "Instagram URL", "display_instagram_element", "theme-options", "section");
    add_settings_field("footer_text", "Footer Text", "display_footer_text", "theme-options", "section");
    add_settings_field("heading_text", "Heading Text", "display_heading_text", "theme-options", "section");

    register_setting("section", "facebook_url");
    register_setting("section", "twitter_url");
    register_setting("section", "instagram_url");
    register_setting("section", "footer_text");
    register_setting("section", "heading_text");
}

add_action("admin_init", "display_theme_panel_fields");
