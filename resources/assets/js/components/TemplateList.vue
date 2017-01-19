<template>
    <div class="panel panel-default">
        <div class="panel panel-heading">Templates</div>
        <div class="panel-body">
            <ul id="template-list" class="ui-helper-reset ui-helper-clearfix">

                <li v-for="tpl in templates" v-draggable :data-template="JSON.stringify(tpl)">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ tpl.name }}</h3>
                        </div>
                        <div class="panel-body">
                            Imagem do {{ tpl.name }}
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</template>

<script type="text/javascript">
    export default {

        //props: ['templates'],

        data() {
            return {
                templates: [
                    {
                        name: 'Template 1',
                        html: `
                        <div><h1 contenteditable="true">Título template 1</h1><p contenteditable="true">Lorem ipsum dolor sit amet ...</p><button class="btn btn-default" v-draggable>Teste</button></div>
                        `
                    },
                    {
                        name: 'Template 2',
                        html: `
                        <div><h1>Título template 2</h1><p>Lorem ipsum dolor sit amet ...</p></div>
                        `
                    },
                ],
                teste: {
                    name: 'testando'
                }
            }
        },

        created() {



        },

        mounted() {

        }
    }
</script>
