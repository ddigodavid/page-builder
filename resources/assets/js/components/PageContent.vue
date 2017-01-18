<template>
    <div class="wrapper">
        <div class="panel panel-default">
            <div class="panel-heading">Conteúdo</div>
            <div class="panel-body">
                <div id="content"></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                'container': {}
            }
        },
        mounted() {

            let self = this;
            this.container = $(this.$el).find('#content');

            this.container.droppable({
                accept: "#template-list > li",

                drop: function(event, ui) {
                    self.onTemplateIsDropped(ui.draggable);
                }
            });

        },

        methods: {

            onTemplateIsDropped(template) {

                let self = this;

                template.fadeOut(function() {
                    var $list = $("ul", self.container).length ?
                            $("ul", self.container) :
                            $("<ul class='gallery ui-helper-reset'/>").appendTo(self.container);

                    template.appendTo($list).fadeIn(function() {
                        
                    });
                });

            }

        }
    }
</script>
