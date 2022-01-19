<?php

/**
 * Section team
 */

$team_section_switch    =   get_post_meta(get_the_ID(), 'team_section_switch', true);
$team_section_title     =   get_post_meta(get_the_ID(), 'team_section_title', true);
?>

<?php
/* Display team section content if enabled */

if (get_post_meta(get_the_ID(), 'team_section_switch', true) != 'off') {
    $team_blocks = get_post_meta(get_the_ID(), 'team_blocks', true);
    if (!empty($team_blocks)) {
        ?>
        <section class="oct-team">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2><?php echo $team_section_title; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row section-columns">
                    <?php foreach ($team_blocks as $team_block) { ?>
                        <div class="col-md-6">
                            <div class="person-box" style="background-color:<?php echo $team_block['block_bg_color']; ?>">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span class="section-box-icon">
                                            <?php
                                                        $person_picture_id = $team_block['person_picture'];
                                                        $person_picture_url = wp_get_attachment_image_src($person_picture_id, 'icon-thumb');
                                                        if (!empty($person_picture_url)) {
                                                            $person_picture_url = $person_picture_url[0];
                                                            $person_picture_alt = get_post_meta($person_picture_id, '_wp_attachment_image_alt', true);
                                                            ?>
                                                <img class="icon-thumb" src="<?php echo $person_picture_url; ?>" alt="<?php echo $person_picture_alt; ?>" />
                                            <?php }
                                                        ?>
                                        </span>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="section-box-title">
                                            <h3 style="color:<?php echo $team_block['block_title_color']; ?>"> <?php echo $team_block['title']; ?> </h3>
                                        </div>
                                        <div class="section-box-content" style="color:<?php echo $team_block['block_role_color']; ?>">
                                            <?php echo nl2br($team_block['person_role']); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                            ?>
                </div>
            </div>
        </section>
<?php
    }
}
