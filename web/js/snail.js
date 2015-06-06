(function(Snail){

    Snail.init = function() {

        Snail.lang = $('html').attr('lang');

        try {
            var langSet = {};
            if (Snail.lang != 'en-US') {
                langSet.language = Snail.lang.replace('-', '_');
            }
            tinymce.init($.extend({
                selector: "textarea",
                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            }, langSet));
        } catch (e){}
    };

    Snail.init();

})(window.Snail || {});