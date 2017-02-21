@extends('layouts.administration.master')

@section('content')
    <div class="container">
        <div class="row">
            {!! Form::model($model, ['route' => 'template-collections.save']) !!}
                <div class="col-sm-12 col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            @section('heading')
                                Editando Coleção de templates - #{{ $model->id }}
                            @show
                        </div>
                        <div class="panel-body">
                            {!! Form::hidden('id', $model->id) !!}
                            @include('template-collections.form')
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    @include('layouts.partials.publication-box')
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection