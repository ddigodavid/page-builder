@extends('layouts.list')

@section('heading')
    Templates
    <a href="{{ route('templates.new') }}" class="btn btn-primary btn-sm pull-right">
        <span class="fa fa-plus-circle"></span> Novo template
    </a>
@endsection