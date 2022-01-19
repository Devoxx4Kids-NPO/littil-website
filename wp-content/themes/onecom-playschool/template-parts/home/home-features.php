<?php

/**
 * Section Features
 */

if (get_post_meta(get_the_ID(), 'features_block_switch', true) != 'off') {
    $features_blocks = get_post_meta(get_the_ID(), 'features_blocks', true);

    if (!empty($features_blocks)) {
        ?>
        <section class="oct-features white-bg text-center">
            <div class="container">
                <div class="section-columns service-columns">
                    <div class="row justify-center">
                        <?php foreach ($features_blocks as $feature_block) { ?>
                            <div class="col-lg-4 col-md-4 col-sm-6 features-col">
                                <div class="<?php echo $feature_block['feature_icon_align']; ?>">
                                    <span class="icon-text"> <?php echo $feature_block['bubble_icon_text']; ?> </span>
                                </div>
                                <div class="featured-block">
                                    <div class="featured-thumb">
                                        <?php
                                                    $icon_id = $feature_block['feature_icon'];
                                                    $icon_url = wp_get_attachment_image_src($icon_id, 'org-icon-thumb');
                                                    if (!empty($icon_url)) {
                                                        $icon_img_url = $icon_url[0];
                                                        $icon_alt = get_post_meta($icon_id, '_wp_attachment_image_alt', true);
                                                        ?>
                                            <img class="icon-thumb" src="<?php echo $icon_img_url; ?>" alt="<?php echo $icon_alt; ?>" />
                                        <?php }
                                                    ?>
                                    </div>
                                </div>
                                <div class="title-container">
                                    <h3 class="main-title"> <?php echo $feature_block['title']; ?> </h3>
                                </div>
                                <div class="feature-content">
                                    <?php echo nl2br($feature_block['block_content']); ?>
                                </div>
                            </div>
                        <?php }
                                ?>
                    </div>
                </div>
            </div>
        </section>
<?php
    }
}
