<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    @yield('css')

    <script src="{{ asset('js/bootstrap.js') }}"></script>
</head>
<body>
    <div class="container">

        <div class="border">

            @yield('content')

        </div>

    </div>

    
    <script>
        var buttonsList = '.btn-redirect, .btn-edit, .btn-delete';
    </script>
    
    <script src="{{ asset('js/button.js') }}"></script>

    @yield('js')
</body>
</html>