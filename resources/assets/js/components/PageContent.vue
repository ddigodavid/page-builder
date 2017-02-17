<template>
    <div class="wrapper">
        <div class="panel panel-default">
            <div class="panel-heading">Conteúdo</div>
            <div class="panel-body">
                <div id="content" v-droppable="{accept: '#template-list > li', drop: onDrop}">
                    <!--<template v-for="(tpl, index) in templates">-->
                        <!--<button class="btn btn-danger"-->
                                <!--style="position:relative;z-index:1000;top:36px;left:-15px;"-->
                                <!--@click.prevent="removeTemplate(index)">-->
                            <!--<i class="glyphicon glyphicon-trash"></i> Remover-->
                        <!--</button>-->
                        <!--<template-row :template="tpl"></template-row>-->
                    <!--</template>-->
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
                //
                let template = draggable.data('template');
                //
                // this.addTemplate(template);

                let tpl = Vue.extend({
                    template: template.html,
                    methods: {
                        removeTemplate() {
                            alert('oi');
                        }
                    }
                });

                let wrapper = $(`<div class="row template-row">
                                    <button class="btn btn-danger"
                                            style="position:relative;z-index:1000;top:36px;left:-15px;"
                                            @click.prevent="removeTemplate">
                                        <i class="glyphicon glyphicon-trash"></i> Remover
                                    </button>
                                    <div id="template"></div>
                                </div>`);
                wrapper.appendTo('#content');
                new tpl().$mount('#template');

            },

            addTemplate(template)
            {
                this.templates.push(template);
            },

            getHtml() {
                return this.container.html();
            },

            removeTemplate(index) {
                alert('sqn');
            }

        }
    }
</script>
