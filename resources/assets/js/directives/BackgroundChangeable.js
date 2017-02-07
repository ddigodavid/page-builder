export default {
    inserted: function (el) {

        $(el).on('mouseenter', function() {
            $(this).append(`<button class="btn btn-default teste-button"><i class="fa fa-cog"></i>Alterar background</button>`)
        });

        $(el).on('mouseleave', function() {
            $(this).find('button').remove();
        });

    }
}
