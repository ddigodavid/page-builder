<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Page Builder</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/js/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">

    <style>
        .default-font {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .page-content {
            padding: 0px 30px 0px 30px;
        }

        .full-height {
            height: 100vh;
        }

        .half-height {
            height: 50vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            padding: 0px 30px 0px 30px;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="full-height flex-center default-font position-ref">
        <div class="content">
            <div class="flex-center">
                <img src="/images/pagebuilder_logo.png" alt="Page Builder">
            </div>

            <div class="links flex-center">
                <a href="{{ route('pages.list') }}">Criar página</a>
                @can('manage', App\User::class)
                    <a href="{{ route('templates.list') }}">Templates</a>
                    <a href="{{ route('template-collections.list') }}">Coleções de Templates</a>
                @endcan
            </div>
        </div>
    </div>
</body>
</html>
