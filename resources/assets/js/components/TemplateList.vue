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
                            <img class="img-responsive" :src="tpl.thumb">
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</template>

<script type="text/javascript">
    export default {
        data() {
            return {
                templates: []
            }
        },
        mounted() {
            this.$http.post('/templates/list').then((response) => {
                this.templates = response.data.templates;
            });
        }
    }
</script>
