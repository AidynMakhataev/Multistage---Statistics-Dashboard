<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Multistage</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="author" content="BrandStudio.kz">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&amp;subset=cyrillic" rel="stylesheet">
    <!-- FONTS END -->
    <link rel="icon" href="build/images/favicon.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="{{asset('build/css/main.css')}}">
</head>

<body>
<div id="app">
    @yield('content')
</div>
<!--MODALS-->
<div class="bs-rqmodal js-projectName-call__modal">
    <div class="bs-rqmodal__wrp"></div>
    <div class="bs-rqmodal__content animated bounceInDown">
        <span class="bs-rqmodal__close js-bs-rqmodal__close"></span>
        <div class="bs-rqmodal__inner">
            <!--TODO: PopUp Call modal-->

        </div>
    </div>
</div>
<script src="{{asset('build/js/main.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<!--SCRIPTS    -->

</body>

</html>
