<template>
    <div v-html="template.html"></div>
</template>
<script type="text/javascript">
    export default {
        props: ['template'],

        created() {
            let template = "<div class='template-row'>" + this.template.html+ "</div>";
            let res = Vue.compile(template);
            this.$options.render = res.render;
            this.$options.staticRenderFns = res.staticRenderFns;
        }
    }
</script>