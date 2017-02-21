export default {
    // When the bound element is inserted into the DOM...
    inserted: function (el) {
        let $el = $(el);
        
        $el.sortable({
            handle: '.sort-handler',
            cancel: ''
        });
    }
}