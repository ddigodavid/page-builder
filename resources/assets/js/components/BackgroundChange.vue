<template>
    <div class="modal fade photo-gallery" id="backgroundChangerModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Alteraçar mídia</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 btn-group horizontal-centralized">
                            <button class="btn btn-primary" @click.prevent="openImageChangerModal">Inserir imagem</button>
                            <button class="btn btn-default" @click.prevent="openColorChangerModal">Inserir cor sólida</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
    .horizontal-centralized {
        display: flex !important;
        justify-content: center;
        margin: 0 0 0 0;
        width: 100%;
    }


</style>
<script type="text/javascript">
    export default {
        methods: {
            openImageChangerModal() {
                $("#backgroundChangerModal").modal('hide');
                $("#imageChangeableModal").modal('show');
            },
            openColorChangerModal() {
                $("#backgroundChangerModal").modal('hide');
                $("#colorChangeableModal").modal('show');
            }
        }
    }
</script>