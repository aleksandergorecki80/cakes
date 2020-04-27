<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog Justyny</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('css/app.css')}}">

        <!-- SCRIPT -->
        <script src="{{ asset('js/app.js') }}" defer></script>

    </head>
    <body>
        <div id="app">
            <my-nav></my-nav>
            <index></index>
            <my-footer></my-footer>
        </div>
    </body>
</html>
