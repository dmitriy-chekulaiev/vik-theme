<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
$heroImage = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : get_field('hero_image', 'option');
?>

<div class="site-wrapper">
    <header data-image-src="<?php echo $heroImage; ?>" data-parallax="scroll"
            class="parallax-window header <?php echo is_front_page() ? 'home-header' : 'default-header' ?>">

        <div class="header__sticky">
            <div class="header__container">
                <div class="header__row">
                    <a class="header__brand brand" href="<?php echo esc_url(home_url()); ?>">
                        <?php if (get_header_image()) : ?>
                            <img class="brand__img" src="<?php echo(get_header_image()); ?>"
                                 alt="<?php bloginfo('name'); ?>"/>
                        <?php else :
                            bloginfo('name');
                        endif; ?>
                    </a><!-- /.brand -->
                    <a class="header__brand brand sticky-menu" href="<?php echo esc_url(home_url()); ?>">
                        <?php $logo = get_field('sticky_header_logo', 'option'); ?>
                        <?php if ($logo) : ?>
                            <img class="brand__img" src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>"/>
                        <?php else :
                            bloginfo('name');
                        endif; ?>
                    </a><!-- /.brand -->

                    <nav class="nav-primary header__nav navbar navbar-expand-lg navbar-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primaryNavBar"
                                aria-controls="primaryNavBar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <?php
                        if (has_nav_menu('primary')) :
                            wp_nav_menu([
                                'theme_location' => 'primary',
                                'menu_id' => 'primary-menu',
                                'container_class' => 'collapse navbar-collapse',
                                'container_id' => 'primaryNavBar',
                                'menu_class' => 'navbar-nav',
                                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'walker' => new WPSE_78121_Sublevel_Walker
                            ]);
                        endif;

//                        if (has_nav_menu('primary-mobile')) :
//                            wp_nav_menu([
//                                'theme_location' => 'primary-mobile',
//                                'menu_id' => 'primary-menu',
//                                'container_class' => 'collapse navbar-collapse desktop-menu',
//                                'container_id' => 'primaryNavBar',
//                                'menu_class' => 'navbar-nav',
//                                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
//                                'walker' => new WPSE_78121_Sublevel_Walker
//                            ]);
//                        endif;

                        ?>
                    </nav><!-- .nav-primary -->

                </div>
                <!-- /.header__row -->
            </div>
        </div>
        <!-- /.header__container -->
        <?php $heroTitle = get_field('hero_title');
        $heroSubTitle = get_field('hero_subtitle'); ?>
        <?php if ($heroTitle) : ?>
            <div class="header__hero">
                <div class="header__container">
                    <div class="header__row">
                        <h1><?php echo $heroTitle; ?></h1>
                        <h3><?php echo $heroSubTitle; ?></h3>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if (!is_front_page()) : ?>
            <div class="header__default">
                <div class="header__container">
                    <div class="header__row">
                        <h2><?php the_title(); ?></h2>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </header><!-- .banner -->
    <main id="content" class="site-content">

        <?php if (!is_front_page()) : ?>
            <div class="vikings-breadcrumbs">
                <div class="container">
                    <div class="row">
                        <a href="<?php echo esc_url(home_url()); ?>"><?php _e('Start', 'vikings-domain') ?></a>
                        <span><span class="slash">/</span><?php the_title(); ?></span>
                    </div>
                </div>
            </div>
        <?php endif; ?>
