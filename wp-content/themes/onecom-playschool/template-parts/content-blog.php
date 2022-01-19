<?php

/**
 * Blog/Archive content list 
 */
?>
<!-- Post Block -->
<article class="main-content-box">

    <div class="row section-content-box">
        <!-- Featured Image -->
        <?php if (has_post_thumbnail()) { ?>
            <div class="col-md-4">
                <figure class="featured-media">
                    <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('org-medium', array('class' => 'img-fluid'));
                        } else {
                            ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image-not-found-960x640.png" alt="<?php the_title(); ?>" class='img-fluid' />
                    <?php }
                        ?>
                </figure>
            </div>
        <?php } ?>
        <!-- Main page/post content -->
        <div class="main-content <?php echo (has_post_thumbnail()) ? 'col-md-8' : 'col-md-12'; ?>">
            <header>
                <h3>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h3>
            </header>

            <!-- Post Metadata -->
            <?php if (!is_page(get_the_ID())) : ?>
                <?php get_template_part('template-parts/post', 'meta'); ?>
            <?php endif; ?>

            <!-- Content Excerpt -->
            <div class="featured-content">
                <?php echo wp_trim_words(get_the_excerpt(), 55, ' '); ?>
            </div>
            <div class="oct-button-box">
                <a class="btn oct-btn-primary" href="<?php the_permalink(); ?>">
                    <?php _e('Read More', OC_TEXT_DOMAIN); ?>
                </a>
            </div>
        </div>
    </div>

</article>