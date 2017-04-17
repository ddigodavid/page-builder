
export default {
    inserted: function (el) {
        let $el = $(el);
        $el.attr('directive', 'v-image-changeable');
        let $button = $('<button id="btnChangeImageSource" class="btn btn-default teste-button" style="z-index: 9999;">' +
            '<i class="glyphicon glyphicon-cog"></i> Alterar imagem</button>');

        $el.parent().on('mouseenter', function() {
            $button.appendTo($(this)).show();
        });

        $el.parent().on('mouseleave', function() {
            $button.hide();
        });

        $button.on('click', function() {
            window.src = 'src';
            window.element = $el;
            window.pattern = '%URL%';
            $("#imageChangeableModal").modal('show');
        });

    }
}
