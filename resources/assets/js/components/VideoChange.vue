<template>
    <div class="modal fade photo-gallery" id="videoChangeableModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Alteração de vídeo</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <label>URL do vídeo</label>
                            <input id="videoUrl" class="form-control" placeholder="URL do vídeo">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <button class="btn btn-default pull-right" data-dismiss="modal" aria-label="Close">Cancelar</button>
                            <button class="btn btn-primary pull-right" @click.prevent="insertVideo">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script type="text/javascript">
    //https://www.youtube.com/watch?v=OYVyLTNeZog
    export default {
        methods: {
            insertVideo() {
                let identifier = this.getIdentifier($("#videoUrl").val());

                let tpl = Vue.extend({
                    template: `<iframe v-media-changeable width="526" height="266" src="http://www.youtube.com/embed/${identifier}" frameborder="0" allowfullscreen></iframe>`
                });

                let wrapper = $(`<div id="template"></div>`);
                window.element.parent().html(wrapper);

                new tpl({parent: this}).$mount('#template');

                $("#videoChangeableModal").modal('hide');
            },

            getIdentifier(url) {
                var pattern = /(?:http?s?:\/\/)?(?:www\.)?(?:youtube\.com|youtu\.be)\/(?:watch\?v=)?(.+)/g;

                if (pattern.test(url)) {
                    return url.replace(pattern,'$1');
                }

                return null;
            }
        }
    }
</script>