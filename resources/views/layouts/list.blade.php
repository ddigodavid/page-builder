@extends('app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                @yield('heading')
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="listClippings">
                        <thead>
                        <tr>
                            <th class="th-id">#ID</th>
                            <th><span class="fa fa-pencil"></span> Nome</th>
                            <th class="th-date"><span class="fa fa-calendar"></span> Criado em</th>
                            <th class="th-date"><span class="fa fa-calendar"></span> Ultima atualização</th>
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
                                            <a href="{{ route(sprintf('%s.edit', $resourcePrefix), [$result->id]) }}" class="btn btn-primary"><span
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
                {!! $results->links() !!}
            </div>
        </div>
    </div>
@endsection