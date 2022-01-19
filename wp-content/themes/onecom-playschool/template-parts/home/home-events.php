<?php

/**
 * Section Events
 */

if (get_post_meta(get_the_ID(), 'event_section_switch', true) != 'off') {
    $event_section_title  =  get_post_meta(get_the_ID(), 'event_section_title', true);
    $list_class = (ot_get_option('show_blog_thumb') != 'off' ? 'col-md-8' : 'col-md-12'); // returns true
    $event_ids = get_post_meta(get_the_ID(), 'event_list_ids', true);
    $button_label = get_post_meta(get_the_ID(), 'event_button_label', true);
    $button_link = get_post_meta(get_the_ID(), 'event_button_link', true);

    ?>
    <section class="oct-event" role="main">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2><?php echo $event_section_title; ?></h2>
                    </div>
                </div>
            </div>
            <?php
                /* Events List */
                $args = array(
                    'post_type' => array('event'),
                    'post_status' => array('publish'),
                    'nopaging' => false,
                    'posts_per_page' => '10',
                    'post__in' => $event_ids
                );

                $events = new WP_Query($args);

                while ($events->have_posts() && !empty($event_ids)) : $events->the_post();
                    $event_address = get_post_meta(get_the_ID(), 'address', true);
                    $event_schedule = get_post_meta(get_the_ID(), 'schedule', true);
                    $image_text_1 = get_post_meta(get_the_ID(), 'image_text_1', true);
                    $image_text_2 = get_post_meta(get_the_ID(), 'image_text_2', true);
                    ?>
                <div class="row no-gutters section-content-box">
                    <?php if (ot_get_option('show_blog_thumb') != 'off') { ?>
                        <div class="col-md-4 pr-0">
                            <figure class="featured-media">
                                <?php
                                            /* Check if featured video enabled or featured image exists, else set default image. */
                                            if (has_post_thumbnail()) {
                                                the_post_thumbnail('org-medium', array('class' => 'img-fluid'));
                                            } else {
                                                ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image-not-found-960x640.png" alt="<?php the_title(); ?>" class='img-fluid' />
                                <?php }
                                            ?>
                                <?php if (!empty($image_text_1) || !empty($image_text_2)) { ?>
                                    <div class="img-text">
                                        <span> <?php echo  $image_text_1; ?> </span>
                                        <span> <?php echo  $image_text_2; ?> </span>
                                    </div>
                                <?php } ?>
                            </figure>
                        </div>
                    <?php } ?>
                    <div class="<?php echo $list_class; ?> section-content-right">
                        <div class="section-content">
                            <h3>
                                <?php the_title(); ?>
                            </h3>
                            <!-- Post content excerpt -->
                            <div class="featured-content">
                                <?php the_content(); ?>
                            </div>
                            <ul class="content-meta">
                                <?php if (!empty($event_address)) { ?>
                                    <li class="address">
                                        <span>
                                            <img alt="<?php echo $event_address; ?>" src="<?php echo get_template_directory_uri() ?>/assets/images/icon-location.png" />
                                        </span>
                                        <?php echo $event_address; ?>
                                    </li>
                                <?php }
                                        if (!empty($event_schedule)) {
                                            ?>
                                    <li class="event_schedule">
                                        <span>
                                            <img alt="<?php echo $event_schedule; ?>" src="<?php echo get_template_directory_uri() ?>/assets/images/icon-timer.png" />
                                        </span>
                                        <?php echo $event_schedule; ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php
                if (!empty($button_label)) {
                    if ('' == $button_link) {
                        $button_link = get_permalink(get_page_by_path('contact'));
                    }
                    ?>
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="section-button-box">
                            <a class="btn oct-btn-primary" href="<?php echo $button_link; ?>">
                                <?php echo $button_label; ?>
                            </a>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </section>
<?php }
