<?php

/*
 * Template Name: Home Page Template
 */
?>
<?php get_header(); ?>

<!-- START banner section -->
<?php get_template_part('template-parts/home/home', 'banner'); ?>
<!-- END banner section -->

<?php
/* Show the main page content. 
** Show only if page content present
** Check excerpt because content always returns comments
*/
if (have_posts()) :
    while (have_posts()) : the_post();
        // If no page content, no section/space should be there 
        if (!empty(get_the_excerpt()) || strlen(trim(get_the_excerpt()) > 0)) {
            ?>
            <section id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-content-box oct-home-content"> <?php the_content(); ?> </div>
                            <?php edit_post_link('edit', '<p>', '</p>'); ?>
                        </div>
                    </div>
                </div>
            </section>
<?php
        } else {
            // If no page content, still need this for visual composer like editor access on frontend
            the_content();
            edit_post_link('edit', '<span>', '</span>');
        }
    endwhile;
endif;
?>

<!-- START features section -->
<?php get_template_part('template-parts/home/home', 'features'); ?>
<!-- END features section -->

<!-- START facilities section -->
<?php get_template_part('template-parts/home/home', 'facilities'); ?>
<!-- END facilities section -->

<!-- START events section -->
<?php get_template_part('template-parts/home/home', 'events'); ?>
<!-- END events section -->

<!--- START testimonial Section --->
<?php get_template_part('template-parts/home/home', 'testimonial'); ?>
<!--- END testimonial Section --->

<!-- START gallery section -->
<?php get_template_part('template-parts/home/home', 'gallery'); ?>
<!-- END gallery section -->

<!-- START footer section -->
<?php get_footer(); ?>
<!-- END footer section -->