<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?>

</main><!-- #content -->


<!-- Modal -->
<div class="modal fade" id="get-touch" tabindex="-1" role="dialog" aria-labelledby="get-touchLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="form-section">
                <?php $form = get_field('get_touch_form', 'option'); ?>
                <?php echo do_shortcode('' . $form . '') ?>
            </div>
        </div>
    </div>
</div>

<footer id="footer-container" class="site-footer footer" role="contentinfo">
    <div class="container footer__container">
        <div class="row footer__row">
            <div class="footer__column">
                <a class="footer__brand brand" href="<?php echo esc_url(home_url()); ?>">
                    <img src="<?php the_field('footer_logo', 'option'); ?>" alt="">
                </a>
            </div>
            <div class="footer__column">
                <div class="column-item">
                    <h5><?php the_field('title_contact', 'option'); ?></h5>
                    <p>
                        <a href="tel:<?php the_field('contact_phone', 'option'); ?>"><?php the_field('contact_phone', 'option'); ?></a>
                    </p>
                    <p>
                        <a href="mailto:<?php the_field('contact_mail', 'option'); ?>"><?php the_field('contact_mail', 'option'); ?></a>
                    </p>
                </div>
                <div class="column-item">
                    <h5><?php the_field('title_report', 'option'); ?></h5>
                    <a href="mailto:<?php the_field('report_mail', 'option'); ?>"><?php the_field('report_mail', 'option'); ?></a>
                </div>
            </div>
            <div class="footer__column">
                <h5><?php the_field('title_meet', 'option'); ?></h5>
                <?php
                if (have_rows('addresses', 'option')):

                    while (have_rows('addresses', 'option')) : the_row(); ?>

                        <div class="column-item">
                            <p><?php the_sub_field('address'); ?></p>
                        </div>

                    <?php endwhile;

                endif; ?>
            </div>
            <div class="footer__column">
                <div class="column-item">
                    <h5><?php the_field('title_join', 'option'); ?></h5>
                    <a target="_blank"
                       href="<?php the_field('join_url', 'option'); ?>"><?php the_field('join_us', 'option'); ?></a>
                </div>
                <div class="column-item">
                    <h5><?php the_field('title_social', 'option'); ?></h5>
                    <?php
                    if (have_rows('social_links', 'option')):
                        while (have_rows('social_links', 'option')) : the_row(); ?>
                            <a target="_blank"
                               href="<?php the_sub_field('link'); ?>"><?php the_sub_field('social_network'); ?></a>
                        <?php endwhile;
                    endif; ?>
                </div>
            </div>
            <div class="footer__column footer__column--full-width">
                <p><?php the_field('copyright_text', 'option') ?></p>
            </div>
        </div>
    </div>
</footer><!-- #colophon -->
</div><!-- Site-wrapper -->
<script>
    $banner = $('header .sub-menu-banner');
    //  $('header .sub-menu-banner').remove();
    if ($banner.length > 0) {
        setTimeout(function () {
            $('header li.menu-item-type-custom > a + .sub-menu-wrap').append($banner);
            $('header #primaryNavBar').append($banner);
            $('header #primaryNavBar #primary-menu + .sub-menu-banner').addClass('mobile-banner');
        }, 300)

        // $('header .sub-menu-banner').addClass('active');
    }
</script>
<?php wp_footer(); ?>
</body>
</html>