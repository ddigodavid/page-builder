<template>
    <div class="modal fade photo-gallery" id="textChangeableModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edição de conteúdo</h4>
                </div>
                <div class="modal-body">
                    <textarea rows="4">{{ elementHtml }}</textarea>
                </div>
            </div>
        </div>
    </div>
</template>
<script type="text/javascript">
    export default {
        data() {
            return {
                element: window.element,
                elementHtml: window.elementHtml
            }
        },
        methods: {

        },
        computed: {

        }

    }
</script>