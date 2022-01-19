<?php

/**
 * Single post/cpt main content
 */

 ?>

<div class="col-md-12">
    <article id="post-<?php the_ID(); ?>" <?php post_class('oct-main-content'); ?>>

        <!-- Starts Featured image -->
        <?php
        // Check if featured video enabled or featured image exists, else set default image.
        if (has_post_thumbnail()) { ?>
        <figure class="featured-media">
            <?php
                the_post_thumbnail('oct-medium', array('class' => 'img-fluid'));
                ?>
        </figure>
        <?php }
        ?>
        <!-- Ends Featured image -->

        <!-- Page/Post Title -->
        <h1 class="oct-post-title">
            <?php the_title(); ?>
        </h1>
        <!-- Ends Page/Post title -->

        <!-- Starts Post meta -->
        <?php get_template_part('template-parts/post', 'meta'); ?>
        <!-- Ends post meta -->

        <!-- Starts Post content excerpt -->
        <div class="oct-post-content">
            <?php
            the_content();
            edit_post_link(' edit', '<div class="clearfix">', '</div>');
            ?>
        </div>

        <!--  Tags -->
        <?php if (!empty(wp_get_post_tags(get_the_ID()))) : ?>
        <div class="oct-post-tags">
            <?php the_tags('<i class="dashicons dashicons-tag"></i> Tags: ', ' '); ?>
        </div>

        <?php endif; ?>
        <?php
        the_post_navigation(
            array(
                'prev_text' => __('Previous', OC_TEXT_DOMAIN),
                'next_text' => __('Next', OC_TEXT_DOMAIN),
            )
        );

        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>
    </article>
</div>