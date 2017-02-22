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
        @yield('content')
    </div>

    <script>
        Laravel = {
            csrfToken: '{{ csrf_token() }}'
        };
    </script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/dropzone/dropzone.js') }}"></script>
    <script type="text/javascript">
        $('body').delegate('[data-form-link]', 'click', function(e) {
        
            var $self = $(this);
        
            function submitForm()
            {
                var method = $self.data('method');
                var action = $self.data('action');
                var $form = $('<form method="POST" action="' + action + '"><input type="hidden" name="_method" value="' + method + '"></form>');
                var params = $self.data('params');
            
                $form.append('<input type="hidden" name="_token" value="{{ csrf_token() }}">');
            
                if (typeof params !== 'undefined' && params != '') {
                    $.each(params, function(key, p) {
                        $form.append('<input type="hidden" name="' + key + '" value="' + p + '">');
                    });
                }
            
                $form.appendTo('body').submit();
                return true;
            }
        
            var confirmTitle = $self.data('confirm-title');
            var confirmText = $self.data('confirm-text');
        
            if (typeof confirmTitle !== typeof undefined && confirmTitle !== false) {
            
                swal({
                    title: confirmTitle,
                    html: confirmText,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Sim",
                    cancelButtonText: "Não",
                    showLoaderOnConfirm: true
                }).then(function() {
                
                    submitForm();
                
                });
            
            } else {
                submitForm();
            }
        
            e.preventDefault();
        });
    </script>
    </body>
</html>
