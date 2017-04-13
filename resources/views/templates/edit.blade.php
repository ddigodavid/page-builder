@extends('layouts.administration.master')

@section('content')
    <div class="container">
        <div class="row">
            {!! Form::model($model, ['route' => 'templates.save', 'enctype' => 'multipart/form-data']) !!}
                <div class="col-sm-12 col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            @section('heading')
                                Editando Coleção de templates - #{{ $model->id }}
                            @show
                        </div>
                        <div class="panel-body">
                            {!! Form::hidden('id', $model->id) !!}
                            @include('templates.form')
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    @include('layouts.partials.publication-box')
                    <template-collection-chooser collection="{{ $model->templatesCollection->id }}"></template-collection-chooser>
                    @if($model instanceof Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia && $model->getMedia($model->mediaField())->isNotEmpty())
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Thumb
                                    </div>
                                    <div class="panel-body">
                                        <img src="{{ $model->getMedia('thumb')->first()->url }}" alt="" width="100%">
                                    </div>
                                    <div class="panel-footer">
                                        <a href="javascript:void(0);" class="btn btn-danger btn-block"
                                           data-form-link
                                           data-confirm-title="Confirmação de exclusão"
                                           data-confirm-text="Deseja realmente excluir esse registro?"
                                           data-method="DELETE"
                                           data-action="{{ route(sprintf('delete-thumb', $resourcePrefix), []) }}"><i class="glyphicon glyphicon-trash"></i> Excluir Thumb</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection