<template>
    <div class="modal fade photo-gallery" id="imageChangeableModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Alteração de imagem</h4>
                </div>
                <div class="modal-body">
                    <div class="upload-wrapper">
                        <div class="dropzone-upload upload-photos">
                            <div class="dz-message" data-dz-message><span>Clique ou arraste imagens aqui<br><i class="glyphicon glyphicon-cloud"></i></span></div>
                        </div>
                    </div>
                    <div class="photos-wrapper" style="min-height: 231px;">
                        <ul v-show="hasPhotos()" class="photos">
                            <li v-for="photo in photos" :data-id="photo.id" v-bind:style="'cursor: pointer;background-image: url(' + photo.url + ');'" v-on:click.prevent="usePhoto(photo.url)">
                                <button class="btn btn-danger btn-xs pull-right" title="Remover" v-on:click.prevent="removePhoto(photo.id)"><i class="glyphicon glyphicon-trash"></i></button>
                            </li>
                        </ul>
                        <div class="message" v-show="!hasPhotos()"><span>Não há fotos cadastradas.</span></div>
                    </div>
                    <div class="links horizontal-centralized">
                        <ul class="pagination" v-show="hasMoreThanOnePage()">
                            <li v-if="pagination.current_page > 1">
                                <a href="#" aria-label="Previous"
                                   @click.prevent="changePage(pagination.current_page - 1)">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li v-for="page in pagesNumber"
                                v-bind:class="[ page == isActived ? 'active' : '']">
                                <a href="#"
                                   @click.prevent="changePage(page)">{{ page }}</a>
                            </li>
                            <li v-if="pagination.current_page < pagination.last_page">
                                <a href="#" aria-label="Next"
                                   @click.prevent="changePage(pagination.current_page + 1)">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
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
    import dropzone from '../../../../public/plugins/dropzone/dropzone';
    import swal from '../../../../public/plugins/sweetalert/sweetalert2.min';
    export default {
        props: ['uploadUrl', 'listUrl', 'deleteUrl', 'csrfToken'],
        data() {
            return {
                photos: [],
                pagination: {
                    total: 0,
                    per_page: 10,
                    from: 1,
                    to: 0,
                    current_page: 1
                },
                offset: 4
            }
        },

        mounted() {
            var self = this;

            $(self.$el).find('.upload-photos').dropzone({
                url: self.uploadUrl,
                clickable: true,
                acceptedFiles: '.jpg,.peg,.png',
                maxFilesize: '10m',
                dictFileTooBig: 'O arquivo é muito grande. Tamanho máximo premitido: @{{maxFilesize}} MB',
                addRemoveLinks: false,
                queuecomplete: function() {
                    swal('Pronto', 'Upload concluído com sucesso!', 'success');
                },
                success: function(file) {

                    var that = this;

                    setTimeout(function () {

                        $(file.previewElement).fadeOut(400, function () {

                            that.removeFile(file);
                            self.listPhotos();

                        });

                    }, 500);

                }
            });

            self.listPhotos();
        },

        methods: {

            listPhotos: function() {
                var self = this;

                self.$http.post(self.listUrl, {page: self.pagination.current_page}).then(function(response) {

                    self.photos = response.data.results.data;
                    self.pagination = response.data.pagination;

                }, function(response) {


                });
            },

            hasPhotos: function() {
                return this.photos.length > 0;
            },

            usePhoto: function (url) {
                if (window.element.is('img')) {
                    window.element.attr('src', url);
                    return true;
                } else if (window.element.is('iframe')) {
                    let tpl = Vue.extend({
                        template: `<img v-media-changeable src="${url}" alt="">`
                    });

                    let wrapper = $(`<div id="template"></div>`);
                    let parent = window.element.parent();
                    parent.html(wrapper);

                    new tpl({parent: this}).$mount('#template');

                    window.element = parent.find('img');
                }

                window.element.css('background-image', 'url(' + url + ')');
            },

            removePhoto: function(id) {

                var self = this;

                swal({
                    title: 'Confirmação de exclusão',
                    html: 'Deseja realmente excluir a foto?',
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Sim",
                    cancelButtonText: "Não",
                    allowOutsideClick: false,
                    showLoaderOnConfirm: true,
                    preConfirm: function() {

                        return new Promise(function(resolve, reject) {

                            self.$http.post(self.deleteUrl, {photo_id: id}).then(function(response) {

                                resolve();

                            });

                        });

                    }
                }).then(function() {

                    self.listPhotos();

                    swal('Pronto!', 'Foto excluída com sucesso!', 'success');

                });


            },

            changePage: function (page) {
                this.pagination.current_page = page;
                this.listPhotos();
            },

            hasMoreThanOnePage: function () {
                return this.pagination.total > this.pagination.per_page;
            }
        },
        computed: {
            isActived: function () {
                return this.pagination.current_page;
            },
            pagesNumber: function () {
                if (!this.pagination.to) {
                    return [];
                }
                var from = this.pagination.current_page - this.offset;
                if (from < 1) {
                    from = 1;
                }
                var to = from + (this.offset * 2);
                if (to >= this.pagination.last_page) {
                    to = this.pagination.last_page;
                }
                var pagesArray = [];
                while (from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;
            }
        }

    }
</script>