<?php

/**
 * Section Gallery
 */

if (get_post_meta(get_the_ID(), 'gallery_section_switch', true) != 'off') { ?>
<?php

    $gallery_images = get_post_meta(get_the_ID(), 'gallery_images', true);
    $gallery_link = get_post_meta(get_the_ID(), 'gallery_link', true);
    $gallery_link_text = get_post_meta(get_the_ID(), 'gallery_link_text', true);
    ?>
<section class="text-center oct-gallery" role="main">
    <div class="container">
        <div class="row">
            <!-- Content -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2>
                        <?php echo get_post_meta(get_the_ID(), 'gallery_section_title', true); ?>
                    </h2>
                </div>
                <div class="section-content">
                    <?php echo get_post_meta(get_the_ID(), 'gallery_section_description', true); ?>
                </div>
                <div class="gallery-box">
                    <?php echo do_shortcode($gallery_images); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>