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
                                        <input type="text" class="form-control" placeholder="Título da página">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="glyphicon glyphicon-link"></i></div>

                                        <input type="text" class="form-control" placeholder="URL">
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
                            <button class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Salvar</button>
                            <button class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Rascunho</button>
                            <button class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Excluir</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-10">
                <page-content></page-content>
            </div>
            <div class="col-lg-2">
                <template-list></template-list>
            </div>
        </div>

    </div>
</template>
<script>
    export default {}
</script>
