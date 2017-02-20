@extends('app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                Coleções de Templates
                <a href="" class="btn btn-primary btn-sm pull-right">
                    <span class="fa fa-plus-circle"></span> Nova Coleção
                </a>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="listClippings">
                        <thead>
                        <tr>
                            <th class="th-id">#ID</th>
                            <th><span class="fa fa-pencil"></span> Título</th>
                            <th class="th-date"><span class="fa fa-calendar"></span> Criado em</th>
                            <th class="th-action">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr data-id="21">
                            <td>21</td>
                            <td> Dr. Kildare Meira fala à Rádio Justiça sobre greve do CARF</td>
                            <td>06/02/2017 às 18:07h</td>
                            <td>
                                <div class="btn-group btn-group-xs">
                                    <a href="http://advcovac.web11.com.br/cms/clipping/21/edit" class="btn btn-primary"><span
                                                class="fa fa-edit"></span> Editar</a>
                                    <button class="btn btn-danger"
                                            data-form-link
                                            data-action="http://advcovac.web11.com.br/cms/clipping/21"
                                            data-method="delete"
                                            data-confirm-title="Confirmação de exclusão"
                                            data-confirm-text="Deseja realmente exluir esse registro?">
                                        <span class="fa fa-trash"></span> Excluir
                                    </button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection