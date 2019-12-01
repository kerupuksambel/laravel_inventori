<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bulma.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <title>@yield('title')</title>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
        $('#table-kasir').on('change keyup', '.kasir-jumlah', function(e){
            var id = $(this).attr('data-kasir-id');
            var val = $(this).val();
            var hargaSatuan = $("input[name=harga-"+id+"]").val();
            alert(hargaSatuan);
            $('.kasir-subtotal[data-kasir-id='+id+']')[0].text('asd');
        })
    </script>
</head>
<body>
    @include('template.partial.navbar')
    <div class="columns">
        @include('template.partial.sidebar')
        <div class="container column is-three-quarter">
            @yield('content')
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>
</html>