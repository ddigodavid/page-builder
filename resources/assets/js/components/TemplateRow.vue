<script type="text/javascript">
    export default {
        props: ['template'],

        created() {
            let res = Vue.compile(`<div class="row template-row">${this.template.html}</div>`);
            this.$options.render = res.render;
            this.$options.staticRenderFns = res.staticRenderFns;
        }
    }
</script>
