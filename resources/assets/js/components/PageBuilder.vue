<template>
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-9">
                <div class="panel panel-default" style="height: 130px;">
                    <div class="panel-heading">Informações da página</div>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></div>
                                        <input type="text" name="name" class="form-control" placeholder="Título da página" v-model="pageData.name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="glyphicon glyphicon-link"></i></div>
                                        <input type="text" name="slug" class="form-control" placeholder="Slug" v-model="pageData.slug">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="panel panel-default" style="height: 130px;">
                    <div class="panel-heading">Publicação</div>
                    <div class="panel-body">
                        <div class="btn-group btn-group-sm">
                            <button id="save-page" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Salvar</button>
                            <button class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Rascunho</button>
                            <button class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Excluir</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10">
                <page-content @onSavePage="savePage" :html="pageData.html" save-button="#save-page"></page-content>
            </div>
            <div class="col-lg-2">
                <template-list></template-list>
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
                        id: 0,
                        html: '',
                        name: '',
                        slug: '',
                        status: 1
                    };
                }
            }
        },
        data() {
            return {
                pageData: {}
            }
        },
        created() {
            if (typeof this.page === 'object') {
                this.pageData = this.page
            } else {
                this.pageData = JSON.parse(atob(this.page));
            }
        },
        methods: {
            savePage(html) {
                let parameters;

                if (! this.isNewPage()) {
                    parameters = {id: this.pageData.id, name: this.pageData.name, slug: this.pageData.slug, html: html, status: this.pageData.status}
                } else {
                    parameters = {name: this.pageData.name, slug: this.pageData.slug, html: html, status: this.pageData.status}
                }

                this.$http.post('/pages/save', parameters).then((response) => {
                    swal({
                        type: 'success',
                        title: 'Sucesso!',
                        text: 'Página gravada com sucesso!',
                        closeOnConfirm: false
                    }).then(() => {
                        if (this.isNewPage()) {
                            window.location = '/pages/edit/' + response.data.model.id;
                        }
                    });
                });
            },
            isNewPage() {
                return ! this.pageData.id;
            }
        }
    }
</script>
