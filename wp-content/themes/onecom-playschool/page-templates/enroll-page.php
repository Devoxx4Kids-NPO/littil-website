<?php

/**
 * Template Name: Enroll
 *
 * @package Playschool
 */

get_header();

$enroll_section_content = get_post_meta(get_the_ID(), 'enroll_section_content', true);
?>

<!-- Get header title -->
<section class="page-header">
    <div class="container-fluid">
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

<!-- START Page Content -->
<section class="oct-enroll" role="main">

    <div class="container">
        <div class="row">
            <!-- Enroll Content -->
            <div class="col-md-6">
                <div class="section-box">
                    <?php if (strlen($enroll_section_content)) { ?>
                        <div class="enroll-description">
                            <?php echo $enroll_section_content; ?>
                        </div>
                    <?php } ?>
                    <div class="circle-box">
                        <ul class="circle-list">
                            <?php
                            $contact_info_blocks_switch = get_post_meta(get_the_ID(), 'enroll_info_section_switch', true);
                            $enroll_info_block = get_post_meta(get_the_ID(), 'enroll_info_block', true);
                            if (!empty($enroll_info_block) && $contact_info_blocks_switch != 'off') {
                                ?>
                                <?php foreach ($enroll_info_block as $info_block) {
                                        if (!empty($info_block['title']) && $info_block['info_block_content']) {
                                            ?>
                                        <li title="<?php echo $info_block['title']; ?>">
                                            <?php echo $info_block['info_block_content']; ?>
                                        </li>
                            <?php }
                                }
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Enroll Form -->
            <div class="col-md-6">
                <!-- START form section -->
                <?php get_template_part('template-parts/section', 'enroll-form'); ?>
                <!-- END form section -->
            </div>

        </div>
    </div>
</section>

<!-- END Page Content -->

<?php get_footer(); ?>