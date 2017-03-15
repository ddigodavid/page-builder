<template>
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-9">
                <div class="panel panel-default" style="min-height: 130px;">
                    <div class="panel-heading">Informações da página</div>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-sm-6 col-lg-5">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></div>
                                        <input type="text" name="name" class="form-control"
                                               placeholder="Título da página" v-model="pageData.name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-5">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="glyphicon glyphicon-link"></i></div>
                                        <input type="text" name="slug" class="form-control" placeholder="Slug"
                                               v-model="pageData.slug">
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-2">
                                <a :href='homologUrl' target='_blank' class='text-warning'><i class="glyphicon glyphicon-link"></i> Ver em Homologação</a><br>
                                <a :href='url' target='_blank' class='text-info'><i class="glyphicon glyphicon-link"></i> Ver em Produção</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="panel panel-default" style="height: 130px;">
                    <div class="panel-heading">
                        Publicação
                        <div class="pull-right">
                            <slot name="page-status"></slot>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="btn-group btn-group-sm">
                            <button id="save-page" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Salvar
                            </button>
                            <button id="draft-button" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i>
                                Rascunho
                            </button>
                            <a href="javascript:void(0);" class="btn btn-danger"
                               data-form-link
                               data-confirm-title="Confirmação de exclusão"
                               data-confirm-text="Deseja realmente excluir esse registro?"
                               data-method="DELETE"
                               :data-action="deleteUrl"><i class="glyphicon glyphicon-trash"></i> Excluir</a>
                        </div>
                        <div class="form-group">
                            <input type="hidden" v-model="pageData.collection">
                            <slot name="collection-info"></slot>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10">
                <page-content @onSavePage="savePage" @onDraftPage="savePage" :html="pageData.html"
                              draft-button="#draft-button" save-button="#save-page"></page-content>
            </div>
            <div class="col-lg-2">
                <template-list :template-collection="templateCollection"></template-list>
            </div>
        </div>

    </div>
</template>
<script type="text/javascript">
    export default {
        props: {
            page: {
                required: false,
                default: function () {
                    return {
                        collection: null,
                        html: '',
                        name: '',
                        slug: '',
                        status: 1
                    };
                }
            },
            templateCollection: {
                required: true
            }
        },
        created() {
            if (typeof this.page === 'object') {
                this.pageData = this.page;
                this.pageData.collection = this.templateCollection;
            } else {
                this.pageData = JSON.parse(atob(this.page));
            }
        },
        data() {
            return {
                pageData: {}
            }
        },
        computed: {
            deleteUrl() {
                return '/pages/delete/' + this.pageData.id;
            },
            homologUrl(){
                return 'http://hml.mistral.com.br/vinhos/' + this.pageData.slug;
            },
            url(){
                return 'https://mistral.com.br/vinhos/' + this.pageData.slug;
            }
        },
        methods: {
            savePage(html, status) {

                swal({
                    type: 'info',
                    title: 'Aguarde...',
                    text: 'Salvando alterações',
                    showConfirmButton: false
                });

                this.pageData.html = html;
                this.pageData.status = status;

                this.$http.post('/pages/save', this.pageData).then((response) => {
                    swal({
                        type: 'success',
                        title: 'Sucesso!',
                        text: 'Página gravada com sucesso!',
                        closeOnConfirm: false
                    }).then(() => {
                        if (this.isNewPage()) {
                            window.location = '/pages/edit/' + response.data.model.id;
                        }

                        $("#page_status_html").html(response.data.status_html);
                        this.pageData.slug = response.data.model.slug;
                    });
                });
            },
            isNewPage() {
                return ! this.pageData.hasOwnProperty('id');
            }
        }
    }
</script>
