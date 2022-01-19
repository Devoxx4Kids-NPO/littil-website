<?php

/* * * Required: set 'ot_theme_mode' filter to true. */
add_filter('ot_theme_mode', '__return_true');

/* * * Meta Boxes */
add_filter('ot_meta_boxes', '__return_true');

/* Theme Options screen customizations */
add_filter('ot_show_pages', '__return_false');

add_filter('ot_show_new_layout', '__return_false');

add_filter('ot_header_logo_link', function () {
    return sprintf('');
});

add_filter('ot_header_version_text', function () {
    return THM_NAME . '  v' . THM_VER;
});

add_filter('ot_theme_options_parent_slug', '__return_false');

add_filter('ot_theme_options_menu_title', function ($title) {
    return $title = 'Playschool Settings';
});

add_filter('ot_theme_options_menu_slug', function ($slug) {
    return $slug = 'octheme_settings';
});

add_filter('ot_theme_options_icon_url', function ($url) {
    return $url = ' dashicons-admin-customizer';
});

/* Modified Field for Colors */

function oct_optiontree_tweaks($array, $field_id)
{

    unset($array['focus']);

    $link_fields = array(
        'logo_color',
    );

    $menu_fields = array(
        'menu_link_color',
        'submenu_link_color',
        'submenu_typo_bg',
        'menu_typo_bg',
    );

    $home_banner_fields = array(
        'home_banner_text_color'
    );

    $inner_banner_fields = array(
        'inner_banner_text_color'
    );

    $button_fields = array(
        'primary_buttons_color',
        'primary_buttonsh_bg',
        'secondary_buttons_color',
        'secondary_buttonsh_bg',
    );

    if (in_array($field_id, $button_fields)) {
        $array['link'] = __('Text Color', OC_TEXT_DOMAIN);
        $array['hover'] = __('Hover Text Color', OC_TEXT_DOMAIN);
        $array['active'] = __('Background Color', OC_TEXT_DOMAIN);
        $array['visited'] = __('Hover Background Color', OC_TEXT_DOMAIN);
    }

    if (in_array($field_id, $home_banner_fields)) {
        $array['link'] = __('Headings Colors', OC_TEXT_DOMAIN);
        $array['hover'] = __('Text Color', OC_TEXT_DOMAIN);
        $array['active'] = __('Background Color', OC_TEXT_DOMAIN);
        unset($array['visited']);
        return $array;
    }

    if (in_array($field_id, $inner_banner_fields)) {
        $array['link'] = __('Headings Colors', OC_TEXT_DOMAIN);
        unset($array['hover']);
        unset($array['active']);
        unset($array['visited']);
        return $array;
    }

    if (in_array($field_id, $link_fields)) {
        $array['link'] = __('Logo Text Color', OC_TEXT_DOMAIN).' 1';
        $array['hover'] = __('Logo Text Color', OC_TEXT_DOMAIN).' 2';
        $array['active'] = __('Logo Text Color', OC_TEXT_DOMAIN).' 3';
        unset($array['visited']);
        return $array;
    }

    if (in_array($field_id, $menu_fields)) {
        unset($array['visited']);
        return $array;
    }

    if ('headings_colors' === $field_id) {
        $array['h1'] = 'H1';
        $array['h2'] = 'H2';
        $array['h3'] = 'H3';
        $array['h4'] = 'H4';
        $array['h5'] = 'H5';
        $array['h6'] = 'H6';
        unset($array['link']);
        unset($array['hover']);
        unset($array['active']);
        unset($array['visited']);
    }

    return $array;
}

add_filter('ot_recognized_link_color_fields', 'oct_optiontree_tweaks', 10, 2);

function onecom_buttons_colors($array, $field_id)
{
    return $array;
}

add_filter('ot_recognized_link_color_fields', 'onecom_buttons_colors', 10, 2);

/* Typography Fields */

function ot_filter_typography_fields($array, $field_id)
{
    $array = array('font-family', 'font-size', 'font-weight', 'line-height', 'font-style', 'text-decoration');
    if ('secondf_typo' === $field_id) {
        $array = array('font-family');
        return $array;
    }
    if ('body_typo' === $field_id) {
        unset($array[array_search('text-decoration', $array)]);
        return $array;
    }
    return $array;
}

add_filter('ot_recognized_typography_fields', 'ot_filter_typography_fields', 10, 2);
/* Single Unit Field */

function filter_measurement_unit_types($array, $field_id)
{
    $array['px'] = 'px';
    $array['em'] = 'em';
    $array['pt'] = 'pt';
    unset($array['%']);
    return $array;
}

add_filter('ot_measurement_unit_types', 'filter_measurement_unit_types', 10, 2);

/* Header Menu Callback - If no menu set */

function onecom_add_nav_menu()
{
    return printf('<a href="%s"><small><u>Add Menu</u></small></a>', admin_url('customize.php?autofocus[panel]=nav_menus'));
}

/* Handle contact form request */
add_action('wp_ajax_send_enroll_form', 'send_enroll_form');
add_action('wp_ajax_nopriv_send_enroll_form', 'send_enroll_form');

function send_enroll_form()
{

    /* Check Nonce */
    if (!wp_verify_nonce($_POST['validate_nonce'], 'oct_form')) {
        $output = json_encode(array('type' => 'error', 'text' => 'Invalid security token, please reload the page and try again.'));
        die($output);
    }

    oc_secure_form();

    /* Check Length of the parameters being received from POST request */
    if (!strlen(trim($_POST['name']))) {
        $output = json_encode(array('type' => 'error', 'text' => __('Name is empty or too short.', OC_TEXT_DOMAIN)));
        die($output);
    }
    if (80 < mb_strlen($_POST['name'], '8bit')) {
        $output = json_encode(array('type' => 'error', 'text' => __('Name is too large.', OC_TEXT_DOMAIN)));
        die($output);
    }
    if (!(strlen(trim($_POST['email'])) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
        $output = json_encode(array('type' => 'error', 'text' => __('Email entered is not valid.', OC_TEXT_DOMAIN)));
        die($output);
    }
    if (180 < mb_strlen($_POST['email'], '8bit')) {
        $output = json_encode(array('type' => 'error', 'text' => __('Email is too large.', OC_TEXT_DOMAIN)));
        die($output);
    }
    if (!strlen(trim($_POST['message']))) {
        $output = json_encode(array('type' => 'error', 'text' => __('Message text is empty or too short.', OC_TEXT_DOMAIN)));
        die($output);
    }
    if (1024 < mb_strlen($_POST['message'], '8bit')) {
        $output = json_encode(array('type' => 'error', 'text' => __('Message is too large, please shorten it.', OC_TEXT_DOMAIN)));
        die($output);
    }

    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $email = filter_var(mb_strtolower($_POST["email"], 'UTF-8'), FILTER_SANITIZE_EMAIL);
    $msg = filter_var($_POST["message"], FILTER_SANITIZE_STRING);
    $date = filter_var($_POST["date"], FILTER_SANITIZE_STRING);
    $service = filter_var($_POST["service"], FILTER_SANITIZE_STRING);

    $label_1 = filter_var($_POST["label_1"], FILTER_SANITIZE_STRING);
    if (!isset($label_1) && !strlen($label_1)) {
        $label_1 = __("Email", OC_TEXT_DOMAIN);
    }
    $label_2 = filter_var($_POST["label_2"], FILTER_SANITIZE_STRING);
    if (!isset($label_2) && !strlen($label_2)) {
        $label_2 = __("Name", OC_TEXT_DOMAIN);
    }

    $label_3 = filter_var($_POST["label_3"], FILTER_SANITIZE_STRING);
    if (!isset($label_3) && !strlen($label_3)) {
        $label_3 = __("Message", OC_TEXT_DOMAIN);
    }

    $label_5 = filter_var($_POST["label_5"], FILTER_SANITIZE_STRING);
    if (!isset($label_5) && !strlen($label_5)) {
        $label_5 = __("Services", OC_TEXT_DOMAIN);
    }

    $label_6 = filter_var($_POST["label_6"], FILTER_SANITIZE_STRING);
    if (!isset($label_6) && !strlen($label_6)) {
        $label_6 = __("Date", OC_TEXT_DOMAIN);
    }

    //$to = get_option( 'admin_email' );
    $subject = filter_var($_POST["subject"], FILTER_SANITIZE_STRING);

    if (!strlen($subject)) {
        /* set default subject if missing */
        $subject = __("Contact query from website", OC_TEXT_DOMAIN) . get_bloginfo('name');
    }

    /*
     * Leaving the "from" field blank in mail-headers so that wordpress@domain.tld can act as sender
     * More details: https://app.asana.com/0/307895785186248/529519894576281/f
     */

    $body = __("You received a new message from", OC_TEXT_DOMAIN) . ' ' . $email . ' ' .
        __("via the contact form on", OC_TEXT_DOMAIN) . ' ' . get_site_url() . "\n\n\n" .
        __("Contact Details", OC_TEXT_DOMAIN) . "\n\n" .
        $label_1 . ': ' . $name . " \n" .
        $label_2 . ': ' . $email . " \n" .
        $label_3 . ': ' . $msg . " \n" .
        $label_5 . ': ' . $service . " \n" .
        $label_6 . ': ' . $date . " \n" .
        /* $headers = "From: $email \r\n"; */
        $headers = "Reply-To: $email \r\n";




    //$sendto = filter_var(mb_strtolower($_POST["recipient"],'UTF-8'), FILTER_SANITIZE_EMAIL);
    $sendto = $_POST["recipient"];
    if (!strlen($sendto)) {
        $sendto = get_option('admin_email');
        $send_mail = wp_mail($sendto, $subject, $body, $headers);
    } else if (!strpos($sendto, ',') && strlen($sendto)) {
        $sendto = filter_var(mb_strtolower($sendto, 'UTF-8'), FILTER_SANITIZE_EMAIL);
        $send_mail = wp_mail($sendto, $subject, $body, $headers);
    } else {
        $send_mail = wp_mail($sendto, $subject, $body, $headers);
    }


    if ($send_mail) {
        $token_new = oc_get_captcha_string();
        $output = json_encode(array(
            'type' => 'success',
            'token' => $token_new,
            'image' => get_stylesheet_directory_uri() . '/inc/image.php?i=' . $token_new,
            'text' => __('Your message has been successfully sent.', OC_TEXT_DOMAIN),
        ));
        die($output);
    } else {
        $output = json_encode(array('type' => 'error', 'text' => __('Some error occurred, please reload the page and try again.', OC_TEXT_DOMAIN), 'body' => $body));
        die($output);
    }
}


/* Handle contact form request */
add_action('wp_ajax_send_contact_form', 'send_contact_form');
add_action('wp_ajax_nopriv_send_contact_form', 'send_contact_form');

function send_contact_form()
{

    /* Check Nonce */
    if (!wp_verify_nonce($_POST['validate_nonce'], 'oct_form')) {
        $output = json_encode(array('type' => 'error', 'text' => 'Invalid security token, please reload the page and try again.'));
        die($output);
    }

    oc_secure_form();

    /* Check Length of the parameters being received from POST request */
    if (!strlen(trim($_POST['name']))) {
        $output = json_encode(array('type' => 'error', 'text' => __('Name is empty or too short.', OC_TEXT_DOMAIN)));
        die($output);
    }
    if (80 < mb_strlen($_POST['name'], '8bit')) {
        $output = json_encode(array('type' => 'error', 'text' => __('Name is too large.', OC_TEXT_DOMAIN)));
        die($output);
    }
    if (!(strlen(trim($_POST['email'])) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
        $output = json_encode(array('type' => 'error', 'text' => __('Email entered is not valid.', OC_TEXT_DOMAIN)));
        die($output);
    }
    if (180 < mb_strlen($_POST['email'], '8bit')) {
        $output = json_encode(array('type' => 'error', 'text' => __('Email is too large.', OC_TEXT_DOMAIN)));
        die($output);
    }
    if (!strlen(trim($_POST['message']))) {
        $output = json_encode(array('type' => 'error', 'text' => __('Message text is empty or too short.', OC_TEXT_DOMAIN)));
        die($output);
    }
    if (1024 < mb_strlen($_POST['message'], '8bit')) {
        $output = json_encode(array('type' => 'error', 'text' => __('Message is too large, please shorten it.', OC_TEXT_DOMAIN)));
        die($output);
    }

    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $email = filter_var(mb_strtolower($_POST["email"], 'UTF-8'), FILTER_SANITIZE_EMAIL);
    $msg = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

    $label_1 = filter_var($_POST["label_1"], FILTER_SANITIZE_STRING);
    if (!isset($label_1) && !strlen($label_1)) {
        $label_1 = __("Email", OC_TEXT_DOMAIN);
    }

    $label_2 = filter_var($_POST["label_2"], FILTER_SANITIZE_STRING);
    if (!isset($label_2) && !strlen($label_2)) {
        $label_2 = __("Name", OC_TEXT_DOMAIN);
    }

    $label_3 = filter_var($_POST["label_3"], FILTER_SANITIZE_STRING);
    if (!isset($label_3) && !strlen($label_3)) {
        $label_3 = __("Message", OC_TEXT_DOMAIN);
    }

    //$to = get_option( 'admin_email' );
    $subject = filter_var($_POST["subject"], FILTER_SANITIZE_STRING);

    if (!strlen($subject)) {
        /* set default subject if missing */
        $subject = __("Contact query from website", OC_TEXT_DOMAIN) . get_bloginfo('name');
    }

    /*
     * Leaving the "from" field blank in mail-headers so that wordpress@domain.tld can act as sender
     * More details: https://app.asana.com/0/307895785186248/529519894576281/f
     */

    $body = __("You received a new message from", OC_TEXT_DOMAIN) . ' ' . $email . ' ' .
        __("via the contact form on", OC_TEXT_DOMAIN) . ' ' . get_site_url() . "\n\n\n" .
        __("Contact Details", OC_TEXT_DOMAIN) . "\n\n" .
        $label_1 . ': ' . $name . " \n" .
        $label_2 . ': ' . $email . " \n" .
        $label_3 . ': ' . $msg . " \n" .
        /* $headers = "From: $email \r\n"; */
        $headers = "Reply-To: $email \r\n";




    //$sendto = filter_var(mb_strtolower($_POST["recipient"],'UTF-8'), FILTER_SANITIZE_EMAIL);
    $sendto = $_POST["recipient"];
    if (!strlen($sendto)) {
        $sendto = get_option('admin_email');
        $send_mail = wp_mail($sendto, $subject, $body, $headers);
    } else if (!strpos($sendto, ',') && strlen($sendto)) {
        $sendto = filter_var(mb_strtolower($sendto, 'UTF-8'), FILTER_SANITIZE_EMAIL);
        $send_mail = wp_mail($sendto, $subject, $body, $headers);
    } else {
        $send_mail = wp_mail($sendto, $subject, $body, $headers);
    }


    if ($send_mail) {
        $token_new = oc_get_captcha_string();
        $output = json_encode(array(
            'type' => 'success',
            'token' => $token_new,
            'image' => get_stylesheet_directory_uri() . '/inc/image.php?i=' . $token_new,
            'text' => __('Your message has been successfully sent.', OC_TEXT_DOMAIN),
        ));
        die($output);
    } else {
        $output = json_encode(array('type' => 'error', 'text' => __('Some error occurred, please reload the page and try again.', OC_TEXT_DOMAIN), 'body' => $body));
        die($output);
    }
}

/**
 * Function oc_sucure_forms
 * Secure form submission, try to block spams by using captcha and honeypot
 * @param void
 * @return void
 */
function oc_secure_form()
{
    /* Check Captcha */
    if (
        !isset($_POST['oc_cpt']) || !isset($_POST['oc_captcha_val']) || !$_POST['oc_captcha_val']
        || !$_POST['oc_cpt'] || !oc_validate_captcha($_POST['oc_captcha_val'], $_POST['oc_cpt'])
    ) {
        $output = json_encode(array(
            'type' => 'error',
            'text' => __('Invalid answer, please try again.', OC_TEXT_DOMAIN),
        ));
        die($output);
    }

    /** Check Honey Pot field */
    if (!isset($_POST['oc_csrf_token']) || $_POST['oc_csrf_token'] !== '') {
        $output = json_encode(array(
            'type' => 'error',
            'text' => __('Some error occurred, please reload the page and try again.', OC_TEXT_DOMAIN),
        ));
        die($output);
    }
}

// Generate Common Form nonce via ajax and return to caller
add_action('wp_ajax_oct_form_nonce', 'oct_nonce_cb');
add_action('wp_ajax_nopriv_oct_form_nonce', 'oct_nonce_cb');

/**
 * Function oc_nonce_cb
 * Ajax handler to generate nonce and return it as response
 * @param void
 * @return void
 */
function oct_nonce_cb()
{
    wp_send_json([
        'nonce' => wp_create_nonce('oct_form'),
        'status' => '0',
    ]);
}

/**
 * Function oc_secure_fields
 * Return HTML string contaning the fields that will be used in forms to track 
 * token etc.
 * @param void
 * @return string
 */
function oc_secure_fields()
{
    $oc_token = oc_get_captcha_string();
    $fields = '<label class="d-block">' . __('Type in the answer to the sum below:', OC_TEXT_DOMAIN) . '</label><span class="d-inline-block oc-cap-container"><img id="oc_cap_img" alt="Please reload" src="' . get_stylesheet_directory_uri() . '/inc/image.php?i=' . $oc_token . '">'
        . '<input type="text" name="oc_captcha_val" class="oc-captcha-val" id="oc-captcha-val" placeholder="?" maxlength="3" required/></span>'
        . '<input type="hidden" name="oc_cpt" id="oc_cpt" value="' . $oc_token . '">'
        . '<input type="text" name="oc_csrf_token" value="" class="oc_csrf_token" id="oc_csrf_token">' .
        '<input type="hidden" value="" name="validate_nonce" id="validate_nonce">';
    return $fields;
}

add_action('wp_ajax_oc_refresh_captcha', 'oc_get_captcha_string');
if (!defined('OC_CAPTCHA_KEY')) {
    define('OC_CAPTCHA_KEY', '1ASD2A4D2AA4DA15A');
}

/**
 * Function oc_get_captcha_string
 * Generate a token to be used to add value in captcha
 * @param void
 * @return string
 */
function oc_get_captcha_string($echo = false)
{
    $num1 = rand(0, 10);
    $num2 = rand(1, 10);
    $token = OC_CAPTCHA_KEY . base64_encode($num1 . '#' . $num2);
    if (defined('DOING_AJAX') && DOING_AJAX && $echo) {
        wp_send_json([
            'token' => $token,
            'image' => get_stylesheet_directory_uri() . '/inc/image.php?i=' . $token
        ]);
        wp_die();
    }
    return $token;
}

/** 
 * Function oc_validate_captcha
 * Check if incoming value of captcha is valid
 * @param $value, string that user entered as captcha solution
 * @param $encrypted_val, string the token that was used to generate captcha
 * @return string
 */
function oc_validate_captcha($value, $encrypted_val)
{
    $decrypted_value = base64_decode(str_replace(OC_CAPTCHA_KEY, '', $encrypted_val));
    if (!$decrypted_value) {
        return false;
    }
    $exploded = explode('#', $decrypted_value);

    if (count($exploded) < 2) {
        return false;
    }

    return (intval($exploded[0]) + intval($exploded[1])) === intval($value);
}


/* Section Background Image URL */
function get_section_background_image($key)
{

    global $post;
    $post_id = $post->ID;
    if (!isset($post_id) && !isset($key))
        return;

    $image_id = get_post_meta($post_id, $key, true);
    if (!is_array($image_id) && strlen($image_id)) {

        $image_url = wp_get_attachment_image_src($image_id, 'full');
        if (!empty($image_url)) {
            return $banner_img_url = $image_url[0];
        }
        return;
    }
    return;
}

/* Custom Page Title Function */
if (!function_exists('oct_custom_title')) {

    function oct_custom_title($id = '')
    {
        if (!$id) {
            global $post;
            $id = $post->ID;
        }

        // Do not display title if switch off
        //$title_switch = get_post_meta($id, 'custom_page_title_switch', true);
        //if ($title_switch == 'off') {
        //    return;
        //}

        // Show custom title if have else default title
        $custom_title = get_post_meta($id, 'custom_page_title', true);
        if (strlen($custom_title)) {
            echo $custom_title;
            return;
        } else {
            echo get_the_title($id);
        }

        return;
    }
}

// Register Custom Post Type - Service
function register_cpt_services()
{

    $labels = array(
        'name' => __('Services', OC_TEXT_DOMAIN),
        'singular_name' => __('Service', OC_TEXT_DOMAIN),
        'new_item' => __('New Service', OC_TEXT_DOMAIN),
        'edit_item' => __('Edit Service', OC_TEXT_DOMAIN),
        'update_item' => __('Update Service', OC_TEXT_DOMAIN),
        'view_item' => __('View Service', OC_TEXT_DOMAIN),
        'view_items' => __('View Services', OC_TEXT_DOMAIN),
    );
    $args = array(
        'label' => __('Service', OC_TEXT_DOMAIN),
        'description' => __('Service Description', OC_TEXT_DOMAIN),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail',),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-book',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );
    register_post_type('service', $args);
}

add_action('init', 'register_cpt_services', 0);

function register_cpt_events()
{

    $labels = array(
        'name' => __('Events', OC_TEXT_DOMAIN),
        'singular_name' => __('Event', OC_TEXT_DOMAIN),
        'new_item' => __('New Event', OC_TEXT_DOMAIN),
        'edit_item' => __('Edit Event', OC_TEXT_DOMAIN),
        'update_item' => __('Update Event', OC_TEXT_DOMAIN),
        'view_item' => __('View Event', OC_TEXT_DOMAIN),
        'view_items' => __('View Events', OC_TEXT_DOMAIN),
    );
    $args = array(
        'label' => __('Event', OC_TEXT_DOMAIN),
        'description' => __('Description', OC_TEXT_DOMAIN),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail',),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-book',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );
    register_post_type('event', $args);
}

add_action('init', 'register_cpt_events', 0);
