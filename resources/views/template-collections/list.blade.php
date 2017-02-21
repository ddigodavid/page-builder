@extends('layouts.list')

@section('heading')
    Coleções de Templates
    <a href="{{ route('template-collections.new') }}" class="btn btn-primary btn-sm pull-right">
        <span class="fa fa-plus-circle"></span> Nova Coleção
    </a>
@endsection

{{--@section('content')--}}
    {{--<div class="container">--}}
        {{--<div class="panel panel-default">--}}
            {{--<div class="panel-heading">--}}
                {{--Coleções de Templates--}}
                {{--<a href="{{ route('template-collections.new') }}" class="btn btn-primary btn-sm pull-right">--}}
                    {{--<span class="fa fa-plus-circle"></span> Nova Coleção--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="panel-body">--}}
                {{--<div class="table-responsive">--}}
                    {{--<table class="table table-striped" id="listClippings">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th class="th-id">#ID</th>--}}
                            {{--<th><span class="fa fa-pencil"></span> Título</th>--}}
                            {{--<th class="th-date"><span class="fa fa-calendar"></span> Criado em</th>--}}
                            {{--<th class="th-date"><span class="fa fa-calendar"></span> Ultima atualização</th>--}}
                            {{--<th class="th-action">Ações</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                        {{--@foreach($results as $result)--}}
                            {{--<tr>--}}
                                {{--<td>{{ $result->id }}</td>--}}
                                {{--<td>{{ $result->name }}</td>--}}
                                {{--<td>{{ $result->present()->created_at }}</td>--}}
                                {{--<td>{{ $result->present()->updated_at }}</td>--}}
                                {{--<td>--}}
                                    {{--<div class="btn-group btn-group-xs">--}}
                                        {{--<a href="{{ route('template-collections.edit', [$result->id]) }}" class="btn btn-primary"><span--}}
                                                    {{--class="fa fa-edit"></span> Editar</a>--}}
                                        {{--<button class="btn btn-danger"--}}
                                                {{--data-form-link--}}
                                                {{--data-action="{{ route('template-collections.delete', [$result->id]) }}"--}}
                                                {{--data-method="delete"--}}
                                                {{--data-confirm-title="Confirmação de exclusão"--}}
                                                {{--data-confirm-text="Deseja realmente exluir esse registro?">--}}
                                            {{--<span class="fa fa-trash"></span> Excluir--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
                        {{--</tbody>--}}
                    {{--</table>--}}
                {{--</div>--}}
                {{----}}
                {{--<div style="display: flex;justify-content: center;">--}}
                    {{--{!! $results->links() !!}--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endsection--}}