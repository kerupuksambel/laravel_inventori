<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bulma.min.css') }}" type="text/css">
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css"> --}}
    <style>
        .column.container{
            max-width: none;
        }

        html{
            background: rgb(0, 209, 178);
        }
    </style>
    <title>@yield('title')</title>
</head>
<body>
    <div class="columns">
        <div class="container column">
            @yield('content')
        </div>
    </div>
</body>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>
</html>