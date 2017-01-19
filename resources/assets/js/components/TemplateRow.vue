

<script type="text/javascript">

    let res = Vue.compile('<div>Teste</div>');

    export default {
        props: ['template'],

        data() {
            return {
                teste: null
            };
        },

        computed: {
            templateHtml() {
                return this.template.html;
            }
        },

        created() {
            //this.teste = Vue.compile(this.templateHtml);
        },

        render: res.render
    }
</script>
