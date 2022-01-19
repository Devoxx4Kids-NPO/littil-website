<?php

/**
 * Section Facilities
 */

$facility_section_switch    =   get_post_meta(get_the_ID(), 'facility_section_switch', true);
$facility_section_title     =   get_post_meta(get_the_ID(), 'facility_section_title', true);
$facility_section_bg        =   get_section_background_image('facility_section_bg');
$facility_button_link       =   get_post_meta(get_the_ID(), 'facility_button_link', true);
$facility_button_label      =   get_post_meta(get_the_ID(), 'facility_button_label', true);
?>

<?php
/* Display facility section content if enabled */

if (get_post_meta(get_the_ID(), 'facility_section_switch', true) != 'off') {
    $facility_blocks = get_post_meta(get_the_ID(), 'facility_blocks', true);
    $count = 1;
    if (!empty($facility_blocks)) {
        ?>
        <section class="oct-facility" style="background-image: url(<?php echo $facility_section_bg; ?>);">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2><?php echo $facility_section_title; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row section-columns">
                    <?php foreach ($facility_blocks as $facility_block) { ?>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="section-box">
                                <div class="section-header">
                                    <span class="section-box-icon float-left">
                                        <?php
                                                    $icon_id = $facility_block['facility_icon'];
                                                    $icon_url = wp_get_attachment_image_src($icon_id, 'org-icon-thumb');
                                                    if (!empty($icon_url)) {
                                                        $icon_img_url = $icon_url[0];
                                                        $icon_alt = get_post_meta($icon_id, '_wp_attachment_image_alt', true);
                                                        ?>
                                            <img class="icon-thumb" src="<?php echo $icon_img_url; ?>" alt="<?php echo $icon_alt; ?>" />
                                        <?php }
                                                    ?>
                                    </span>
                                    <span class="section-box-label float-right">
                                        <?php
                                                    $count = str_pad($count, 2, "0", STR_PAD_LEFT);
                                                    echo $count; ?>
                                    </span>
                                </div>

                                <div class="section-box-title">
                                    <h4> <?php echo $facility_block['title']; ?> </h4>
                                </div>
                                <div class="section-box-content">
                                    <?php echo nl2br($facility_block['block_content']); ?>
                                </div>
                            </div>

                        </div>
                    <?php
                                $count++;
                            }
                            ?>
                </div>
                <?php
                        if (!empty($facility_button_label)) {
                            if ('' == $facility_button_link) {
                                $facility_button_link = get_permalink(get_page_by_path('courses'));
                            }
                            ?>
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="section-button">
                                <a class="btn oct-btn-secondary" href="<?php echo $facility_button_link; ?>">
                                    <?php echo $facility_button_label; ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
<?php
    }
}
