<?php

get_header(); ?>

    <div class="default default-content">
        <?php if (have_rows('homepage_content')):
            while (have_rows('homepage_content')) : the_row();


                if (get_row_layout() == 'fashion_section'):
                    $fashionSectionTitle = get_sub_field('title');
                    $fashionSectionRepeater = get_sub_field('checkbox_items'); ?>

                    <?php if ($fashionSectionRepeater) : ?>
                    <section class="default__fashion-section fashion-section">
                        <h2 class="headline"><?php echo $fashionSectionTitle; ?></h2>
                        <div class="fashion-section__checkbox-items checkbox-items">
                            <div class="container">
                                <div class="row">

                                    <?php $count = 0;
                                    foreach ($fashionSectionRepeater

                                    as $item) :
                                    $count++; ?>

                                    <div class="checkbox-item">
                                        <p class="headline check">
                                            <?php echo $item['title']; ?>
                                        </p>
                                        <p>
                                            <?php echo $item['text']; ?>
                                        </p>
                                    </div>

                                    <?php if (floatval($count / 2) == intval($count / 2)) : ?>
                                </div>
                                <div class="row">
                                    <?php endif; ?>

                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
                    <?php wp_reset_query(); ?>
                <?php elseif (get_row_layout() == 'site_links_section'):
                    $siteLinksSectionRepeater = get_sub_field('links'); ?>
                    <?php if ($siteLinksSectionRepeater) : ?>
                    <section class="default__links-section links-section">
                        <div class="container">
                            <div class="row">
                                <?php foreach ($siteLinksSectionRepeater as $item) : ?>
                                    <div class="link-item">
                                        <h3 class="headline"
                                            style="background: url('<?php echo $item['icon']; ?>') no-repeat top left">
                                            <?php echo $item['title']; ?>
                                        </h3>
                                        <p>
                                            <?php echo $item['description']; ?>
                                        </p>
                                        <a class="vikings-button-text"
                                           href="<?php echo $item['page']; ?>"><?php echo $item['link_text']; ?></a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
                    <?php wp_reset_query(); ?>
                <?php elseif (get_row_layout() == 'blog_section'):
                    $blogSectionRepeater = get_sub_field('articles'); ?>
                    <?php if ($blogSectionRepeater) : ?>
                    <section class="default__blog-section blog-section">
                        <div class="container">
                            <div class="row mobile-slider">
                                <?php foreach ($blogSectionRepeater

                                as $post) :
                                $thumbnail = get_the_post_thumbnail_url($post['post_id']) ?>
                                <div class="blog-article">
                                    <?php if ($thumbnail) : ?>
                                    <div class="article-thumbnail">
                                        <div style="background: url('<?php echo $thumbnail; ?>') no-repeat center center; background-size: cover;"></div>
                                        <?php else: ?>
                                        <div class="article-thumbnail">
                                            <div style="background: url('<?php echo get_template_directory_uri() . "/dist/images/no-image.png"; ?>') no-repeat center center; background-size: cover;"></div>
                                            <?php endif;
                                            ?>
                                        </div>
                                        <div class="article-content">
                                            <div>
                                                <h2 class="headline"><?php echo get_the_title($post['post_id']); ?></h2>
                                                <p><?php echo get_field('excerpt', $post['post_id']); ?></p>
                                                <a class="small-button vikings-button-standart"
                                                   href="<?php echo get_the_permalink($post['post_id']) ?>"><?php echo $post['link_text']; ?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                    </section>
                <?php endif; ?>
                    <?php wp_reset_query(); ?>
                <?php elseif (get_row_layout() == 'testimonials_section'):
                    $testimonialsTitle = get_sub_field('title');
                    $testimonialsSectionRepeater = get_sub_field('testimonials'); ?>

                    <?php if ($testimonialsSectionRepeater) : ?>
                    <section class="default__testimonials-section testimonials-section">
                        <h3 class="headline"><?php echo $testimonialsTitle; ?></h3>
                        <div class="container">
                            <div class="row mobile-slider">
                                <?php foreach ($testimonialsSectionRepeater as $testimonial) : ?>
                                    <div class="testimonial-item">
                                        <div class="testimonial-item__content">
                                            <p><?php echo get_field('text', $testimonial['testimonial']); ?></p>
                                        </div>
                                        <div class="testimonial-item__thumbnail"
                                             style="background-image: url('<?php echo get_the_post_thumbnail_url($testimonial['testimonial']); ?>'); background-size: cover;">
                                        </div>
                                        <div class="testimonial-item__title">
                                            <p><?php echo get_the_title($testimonial['testimonial']) ?></p>
                                        </div>
                                        <div class="testimonial-item__position">
                                            <p><?php echo get_field('position', $testimonial['testimonial']); ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
                    <?php wp_reset_query(); ?>
                <?php elseif (get_row_layout() == 'home_banner_section'):

                    $bannerTitle = get_sub_field('title');
                    $bannerText = get_sub_field('text');
                    $bannerLink = get_sub_field('link');
                    $bannerLinkText = get_sub_field('link_text');
                    $bannerSecondLink = get_sub_field('second_link');
                    $bannerSecondLinkText = get_sub_field('second_link_text'); ?>

                    <?php if ($bannerTitle) : ?>
                    <div class="default__banner-section banner-section">
                        <div class="container">
                            <h2><?php echo $bannerTitle ?></h2>
                            <p><?php echo $bannerText ?></p>
                            <?php if ($bannerLink) : ?>
                                <a target="_blank" class="small-ghost-button vikings-button-standart"
                                   href="<?php echo $bannerLink ?>"><?php echo $bannerLinkText ?></a>
                            <?php endif; ?>
                            <?php if ($bannerSecondLink) : ?>
                                <a target="_blank" class="small-ghost-button vikings-button-standart additional-button"
                                   href="<?php echo $bannerSecondLink ?>"><?php echo $bannerSecondLinkText ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                    <?php wp_reset_query(); ?>
                <?php elseif (get_row_layout() == 'get_in_touch'):
                    $formTitle = get_sub_field('title');
                    $formText = get_sub_field('text');
                    $formText = get_sub_field('text'); ?>
                    <?php if ($formText) : ?>
                    <section id="get-in-touch-form" class="default__form-section form-section">
                        <div class="container">
                            <div class="row">
                                <div class="form-description">
                                    <div>
                                        <h2 class="headline"><?php echo $formTitle ?></h2>
                                        <p><?php echo $formText; ?></p>
                                    </div>
                                </div>
                                <div class="form-content">
                                    <?php echo do_shortcode('[gravityform id=1 title=false description=false ajax=true]'); ?>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
                    <?php wp_reset_query(); ?>
                <?php elseif (get_row_layout() == 'title_and_text_section'):
                    $titleAndTextTitle = get_sub_field('title');
                    $titleAndTextText = get_sub_field('text'); ?>

                    <?php if ($titleAndTextTitle) : ?>
                    <section class="default__title-and-text-section title-and-text-section">
                        <div class="container">
                            <div class="row">
                                <h2 class="headline"><?php echo $titleAndTextTitle; ?></h2>
                                <p><?php echo $titleAndTextText; ?>
                                    <?php if (get_sub_field('link_')[0] == 'yes') : ?>
                                        <br>
                                        <a target="_blank" class="small-button vikings-button-standart"
                                           href="<?php the_sub_field('link_to'); ?>"><?php the_sub_field('link_text') ?></a>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
                    <?php wp_reset_query(); ?>
                <?php elseif (get_row_layout() == 'hosting_alternatives'):

                    $hostingTitle = get_sub_field('title');
                    $hostingSubTitle = get_sub_field('subtitle');
                    $hostingPrices = get_sub_field('prices'); ?>

                    <?php if ($hostingPrices) : ?>
                    <section class="default__hosting-alternatives-section hosting-alternatives-section">
                        <div class="container">
                            <div class="row">
                                <h2 class="headline"><?php echo $hostingTitle; ?></h2>
                                <h4><span><?php echo $hostingSubTitle; ?></span></h4>
                                <div class="hosting-alternatives__plans mobile-slider">
                                    <?php foreach ($hostingPrices as $plan) : ?>
                                        <div class="hosting-plan">
                                            <h3 class="headline"><?php echo $plan['title']; ?></h3>
                                            <div class="hosting-plan-price">
                                                <?php echo $plan['price']; ?>
                                            </div>
                                            <p class="hosting-plan-description">
                                                <?php echo $plan['description']; ?>
                                            </p>
                                            <?php if ($plan['services_list']) : ?>
                                                <ul>
                                                    <?php foreach ($plan['services_list'] as $service) : ?>
                                                        <li><p><?php echo $service['item']; ?></p></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                            <a class="vikings-button-standart large-button"
                                               href="<?php echo $plan['link_to']; ?>"><?php echo $plan['button_text']; ?></a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
                    <?php wp_reset_query(); ?>
                <?php elseif (get_row_layout() == 'blocks_section'):
                    $blocksSection = get_sub_field('blocks') ?>
                    <?php if ($blocksSection) : ?>
                    <section class="default__blocks-section blocks-section">
                        <div class="container">
                            <div class="row mobile-slider">
                                <?php foreach ($blocksSection as $block): ?>
                                    <div class="block-item">
                                        <div>
                                            <h3 class="headline">
                                                <?php echo $block['title']; ?>
                                            </h3>
                                            <p>
                                                <?php echo $block['text']; ?>
                                            </p>
                                            <a class="vikings-button-text"
                                               href="<?php echo $block['link']; ?>"><?php echo $block['link_text']; ?></a>
                                        </div>
                                    </div>
                                <?php endforeach;; ?>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
                    <?php wp_reset_query(); ?>
                <?php elseif (get_row_layout() == 'accordion_section'):
                    $accordionSectionTitle = get_sub_field('title');
                    $accordionSectionItems = get_sub_field('accordion_items') ?>
                    <?php if ($accordionSectionItems) : ?>
                    <section class="default__accordion-section accordion-section">
                        <div class="container">
                            <h3 class="headline">
                                <?php echo $accordionSectionTitle; ?>
                            </h3>
                            <div class="row">
                                <div class="accordion-items">
                                    <?php $count = count($accordionSectionItems);
                                    $counter = 0; ?>
                                    <?php foreach ($accordionSectionItems

                                    as $item):
                                    $counter++; ?>

                                    <div class="accordion-item">
                                        <div>
                                            <h5>
                                                <?php echo $item['title']; ?>
                                            </h5>
                                            <p>
                                                <?php echo $item['content']; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <?php if (intVal($count / 2 + 1) === $counter) : ?>
                                </div>
                                <div class="accordion-items">
                                    <?php endif; ?>
                                    <?php endforeach;; ?>

                                </div>
                            </div>
                    </section>
                <?php endif; ?>
                    <?php wp_reset_query(); ?>
                <?php elseif (get_row_layout() == 'hosting_alternatives_with_tabs'):
                    $accordionSectionWithTabs = get_sub_field('tabs') ?>

                    <?php if ($accordionSectionWithTabs) : ?>
                    <section
                            class="default__hosting-alternatives-section hosting-alternatives-section hosting-alternatives-section__with-tabs">
                        <?php $counter = 0; ?>
                        <div class="hosting-tabs">
                            <div class="container">
                                <div class="row tabs-row">
                                    <?php foreach ($accordionSectionWithTabs as $tab) : $counter++; ?>
                                        <div data-tab="<?php echo $counter; ?>"
                                             class="hosting-tab-title <?php echo $counter == 1 ? 'active-tab' : '' ?>">
                                            <span><?php echo $tab['title']; ?></span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <?php $counter = 0; ?>
                        <div class="container">
                            <div class="row">
                                <div class="hosting-alternatives__plans">
                                    <?php foreach ($accordionSectionWithTabs as $tab) : $counter++; ?>
                                        <div data-tab="<?php echo $counter; ?>"
                                             class="hosting-tab <?php echo $counter == 1 ? 'active-tab' : '' ?>">
                                            <div class="tab-content">
                                                <?php foreach ($tab['prices'] as $plan) : ?>
                                                    <div class="hosting-plan">
                                                        <h3 class="headline"><?php echo $plan['title']; ?></h3>
                                                        <div class="hosting-plan-price">
                                                            <?php echo $plan['price']; ?>
                                                        </div>
                                                        <p class="hosting-plan-description">
                                                            <?php echo $plan['description']; ?>
                                                        </p>
                                                        <?php if ($plan['services']) : ?>
                                                            <ul>
                                                                <?php foreach ($plan['services'] as $service) : ?>
                                                                    <li><p><?php echo $service['item']; ?></p></li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                        <a class="vikings-button-standart large-button"
                                                           href="<?php echo $plan['link']; ?>"><?php echo $plan['button_text']; ?></a>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
                    <?php wp_reset_query(); ?>
                <?php elseif (get_row_layout() == 'check_section'):
                    $checkboxSection = get_sub_field('rows_checkbox') ?>
                    <?php if ($checkboxSection) : ?>
                    <section class="default__checkboxes-section checkboxes-section">
                        <div class="container">
                            <?php foreach ($checkboxSection as $row) : ?>
                                <h3 class="headline"><?php echo $row['title']; ?></h3>
                                <div class="row">
                                    <?php foreach ($row['check_item'] as $checkItem) : ?>
                                        <div class="checkbox-item">
                                            <p class="check"><?php echo $checkItem['item']; ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endif; ?>

                <?php elseif (get_row_layout() == 'wysiwyg_editor_section'):
                    $content = get_sub_field('content_editor') ?>
                    <?php if ($content) : ?>
                    <section class="default__content-section content-section">
                        <div class="container">
                            <div class="row">
                                <?php echo $content; ?>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>


                <?php endif; ?>
            <?php endwhile;
        endif; ?>
    </div>
<?php
get_footer();
