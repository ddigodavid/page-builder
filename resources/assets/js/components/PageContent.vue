<template>
    <div class="wrapper">
        <div class="panel panel-default">
            <div class="panel-heading">Conteúdo</div>
            <div class="panel-body">
                <div id="content" v-droppable="{accept: '#template-list > li', drop: onDrop}" v-sortable></div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">

    const eventBus = new Vue({});

    export default {
        data() {
            return {
                container: {},
                templates: []
            }
        },
        mounted() {
            this.container = $(this.$el).find('#content');

            eventBus.$on('deleted', function(instance) {

                $(instance.$el).parent().remove();

            });

        },

        methods: {

            onDrop(draggable) {
                //
                let template = draggable.data('template');
                //
                // this.addTemplate(template);

                let tpl = Vue.extend({
                    template: `<div><button class="btn btn-danger" style="position:relative;z-index:1000;top:36px;left:-15px;"@click.prevent="removeTemplate">
                                <i class="glyphicon glyphicon-trash"></i> Remover
                            </button>${template.html}</div>`,
                    methods: {
                        removeTemplate() {
                            eventBus.$emit('deleted', this);
                        }
                    }
                });

                let wrapper = $(`<div class="row template-row">
                                    <div id="template"></div>
                                </div>`);
                wrapper.appendTo('#content');

                new tpl({parent: this}).$mount('#template');

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
