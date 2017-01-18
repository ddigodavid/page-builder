export default {
    // When the bound element is inserted into the DOM...
    inserted: function (el) {
        $(el).draggable({
            revert: "invalid", // when not dropped, the item will revert back to its initial position
            containment: "document",
            helper: "clone",
            cursor: "move"
        });
    }
}
