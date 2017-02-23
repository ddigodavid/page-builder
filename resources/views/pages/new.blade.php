@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
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
                                                            <div class="panel-body" style="min-height: 100px;">
                                                                <strong>{{ $templateCollection->name }}</strong>
                                                            </div>
                                                            <div class="panel-footer">
                                                                <a href="{{ route('pages.new.post', $templateCollection->id) }}" class="btn btn-success btn-block"><i class="glyphicon glyphicon-ok"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @if($templateCollectionsAggregated->count() > 1)
                                <a class="left carousel-control" href="#carousel-templates-colletions" role="button" data-slide="prev" style="width:60px;height:160px;">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-templates-colletions" role="button" data-slide="next" style="width:60px;height:160px;">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection