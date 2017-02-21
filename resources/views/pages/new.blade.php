@extends('app')

@section('content')
    <page-builder></page-builder>
    
    <image-change
            list-url="{{ route('list') }}"
            upload-url="{{ route('upload') }}"
            delete-url="{{ route('delete') }}"></image-change>
    <video-change></video-change>
    <media-change></media-change>
    <text-change></text-change>
@endsection