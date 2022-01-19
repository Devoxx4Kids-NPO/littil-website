<?php
/* @header("Content-type: text/css"); */

function ot_check_css_prop($prop, $val, $val2 = '')
{
    if (!(isset($prop) && strlen($prop)))
        return;

    if (isset($val) && !is_array($val) && strlen($val)) {
        if (isset($val2) && strlen($val2)) {
            return sprintf($prop, $val, $val2);
        }
        return sprintf($prop, $val);
    }
    return;
}

function ot_check_bg_css_prop($pairs)
{
    if (!(isset($pairs) && is_array($pairs)))
        return;
    $pairs = array_filter($pairs, 'strlen');
    $css = '';
    foreach ($pairs as $key => $prop) {
        $css .= ('background-image' === $key) ? sprintf('%s:url(%s);', $key, $prop) : sprintf('%s:%s;', $key, $prop);
    }
    return $css;
}

function ot_check_font_css_prop($pairs)
{
    if (!(isset($pairs) && is_array($pairs)))
        return;
    $pairs = array_filter($pairs, 'strlen');
    $css = '';
    unset($pairs['font-color']);
    foreach ($pairs as $key => $prop) {
        $css .= ('font-family' === $key) ? sprintf('%s:%s;', $key, ot_google_font_family($prop)) : sprintf('%s:%s;', $key, $prop);
    }
    return $css;
}
?>



<style type="text/css">
    <?php
    ################################
    ########  Skin Styles  #########
    ################################

    $skin_primary = ot_get_option('skin_primary');


    if (!empty($skin_primary)) {
        ?>

    /* Primary Skin Color */
    .oct-post-meta a,
    oct-post-meta a:visited,
    .widget-area a,
    .widget-area a:visited,
    .card-body h2 a,
    .card-body h2 a:visited {
        color: <?php echo $skin_primary; ?>;
    }

    /* Primary Skin Color */
    /* a:hover,
        .section-content a:hover,
        .featured-box a:hover,
        .oct-main-content a:hover,
        .widget a:hover,
        .oct-post-meta a:hover,
        .widget-area a:hover,
        .widget-area h2 a:hover,
        .card-body h2 a:hover{
            color: <?php echo $skin_primary; ?>;
        } */

    #wp-calendar thead th {
        background-color: <?php echo $skin_primary; ?>;
    }

    /* a.oct-btn-primary,
        a.oct-btn-primary:visited,
            border-color: <?php echo $skin_primary; ?> !important;
        } */
    /* a.oct-btn-primary:hover {
            background-color: <?php echo $skin_primary; ?>;
        } */

    /* .onecom-webshop-main button,
        .onecom-webshop-main button:visited{
            border-color: <?php echo $skin_primary; ?>;
            color: <?php echo $skin_primary; ?>;
        }
        .onecom-webshop-main a.button:hover,
        .onecom-webshop-main button:hover
        {
            background-color: <?php echo $skin_primary; ?> !important;
        } */

    <?php
    }

    /* Custom Color If Custom Skin ON */
    $custom_skin_switch = ot_get_option('custom_skin_switch');
    /* if ('off' != $custom_skin_switch) { */

        /* Body Text Color */
        $body_text_color = ot_get_option('body_text_color');
        if (!empty($body_text_color)) {
            echo 'body {' .
                ot_check_css_prop('color:%s;', $body_text_color) .
                '}';
            echo '.onecom-webshop-main svg {' .
                ot_check_css_prop('fill:%s;', $body_text_color) .
                '}';
        }

        /* Body CSS */
        $body_css_val = ot_get_option('body_bg');
        if (!empty($body_css_val)) {
            printf("#page{%s}", ot_check_bg_css_prop($body_css_val));
            printf("section{%s}", ot_check_bg_css_prop($body_css_val));
        }

        /* Body Image switch */
        if ('off' == ot_get_option('body_bg_image_switch')) {
            printf("#page { background-image: %s}", 'none');
        }

        /* Headings Colors - Main content only */
        $headings_colors = ot_get_option('headings_colors');
        if (!empty($headings_colors)) {
            echo 'h1  {' .
                ot_check_css_prop('color:%s;', $headings_colors['h1']) .
                '}';
            echo 'h2{' .
                ot_check_css_prop('color:%s;', $headings_colors['h2']) .
                '}';
            echo 'h3{' .
                ot_check_css_prop('color:%s;', $headings_colors['h3']) .
                '}';
            echo 'h4{' .
                ot_check_css_prop('color:%s;', $headings_colors['h4']) .
                '}';
            echo 'h5{' .
                ot_check_css_prop('color:%s;', $headings_colors['h5']) .
                '}';
            echo 'h6{' .
                ot_check_css_prop('color:%s;', $headings_colors['h6']) .
                '}';
        }

        /* Body Text Color */
        $page_title_color = ot_get_option('page_main_title_color');
        if (!empty($page_title_color)) {
            echo '.main-title{' .
                ot_check_css_prop('color:%s;', $page_title_color) .
                '}';
        }

        /* Link Colors */
        $link_colors = ot_get_option('body_link_color');

        if (!empty($link_colors)) {
            echo 'a, .page .oct-post-content a, .single .oct-post-content a,.section-content a, .featured-box a, .oct-main-content a, .widget a, .textwidget a, .service-details a{' .
                ot_check_css_prop('color:%s;', $link_colors['link']) .
                '}';
            echo 'a:active, .page .oct-post-content a:active, .single .oct-post-content a:active, .section-content a:active, .featured-box a:active, .oct-main-content a:active, .widget a:active, .textwidget a:active, .service-details a:active{' .
                ot_check_css_prop('color:%s;', $link_colors['active']) .
                '}';

            echo 'a:visited, .page .oct-post-content a:visited, .single .oct-post-content a:visited, .section-content a:visited, .featured-box a:visited, .oct-main-content a:visited, .widget a:visited, .textwidget a:visited, .service-details a:visited{' .
                ot_check_css_prop('color:%s;', $link_colors['visited']) .
                '}';
            echo 'a:hover, .page .oct-post-content a:hover, .single .oct-post-content a:hover, .section-content a:hover, .featured-box a:hover, .oct-main-content a:hover, .widget a:hover, .oct-post-meta a:hover, .widget-area a:hover, .widget-area h2 a:hover, .card-body h2 a:hover{' .
                ot_check_css_prop('color:%s;', $link_colors['hover']) .
                '}';
        }

        /* Primary Buttons Colors */
        $primary_buttons_color = ot_get_option('primary_buttons_color');

        if (!empty($primary_buttons_color)) {
            echo '.oct-btn-primary, .oct-btn-primary:visited, .oct-btn-primary:active,
                a.oct-btn-primary, a.oct-btn-primary:visited, a.oct-btn-primary:active,
                input[type="submit"]{' .
                ot_check_css_prop('color:%s;', $primary_buttons_color['link']) .
                ot_check_css_prop('background-color:%s;', $primary_buttons_color['active']) .
                '}';
            echo '.oct-btn-primary:hover, a.oct-btn-primary:hover,input[type="submit"]:hover {' .
                ot_check_css_prop('color:%s;', $primary_buttons_color['hover']) .
                ot_check_css_prop('background-color:%s;', $primary_buttons_color['visited']) .
                '}';

            // Webshp buttons
            echo '.onecom-webshop-main a.button, .onecom-webshop-main button, .onecom-webshop-main a.button:visited{' .
                ot_check_css_prop('color:%s;', $primary_buttons_color['link']) .
                ot_check_css_prop('background-color:%s;', $primary_buttons_color['active']) .
                '}';
            echo '.onecom-webshop-main a.button:hover, .onecom-webshop-main button:hover{' .
                ot_check_css_prop('color:%s !important;', $primary_buttons_color['hover']) .
                ot_check_css_prop('background-color:%s !important;', $primary_buttons_color['visited']) .
                '}';
            echo '.onecom-webshop-main a.button.button-back {' .
                ot_check_css_prop('color:%s; ', $primary_buttons_color['link']) .
                ot_check_css_prop('background-color:%s;', $primary_buttons_color['active']) .
                '}';

            $primary_buttons_border = ot_get_option('primary_buttons_border');
            $primary_buttons_border_rad = ot_get_option('primary_buttons_border_rad');
            $borderWidth = '';
            if(!empty($primary_buttons_border['width']) && !empty($primary_buttons_border['unit'])){
                $borderWidth = ot_check_css_prop('border-width:%s%s;', $primary_buttons_border['width'], $primary_buttons_border['unit']);
            }

            if (!empty($primary_buttons_border_rad)) {
                echo '.oct-btn-primary{' .
                    $borderWidth .
                    ot_check_css_prop('border-style:%s;', $primary_buttons_border['style']) .
                    ot_check_css_prop('border-color:%s;', $primary_buttons_border['color']) .
                    ot_check_css_prop('border-radius:%s;', $primary_buttons_border_rad . 'px') .
                    '}';
            }
        }

        /* Secondary Buttons Colors */
        $secondary_buttons_color = ot_get_option('secondary_buttons_color');

        if (!empty($secondary_buttons_color)) {
            echo '.oct-btn-secondary, .oct-btn-secondary:visited, .oct-btn-secondary:active{' .
                ot_check_css_prop('color:%s;', $secondary_buttons_color['link']) .
                ot_check_css_prop('background-color:%s;', $secondary_buttons_color['active']) .
                '}';
            echo '.oct-btn-secondary:hover{' .
                ot_check_css_prop('color:%s;', $secondary_buttons_color['hover']) .
                ot_check_css_prop('background-color:%s;', $secondary_buttons_color['visited']) .
                '}';

            $secondary_buttons_border = ot_get_option('secondary_buttons_border');
            $secondary_buttons_border_rad = ot_get_option('secondary_buttons_border_rad');
            $borderWidth = '';
            if(!empty($secondary_buttons_border['width']) && !empty($secondary_buttons_border['unit'])){
                $borderWidth = ot_check_css_prop('border-width:%s%s;', $secondary_buttons_border['width'], $secondary_buttons_border['unit']);
            }

            if (!empty($secondary_buttons_border_rad)) {
                echo '.oct-btn-secondary{' .
                    $borderWidth .
                    ot_check_css_prop('border-style:%s;', $secondary_buttons_border['style']) .
                    ot_check_css_prop('border-color:%s;', $secondary_buttons_border['color']) .
                    ot_check_css_prop('border-radius:%s;', $secondary_buttons_border_rad . 'px') .
                    '}';
            }
        }

        /* Menu Background Color */
        $menu_bg_color = ot_get_option('menu_bg_color');

        if (!empty($menu_bg_color)) {
            printf(".oct-header-menu {%s}", ot_check_bg_css_prop($menu_bg_color));
        }

        /* Menu item color */
        $menu_link_color = ot_get_option('menu_link_color');

        if (!empty($menu_link_color)) {
            echo '#primary-nav ul li a{' .
                ot_check_css_prop('color:%s;', $menu_link_color['link']) .
                '}';

            echo '#primary-nav ul li:hover > a{' .
                ot_check_css_prop('color:%s;', $menu_link_color['hover']) .
                '}';

            echo '#primary-nav ul li.current_page_item a, #primary-nav ul li.current-menu-item>a, #primary-nav ul li.current-menu-parent a{' .
                ot_check_css_prop('color:%s;', $menu_link_color['active']) .
                '}';
        }

        /* Menu Item Background */
        $menu_typo_bg = ot_get_option('menu_typo_bg');
        if (!empty($menu_typo_bg)) {
            echo '#primary-nav ul li a{' .
                ot_check_css_prop('background-color:%s;', $menu_typo_bg['link']) .
                '}';

            echo '#primary-nav ul li:hover > a{' .
                ot_check_css_prop('background-color:%s;', $menu_typo_bg['hover']) .
                '}';

            echo '#primary-nav ul li.current_page_item a, #primary-nav ul li.current-menu-item>a, #primary-nav ul li.current-menu-parent a{' .
                ot_check_css_prop('background-color:%s;', $menu_typo_bg['active']) .
                '}';
        }

        /* Submenu item color */
        $submenu_link_color = ot_get_option('submenu_link_color');

        if (!empty($submenu_link_color)) {
            echo '#primary-nav ul.sub-menu li a{' .
                ot_check_css_prop('color:%s;', $submenu_link_color['link']) .
                '}';

            echo '#primary-nav ul.sub-menu li:hover > a{' .
                ot_check_css_prop('color:%s;', $submenu_link_color['hover']) .
                '}';

            echo '#primary-nav ul.sub-menu li.current_page_item a, #primary-nav ul.sub-menu li.current-menu-item a{' .
                ot_check_css_prop('color:%s;', $submenu_link_color['active']) .
                '}';
        }

        /* Submenu Item Background */
        $submenu_typo_bg = ot_get_option('submenu_typo_bg');
        if (!empty($submenu_typo_bg)) {
            echo '#primary-nav ul.sub-menu li a{' .
                ot_check_css_prop('background-color:%s;', $submenu_typo_bg['link']) .
                '}';

            echo '#primary-nav ul.sub-menu li:hover > a{' .
                ot_check_css_prop('background-color:%s;', $submenu_typo_bg['hover']) .
                '}';

            echo '#primary-nav ul.sub-menu li.current_page_item a, #primary-nav ul.sub-menu li.current-menu-item a{' .
                ot_check_css_prop('background-color:%s;', $submenu_typo_bg['active']) .
                '}';
        }

        /* Header BG */
        $header_bg = ot_get_option('header_bg');
        if (!empty($header_bg)) {
            printf(".oct-head-bar{%s}", ot_check_bg_css_prop($header_bg));
        }


        $logo_color = ot_get_option('logo_color');
        if (!empty($logo_color)) {
            echo '.oct-site-logo .logo-text-1 {' .
                ot_check_css_prop('color:%s;', $logo_color['link']) .
                '}';

            echo '.oct-site-logo .logo-text-2 {' .
                ot_check_css_prop('color:%s;', $logo_color['hover']) .
                '}';

            echo '.oct-site-logo .logo-text-3{' .
                ot_check_css_prop('color:%s;', $logo_color['active']) .
                '}';
        }

        /* Home Banner */
        $home_banner_text_color = ot_get_option('home_banner_text_color');
        if (!empty($home_banner_text_color)) {
            echo '.home-banner h2 {' .
                ot_check_css_prop('color:%s;', $home_banner_text_color['link']) .
                '}';

            echo '.home-banner .sub-title {' .
                ot_check_css_prop('color:%s;', $home_banner_text_color['hover']) .
                '}';

            echo '.home-banner {' .
                ot_check_css_prop('background-color:%s;', $home_banner_text_color['active']) .
                '}';
        }

        /* Internal Banner */
        $inner_banner_text_color = ot_get_option('inner_banner_text_color');
        if (!empty($inner_banner_text_color)) {
            echo '.page-header h1 {' .
                ot_check_css_prop('color:%s;', $inner_banner_text_color['link']) .
                '}';
        }

        $inner_banner_background = ot_get_option('inner_banner_background');
        if (!empty($inner_banner_background))
            printf("section.page-header{%s}", ot_check_bg_css_prop($inner_banner_background));

        /* Footer BG Color */
        $footer_bg = ot_get_option('footer_bg');
        if (!empty($footer_bg))
            printf("#oct-site-footer{%s}", ot_check_bg_css_prop($footer_bg));

        /* Footer Text Color */
        $footer_heading_color = ot_get_option('footer_heading_color');
        if (!empty($footer_heading_color)) {
            echo '#oct-site-footer h3{' .
                ot_check_css_prop('color:%s;', $footer_heading_color) .
                '}';
        }

        $footer_text_color = ot_get_option('footer_text_color');
        if (!empty($footer_text_color)) {
            echo '#oct-site-footer, #oct-site-footer p, #oct-site-footer h4{' .
                ot_check_css_prop('color:%s;', $footer_text_color) .
                '}';
        }

        $footer_link_color = ot_get_option('footer_link_color');

        if (!empty($footer_link_color)) {
            echo '#oct-site-footer a{' .
                ot_check_css_prop('color:%s;', $footer_link_color['link']) .
                '}';
            echo '#oct-site-footer a:active{' .
                ot_check_css_prop('color:%s;', $footer_link_color['active']) .
                '}';

            echo '#oct-site-footer a:visited{' .
                ot_check_css_prop('color:%s;', $footer_link_color['visited']) .
                '}';
            echo '#oct-site-footer a:hover{' .
                ot_check_css_prop('color:%s;', $footer_link_color['hover']) .
                '}';
        }

        /* Copyright Background Color */
        $copyright_bg = ot_get_option('copyright_bg');
        if (!empty($copyright_bg)) {
            printf("#oct-copyright {%s}", ot_check_bg_css_prop($copyright_bg));
        }

        /* Copyright Text Color */
        $copyright_color = ot_get_option('copyright_color');
        if (!empty($copyright_color)) {
            echo '#oct-copyright, #oct-copyright p{' .
                ot_check_css_prop('color:%s;', $copyright_color) .
                '}';
        }
    /* } */

    /* ################################## Header Logo Options ################################# */
    /* Header Height */
    /* $header_logo_height = ot_get_option('header_logo_height');
    if (!empty($header_logo_height)) {
        echo '.oct-site-logo img{' .
        ot_check_css_prop('max-height:%s%s;', $header_logo_height[0], $header_logo_height[1]) .
        '}';
    } */

    /* ################################## Typography ################################# */
    /* Logo Font Style */
    $logo_typo_1 = ot_get_option('logo_typo_1');

    if (!empty($logo_typo_1)) {
        printf(".oct-head-bar .logo-text-1 {%s}", ot_check_font_css_prop($logo_typo_1));
    }

    $logo_typo_2 = ot_get_option('logo_typo_2');

    if (!empty($logo_typo_2)) {
        printf(".oct-head-bar .logo-text-2 {%s}", ot_check_font_css_prop($logo_typo_2));
    }

    $logo_typo_3 = ot_get_option('logo_typo_3');

    if (!empty($logo_typo_3)) {
        printf(".oct-head-bar .logo-text-3 {%s}", ot_check_font_css_prop($logo_typo_3));
    }

    /* Header Menu Font Style */
    $menu_typo = ot_get_option('menu_typo');
    if (!empty($menu_typo)) {
        printf("#primary-nav ul li a{%s}", ot_check_font_css_prop($menu_typo));
    }

    /* Body Font Style */
    $body_typo = ot_get_option('body_typo');
    if (!empty($body_typo)) {
        printf("body, body p, .section-content, .section-content p, .sidebar, .oct-main-content, .oct-main-content p, widget-area, .textwidget{%s}", ot_check_font_css_prop($body_typo));
    }

    /* H1 = Heading Font Style */
    $h1_typo = ot_get_option('h1_typo');
    if (!empty($h1_typo)) {
        echo 'h1, .oct-main-content h1, .widget-sidebar h1{' .
            ot_check_css_prop('font-family:%s;', ot_google_font_family($h1_typo['font-family'])) .
            ot_check_css_prop('font-size:%s;', $h1_typo['font-size']) .
            ot_check_css_prop('font-style:%s;', $h1_typo['font-style']) .
            ot_check_css_prop('font-weight:%s;', $h1_typo['font-weight']) .
            ot_check_css_prop('line-height:%s;', $h1_typo['line-height']) .
            ot_check_css_prop('text-decoration:%s;', $h1_typo['text-decoration']) .
            '}';
    }

    /* H2 = Heading Font Style */
    $h2_typo = ot_get_option('h2_typo');
    if (!empty($h2_typo)) {
        echo 'h2, .oct-main-content h2, .widget-sidebar h2 {' .
            ot_check_css_prop('font-family:%s;', ot_google_font_family($h2_typo['font-family'])) .
            ot_check_css_prop('font-size:%s;', $h2_typo['font-size']) .
            ot_check_css_prop('font-style:%s;', $h2_typo['font-style']) .
            ot_check_css_prop('font-weight:%s;', $h2_typo['font-weight']) .
            ot_check_css_prop('line-height:%s;', $h2_typo['line-height']) .
            ot_check_css_prop('text-decoration:%s;', $h2_typo['text-decoration']) .
            '}';
    }

    /* H3 = Heading Font Style */
    $h3_typo = ot_get_option('h3_typo');
    if (!empty($h3_typo)) {
        echo 'h3, .oct-main-content h3, .widget-sidebar h3{' .
            ot_check_css_prop('font-family:%s;', ot_google_font_family($h3_typo['font-family'])) .
            ot_check_css_prop('font-size:%s;', $h3_typo['font-size']) .
            ot_check_css_prop('font-style:%s;', $h3_typo['font-style']) .
            ot_check_css_prop('font-weight:%s;', $h3_typo['font-weight']) .
            ot_check_css_prop('line-height:%s;', $h3_typo['line-height']) .
            ot_check_css_prop('text-decoration:%s;', $h3_typo['text-decoration']) .
            '}';
    }

    /* H4 = Heading Font Style */
    $h4_typo = ot_get_option('h4_typo');
    if (!empty($h4_typo)) {
        echo 'h4, .oct-main-content h4, .widget-sidebar h4{' .
            ot_check_css_prop('font-family:%s;', ot_google_font_family($h4_typo['font-family'])) .
            ot_check_css_prop('font-size:%s;', $h4_typo['font-size']) .
            ot_check_css_prop('font-style:%s;', $h4_typo['font-style']) .
            ot_check_css_prop('font-weight:%s;', $h4_typo['font-weight']) .
            ot_check_css_prop('line-height:%s;', $h4_typo['line-height']) .
            ot_check_css_prop('text-decoration:%s;', $h4_typo['text-decoration']) .
            '}';
    }

    /* H5 = Heading Font Style */
    $h5_typo = ot_get_option('h5_typo');
    if (!empty($h5_typo)) {
        echo 'h5, .oct-main-content h5, .widget-sidebar h5{' .
            ot_check_css_prop('font-family:%s;', ot_google_font_family($h5_typo['font-family'])) .
            ot_check_css_prop('font-size:%s;', $h5_typo['font-size']) .
            ot_check_css_prop('font-style:%s;', $h5_typo['font-style']) .
            ot_check_css_prop('font-weight:%s;', $h5_typo['font-weight']) .
            ot_check_css_prop('line-height:%s;', $h5_typo['line-height']) .
            ot_check_css_prop('text-decoration:%s;', $h5_typo['text-decoration']) .
            '}';
    }

    /* H6 = Heading Font Style */
    $h6_typo = ot_get_option('h6_typo');
    if (!empty($h6_typo)) {
        echo 'h6, .oct-main-content h6, .widget-sidebar h6{' .
            ot_check_css_prop('font-family:%s;', ot_google_font_family($h6_typo['font-family'])) .
            ot_check_css_prop('font-size:%s;', $h6_typo['font-size']) .
            ot_check_css_prop('font-style:%s;', $h6_typo['font-style']) .
            ot_check_css_prop('font-weight:%s;', $h6_typo['font-weight']) .
            ot_check_css_prop('line-height:%s;', $h6_typo['line-height']) .
            ot_check_css_prop('text-decoration:%s;', $h6_typo['text-decoration']) .
            '}';
    }

    /* Section Headings - Font Style */
    $section_heading_typo = ot_get_option('section_heading_typo');
        if(!empty($section_heading_typo)){
            echo '.section-title h2 {'.
                ot_check_css_prop('font-family:%s;', ot_google_font_family($section_heading_typo['font-family'])).
                ot_check_css_prop('font-size:%s;', $section_heading_typo['font-size']).
                ot_check_css_prop('font-style:%s;', $section_heading_typo['font-style']).
                ot_check_css_prop('font-weight:%s;', $section_heading_typo['font-weight']).
                ot_check_css_prop('line-height:%s;', $section_heading_typo['line-height']).
                ot_check_css_prop('text-decoration:%s;', $section_heading_typo['text-decoration']).
            '}';
        }

    /* Primary Buttons - Font Style */
    $primary_button_typo = ot_get_option('primary_button_typo');
    if (!empty($primary_button_typo)) {
        echo '.oct-btn-primary{' .
            ot_check_css_prop('font-family:%s;', ot_google_font_family($primary_button_typo['font-family'])) .
            ot_check_css_prop('font-size:%s;', $primary_button_typo['font-size']) .
            ot_check_css_prop('font-style:%s;', $primary_button_typo['font-style']) .
            ot_check_css_prop('font-weight:%s;', $primary_button_typo['font-weight']) .
            ot_check_css_prop('line-height:%s;', $primary_button_typo['line-height']) .
            ot_check_css_prop('text-decoration:%s;', $primary_button_typo['text-decoration']) .
            '}';
    }

    /* Secondary Buttons - Font Style */
    $secondary_button_typo = ot_get_option('secondary_button_typo');
    if (!empty($secondary_button_typo)) {
        echo '.oct-btn-secondary{' .
            ot_check_css_prop('font-family:%s;', ot_google_font_family($secondary_button_typo['font-family'])) .
            ot_check_css_prop('font-size:%s;', $secondary_button_typo['font-size']) .
            ot_check_css_prop('font-style:%s;', $secondary_button_typo['font-style']) .
            ot_check_css_prop('font-weight:%s;', $secondary_button_typo['font-weight']) .
            ot_check_css_prop('line-height:%s;', $secondary_button_typo['line-height']) .
            ot_check_css_prop('text-decoration:%s;', $secondary_button_typo['text-decoration']) .
            '}';
    }

    /* Footer -  Font Style */
    $footer_heading_typo = ot_get_option('footer_heading_typo');
    if (!empty($footer_heading_typo)) {
        echo '#oct-site-footer h3 {' .
            ot_check_css_prop('font-family:%s;', ot_google_font_family($footer_heading_typo['font-family'])) .
            ot_check_css_prop('font-size:%s;', $footer_heading_typo['font-size']) .
            ot_check_css_prop('font-style:%s;', $footer_heading_typo['font-style']) .
            ot_check_css_prop('font-weight:%s;', $footer_heading_typo['font-weight']) .
            ot_check_css_prop('line-height:%s;', $footer_heading_typo['line-height']) .
            ot_check_css_prop('text-decoration:%s;', $footer_heading_typo['text-decoration']) .
            '}';
    }

    $footer_text_typo = ot_get_option('footer_text_typo');
    if (!empty($footer_text_typo)) {
        echo '#oct-site-footer, #oct-site-footer div, #oct-site-footer p, #oct-site-footer li {' .
            ot_check_css_prop('font-family:%s;', ot_google_font_family($footer_text_typo['font-family'])) .
            ot_check_css_prop('font-size:%s;', $footer_text_typo['font-size']) .
            ot_check_css_prop('font-style:%s;', $footer_text_typo['font-style']) .
            ot_check_css_prop('font-weight:%s;', $footer_text_typo['font-weight']) .
            ot_check_css_prop('line-height:%s;', $footer_text_typo['line-height']) .
            ot_check_css_prop('text-decoration:%s;', $footer_text_typo['text-decoration']) .
            '}';
    }

    /* ################## Custom CSS ######################## */
    echo ot_get_option('custom_css');
    ?>
</style>