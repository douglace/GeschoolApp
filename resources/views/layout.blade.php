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

    @include('layout.css')

    @yield('css')

</head>

<body class="theme-red">
    <!-- Page Loader -->
    @include("inc.components.loader")
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    @include("inc.components.top_bar")
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        @include("inc.components.side_bar")
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        @include("inc.components.setting")
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content" id="main_content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>TABLEAU DE BORD</h2>
            </div>

            @yield('content')

        </div>
        @include('inc.enseignants.show_infos')
        <button id="btn-show_infos-teacher" style="display: none" data-toggle="modal" data-target='#show_infos-teacher-modal'></button>
        @include('inc.eleves.show_infos')
        <button id="btn-show_infos-student" style="display: none" data-toggle="modal" data-target='#show_infos-student-modal'></button>
    </section>

    @include('layout.script')

    @yield('script')

</body>

</html>
