@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                @yield('page-content')
            </div>
            <div class="col-sm-12 col-md-4">
                @include('layouts.partials.publication-box')
            </div>
        </div>
    </div>
@endsection