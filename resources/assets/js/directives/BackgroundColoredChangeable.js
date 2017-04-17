export default {
    inserted: function (el) {
        let $el = $(el);
        $el.attr('directive', 'v-background-colored-changeable');
        let $button = $('<button id="btnChangeBackground" class="btn btn-default teste-button">' +
                        '   <i class="glyphicon glyphicon-cog"></i> Alterar background' +
                        '</button>');
        
        $el.on('mouseenter', function() {
            $button.appendTo($(this)).show();
        });
        
        $el.on('mouseleave', function() {
            $button.hide();
        });
        
        $button.on('click', function() {
            window.src = 'style';
            window.element = $el;
            $("#backgroundChangerModal").modal('show');
        });
        
    }
}
