@extends('app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                Usuários
                <a href="/register" class="btn btn-primary btn-sm pull-right">
                    <span class="fa fa-plus-circle"></span> Novo usuário
                </a>
            </div>
            <div class="panel-body">
                {!! Form::open(['route' => sprintf('%s.list', $resourcePrefix), 'method' => 'GET']) !!}
                @section('filters')
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            {!! Form::label('Palavras-Chave') !!}
                            {!! Form::text('keyword', request('keyword'), ['class' => "form-control"]) !!}
                        </div>
                        <div class="col-sm-12 col-md-4 align-button-button">
                            {!! Form::submit('Procurar', ['class' => 'btn btn-success']) !!}
                        </div>
                    </div>
                @show
                {!! Form::close() !!}
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped" id="listClippings">
                        <thead>
                        <tr>
                            <th class="th-id">#ID</th>
                            <th><span class="fa fa-pencil"></span> Nome</th>
                            <th class="th-date"><span class="glyphicon glyphicon-calendar"></span> Criado em</th>
                            <th class="th-date"><span class="glyphicon glyphicon-calendar"></span> Ultima atualização</th>
                            <th class="th-action">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($results->isNotEmpty())
                            @foreach($results as $result)
                                <tr>
                                    <td>{{ $result->id }}</td>
                                    <td>{{ $result->name }}</td>
                                    <td>{{ $result->present()->created_at }}</td>
                                    <td>{{ $result->present()->updated_at }}</td>
                                    <td>
                                        <div class="btn-group btn-group-xs">
                                            <a href="{{ route(sprintf('%s.edit', $resourcePrefix), [$result->id]) }}"
                                               class="btn btn-primary"><span
                                                        class="glyphicon glyphicon-edit"></span> Editar</a>
                                            <button class="btn btn-danger"
                                                    data-form-link
                                                    data-action="{{ route(sprintf('%s.delete', $resourcePrefix), [$result->id]) }}"
                                                    data-method="delete"
                                                    data-confirm-title="Confirmação de exclusão"
                                                    data-confirm-text="Deseja realmente exluir esse registro?">
                                                <span class="glyphicon glyphicon-trash"></span> Excluir
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" align="center">Nenhum resultado obtido</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <div style="display: flex;justify-content: center;">
                    {!! $results->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection