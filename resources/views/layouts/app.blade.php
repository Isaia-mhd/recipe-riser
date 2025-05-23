<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ config('app.name') }} </title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/30b351febc.js" crossorigin="anonymous"></script>
</head>
<body class="bg-slate-900">
    @include('components.header')

    <section class="">
        @yield('body')
    </section>

    @include('components.footer')
</body>
</html>
