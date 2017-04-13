@extends('layouts.administration.master')

@section('content')
    <div class="container">
        <div class="row">
            {!! Form::open(['route' => 'templates.save', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="col-sm-12 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @section('heading')
                            Novo template
                        @show
                    </div>
                    <div class="panel-body">
                        @include('templates.form')
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                @include('layouts.partials.publication-box')
                <template-collection-chooser></template-collection-chooser>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection