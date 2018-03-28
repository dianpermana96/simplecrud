<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <title>Profile - CRUD</title>
    <style>
        .martop-sm {margin-top: 15px;}
        .martop-lg {margin-top: 70px;}
    </style>
</head>
<body>
    <div class="container martop-lg">
        <div class="panel panel-default">
            <div class="panel-body">@yield('content')</div>
        </div>
    </div>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>