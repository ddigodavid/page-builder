export default {
    inserted: function (el, binding) {
        $(el).droppable({
            accept: binding.value.accept,
            drop: (event, ui) => {
                binding.value.drop(ui.draggable);
            }
        });
    }
}
