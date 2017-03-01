
export default {
    inserted: function (el) {
        let $el = $(el);
        $el.attr('directive', 'v-text-changeable');
        let $button = $('<button id="btnChangeText" class="btn btn-default teste-button">' +
            '<i class="glyphicon glyphicon-cog"></i> Editar</button>');

        $el.parent().on('mouseenter', function() {
            $button.appendTo($(this)).show();
        });

        $el.parent().on('mouseleave', function() {
            $button.hide();
        });

        $button.on('click', function() {
            window.element = $el.parent();
            window.elementHtml = $el.parent().html();
            $("#textChangeableModal").modal('show');
        });

    }
}
