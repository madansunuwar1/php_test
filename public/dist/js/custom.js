(function ($, d) {
    $(d).ready(function () {
        // bootstrap WYSIHTML5 - text editor
        const editorHeight = $('.editor').attr('rows') ?? 150;
        $('.editor').summernote({
            height: editorHeight,   //set editable area's height
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

        $(d).on('click', '.remove-img', function () {
            if($(this).data('confirm') && !confirm($(this).data('confirm'))){
                return false;
            }
            $(this).closest('.img-preview').remove();
        });

        $('.sortable').sortable({
            update: function(event, ui) {
                const sortTarget = $('[name="sort_order[]"]');
                const token = sortTarget.data('token');
                const url = sortTarget.data('url');
                const order = sortTarget.map(function(){return $(this).val();}).get();
                $.ajax({
                    method: "POST",
                    url: url,
                    data: { order: order, "_token": token, }
                });
            }
        });

    });//document ready
})(jQuery, document);
