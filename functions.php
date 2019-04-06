<?php
/**
 * Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

/**
 * Text domain definition
 */
defined('THEME_TD') ? THEME_TD : define('THEME_TD', 'vikings-site');

// Load modules

$theme_includes = [
    '/lib/helpers.php',
    '/lib/cleanup.php',                        // Clean up default theme includes
    '/lib/enqueue-scripts.php',                // Enqueue styles and scripts
    '/lib/protocol-relative-theme-assets.php', // Protocol (http/https) relative assets path
    '/lib/framework.php',                      // Css framework related stuff (content width, nav walker class, comments, pagination, etc.)
    '/lib/theme-support.php',                  // Theme support options
    '/lib/template-tags.php',                  // Custom template tags
    '/lib/menu-areas.php',                     // Menu areas
    '/lib/widget-areas.php',                   // Widget areas
    '/lib/customizer.php',                     // Theme customizer
    '/lib/vc_shortcodes.php',                  // Visual Composer shortcodes
    '/lib/jetpack.php',                        // Jetpack compatibility file
    '/lib/acf_field_groups_type.php',          // ACF Field Groups Organizer
];

foreach ($theme_includes as $file) {
    if (!$filepath = locate_template($file)) {
        continue;
        trigger_error(sprintf(__('Error locating %s for inclusion', THEME_TD), $file), E_USER_ERROR);
    }

    require_once $filepath;
}
unset($file, $filepath);


// Theme the TinyMCE editor (Copy post/page text styles in this file)

add_editor_style('assets/dist/css/custom-editor-style.css');


// Custom CSS for the login page

function loginCSS()
{
    echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri(THEME_TD) . 'assets/dist/css/wp-login.css"/>';
}

add_action('login_head', 'loginCSS');


// Add body class for active sidebar
function wp_has_sidebar($classes)
{
    if (is_active_sidebar('sidebar')) {
        // add 'class-name' to the $classes array
        $classes[] = 'has_sidebar';
    }
    // return the $classes array
    return $classes;
}

add_filter('body_class', 'wp_has_sidebar');

// Remove the version number of WP
// Warning - this info is also available in the readme.html file in your root directory - delete this file!
remove_action('wp_head', 'wp_generator');


// Obscure login screen error messages
function wp_login_obscure()
{
    return '<strong>Error</strong>: wrong username or password';
}

add_filter('login_errors', 'wp_login_obscure');


// Disable the theme / plugin text editor in Admin
define('DISALLOW_FILE_EDIT', true);


if (function_exists('acf_add_options_page')) {
    acf_add_options_page('Theme Settings');
}

add_filter('wp_nav_menu_items', 'my_wp_nav_menu_items', 10, 2);

function my_wp_nav_menu_items($items, $args)
{

    $menu = wp_get_nav_menu_object($args->menu);

    // modify primary only
    if ($args->theme_location == 'primary') {

        // get in touch button
        $tuchText = get_field('get_in_touch_button_text', $menu);

        $touchButton = "<li class='get-in-touch-wrap get-in-touch-modal'><a data-toggle='modal' data-target='#get-touch' href='#get-in-touch' class='get-in-touch-button'>" . $tuchText . "</a></li>";
        $touchButtonAnchor = "<li class='get-in-touch-wrap get-in-touch-anchor'><a  href='#get-in-touch-form' class='get-in-touch-button'>" . $tuchText . "</a></li>";

        // additional banner to sub menu
        $showBanner = get_field('show_or_hide_banner', $menu);

        if ($showBanner == 'show') {
            $title = get_field('title', $menu);
            $text = get_field('text', $menu);
            $buttonText = get_field('button_text', $menu);
            $buttonUrl = get_field('button_url', $menu);

            $banner = "<div class='sub-menu-banner'><div>
                    <h5 class='banner-title headline'> " . $title . " </h5>
                    <p class='banner-text'>" . $text . "</p>
                    <a  target='_blank' href='" . $buttonUrl . "' class='vikings-button-standart small-button banner-button'>" . $buttonText . "</a></div></div>";

        } else {
            $banner = '';
        }


        $items = $items . $touchButton . $touchButtonAnchor . $banner;

    }

    // return
    return $items;

}

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar()
{

    show_admin_bar(false);

}


function my_acf_admin_head() {
    ?>
    <style type="text/css">

        .acf-flexible-content .layout .acf-fc-layout-handle {
            /*background-color: #00B8E4;*/
            background-color: #9826B2;
            color: #eee;
        }

        .acf-repeater.-row > table > tbody > tr > td,
        .acf-repeater.-block > table > tbody > tr > td {
            border-top: 2px solid #0073AA;
        }

        .acf-repeater .acf-row-handle {
            vertical-align: top !important;
            padding-top: 16px;
        }

        .acf-repeater .acf-row-handle span {
            color: #0073AA;
        }

        .imageUpload img {
            width: 75px;
        }

        .acf-repeater .acf-row-handle .acf-icon.-minus {
            top: 30px;
        }


    </style>
    <?php
}

add_action('acf/input/admin_head', 'my_acf_admin_head');



