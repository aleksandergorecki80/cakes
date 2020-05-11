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

        <!-- vue-recaptcha -->
        <script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit" async defer></script> 

    </head>
    <body>
        <div id="app">
            <div class="container mt-4 mb-4 pr-4 pl-3">
                <my-nav></my-nav>
                <index></index>
                <my-footer></my-footer>
            </div>
        </div>
    </body>
</html>
