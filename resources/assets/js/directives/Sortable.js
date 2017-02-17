export default {
    // When the bound element is inserted into the DOM...
    inserted: function (el) {
        $(el).sortable();
    }
}
