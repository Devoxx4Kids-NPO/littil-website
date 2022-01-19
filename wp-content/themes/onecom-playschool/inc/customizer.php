<?php
/**
 * Playschool Theme Customizer
 *
 * @package Playschool
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function one_com_wp_theme_playschool_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'one_com_wp_theme_playschool_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'one_com_wp_theme_playschool_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'one_com_wp_theme_playschool_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function one_com_wp_theme_playschool_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function one_com_wp_theme_playschool_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function one_com_wp_theme_playschool_customize_preview_js() {
	wp_enqueue_script( 'one-com-wp-theme-playschool-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
//add_action( 'customize_preview_init', 'one_com_wp_theme_playschool_customize_preview_js' );

function onecom_edit_icon($type, $key='', $id='', $position=NULL){
    if(!is_customize_preview()){ return; }
    /*if(!(is_admin() || is_network_admin())){ return; }*/

    /* Set $id is we are on frontpage. */
    if(!strlen($id)){
        if(is_front_page()){ $id = get_option('page_on_front'); }
    }

    /* check required params */
    if(!isset($type) || !isset($id)) return;

    $link ='';

    /* If the edit link is for metabox value */
    if('page_meta' === $type){
        $link = get_edit_post_link($id)/*.$key*/;
        if(!strlen($link)) $link = sprintf(admin_url('post.php?post=%s&action=edit'.$key), $id);
    }

    /* If the edit link is for custom theme-option value */
    if('ot_option' === $type){
        $link = admin_url('admin.php?page=octheme_settings');

        if(isset($key) && strlen($key)){
            $link .= '#'.$key;
        }
    }

    /* If the edit link is for wp-admin settings value */
    if('wp_option' === $type){
        $link = '';
    }

    $class ='';
    if(isset($position) && !is_null($position)){
        $class = 'inline';
    } else {
        $class = '';
    }

    /*onclick="window.open(this.href, this.href); return false"*/
    $window =  "window.open('".$link."', '".$link."'); return false";
    $edit_link = '<span class="onecom_edit_section_icon '.$class.'"><a onclick="'.$window.'" href="'.$link.'"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="white"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></a></span>';
    echo $edit_link;
}