<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header(); ?>

	<div class="container">
        <div class="row">
            <div id="primary" class="content-area post-content">
                <section id="main" class="site-main" role="main">

                    <?php
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', get_post_format() );


                    endwhile; // End of the loop.
                    ?>

                </section><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div>

<?php
get_footer();
