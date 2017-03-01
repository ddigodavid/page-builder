@extends('layouts.list')

@section('heading')
    Coleções de Templates
    <a href="{{ route('template-collections.new') }}" class="btn btn-primary btn-sm pull-right">
        <span class="fa fa-plus-circle"></span> Nova Coleção
    </a>
@endsection