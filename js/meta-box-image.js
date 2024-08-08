jQuery(document).ready(function ($) {
    var frame;
    $('.upload_image_button').on('click', function (event) {
        event.preventDefault();
        var $input = $(this).prev('input');

        frame = wp.media({
            title: 'Select or Upload an Image',
            button: {
                text: 'Use this image'
            },
            multiple: false
        });

        frame.on('select', function () {
            var attachment = frame.state().get('selection').first().toJSON();
            $input.val(attachment.url);
        });

        frame.open();
    });
});