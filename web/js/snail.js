(function(Snail){

    $.extend(Snail, {

        success: function(json){
            var json = $.extend({
                message: '',
                url: '',
                time: 2000
            }, json);

            if (json.message) {
                alert(json.message);
            }
            if (url) {
                window.location = url;
            }
        },

        error: function(message, seconds, url){
            var json = $.extend({
                message: 'Error, please try refresh you browser!',
                url: '',
                time: 2000
            }, json);

            alert(json.message);

            if (url) {
                window.location = url;
            }
        },

        bindAsync: function(){
            $('body').on('submit', 'form[rel="async"]', function(e){
                e.preventDefault();
                var $form = $(this),
                    method = $form.attr('method') || 'GET',
                    action = $form.attr('action') || window.location.href;
                $.ajax({
                    url: action,
                    method: method,
                    dataType: 'json',
                    data: $form.serialize(),
                    success: function(json){
                        if (json.code == 0) {
                            Snail.success(json);
                        } else {
                            Snail.error(json);
                        }
                    }
                });
            });
        },

        tinymceInit: function(){
            var tinymceSet = {};
            if (Snail.lang != 'en-US') {
                tinymceSet.language = Snail.lang.replace('-', '_');
            }
            tinymce.init($.extend({
                selector: "textarea",
                height: 300,
                content_css: Snail.baseUrl + '/css/tinymce.css',
                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                setup: function(editor) {
                    editor.on('blur', function(e) {
                        var content = editor.getContent();
                        $('#topic-content').val(content);
                    });
                }
            }, tinymceSet));
        },

        init: function() {

            Snail.lang = $('html').attr('lang');

            Snail.bindAsync();

            if ($('.post-create').length > 0) {
                Snail.tinymceInit();
            }
        }

    });

    Snail.init();

})(window.Snail);