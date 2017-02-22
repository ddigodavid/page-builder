<template>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Coleção atual
                    </div>
                    <div class="panel-body">
                        {{ templateSelected.name }}
                        <input type="hidden" name="collection" :value="templateSelected.id">
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-default btn-block" @click.prevent="openChooser()">Escolher coleção</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="templateChooserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="height: 45vh;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Templates disponíveis</h4>
                    </div>
                    <div class="modal-body">
                        <div id="caroute-templates-colletions" class="carousel slide" data-ride="carousel" data-interval="false">
                            <div class="carousel-inner" role="listbox">
                                <div class="item" v-bind:class="isFirst(index)" v-for="(templatesCollections, index) in templateCollectionsAggregated">
                                    <div class="row">
                                        <div style="margin: 0 60px 0 60px;">
                                            <div class="col-sm-3" v-for="templateCollection in templatesCollections" style="height:100%">
                                                <div class="panel panel-default">
                                                    <div class="panel-body" style="min-height: 100px;">
                                                        <strong>{{ templateCollection.name }}</strong>
                                                    </div>
                                                    <div class="panel-footer">
                                                        <button class="btn btn-success btn-block" @click.prevent="choose(templateCollection.id)"><i class="glyphicon glyphicon-ok"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="left carousel-control" href="#caroute-templates-colletions" role="button" data-slide="prev" style="width:60px;height:160px;" v-show="hasMoreThanOnePage()">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#caroute-templates-colletions" role="button" data-slide="next" style="width:60px;height:160px;" v-show="hasMoreThanOnePage()">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
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
    export default{
        props: {
            collection: {
                required: false
            }
        },
        data() {
            return{
                templateCollectionsAggregated: [],
                templateCollections: [],
                templateSelected: {name: 'Nenhum selecionado'}
            }
        },
        created() {
            this.$http.post('/collections/list').then((response) => {
                this.templateCollections = response.data.templateCollections;
                this.templateCollectionsAggregated = response.data.templateCollectionsAggregated;

                if (this.collection) {
                    this.choose(this.collection);
                }
            });
        },
        methods: {
            openChooser() {
                $("#templateChooserModal").modal('show');
            },
            choose(choice) {
                this.templateSelected = this.templateCollections.filter((templateCollection) => {
                    return templateCollection.id == choice;
                })[0];
                $("#templateChooserModal").modal('hide');
            },
            hasMoreThanOnePage() {
                return this.templateCollections.length > 4;
            },
            isFirst(index) {
                return (index == 0) ? 'active' : '';
            }
        }
    }
</script>