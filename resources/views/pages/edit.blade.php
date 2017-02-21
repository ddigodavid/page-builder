@extends('layouts.administration.master')

@section('page-content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Editando Coleção de Templates - #{{ $model->id }}
        </div>
        <div class="panel-body">
            {!! Form::model($model) !!}
            {!! Form::hidden('id', $model->id) !!}
            @include('template-collections.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection