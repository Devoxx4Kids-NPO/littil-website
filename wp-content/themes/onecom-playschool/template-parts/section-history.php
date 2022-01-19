<?php

/**
 * Section History
 */

$history_section_content = get_post_meta(get_the_ID(), 'history_section_content', true);

if (get_post_meta(get_the_ID(), 'history_section_switch', true) != 'off') {
?>

<!-- START Page Content -->
<section class="oct-history" role="main">

    <!-- START Single CPT -->
    <article id="">
        <div class="container">
            <div class="row">
                <!-- Featured video -->
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2>
                            Our History
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Featured video -->
                <div class="col-md-6">
                    <div class="history-content">
                        <figure class="oct-featured-media">
                            <?php
                            // Check if featured video enabled or featured image exists, else set default image.
                            if (get_post_meta(get_the_ID(), 'featured_video_switch', true) == 'on') {
                                $featured_video_url = get_post_meta(get_the_ID(), 'featured_video_url', true);
                                echo do_shortcode("[video src='" . $featured_video_url . "']");
                            }
                            ?>
                        </figure>
                        <div class="oct-page-content-box">
                            <div class="oct-page-content">
                                <?php
                                echo $history_section_content;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="col-md-6">
                    <div class="timeline-box">
                        <ul class="timeline-list">
                            <?php
                            $timeline_blocks = get_post_meta(get_the_ID(), 'timeline_blocks', true);

                            if (!empty($timeline_blocks)) {
                                foreach ($timeline_blocks as $timeline_block) { ?>
                            <li title="<?php echo $timeline_block['title']; ?> ">
                                <p><?php echo nl2br($timeline_block['timeline_content']); ?></p>
                            </li>
                            <?php }
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </article>

</section>

<!-- END Page Content -->

<?php
}
?>