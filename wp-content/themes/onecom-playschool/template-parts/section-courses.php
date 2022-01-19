<?php

/**
 * Section courses
 */

$list_class = (ot_get_option('show_blog_thumb') != 'off' ? 'col-md-6' : 'col-md-12');
?>
<section class="oct-event">
    <div class="container">
        <?php
        /* courses List */
        $args = array(
            'post_type' => array('service'),
            'post_status' => array('publish'),
            'nopaging' => false,
            'posts_per_page' => '10',
        );

        $courses = new WP_Query($args);

        while ($courses->have_posts()) : $courses->the_post();
            $course_address = get_post_meta(get_the_ID(), 'address', true);
            $course_schedule = get_post_meta(get_the_ID(), 'schedule', true);
            $image_text_1 = get_post_meta(get_the_ID(), 'image_text_1', true);
            $image_text_2 = get_post_meta(get_the_ID(), 'image_text_2', true);
            $button_label = get_post_meta(get_the_ID(), 'page_button_label', true);
            $button_link = get_post_meta(get_the_ID(), 'page_button_link', true);
            ?>
            <div class="row section-content-box">
                <?php if (ot_get_option('show_blog_thumb') != 'off') { ?>
                    <div class="col-md-6">
                        <figure class="featured-media">
                            <?php
                                    // Check if featured featured image exists, else set default image.
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail('oct-medium', array('class' => 'img-fluid'));
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
                <div class="<?php echo $list_class; ?> no-gutters">
                    <div class="">
                        <h3>
                            <?php the_title(); ?>
                        </h3>
                        <!-- Post content excerpt -->
                        <div class="featured-content">
                            <?php the_content(); ?>
                        </div>
                        <ul class="content-meta">
                            <?php if (strlen($course_address)) { ?>
                                <li class="address">
                                    <span>
                                        <img alt="<?php echo $course_address; ?>" src="<?php echo get_template_directory_uri() ?>/assets/images/icon-location.png" />
                                    </span>
                                    <?php echo $course_address; ?>
                                </li>
                            <?php } ?>
                            <?php if (strlen($course_schedule)) { ?>
                                <li class="schedule">
                                    <span>
                                        <img alt="<?php echo $course_schedule; ?>" src="<?php echo get_template_directory_uri() ?>/assets/images/icon-timer.png" />
                                    </span>
                                    <?php echo $course_schedule; ?>
                                </li>
                            <?php } ?>
                        </ul>
                        <?php
                            if (!empty($button_label)) {
                                if('' == $button_link){
                                    $button_link = get_permalink( get_page_by_path( 'enroll' ) );
                                }
                                ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="section-button-box">
                                        <a class="btn oct-btn-primary" href="<?php echo $button_link; ?>">
                                            <?php echo $button_label; ?>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</section>