
export default {
    inserted: function (el) {
        let $el = $(el);
        let $button = $('<button id="btnChangeImageSource" class="btn btn-default teste-button">' +
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
