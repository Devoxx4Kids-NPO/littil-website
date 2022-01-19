<section class="oct-head-bar">
    <div class="container">
        <div class="row d-md-none">
            <div class="col-1">
                <button class="menu-toggle mobile-only" aria-controls="sticky_menu" aria-expanded="false">Menu</button>
            </div>
        </div>
        <div class="row d-md-flex">
            <div class="col-12 col-md-3">
                <div class="oct-site-logo">
                    <?php if ('off' != ot_get_option('logo_switch')) { ?>

                        <h1 class="site-title">
                            <a href="<?php echo home_url('/'); ?>" rel="home">
                                <?php
                                    $logo = ot_get_option('logo_img');
                                    if (strlen($logo)) {
                                        printf('<img src="%s" alt="%s" role="logo" />', $logo, get_bloginfo('name'));
                                    } else {  ?>
                                    <div class="logo-text-1">
                                        <?php echo get_bloginfo('title'); ?>
                                    </div>
                                <?php }
                                    ?>
                            </a>
                        </h1>

                    <?php } else {
                        ?>
                        <div class="logo-text-1">
                            <?php echo ot_get_option('header_logo_text_1'); ?>
                        </div>
                        <div class="logo-text-2">
                            <?php echo ot_get_option('header_logo_text_2'); ?>
                        </div>
                        <div class="logo-text-3">
                            <?php echo ot_get_option('header_logo_text_3'); ?>
                        </div>
                    <?php } ?>
                </div>
                
            </div>
            <?php dynamic_sidebar('sidebar-5'); ?>


            <div class="col-12 col-md-1">
            </div>

        </div>
    </div>
</section>