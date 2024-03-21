(function ($, d) {
    $(d).ready(function () {
        // bootstrap WYSIHTML5 - text editor
        $('.editor').summernote({
            height: 150,   //set editable area's height
            codemirror: { // codemirror options
                theme: 'monokai'
            }
        });

        $('#banner-slider-form').validate({
            rules: {
                image: {
                    required: true,
                    extension: "jpg|jpeg|png"
                },
            },
            messages: {
                image: {
                    required: "Slider image filed is required",
                    extension: "Only jpg and png files allowed"
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
})(jQuery, document);
