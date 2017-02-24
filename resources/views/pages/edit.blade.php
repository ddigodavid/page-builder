@extends('app')

@section('page-css')
    <link rel="stylesheet" href="{{ $model->templateCollection->cssUrl }}">
@endsection

@section('content')
    
    <page-builder
            page="{{ base64_encode($model) }}"
            template-collection="{{ $model->collection }}">
        <div slot="collection-info" style="margin-top: 10px">
            <strong>Template usado: </strong> {{ $model->templateCollection->name }}
        </div>
        <div id="page_status_html" slot="page-status">
            {!! $model->present()->status_html !!}
        </div>
    </page-builder>
    
    <image-change
            list-url="{{ route('list') }}"
            upload-url="{{ route('upload') }}"
            delete-url="{{ route('delete') }}"></image-change>
    <video-change></video-change>
    <media-change></media-change>
@endsection