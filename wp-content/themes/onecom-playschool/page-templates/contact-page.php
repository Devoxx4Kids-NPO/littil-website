<?php

/**
 * Template Name: Contact
 *
 * @package Playschool
 */

get_header();
?>

<!-- Get header title -->
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-title text-center">
                    <h1>
                    <?php the_title(); ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
// Show page content.
if (have_posts()) :
    while (have_posts()) : the_post();
        ?>
        <article id="page-<?php the_ID(); ?>" <?php post_class('oct-page'); ?> role="article">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-content-box"> <?php the_content(); ?> </div>
                        <?php edit_post_link('edit', '<p>', '</p>'); ?>
                    </div>
                </div>
            </div>
        </article>
<?php
    endwhile;
endif;
?>
<!-- END Page Content -->

<!-- START Contact Content -->
<section class="oct-contact-section" role="main">

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="contact-info-box">
                    <div class="contact-map">
                        <?php echo get_post_meta(get_the_ID(), 'map_section_code', true); ?>
                    </div>
                    <?php $contact_info_blocks_switch = get_post_meta(get_the_ID(), 'contact_info_blocks_switch', true);
                    $contact_info_blocks = get_post_meta(get_the_ID(), 'contact_info_blocks', true);
                    if (!empty($contact_info_blocks) && $contact_info_blocks_switch != 'off') :
                        ?>
                        <div id="one_icon_box_widget-2" class="widget widget_one_icon_box_widget">
                            <?php foreach ($contact_info_blocks as $contact_block) : ?>

                                <div class="one-icon-box">
                                    <div class="one-icon-box-top icon-align-left">
                                        <div class="one-icon-box-main-icon">
                                            <?php
                                                    $icon_id = $contact_block['feature_icon'];
                                                    $icon_url = wp_get_attachment_image_src($icon_id, 'icon-thumb');
                                                    if (!empty($icon_url)) {
                                                        $icon_img_url = $icon_url[0];
                                                        $icon_alt = get_post_meta($icon_id, '_wp_attachment_image_alt', true);
                                                        ?>
                                                <img class="icon-thumb" src="<?php echo $icon_img_url; ?>" alt="<?php echo $icon_alt; ?>" />
                                            <?php }
                                                    ?>
                                        </div>
                                        <div class="one-icon-box-description">
                                            <?php if (strlen($contact_block['title'])) { ?>
                                                <h4 class="one-icon-box-title">
                                                    <?php
                                                                echo $contact_block['title'];
                                                                ?>
                                                </h4>
                                            <?php } ?>
                                            <div class="one-icon-box-description-inner">
                                                <?php echo $contact_block['block_content']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-md-6">
                <!-- START form section -->
                <?php get_template_part('template-parts/section', 'contact-form'); ?>
                <!-- END form section -->
            </div>
        </div>

    </div>
</section>

<!-- END Page Content -->

<?php get_footer(); ?>