<?php
/**
 * Register navigation menus
 *
 * @link https://codex.wordpress.org/Function_Reference/register_nav_menus
 */
add_action( 'after_setup_theme', 'register_theme_menus' );
function register_theme_menus() {
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', THEME_TD ),
        'primary-mobile' => __( 'Primary Mobile Menu', THEME_TD ),
    ) );
}

class WPSE_78121_Sublevel_Walker extends Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class='sub-menu-wrap'><ul class='sub-menu'>\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }
}
