( function( $ ) {
    jQuery(document).ready(function ($) {

        //bind add-image button click
        $(document).on("click", ".upload_image_button", function (e) {
            e.preventDefault();
            var $button = $(this);


            // Create the media frame.
            var file_frame = wp.media.frames.file_frame = wp.media({
                title: 'Select or upload image',
                library: { // remove these to show all
                    type: 'image' // specific mime
                },
                button: {
                    text: 'Select'
                },
                multiple: false  // Set to true to allow multiple files to be selected
            });

            // When an image is selected, run a callback.
            file_frame.on('select', function () {
                // We set multiple to false so only get one image from the uploader

                var attachment = file_frame.state().get('selection').first().toJSON();

                $button.siblings('input').val(attachment.id);

                // Enable the save widget button
                $button.parents('form').find('input[name="savewidget"]').val(wpWidgets.l10n.save).prop('disabled', false);
            });

            // Finally, open the modal
            file_frame.open();
        });

        // bind color-picker button
        function onecom_colorpicker_init(parent){
            jQuery(parent).find('.onecom_widget_colorpicker').each(function(i, v){
                jQuery(v).wpColorPicker({
                    change: function(event, ui) {
                        var element = event.target;
                        var color = ui.color.toString();

                        // Enable the save widget button
                        jQuery(event.target).parents('form').find('input[name="savewidget"]').val(wpWidgets.l10n.save).prop('disabled', false);
                    }
                });
            });
        }

        if ($('.onecom_widget_colorpicker').length > 0) {
            onecom_colorpicker_init('.widgets-sortables');
        }

        if( $( '.one-social-default-checkbox' ).length > 0 ) {
            $( '.one-social-default-checkbox' ).each( function( event, checkbox ) {
                var checked = ( $( this ).is( ':checked' ) ) ? true : false;
                if( checked ) {
                    $( this ).parents( 'table:first' ).find( '.toggle-tr' ).hide();
                } else {
                    $( this ).parents( 'table:first' ).find( '.toggle-tr' ).show();
                }
            } );

            $( document ).on( 'click', '.one-social-default-checkbox', function( event ) {
                var checked = ( $( this ).is( ':checked' ) ) ? true : false;
                console.log( checked );
                if( checked ) {
                    $( this ).parents( 'table:first' ).find( '.toggle-tr' ).hide();
                } else {
                    $( this ).parents( 'table:first' ).find( '.toggle-tr' ).show();
                }
            } );

            $(document).on('widget-updated widget-added', function (e, widget) {
                onecom_colorpicker_init(widget);
                var checkbox = $(widget).find('.one-social-default-checkbox');
                var checked = ($(checkbox).is(':checked')) ? true : false;
                if (checked) {
                    $(checkbox).parents('table:first').find('.toggle-tr').hide();
                } else {
                    $(checkbox).parents('table:first').find('.toggle-tr').show();
                }
            });
        }



    });
} )( jQuery );