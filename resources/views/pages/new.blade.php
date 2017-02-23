@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Selecione a coleção que será usada
                    </div>
                    <div class="panel-body">
                        <div id="carousel-templates-colletions" class="carousel slide" data-ride="carousel" data-interval="false">
                            <div class="carousel-inner" role="listbox">
                                @foreach($templateCollectionsAggregated as $key => $templateCollections)
                                    <div class="item {{ ($key == 0) ? 'active' : '' }}">
                                        <div class="row">
                                            <div style="margin: 0 60px 0 60px;">
                                                @foreach($templateCollections as $templateCollection)
                                                    <div class="col-sm-3" style="height:100%">
                                                        <div class="panel panel-default">
                                                            {!! Form::model($templateCollection, ['route' => 'pages.new.post', 'method' => 'post']) !!}
                                                                <div class="panel-body" style="min-height: 100px;">
                                                                    {!! Form::hidden('id') !!}
                                                                    <strong>{{ $templateCollection->name }}</strong>
                                                                </div>
                                                                <div class="panel-footer">
                                                                    <button type="submit" class="btn btn-success btn-block"><i class="glyphicon glyphicon-ok"></i></button>
                                                                </div>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <a class="left carousel-control" href="#carousel-templates-colletions" role="button" data-slide="prev" style="width:60px;height:160px;" v-show="hasMoreThanOnePage()">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-templates-colletions" role="button" data-slide="next" style="width:60px;height:160px;" v-show="hasMoreThanOnePage()">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection