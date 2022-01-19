<?php

/**
 * Initialize the custom Meta Boxes.
 */
add_action('admin_init', 'custom_meta_boxes');

global $post;

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types in demo-theme-options.php.
 *
 * @return    void
 * @since     2.0
 */
function custom_meta_boxes()
{

    /**
     * Create a custom meta boxes array that we pass to
     * the OptionTree Meta Box API Class.
     */
    $homepage_sections = array(
        'id' => 'home_sections',
        'title' => __('Page Sections', OC_TEXT_DOMAIN),
        'desc' => '',
        'pages' => array('page'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            /* Home Content Section */

            /* Banner Section */
            array(
                'label' => __('Banner', OC_TEXT_DOMAIN),
                'id' => 'home_banner',
                'type' => 'tab'
            ),
            array(
                'label' => __('Show Banner', OC_TEXT_DOMAIN),
                'id' => 'home_banner_switch',
                'type' => 'on-off',
                'class'     => 'switch_div',
                'std' => 'on',
            ),
            array(
                'id' => 'home_banner_image',
                'label' => __('Banner Image', OC_TEXT_DOMAIN),
                'type' => 'upload',
                'class' => 'ot-upload-attachment-id',
                'condition' => 'home_banner_switch:is(on)',
            ),
            array(
                'id' => 'banner_caption_align',
                'label' => __('Caption Alignment', OC_TEXT_DOMAIN),
                'std' => 'center',
                'type' => 'select',
                'class'     => 'inline-cols',
                'condition' => 'home_banner_switch:is(on)',
                'section' => 'option_types',
                'choices' => array(
                    array(
                        'value' => 'right',
                        'label' => __('Right', OC_TEXT_DOMAIN),
                    ),
                    array(
                        'value' => 'center',
                        'label' => __('Center', OC_TEXT_DOMAIN),
                    ),
                    array(
                        'value' => 'left',
                        'label' => __('Left', OC_TEXT_DOMAIN),
                    )
                )
            ),
            array(
                'label'     => __('Banner Height', OC_TEXT_DOMAIN),
                'desc'        => '<span class="dashicons dashicons-external"></span> ' . sprintf('<a href="%s" target="_blank">' . __('Change the font for this banner', OC_TEXT_DOMAIN) . '</a>', admin_url('admin.php?page=octheme_settings#section_typo_option')),
                'id'        => 'banner_height',
                'type'      => 'select',
                'std'        => 'custom_height',
                'choices'     => array(
                    array(
                        'value'       => 'auto_height',
                        'label'       => __('Auto', OC_TEXT_DOMAIN),
                    ),
                    array(
                        'value'       => 'full_view',
                        'label'       => __('Full Viewport', OC_TEXT_DOMAIN),
                    ),
                    array(
                        'value'       => 'custom_height',
                        'label'       => __('Custom', OC_TEXT_DOMAIN),
                    ),
                ),
                'condition' => 'home_banner_switch:is(on)',
            ),
            array(
                'id' => 'hbanner_height',
                'label' => __('Banner Custom Height', OC_TEXT_DOMAIN),
                'class'     => 'inline-cols',
                'std'       => array('630', 'px'),
                'type'      => 'measurement',
                'condition'     => 'banner_height:is(custom_height),home_banner_switch:is(on)',
            ),
            array(
                'id' => 'banner_caption_title',
                'label' => __('Banner Caption - Title', OC_TEXT_DOMAIN),
                'type' => 'text',
                'std' => '',
                'rows' => '1',
                'condition' => 'home_banner_switch:is(on)',
            ),
            array(
                'id' => 'banner_caption_subtitle',
                'label' => __('Banner Caption - Subtitle', OC_TEXT_DOMAIN),
                'type' => 'textarea',
                'std' => '',
                'rows' => '3',
                'condition' => 'home_banner_switch:is(on)',
            ),
            array(
                'id' => 'banner_button_label',
                'label' => __('Button Label', OC_TEXT_DOMAIN),
                'type' => 'text',
                'std' => '',
                'condition' => 'home_banner_switch:is(on)',
            ),
            array(
                'id' => 'banner_button_link',
                'label' => __('Button Link', OC_TEXT_DOMAIN),
                'type' => 'text',
                'std' => get_permalink( get_page_by_path( 'enroll' ) ),
                'condition' => 'home_banner_switch:is(on)',
            ),

            // Features
            array(
                'label' => __('Features', OC_TEXT_DOMAIN),
                'id' => 'features_tab',
                'type' => 'tab'
            ),
            array(
                'label' => __('Show Features', OC_TEXT_DOMAIN),
                'id' => 'features_block_switch',
                'type' => 'on-off',
                'class' => 'switch_div',
                'std' => 'on'
            ),
            array(
                'label' => __('Features', OC_TEXT_DOMAIN),
                'id' => 'features_blocks',
                'type' => 'list-item',
                'operator' => 'and',
                'settings' => array(

                    array(
                        'id' => 'bubble_icon_text',
                        'label' => __('Title Icon', OC_TEXT_DOMAIN),
                        'type' => 'text',
                        'std' => '',
                    ),
                    array(
                        'id' => 'feature_icon_align',
                        'label' => __('Icon Alignment', OC_TEXT_DOMAIN),
                        'std' => 'bg-icon-right',
                        'type' => 'select',
                        'class'     => 'inline-cols',
                        'section' => 'option_types',
                        'choices' => array(
                            array(
                                'value' => 'bg-icon-right',
                                'label' => __('Right', OC_TEXT_DOMAIN),
                            ),
                            array(
                                'value' => 'bg-icon-left',
                                'label' => __('Left', OC_TEXT_DOMAIN),
                            ),
                        )
                    ),
                    array(
                        'id' => 'feature_icon',
                        'label' => __('Image', OC_TEXT_DOMAIN),
                        'type' => 'upload',
                        'class' => 'ot-upload-attachment-id',
                    ),
                    array(
                        'label' => __('Content', OC_TEXT_DOMAIN),
                        'id' => 'block_content',
                        'type' => 'textarea-simple',
                        'rows' => '3',
                    ),
                ),
                'condition' => 'features_block_switch:is(on)',
                'std' => ''
            ),

            // Facilities
            array(
                'label' => __('Facilities', OC_TEXT_DOMAIN),
                'id' => 'facility_tab',
                'type' => 'tab'
            ),
            array(
                'label' => __('Show Section', OC_TEXT_DOMAIN),
                'id' => 'facility_section_switch',
                'type' => 'on-off',
                'class' => 'switch_div',
                'std' => 'on'
            ),
            array(
                'label' => __('Title', OC_TEXT_DOMAIN),
                'id' => 'facility_section_title',
                'type' => 'text',
                'std' => '',
                'rows' => '1',
                'condition' => 'facility_section_switch:is(on)',
            ),
            array(
                'label' => __('Facilities', OC_TEXT_DOMAIN),
                'id' => 'facility_blocks',
                'type' => 'list-item',
                'operator' => 'and',
                'settings' => array(
                    array(
                        'label' => __('Content', OC_TEXT_DOMAIN),
                        'id' => 'block_content',
                        'type' => 'textarea',
                        'rows' => '3',
                    ),
                    array(
                        'label' => __('Icon', OC_TEXT_DOMAIN),
                        'id' => 'facility_icon',
                        'type' => 'upload',
                        'class' => 'ot-upload-attachment-id',
                    ),
                ),
                'condition' => 'facility_section_switch:is(on)',
                'std' => '',
            ),
            array(
                'label' => __('Background', OC_TEXT_DOMAIN),
                'id' => 'facility_section_bg',
                'type' => 'upload',
                'class' => 'ot-upload-attachment-id',
                'condition' => 'facility_section_switch:is(on)',
            ),
            array(
                'id' => 'facility_button_label',
                'label' => __('Button Label', OC_TEXT_DOMAIN),
                'type' => 'text',
                'std' => '',
                'condition' => 'facility_section_switch:is(on)',
            ),
            array(
                'id' => 'facility_button_link',
                'label' => __('Button Link', OC_TEXT_DOMAIN),
                'type' => 'text',
                'std' => get_permalink( get_page_by_path( 'courses' ) ),
                'condition' => 'facility_section_switch:is(on)',
            ),

            // Events
            array(
                'label' => __('Events', OC_TEXT_DOMAIN),
                'id' => 'event_details',
                'type' => 'tab'
            ),

            array(
                'label' => __('Show Section', OC_TEXT_DOMAIN),
                'id' => 'event_section_switch',
                'type' => 'on-off',
                'class'     => 'switch_div',
                'std' => 'on'
            ),

            array(
                'label' => __('Section Title', OC_TEXT_DOMAIN),
                'id' => 'event_section_title',
                'type' => 'text',
                'std' => '',
                'condition' => 'event_section_switch:is(on)'
            ),
            array(
                'id' => 'event_list_ids',
                'label' => __('Select', OC_TEXT_DOMAIN),
                'desc' => __('Please select the items to be displayed.', OC_TEXT_DOMAIN),
                'std' => '',
                'type' => 'custom-post-type-checkbox',
                'post_type' => 'event',
                'condition' => 'event_section_switch:is(on)',
            ),

            array(
                'id' => 'event_button_label',
                'label' => __('Button Label', OC_TEXT_DOMAIN),
                'type' => 'text',
                'std' => '',
                'condition' => 'event_section_switch:is(on)',
            ),
            array(
                'id' => 'event_button_link',
                'label' => __('Button Link', OC_TEXT_DOMAIN),
                'type' => 'text',
                'std' => get_permalink( get_page_by_path( 'contact' ) ),
                'condition' => 'event_section_switch:is(on)',
            ),

            // Testimonials
            array(
                'label' => __('Testimonials', OC_TEXT_DOMAIN),
                'id' => 'testimonial_section',
                'type' => 'tab'
            ),

            array(
                'label' => __('Show Section', OC_TEXT_DOMAIN),
                'id' => 'testimonial_section_switch',
                'type' => 'on-off',
                'class'     => 'switch_div',
                'std' => 'on'
            ),

            array(
                'label' => __('Section Title', OC_TEXT_DOMAIN),
                'id' => 'testimonial_section_title',
                'type' => 'text',
                'std' => '',
                'condition' => 'testimonial_section_switch:is(on)'
            ),
            array(
                'label' => __('Section Content', OC_TEXT_DOMAIN),
                'id' => 'testimonial_section_content',
                'type' => 'textarea',
                'row' => '5',
                'condition' => 'testimonial_section_switch:is(on)'
            ),

            array(
                'label' => __('Background', OC_TEXT_DOMAIN),
                'id' => 'testimonial_section_bg',
                'type' => 'upload',
                'class' => 'ot-upload-attachment-id',
                'condition' => 'testimonial_section_switch:is(on)',
            ),

            // Gallery
            array(
                'label' => __('Gallery', OC_TEXT_DOMAIN),
                'id' => 'gallery_tab',
                'type' => 'tab'
            ),
            array(
                'label' => __('Show Section', OC_TEXT_DOMAIN),
                'id' => 'gallery_section_switch',
                'type' => 'on-off',
                'class' => 'switch_div',
                'std' => 'on'
            ),
            array(
                'label' => __('Title', OC_TEXT_DOMAIN),
                'id' => 'gallery_section_title',
                'type' => 'text',
                'std' => '',
                'rows' => '1',
                'condition' => 'gallery_section_switch:is(on)',
            ),
            array(
                'id' => 'gallery_images',
                'label' => __('Gallery', OC_TEXT_DOMAIN),
                'std' => '',
                'type' => 'gallery',
                'class' => 'ot-gallery-shortcode',
                'condition' => 'gallery_section_switch:is(on)',
            ),

        )
    );

    /* Contact page sections */
    $contact_sections = array(
        'id' => 'contact_sections',
        'title' => __('Page Section', OC_TEXT_DOMAIN),
        'desc' => '',
        'pages' => array('page'),
        'context' => 'normal',
        'priority' => 'low',
        'fields' => array(
            array(
                'label' => __('Contact', OC_TEXT_DOMAIN),
                'id' => 'contact_tab',
                'type' => 'tab'
            ),
            array(
                'label' => __('Show Section', OC_TEXT_DOMAIN),
                'id' => 'contact_info_blocks_switch',
                'type' => 'on-off',
                'class' => 'switch_div',
                'std' => 'on'
            ),
            array(
                'label' => __('Contact Details', OC_TEXT_DOMAIN),
                'id' => 'map_section_code',
                'type' => 'textarea',
                'rows' => '4',
            ),
            array(
                'label' => __('Information Blocks', OC_TEXT_DOMAIN),
                'id' => 'contact_info_blocks',
                'type' => 'list-item',
                'operator' => 'and',
                'settings' => array(
                    array(
                        'label' => __('Content', OC_TEXT_DOMAIN),
                        'id' => 'block_content',
                        'type' => 'textarea',
                        'rows' => '3',
                    ),
                    array(
                        'id' => 'feature_icon',
                        'label' => __('Icon', OC_TEXT_DOMAIN),
                        'type' => 'upload',
                        'class' => 'ot-upload-attachment-id',
                    ),
                ),
                'condition' => 'contact_info_blocks_switch:is(on)',
                'std' => '',
            ),
            /* Contact Form Section */
            array(
                'label' => __('Form Section', OC_TEXT_DOMAIN),
                'id' => 'contact_form_tab',
                'type' => 'tab',
            ),
            array(
                'label' => __('Show Section', OC_TEXT_DOMAIN),
                'id' => 'contact_form_switch',
                'type' => 'on-off',
                'class' => 'switch_div',
                'std' => 'on',
            ),
            array(
                'id' => 'form_labels',
                'label' => __('Form Fields Labels', OC_TEXT_DOMAIN),
                'std' => '',
                'type' => 'textblock-titled',
                'section' => 'contact_options',
                'class' => 'inline_cols',
                'condition' => 'contact_form_switch:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'form_label_1',
                'std' => 'Name',
                'type' => 'text',
                'section' => 'contact_options',
                'class' => 'inline_cols',
                'condition' => 'contact_form_switch:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'form_label_2',
                'std' => 'Email',
                'type' => 'text',
                'section' => 'contact_options',
                'class' => 'inline_cols',
                'condition' => 'contact_form_switch:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'form_label_3',
                'std' => 'Message',
                'type' => 'text',
                'section' => 'contact_options',
                'class' => 'inline_cols',
                'condition' => 'contact_form_switch:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'form_label_4',
                'std' => 'Send',
                'type' => 'text',
                'section' => 'contact_options',
                'class' => 'inline_cols',
                'condition' => 'contact_form_switch:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'cmail_subject',
                'label' => __('Email Subject', OC_TEXT_DOMAIN),
                'std' => 'Contact query from website ' . get_bloginfo('name'),
                'type' => 'text',
                'section' => 'contact_options',
                'condition' => 'contact_form_switch:is(on)',
            ),
            array(
                'id' => 'recipient_email',
                'label' => __('Recipients', OC_TEXT_DOMAIN),
                'desc' => __('Provide email accounts where you want to receive emails from this form.', OC_TEXT_DOMAIN),
                'std' => get_option('admin_email'),
                'type' => 'text',
                'section' => 'contact_options',
                'condition' => 'contact_form_switch:is(on)',
            ),
            array(
                'label' => __('Custom Form', OC_TEXT_DOMAIN),
                'desc' => __('This will replace the default form.', OC_TEXT_DOMAIN),
                'id' => 'custom_form_switch',
                'type' => 'on-off',
                'std' => 'off',
                'condition' => 'contact_form_switch:is(on)',
            ),
            array(
                'label' => __('Form Embed Code or Shortcode', OC_TEXT_DOMAIN),
                'desc' => __('Please copy and paste the Embed Code or Shortcode of the custom form (if any). This will replace the default form.', OC_TEXT_DOMAIN),
                'id' => 'custom_form_embed',
                'type' => 'textarea',
                'rows' => '3',
                'condition' => 'custom_form_switch:is(on), contact_form_switch:is(on)',
                'operator' => 'and'
            ),
        )
    );

    // Event Posts Meta boxes
    $event_course_details = array(
        'id' => 'event_details',
        'title' => __('Page Section', OC_TEXT_DOMAIN),
        'desc' => '',
        'pages' => array('service', 'event'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'label' => __('Content', OC_TEXT_DOMAIN),
                'id' => 'events_content_tab',
                'type' => 'tab'
            ),
            array(
                'id' => 'address',
                'label' => __('Address', OC_TEXT_DOMAIN),
                'type' => 'text',
                'std' => '',
            ),
            array(
                'id' => 'schedule',
                'label' => __('Schedule', OC_TEXT_DOMAIN),
                'type' => 'text',
                'std' => '',
            ),
            array(
                'id' => 'image_text_1',
                'label' => __('Banner Text', OC_TEXT_DOMAIN) . ' 1',
                'type' => 'text',
                'std' => '',
            ),
            array(
                'id' => 'image_text_2',
                'label' => __('Banner Text', OC_TEXT_DOMAIN) . ' 2',
                'type' => 'text',
                'std' => '',
            ),
            array(
                'id' => 'page_button_label',
                'label' => __('Button Label', OC_TEXT_DOMAIN),
                'type' => 'text',
                'std' => '',
                'condition' => '',
            ),
            array(
                'id' => 'page_button_link',
                'label' => __('Button Link', OC_TEXT_DOMAIN),
                'type' => 'text',
                'std' => get_permalink( get_page_by_path( 'contact' ) ),
                'condition' => '',
            ),
        )
    );

    /**
     * Single page details
     * */
    $page_sections = array(
        'id' => 'page_sections',
        'title' => __('Page Sections', OC_TEXT_DOMAIN),
        'desc' => '',
        'pages' => array('post', 'page'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            /* Content Section */
            array(
                'label' => __('Content', OC_TEXT_DOMAIN),
                'id' => 'content_tab',
                'type' => 'tab'
            ),
            array(
                'label' => __('Show Section', OC_TEXT_DOMAIN),
                'id' => 'content_title_switch',
                'type' => 'on-off',
                'class' => 'switch_div',
                'std' => 'on',
            ),
            array(
                'label' => __('Custom Title', OC_TEXT_DOMAIN),
                'id' => 'custom_page_title',
                'type' => 'text',
                'std' => '',
                'condition' => 'content_title_switch:is(on)',
            ),
        )
    );

    /**
     * About page details
     * */
    $about_sections = array(
        'id' => 'about_sections',
        'title' => __('Page Sections', OC_TEXT_DOMAIN),
        'desc' => '',
        'pages' => array('page'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            /* Content Section */
            array(
                'label' => __('Content', OC_TEXT_DOMAIN),
                'id' => 'content_tab',
                'type' => 'tab'
            ),
            array(
                'id' => 'page_button_label',
                'label' => __('Button Label', OC_TEXT_DOMAIN),
                'type' => 'text',
                'std' => '',
                'condition' => '',
            ),
            array(
                'id' => 'page_button_link',
                'label' => __('Button Link', OC_TEXT_DOMAIN),
                'type' => 'text',
                'std' => get_permalink( get_page_by_path( 'contact' ) ),
                'condition' => '',
            ),

            /* History Section */
            array(
                'label' => __('History', OC_TEXT_DOMAIN),
                'id' => 'history_tab',
                'type' => 'tab'
            ),
            array(
                'id' => 'history_section_switch',
                'label' => __('Show Section', OC_TEXT_DOMAIN),
                'desc' => '',
                'type' => 'on-off',
                'class' => 'switch_div',
                'std' => 'on',
            ),
            array(
                'id' => 'featured_video_switch',
                'label' => __('Show Featured Video', OC_TEXT_DOMAIN),
                'desc' => '',
                'type' => 'on-off',
                'class' => 'switch_div',
                'std' => 'on',
                'condition' => 'history_section_switch:is(on)'
            ),
            array(
                'id' => 'featured_video_url',
                'label' => __('Video URL', OC_TEXT_DOMAIN),
                'type' => 'text',
                'std' => '',
                'rows' => '1',
                'condition' => 'history_section_switch:is(on)',
            ),
            array(
                'label' => __('Content', OC_TEXT_DOMAIN),
                'id' => 'history_section_content',
                'type' => 'textarea',
                'row' => '5',
                'condition' => 'history_section_switch:is(on)'
            ),

            // Timeline
            array(
                'label' => __('Timeline', OC_TEXT_DOMAIN),
                'id' => 'timeline_tab',
                'type' => 'tab'
            ),
            array(
                'label' => __('Show Section', OC_TEXT_DOMAIN),
                'id' => 'timeline_section_switch',
                'type' => 'on-off',
                'class' => 'switch_div',
                'std' => 'on'
            ),
            array(
                'label' => __('Timeline', OC_TEXT_DOMAIN),
                'id' => 'timeline_blocks',
                'type' => 'list-item',
                'operator' => 'and',
                'settings' => array(
                    array(
                        'label' => __('Content', OC_TEXT_DOMAIN),
                        'id' => 'timeline_content',
                        'type' => 'textarea',
                        'rows' => '3',
                        'stg' => '',
                    ),
                ),
                'condition' => 'timeline_section_switch:is(on)',
                'std' => '',
            ),

            // Stats Counter
            array(
                'label' => __('Stats', OC_TEXT_DOMAIN),
                'id' => 'stats_section',
                'type' => 'tab'
            ),
            array(
                'label' => __('Show Section', OC_TEXT_DOMAIN),
                'id' => 'stats_section_switch',
                'type' => 'on-off',
                'class'     => 'switch_div',
                'std' => 'on'
            ),
            array(
                'label' => __('Background', OC_TEXT_DOMAIN),
                'id' => 'stats_section_bg',
                'type' => 'upload',
                'class' => 'ot-upload-attachment-id',
                'condition' => 'stats_section_switch:is(on)',
            ),
            array(
                'label' => __('Title', OC_TEXT_DOMAIN) . ' 1',
                'id' => 'stats_section_title_1',
                'type' => 'text',
                'std' => '',
                'condition' => 'stats_section_switch:is(on)'
            ),
            array(
                'label' => __('Title', OC_TEXT_DOMAIN) . ' 2',
                'id' => 'stats_section_title_2',
                'type' => 'text',
                'std' => '',
                'condition' => 'stats_section_switch:is(on)'
            ),
            array(
                'label' => __('Stats', OC_TEXT_DOMAIN),
                'id' => 'stats_blocks',
                'type' => 'list-item',
                'operator' => 'and',
                'settings' => array(
                    array(
                        'label' => __('Stats', OC_TEXT_DOMAIN),
                        'id' => 'stats_count',
                        'type' => 'text',
                        'stg' => '',
                    ),
                ),
                'condition' => 'stats_section_switch:is(on)',
                'std' => '',
            ),

            // Team
            array(
                'label' => __('Team', OC_TEXT_DOMAIN),
                'id' => 'team_tab',
                'type' => 'tab'
            ),
            array(
                'label' => __('Show Section', OC_TEXT_DOMAIN),
                'id' => 'team_section_switch',
                'type' => 'on-off',
                'class' => 'switch_div',
                'std' => 'on'
            ),
            array(
                'label' => __('Title', OC_TEXT_DOMAIN),
                'id' => 'team_section_title',
                'type' => 'text',
                'std' => '',
                'rows' => '1',
                'condition' => 'team_section_switch:is(on)',
            ),
            array(
                'label' => __('Team', OC_TEXT_DOMAIN),
                'id' => 'team_blocks',
                'type' => 'list-item',
                'operator' => 'and',
                'settings' => array(

                    array(
                        'label' => __('Text Color', OC_TEXT_DOMAIN),
                        'id' => 'block_title_color',
                        'type' => 'colorpicker',
                        'std'   => '#ffffff',
                    ),
                    array(
                        'label' => __('Subtitle', OC_TEXT_DOMAIN),
                        'id' => 'person_role',
                        'type' => 'text',
                        'stg' => '',
                    ),
                    array(
                        'label' => __('Text Color', OC_TEXT_DOMAIN),
                        'id' => 'block_role_color',
                        'type' => 'colorpicker',
                        'std'   => '#ffffff',
                    ),
                    array(
                        'label' => __('Background Color', OC_TEXT_DOMAIN),
                        'id' => 'block_bg_color',
                        'type' => 'colorpicker',
                        'std'   => '#5bacc2',
                    ),
                    array(
                        'label' => __('Image', OC_TEXT_DOMAIN),
                        'id' => 'person_picture',
                        'type' => 'upload',
                        'class' => 'ot-upload-attachment-id',
                    ),
                ),
                'condition' => 'team_section_switch:is(on)',
                'std' => '',
            ),

        )
    );

    /**
     * Enroll page details
     * */
    $enroll_sections = array(
        'id' => 'enroll_sections',
        'title' => __('Page Sections', OC_TEXT_DOMAIN),
        'desc' => '',
        'pages' => array('page'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            // Informational Blocks
            array(
                'label' => __('Content', OC_TEXT_DOMAIN),
                'id' => 'enroll_content_tab',
                'type' => 'tab'
            ),
            array(
                'label' => __('Show Section', OC_TEXT_DOMAIN),
                'id' => 'enroll_info_section_switch',
                'type' => 'on-off',
                'class' => 'switch_div',
                'std' => 'on'
            ),
            array(
                'label' => __('Description', OC_TEXT_DOMAIN),
                'id' => 'enroll_section_content',
                'type' => 'textarea',
                'row' => '3',
                'condition' => 'enroll_info_section_switch:is(on)',
            ),
            array(
                'label' => __('Information Blocks', OC_TEXT_DOMAIN),
                'id' => 'enroll_info_block',
                'type' => 'list-item',
                'operator' => 'and',
                'settings' => array(
                    array(
                        'label' => __('Content', OC_TEXT_DOMAIN),
                        'id' => 'info_block_content',
                        'type' => 'textarea',
                        'rows' => '3',
                        'stg' => '',
                    ),
                ),
                'condition' => 'enroll_info_section_switch:is(on)',
                'std' => '',
            ),
            /* Contact Form Section */
            array(
                'label' => __('Form Section', OC_TEXT_DOMAIN),
                'id' => 'contact_form_tab',
                'type' => 'tab',
            ),
            array(
                'label' => __('Show Section', OC_TEXT_DOMAIN),
                'id' => 'contact_form_switch',
                'type' => 'on-off',
                'class' => 'switch_div',
                'std' => 'on',
            ),
            array(
                'id' => 'form_labels',
                'label' => __('Form Fields Labels', OC_TEXT_DOMAIN),
                'std' => '',
                'type' => 'textblock-titled',
                'section' => 'contact_options',
                'class' => 'inline_cols',
                'condition' => 'contact_form_switch:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'form_label_1',
                'std' => 'Name',
                'type' => 'text',
                'section' => 'contact_options',
                'class' => 'inline_cols',
                'condition' => 'contact_form_switch:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'form_label_6',
                'std' => 'Date',
                'type' => 'text',
                'section' => 'contact_options',
                'class' => 'inline_cols',
                'condition' => 'contact_form_switch:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'form_label_2',
                'std' => 'Email',
                'type' => 'text',
                'section' => 'contact_options',
                'class' => 'inline_cols',
                'condition' => 'contact_form_switch:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'form_label_3',
                'std' => 'Message',
                'type' => 'text',
                'section' => 'contact_options',
                'class' => 'inline_cols',
                'condition' => 'contact_form_switch:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'form_label_4',
                'std' => 'SUBMIT',
                'type' => 'text',
                'section' => 'contact_options',
                'class' => 'inline_cols',
                'condition' => 'contact_form_switch:is(on)',
                'operator' => 'and'
            ),
            array(
                'label' => __('Services Label', OC_TEXT_DOMAIN),
                'id' => 'form_label_5',
                'type' => 'text',
                'std' => __('Select Services', OC_TEXT_DOMAIN),
                'condition' => 'contact_form_switch:is(on)'
            ),
            array(
                'id' => 'services_id',
                'label' => __('Select', OC_TEXT_DOMAIN),
                'desc' => __('Please select the items to be displayed.', OC_TEXT_DOMAIN),
                'std' => '',
                'type' => 'custom-post-type-checkbox',
                'post_type' => 'service',
                'condition' => 'contact_form_switch:is(on)',
            ),
            array(
                'id' => 'cmail_subject',
                'label' => __('Email Subject', OC_TEXT_DOMAIN),
                'std' => 'Contact query from website ' . get_bloginfo('name'),
                'type' => 'text',
                'section' => 'contact_options',
                'condition' => 'contact_form_switch:is(on)',
            ),
            array(
                'id' => 'recipient_email',
                'label' => __('Recipients', OC_TEXT_DOMAIN),
                'desc' => __('Provide email accounts where you want to receive emails from this form.', OC_TEXT_DOMAIN),
                'std' => get_option('admin_email'),
                'type' => 'text',
                'section' => 'contact_options',
                'condition' => 'contact_form_switch:is(on)',
            ),
            array(
                'label' => __('Custom Form', OC_TEXT_DOMAIN),
                'desc' => __('This will replace the default form.', OC_TEXT_DOMAIN),
                'id' => 'custom_form_switch',
                'type' => 'on-off',
                'std' => 'off',
                'condition' => 'contact_form_switch:is(on)',
            ),
            array(
                'label' => __('Form Embed Code or Shortcode', OC_TEXT_DOMAIN),
                'desc' => __('Please copy and paste the Embed Code or Shortcode of the custom form (if any). This will replace the default form.', OC_TEXT_DOMAIN),
                'id' => 'custom_form_embed',
                'type' => 'textarea',
                'rows' => '3',
                'condition' => 'custom_form_switch:is(on), contact_form_switch:is(on)',
                'operator' => 'and'
            ),

        )
    );

    /**
     * Sidebar option to pages
     * */
    $layouts = array(
        'id' => 'single_page_meta_box',
        'title' => __('Layout', OC_TEXT_DOMAIN),
        //'desc'        => '',
        'pages' => array('page', 'post'),
        'context' => 'side',
        'priority' => 'low',
        'fields' => array(
            array(
                'id' => 'single_post_page_layout',
                //'label'       => __( 'Sidebar', OC_TEXT_DOMAIN ),
                'std' => ot_get_option('single_post_page_layout'),
                'type' => 'radio-image',
                'choices' => array(
                    array(
                        'value' => 'right-sidebar',
                        'label' => __('Right Sidebar', OC_TEXT_DOMAIN),
                        'src' => get_template_directory_uri() . '/option-tree/assets/images/layout/right-sidebar.png',
                    ),
                    array(
                        'value' => 'full-width',
                        'label' => __('No Sidebar', OC_TEXT_DOMAIN),
                        'src' => get_template_directory_uri() . '/option-tree/assets/images/layout/full-width.png',
                    ),
                    array(
                        'value' => 'left-sidebar',
                        'label' => __('Left Sidebar', OC_TEXT_DOMAIN),
                        'src' => get_template_directory_uri() . '/option-tree/assets/images/layout/left-sidebar.png',
                    ),
                )
            ),
        )
    );

    /**
     * Register our meta boxes using the
     * ot_register_meta_box() function.
     */
    if (function_exists('ot_register_meta_box'))

        /* Exclude these templates from having common metaboxes. */
        $exclude_page_templates = array(
            'page-templates/contact-page.php',
            'page-templates/enroll-page.php',
            'page-templates/course-page.php',
            'page-templates/about-page.php'

        );

    $page_id = get_permalink();
    $page_template_file = '';
    if (isset($_REQUEST['post'])) {
        $page_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
        $page_template_file = get_post_meta($page_id, '_wp_page_template', TRUE);
    }
    if (isset($_POST['post_ID'])) {
        $page_id = $_POST['post_ID'];
        $page_template_file = get_post_meta($page_id, '_wp_page_template', TRUE);
    }

    $front_page = get_option('page_on_front');
    $blog_page = get_option('page_for_posts');
    if (isset($page_id) && $front_page == $page_id) {
        ot_register_meta_box($homepage_sections);
    }

    /* Contact Page Metaboxes */
    if ($page_template_file == 'page-templates/contact-page.php') {
        ot_register_meta_box($contact_sections);
    }

    /* About Page Metaboxes */
    if ($page_template_file == 'page-templates/about-page.php') {
        ot_register_meta_box($about_sections);
    }

    /* Enroll Page Metaboxes */
    if ($page_template_file == 'page-templates/enroll-page.php') {
        ot_register_meta_box($enroll_sections);
    }

    /* General Pages Sections Settings */
    if (isset($page_id) && $front_page != $page_id && $blog_page != $page_id && !in_array($page_template_file, $exclude_page_templates)) {
        // ot_register_meta_box($page_sections);
        ot_register_meta_box($event_course_details);
        ot_register_meta_box($layouts);
    }
}
