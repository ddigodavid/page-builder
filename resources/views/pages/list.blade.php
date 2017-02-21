@extends('layouts.list')

@section('heading')
    Páginas
    <a href="{{ route('pages.new') }}" class="btn btn-primary btn-sm pull-right">
        <span class="fa fa-plus-circle"></span> Nova Página
    </a>
@endsection