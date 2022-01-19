<?php

/**
 * Section Stats/Counter
 */

$stats_section_switch       =   get_post_meta(get_the_ID(), 'stats_section_switch', true);
$stats_section_bg           =   get_section_background_image('stats_section_bg');
$stats_section_title_1      =   get_post_meta(get_the_ID(), 'stats_section_title_1', true);
$stats_section_title_2      =   get_post_meta(get_the_ID(), 'stats_section_title_2', true);
?>

<?php if ($stats_section_switch != 'off') {
    ?>
<section class="section-stats section-bg d-flex" style="background-image: url(<?php echo $stats_section_bg; ?>);">
    <div class="container justify-content-center align-self-center">
        <div class="row">
            <div class="col-md-5">
                <h2><?php echo $stats_section_title_1; ?></h2>
                <h2><?php echo $stats_section_title_2; ?></h2>
            </div>
            <div class="col-md-7 justify-content-center align-self-center">
                <div class="row">
                    <?php
                        $stats_blocks = get_post_meta(get_the_ID(), 'stats_blocks', true);

                        if (!empty($stats_blocks)) {
                            foreach ($stats_blocks as $stats_block) { ?>

                    <div class="col-md-4">
                        <div class="stats-count"> <?php echo $stats_block['stats_count']; ?></div>
                        <div class="stats-title"> <?php echo $stats_block['title']; ?> </div>
                    </div>
                    <?php }
                        } ?>

                </div>
            </div>

        </div>
    </div>
</section>
<?php } ?>