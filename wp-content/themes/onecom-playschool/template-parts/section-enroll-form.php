<?php

/**
 * Section enroll form
 */

if (get_post_meta(get_the_ID(), 'contact_form_switch', true) != 'off') :
    $custom_form_switch = get_post_meta(get_the_ID(), 'custom_form_switch', true);
    $custom_form_embed = get_post_meta(get_the_ID(), 'custom_form_embed', true);
    ?>

    <section class="oct-form text-center">

        <div class="row">
            <div class="col-md-12">
                <div class="form-box">
                    <?php if ($custom_form_switch != 'on') : ?>
                        <form id="enroll_form" class="oct-form text-left" role="form">
                            <fieldset>
                                <?php
                                        $label_1 = get_post_meta(get_the_ID(), 'form_label_1', true);
                                        $label_1 = (isset($label_1) && strlen($label_1)) ? $label_1 : __("Name", OC_TEXT_DOMAIN);
                                        ?>
                                <label><?php echo $label_1; ?> *</label>
                                <input type="text" class="input enroll_name" maxlength="120" required />
                                <input type="hidden" name="label_1" id="label_1" value="<?php echo $label_1; ?>" />
                            </fieldset>
                            <fieldset>
                                <?php
                                        $label_6 = get_post_meta(get_the_ID(), 'form_label_6', true);
                                        $label_6 = (isset($label_6) && strlen($label_6)) ? $label_6 : __("Date", OC_TEXT_DOMAIN);
                                        ?>
                                <label><?php echo $label_6; ?> *</label>
                                <input type="date" class="input enroll_date" maxlength="120" max="9999-12-31" required />
                                <input type="hidden" name="label_6" id="label_6" value="<?php echo $label_6; ?>" />
                            </fieldset>
                            <fieldset>
                                <?php
                                        $label_5 = get_post_meta(get_the_ID(), 'form_label_5', true);
                                        $label_5 = (isset($label_5) && strlen($label_5)) ? $label_5 : __("Courses", OC_TEXT_DOMAIN);
                                        ?>

                                <label for="enroll_service"> <?php echo $label_5; ?> * </label>
                                <select id="enroll_service" name="enroll_service" class="select" required>
                                    <option value="" selected="selected"> -- </option>
                                    <?php
                                            /* Display selected services or all services */
                                            $services_ids = get_post_meta(get_the_ID(), 'services_id', true);
                                            $args = array(
                                                'post_type' => array('service'),
                                                'post_status' => array('publish'),
                                                'posts_per_page' => '-1',
                                            );
                                            if (is_array($services_ids) && !empty($services_ids)) {
                                                $args['post__in'] = $services_ids;
                                            }

                                            $services = new WP_Query($args);

                                            if (!empty($services_ids) && $services->have_posts()) :
                                                ?>
                                        <?php
                                                    while ($services->have_posts()) :
                                                        $services->the_post();
                                                        ?>
                                            <option value=" <?php the_title(); ?>"> <?php the_title(); ?></option>
                                        <?php endwhile; ?>
                                    <?php endif; ?>

                                    <?php
                                            /* Restore original Post Data */
                                            wp_reset_postdata();
                                            ?>
                                </select>
                                <input type="hidden" name="label_5" id="label_5" value="<?php echo $label_5; ?>" />
                            </fieldset>
                            <fieldset>
                                <?php
                                        $label_2 = get_post_meta(get_the_ID(), 'form_label_2', true);
                                        $label_2 = (isset($label_2) && strlen($label_2)) ? $label_2 : __("Email", OC_TEXT_DOMAIN);
                                        ?>
                                <label><?php echo $label_2; ?> *</label>
                                <input type="email" class="input enroll_email" maxlength="120" required />
                                <input type="hidden" name="label_2" id="label_2" value="<?php echo $label_2; ?>" />
                            </fieldset>
                            <fieldset>
                                <?php
                                        $label_3 = get_post_meta(get_the_ID(), 'form_label_3', true);
                                        $label_3 = (isset($label_3) && strlen($label_3)) ? $label_3 : __("Message", OC_TEXT_DOMAIN);
                                        ?>
                                <label><?php echo $label_3; ?> *</label>
                                <textarea rows="10" cols="50" class="input enroll_msg" name="message" required></textarea>
                                <input type="hidden" name="label_3" id="label_3" value="<?php echo $label_3; ?>" />
                            </fieldset>

                            <?php
                                    /* Subject of the contact email */
                                    $subject = get_post_meta(get_the_ID(), 'cmail_subject', true);

                                    if (!isset($subject) && !strlen($subject)) {
                                        /* Set default if not subject saved from admin */
                                        $subject = 'Contact query from ' . get_bloginfo('name');
                                    }

                                    $contact_recipient = get_post_meta(get_the_ID(), 'recipient_email', true);
                                    if (!isset($contact_recipient) && !strlen($contact_recipient)) {
                                        /* Set default recipient to Admin Email */
                                        $contact_recipient = get_option('admin_email');
                                    }
                                    ?>
                            <input type="hidden" name="contact_subject" id="contact_subject" value="<?php echo $subject; ?>" />
                            <input type="hidden" name="contact_recipient" id="contact_recipient" value="<?php echo $contact_recipient; ?>" />

                            <fieldset>
                                <?php echo oc_secure_fields(); ?>
                                <?php $label_4 = get_post_meta(get_the_ID(), 'form_label_4', true); ?>
                                <input type="submit" class="submit btn oct-btn-form" value="<?php echo ((isset($label_4) && strlen($label_4)) ? $label_4 : __('SUBMIT', OC_TEXT_DOMAIN)); ?>" name="enroll-submit" />
                            </fieldset>
                            <fieldset>
                                <div class="form_message"></div>
                            </fieldset>
                        </form>
                    <?php else : ?>
                        <?php echo apply_filters('the_content', $custom_form_embed); ?>
                    <?php endif; ?>
                </div>


            </div>
        </div>
    </section>
<?php

endif;
