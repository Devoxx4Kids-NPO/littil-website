<?php

/**
 * Section Gallery
 */

$testimonial_section_switch     =   get_post_meta(get_the_ID(), 'testimonial_section_switch', true);
$testimonial_section_bg         =   get_section_background_image('testimonial_section_bg');
$testimonial_section_title      =   get_post_meta(get_the_ID(), 'testimonial_section_title', true);
$testimonial_section_content    =   get_post_meta(get_the_ID(), 'testimonial_section_content', true);
$apt_link                       =   get_post_meta(get_the_ID(), 'testimonial_section_btn_link', true);
$testimonial_section_btn_title  =   get_post_meta(get_the_ID(), 'testimonial_section_btn_title', true);
?>

<?php if ($testimonial_section_switch != 'off') {
    ?>
<section class="oct-testimonial d-flex text-center" style="background-image: url(<?php echo $testimonial_section_bg; ?>);">
    <div class="container justify-content-center align-self-center">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2><?php echo $testimonial_section_title; ?></h2>
                </div>
                <div class="section-content">
                    <?php onecom_edit_icon('page_meta', '#setting_testimonial_section', get_the_ID()); ?>
                    <?php echo nl2br($testimonial_section_content); ?>
                </div>

                <div class="section-button">
                    <?php
                        if ('#' == $apt_link || '' == $apt_link) {
                            $apt_link = get_permalink(get_page_by_path('contact'));
                        }
                        ?>
                    <?php if (strlen($testimonial_section_btn_title)) : ?>
                    <a href="<?php echo $apt_link; ?>" class="button"><?php echo $testimonial_section_btn_title; ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>