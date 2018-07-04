<?php
/**
 * The spool Theme Customizer
 *
 * @package The_spool
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function the_spool_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    /*
     * Builduing Customizer Options
     * @link http://themefoundation.com/wordpress-theme-customizer/
     */

    /*
    * Change Footer Text
    */

    // customizer change Footer Text
    $wp_customize->add_section('footer_section', array(
        'title' => __('Footer', 'footer'),
        'priority' => 200,
    ));

    $wp_customize->add_setting('copyright_textbox', array(
        'default' => "Default copyright text",
        'sanitize_callback' => 'sanitize_copyright_text',
    ));

    $wp_customize->add_control('copyright_textbox', array(
        'label' => __('Copyright text', 'footer'),
        'section' => 'footer_section',
        'type' => 'text',
        'priority' => 10
    ));


    /*
     * Update Theme Color
     */

    // customizer update theme primary color
    // main color ( site title, h1, h2, h4. h6, widget headings, nav links, footer headings )
    $txtcolors[] = array(
        'slug' => 'primary_color',
        'default' => '#311b92',
        'label' => 'Primary  Color'
    );

// secondary color ( site description, sidebar headings, h3, h5, nav links on hover )
    $txtcolors[] = array(
        'slug' => 'sec_color',
        'default' => '#666',
        'label' => 'Secondary Color'
    );

    // text Color ( body copy )
    $txtcolors[] = array(
        'slug' => 'text_color',
        'default' => '#000',
        'label' => 'Text Color'
    );

    // link color
    $txtcolors[] = array(
        'slug' => 'link_color',
        'default' => '#00000',
        'label' => 'Link Color'
    );

// link color ( hover, active )
    $txtcolors[] = array(
        'slug' => 'hover_link_color',
        'default' => '#311b92',
        'label' => 'Link Color (on hover)'
    );

    // add the settings and controls for each color
    foreach ($txtcolors as $txtcolor) {

        // SETTINGS
        $wp_customize->add_setting(
            $txtcolor['slug'], array(
                'default' => $txtcolor['default'],
                'type' => 'option',
                'capability' => 'edit_theme_options'
            )
        );


        // add color picker control
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $txtcolor['slug'], array(
            'label' => $txtcolor['label'],
            'section' => 'colors',
            'settings' => $txtcolor['slug'],
        )));
    }


    /**************************************
     * Header Section Settings
     ***************************************/
// add the section to contain the settings
    $wp_customize->add_section('header', array(
        'title' => 'Header',
    ));


// add the setting for the header background
    $wp_customize->add_setting('header-background');

// add the control for the header background
    $wp_customize->add_control('header-background', array(
        'label' => 'Add a solid background to the header?',
        'section' => 'header',
        'settings' => 'header-background',
        'type' => 'radio',
        'choices' => array(
            'header-background-off' => 'no',
            'header-background-on' => 'yes',
        )));

}

add_action('customize_register', 'the_spool_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function the_spool_customize_preview_js()
{
    wp_enqueue_script('the_spool_customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20151215', true);
}

add_action('customize_preview_init', 'the_spool_customize_preview_js');

function sanitize_copyright_text($copy_text)
{
    return wp_kses_post(force_balance_tags($copy_text));
}


/*
 * Function to generate css based on selection
 */
function the_spool_customize_colors()
{
    /**********************
     * text colors
     **********************/
// primary color
    $primary_color = get_option('primary_color');

// secondary color
    $sec_color = get_option('sec_color');

// text color
    $text_color = get_option('text_color');

// link color
    $link_color = get_option('link_color');

// hover or active link color
    $hover_link_color = get_option('hover_link_color');


    /****************************************
     * styling
     ****************************************/
    ?>
    <style>

        /* color scheme */

        /* main color */
        #site-title a, h1, h2, h2.page-title, h2.post-title, h2 a:link, h2 a:visited, .menu.main a:link, .menu.main a:visited, footer h3 {
            color: <?php echo $primary_color; ?>;
        }

        /* secondary color */
        #site-description, .sidebar h3, h3, h5, .menu.main a:active, .menu.main a:hover {
            color: <?php echo $sec_color; ?>;
        }

        .menu.main,
        .fatfooter {
            border-top: 1px solid <?php echo $color_scheme_2; ?>;
        }

        .menu.main {
            border-bottom: 1px solid <?php echo $color_scheme_2; ?>;
        }

        .fatfooter {
            border-bottom: 1px solid <?php echo $color_scheme_2; ?>;
        }

        /* links color */
        a:link, a:visited {
            color: <?php echo $link_color; ?>;
        }

        /* hover links color */
        a:hover, a:active {
            color: <?php echo $hover_link_color; ?>;
        }

    </style>

    <?php
}

add_action('wp_head', 'the_spool_customize_colors');