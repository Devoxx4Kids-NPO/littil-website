<?php

/**
 * Template Name: About Page
 *
 * @package Playschool
 */

get_header();
$button_label = get_post_meta(get_the_ID(), 'page_button_label', true);
$button_link = get_post_meta(get_the_ID(), 'page_button_link', true);
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

<?php if (have_posts()) the_post(); ?>

<!-- START Page Content -->
<section class="oct-main-section about-section" role="main">

    <article id="page-<?php the_ID(); ?>" <?php post_class('oct-main-content'); ?>>
        <div class="container">
            <div class="row">
                <!-- Featured Image -->
                <?php if (has_post_thumbnail()) { ?>
                    <div class="col-md-6">
                        <figure class="oct-featured-media">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('org-page-featured', array('class' => 'featured-image')); ?>
                            </a>
                        </figure>
                    </div>
                <?php } ?>

                <!-- Content -->
                <div class="<?php echo (has_post_thumbnail()) ? 'col-md-6' : 'col-md-12'; ?>">
                    <div class="oct-page-content-box">
                        <div class="oct-page-content">
                            <?php
                            the_content();
                            if (!empty($button_label)) {
                                if('' == $button_link){
                                    $button_link = get_permalink( get_page_by_path( 'contact' ) );
                                }
                                ?>
                                <div class="oct-button-box">
                                    <a class="btn oct-btn-primary" href="<?php echo $button_link; ?>">
                                        <?php echo $button_label; ?>
                                    </a>
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>

</section>

<!-- END Page Content -->

<!-- START section history container -->
<?php get_template_part('template-parts/section', 'history'); ?>
<!-- END section history container -->

<!-- START section stats container -->
<?php get_template_part('template-parts/section', 'stats'); ?>
<!-- END section stats container -->

<!-- START section team container -->
<?php get_template_part('template-parts/section', 'team'); ?>
<!-- END section container -->

<?php get_footer(); ?>