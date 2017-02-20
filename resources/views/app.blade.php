<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.module.css') }}">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Slabo+27px">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oxygen:300">
        <link rel="stylesheet" href="{{ asset('plugins/dropzone/dropzone.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/sweetalert/sweetalert2.min.css') }}">

        <title>Page Builder</title>

    </head>
    <body>

    <div id="app">
        <navbar></navbar>
        
        @section('content')
            <page-builder></page-builder>
        
            <image-change
                list-url="{{ route('list') }}"
                upload-url="{{ route('upload') }}"
                delete-url="{{ route('delete') }}"></image-change>
            <video-change></video-change>
            <media-change></media-change>
            <text-change></text-change>
        @show
    </div>

    <script>
        Laravel = {
            csrfToken: '{{ csrf_token() }}'
        };
    </script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('plugins/dropzone/dropzone.js') }}"></script>
    </body>
</html>
