<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title', "Geschool") </title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <link rel="stylesheet" href={{asset('assets/customs/css/style.css')}}>
    <link rel="stylesheet" href={{asset('assets/gallery/gallery.css')}}>


</head>

<body>

    @include("layouts.header")

    <main class="container">
        @yield('content')
    </main>

    @include("layouts.footer")
    
    <script src={{asset('assets/gallery/gallery.js')}}></script>
    <script>
        JavaScriptGallery.setGalleryTransition("slideAndZoom");
        JavaScriptGallery.enableExtraButtons();
        JavaScriptGallery.enableDoubleClick();
        JavaScriptGallery.initGallery();
    </script>

</body>

</html>
