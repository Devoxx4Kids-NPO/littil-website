<?php

/**
 * Template Name: Courses
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
        <article id="page-<?php the_ID(); ?>" <?php post_class('section-main-page'); ?> role="article">
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

<!-- START gallery section -->
<?php get_template_part('template-parts/section', 'courses'); ?>
<!-- END gallery section -->

<?php get_footer(); ?>