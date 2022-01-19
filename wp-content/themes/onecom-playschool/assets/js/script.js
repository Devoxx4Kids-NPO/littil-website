(function ($) {

    /** Temp menu fix by forcing ltr */
    jQuery(document).ready(function(){
        jQuery("html").attr("dir", "ltr")
        });

    jQuery.each(
        jQuery('#sticky_menu').find('li.menu-item-has-children'),
        function (i, v) {
            jQuery(v).append('<i />');
        }
    );
    jQuery('#sticky_menu').find('li.menu-item-has-children i').bind('click', function () {
        jQuery(this).parent().find('.sub-menu').first().slideToggle('fast').parent().toggleClass('expanded');
    });
    jQuery('.menu-toggle, .sticky_menu_collapse').bind('click', function () {
        if (jQuery('#page').hasClass('shifted')) {
            jQuery('#page').removeClass('shifted');
            jQuery('body').removeClass('no-scroll');
            jQuery('#oct-wrapper').removeClass('no-scroll');
        } else {
            jQuery('#page').addClass('shifted');
            jQuery('body').addClass('no-scroll');
            jQuery('#oct-wrapper').addClass('no-scroll');
        }

    });

    /** Common form functions */
    function oc_validate_interactions(){
        var requiredFieldCount = jQuery('.oct-form').find('[required]').length;
        var touchedFieldCount = jQuery('.oct-form').find('[oc-touched]').length;
        return requiredFieldCount == touchedFieldCount;
    }
    function oc_reset_security(response){
        jQuery('#oc_cap_img').attr('src', response.image);
        jQuery('#oc_cpt').val(response.token);
        jQuery('#validate_nonce').val('');
        jQuery('[oc-touched]').removeAttr('oc-touched');
    }


    /**  Enroll Form */
    jQuery(document).on('focus', '.oct-form [required]', function(){
        jQuery(this).attr('oc-touched', '1');
    });
    
    jQuery('.oct-form [required]').first().focus(function(){        
        if (jQuery('#validate_nonce').val() != ''){
            return;
        }
        jQuery.post(one_ajax.ajaxurl, {
            action: 'oct_form_nonce'
        }, function(response){
            jQuery('#validate_nonce').val(response.nonce);            
        }); 
    });

    /** Enroll Form Submission */
    jQuery('#enroll_form').bind('submit', function (event) {
        console.log('Please wait...');
        if (event.preventDefault) {
            event.preventDefault();
        } else {
            event.returnValue = false;
        }
        var msg = one_ajax.msg;
        jQuery('.form_message').slideUp().text('');
        jQuery('#enroll_form').find('input[type="submit"]').attr('disabled', 'disabled').val(msg);

        var ajax_url = one_ajax.ajaxurl;
        var btn_title = one_ajax.send;

        var email = jQuery('#enroll_form').find('.enroll_email').val();
        var name = jQuery('#enroll_form').find('.enroll_name').val();
        var date = jQuery('#enroll_form').find('.enroll_date').val();
        var service = jQuery('#enroll_form').find('#enroll_service option:selected').val();
        var message = jQuery('#enroll_form').find('.enroll_msg').val();
        var subject = jQuery('#enroll_form').find('#contact_subject').val();
        var recipient = jQuery('#enroll_form').find('#contact_recipient').val();
        var label_1 = jQuery('#enroll_form').find('#label_1').val();
        var label_2 = jQuery('#enroll_form').find('#label_2').val();
        var label_3 = jQuery('#enroll_form').find('#label_3').val();
        var label_5 = jQuery('#enroll_form').find('#label_5').val();
        var label_6 = jQuery('#enroll_form').find('#label_6').val();
        var validate_nonce = jQuery('#enroll_form').find('#validate_nonce').val();
        var oc_cpt = jQuery('#enroll_form').find('#oc_cpt').val();
        var oc_captcha_val = jQuery('#enroll_form').find('#oc-captcha-val').val();
        var oc_csrf_token = jQuery('#enroll_form').find('#oc_csrf_token').val();

        /* Data to send */
        data = {
            action: 'send_enroll_form',
            name: name,
            email: email,
            date: date,
            service: service,
            message: message,
            subject: subject,
            recipient: recipient,
            label_1: label_1,
            label_2: label_2,
            label_3: label_3,
            label_5: label_5,
            label_6: label_6,
            validate_nonce: validate_nonce,
            oc_csrf_token: oc_csrf_token
        };

        if (oc_validate_interactions()){
            data.oc_cpt = oc_cpt;
            data.oc_captcha_val = oc_captcha_val;
        }    

        jQuery.post(ajax_url, data, function (response) {


            if (response.type == 'error') {
                jQuery('#enroll_form').find('input[type="submit"]').removeAttr('disabled').val(btn_title);
                jQuery('.form_message').html(response.text).slideDown();
                console.log(response.text);
            } else if (response.type == 'success') {
                jQuery('#enroll_form').find('input[type="submit"]').removeAttr('disabled').val(btn_title);
                jQuery('#enroll_form').trigger('reset');
                jQuery('.form_message').html(response.text).slideDown();
                oc_reset_security(response);
                console.log(response.text);
            } else {
                jQuery('#enroll_form').find('input[type="submit"]').removeAttr('disabled').val(btn_title);
                jQuery('.form_message').html(response.text).slideDown();
                console.log(response.text);
            }

        }, "json");

    });


    jQuery('#contact_form').bind('submit', function (event) {
        console.log('Please wait...');
        if (event.preventDefault) {
            event.preventDefault();
        } else {
            event.returnValue = false;
        }
        var msg = one_ajax.msg;
        jQuery('.form_message').slideUp().text('');
        jQuery('#contact_form').find('input[type="submit"]').attr('disabled', 'disabled').val(msg);

        var ajax_url = one_ajax.ajaxurl;
        var btn_title = one_ajax.send;

        var email = jQuery('#contact_form').find('.contact_email').val();
        var name = jQuery('#contact_form').find('.contact_name').val();
        var message = jQuery('#contact_form').find('.contact_msg').val();
        var subject = jQuery('#contact_form').find('#contact_subject').val();
        var recipient = jQuery('#contact_form').find('#contact_recipient').val();
        var label_1 = jQuery('#contact_form').find('#label_1').val();
        var label_2 = jQuery('#contact_form').find('#label_2').val();
        var label_3 = jQuery('#contact_form').find('#label_3').val();
        var validate_nonce = jQuery('#contact_form').find('#validate_nonce').val();
        var oc_cpt = jQuery('#contact_form').find('#oc_cpt').val();
        var oc_captcha_val = jQuery('#contact_form').find('#oc-captcha-val').val();
        var oc_csrf_token = jQuery('#contact_form').find('#oc_csrf_token').val();

        /* Data to send */
        data = {
            action: 'send_contact_form',
            name: name,
            email: email,
            message: message,
            subject: subject,
            recipient: recipient,
            label_1: label_1,
            label_2: label_2,
            label_3: label_3,
            validate_nonce: validate_nonce,
            oc_csrf_token: oc_csrf_token
        };

        if (oc_validate_interactions()){
            data.oc_cpt = oc_cpt;
            data.oc_captcha_val = oc_captcha_val;
        }

        jQuery.post(ajax_url, data, function (response) {


            if (response.type == 'error') {
                jQuery('#contact_form').find('input[type="submit"]').removeAttr('disabled').val(btn_title);
                jQuery('.form_message').html(response.text).slideDown();
                console.log(response.text);
            } else if (response.type == 'success') {
                jQuery('#contact_form').find('input[type="submit"]').removeAttr('disabled').val(btn_title);
                jQuery('#contact_form').trigger('reset');
                jQuery('.form_message').html(response.text).slideDown();
                oc_reset_security(response);
                console.log(response.text);
            } else {
                jQuery('#contact_form').find('input[type="submit"]').removeAttr('disabled').val(btn_title);
                jQuery('.form_message').html(response.text).slideDown();
                console.log(response.text);
            }

        }, "json");

    });

})(jQuery);
