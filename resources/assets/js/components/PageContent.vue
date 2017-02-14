<template>
    <div class="wrapper">
        <div class="panel panel-default">
            <div class="panel-heading">Conteúdo</div>
            <div class="panel-body">
                <div id="content" v-droppable="{accept: '#template-list > li', drop: onDrop}">
                    <template v-for="tpl in templates">
                        <template-row :template="tpl"></template-row>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
    export default {
        data() {
            return {
                container: {},
                templates: []
            }
        },
        mounted() {
            this.container = $(this.$el).find('#content');
        },

        methods: {

            onDrop(draggable) {

                let template = draggable.data('template');

                this.addTemplate(template);

            },

            addTemplate(template)
            {
                this.templates.push(template);
            },

            getHtml() {
                return this.container.html();
            }

        }
    }
</script>
