
export default {
    inserted: function (el) {
        let $el = $(el);
        let $button = $('<button id="btnChangeBackground" class="btn btn-default teste-button">' +
            '<i class="glyphicon glyphicon-cog"></i> Alterar background</button>');

        $el.on('mouseenter', function() {
            $button.appendTo($(this)).show();
        });

        $el.on('mouseleave', function() {
            $button.hide();
        });

        $button.on('click', function() {
            window.src = 'style';
            window.element = $el;
            window.pattern = 'background:url(%URL%) no-repeat; height: 480px; width:100%';
            $("#imageChangeableModal").modal('show');
        });

    }
}
