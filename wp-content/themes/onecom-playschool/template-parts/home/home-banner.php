<?php

/**
 * Section Banner
 */

$home_banner_switch = get_post_meta(get_the_ID(), 'home_banner_switch', true);
$banner_align = get_post_meta(get_the_ID(), 'banner_caption_align', true);
if (!strlen($banner_align)) {
    $banner_align = 'align-center text-center';
} else if ($banner_align == 'left') {
    $banner_align = 'align-left text-left';
} else if ($banner_align == 'right') {
    $banner_align = 'align-right text-right';
} else if ($banner_align == 'center') {
    $banner_align = 'align-center text-center';
}
$banner_height = get_post_meta(get_the_ID(), 'banner_height', true);
$home_banner_image = get_section_background_image('home_banner_image');
$banner_caption_title = get_post_meta(get_the_ID(), 'banner_caption_title', true);
$banner_caption_subtitle = get_post_meta(get_the_ID(), 'banner_caption_subtitle', true);
$banner_button_label = get_post_meta(get_the_ID(), 'banner_button_label', true);
$banner_link = get_post_meta(get_the_ID(), 'banner_button_link', true);
if ('#' == $banner_link || '' == $banner_link) {
    $banner_link = get_permalink(get_page_by_path('enroll'));
}
?>

<?php if ($home_banner_switch != 'off' && (strlen($banner_caption_title) || strlen($banner_caption_subtitle) || strlen($banner_button_label) || strlen($home_banner_image))) : ?>
<section class="banner home-banner <?php echo $banner_height; ?> " role="banner" style="background-image:url(<?php echo $home_banner_image; ?>);">
    <div class="container banner-content  <?php echo $banner_align; ?>">
        <div class="banner-caption">

            <?php if (strlen($banner_caption_title)) : ?>
            <h2><?php echo $banner_caption_title; ?></h2>
            <?php endif; ?>

            <?php if (strlen($banner_caption_subtitle)) : ?>
            <div class="sub-title cursive-font"><?php echo $banner_caption_subtitle; ?></div>
            <?php endif; ?>

            <?php if (strlen($banner_button_label)) : ?>
            <div class="oct-button-box">
                <a href="<?php echo $banner_link; ?>" title="<?php echo $banner_button_label; ?>" class="btn oct-btn-primary"><?php echo $banner_button_label; ?></a>
            </div>
            <?php endif; ?>

        </div>
    </div>
</section>
<?php endif; ?>