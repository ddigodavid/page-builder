
export default {
    inserted: function (el) {
        let $el = $(el);
        let $button = $('<button id="btnChangeMedia" class="btn btn-default teste-button">' +
            '<i class="glyphicon glyphicon-cog"></i> Alterar mídia</button>');
    
        $el.attr('directive', 'v-media-changeable');
        $el.parent().addClass('min-height-vue-directive');
        
        $el.parent().on('mouseenter', function() {
            $button.appendTo($(this)).show();
        });

        $el.parent().on('mouseleave', function() {
            $button.hide();
        });

        $button.on('click', function() {
            window.element = $el;
            $("#mediaChangerModal").modal('show');
        });

    }
}
