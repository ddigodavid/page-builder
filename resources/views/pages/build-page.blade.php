@extends('app')

@section('page-css')
    <link rel="stylesheet" href="{{ $templatesCollection->cssUrl }}">
@endsection

@section('content')
    <page-builder template-collection="{{ $templateCollectionId }}"></page-builder>
    
    <image-change
            list-url="{{ route('list') }}"
            upload-url="{{ route('upload') }}"
            delete-url="{{ route('delete') }}"></image-change>
    <background-change></background-change>
    <video-change></video-change>
    <media-change></media-change>
    <color-change></color-change>
@endsection