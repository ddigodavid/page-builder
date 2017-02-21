@extends('layouts.administration.master')

@section('content')
    <div class="container">
        <div class="row">
            {!! Form::open(['route' => 'template-collections.save', 'method' => 'POST']) !!}
            <div class="col-sm-12 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @section('heading')
                            Nova Coleção de templates
                        @show
                    </div>
                    <div class="panel-body">
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