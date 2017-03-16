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
        props: ['saveButton', 'draftButton', 'html'],
        data() {
            return {
                container: {}
            }
        },
        mounted() {
            this.container = $(this.$el).find('#content');

            eventBus.$on('deleted', function (instance) {
                $(instance.$el).parent().remove();
            });

            $(this.saveButton).on('click', () => {
                this.$emit('onSavePage', this.getHtml(), 1);
            });

            $(this.draftButton).on('click', () => {
                this.$emit('onDraftPage', this.getHtml(), 0);
            });

            let html = this.html.replace(new RegExp(`directive=["|'](.*?)["|']`, 'g'), '$1 directive="$1"');
            console.log(html);
            $(html).each((index, html) => {
                console.log(html);
                html = $(html);
                if (html.hasClass('template-row')) {
                    this.buildTemplate(html.html());
                }
            });
        },

        methods: {

            onDrop(draggable) {
                let template = draggable.data('template');

                this.buildTemplate(`
                    <div>
                        ${template.html}
                        <div class="btn-group" style="display:none;position:absolute;top:0px;left:0px;">
                            <button class="btn btn-sm btn-danger" directive='@click.prevent=removeTemplate' @click.prevent="removeTemplate">
                                <i class="glyphicon glyphicon-trash"></i>
                            </button>
                            <button class="btn btn-default btn-sm sort-handler">
                                <i class="glyphicon glyphicon-move"></i>
                            </button>
                        </div>
                    </div>
                `);

                this.initCKEditor();
            },

            getHtml() {
                return this.container.html();
            },

            buildTemplate(html) {
                let tpl = Vue.extend({
                    template: html,
                    methods: {
                        removeTemplate() {
                            eventBus.$emit('deleted', this);
                        }
                    }
                });

                let wrapper = $(`<div class="template-row"><div id="template"></div></div>`);
                wrapper.appendTo('#content');
                new tpl({parent: this}).$mount('#template');

                $('div.template-row').on('mouseenter', function () {
                    $(this).find('div.btn-group').show();
                });

                $('div.template-row').on('mouseleave', function () {
                    $(this).find('div.btn-group').hide();
                });
            },
            initCKEditor() {
                $("[contenteditable=true]:not('.cke_editable')").each(function () {
                    $(this).attr('id', 'cke_editor');
                    CKEDITOR.inline('cke_editor');
                    $(this).attr('id', '');
                });
            }

        }
    }
</script>
