<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8">
    <title>@yield('titulo') - CENSO 2024 Oficial</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="title" content="Portal Oficial do Recenseamento Geral da População e da Habitação - RGPH" />
    <meta name="description" content="Portal Oficial do Recenseamento Geral da População e da Habitação - RGPH" />
    <meta name="keywords" content="Portal Oficial do Recenseamento Geral da População e da Habitação - RGPH" />

    <meta property="og:title"
        content="Portal Oficial do CENSO 2024, CENSO, Instituto Nacional de Estatística, INE, ANGOLA, População, Portal do Recenseamento Geral da População e da Habitação - RGPH" />
    <meta property="og:site_name" content="Portal Oficial do CENSO 2024" />
    <meta property="og:description" content="Portal Oficial do CENSO 2024" />
    <meta property="og:type" content="article" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/images/logotipo/icon.jpg">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/logotipo/icon.jpg">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/logotipo/icon.jpg">



    {{-- sweetalert --}}
    <link rel="stylesheet" href="/css/sweetalert2.css">
    <script src="/js/sweetalert2.all.min.js"></script>


    <!-- ===== All CSS files ===== -->
    <link rel="stylesheet" href="/site/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/site/css/animate.css" />
    <link rel="stylesheet" href="/site/css/lineicons.css" />
    <link rel="stylesheet" href="/site/css/ud-styles.css" />
    <link rel="stylesheet" href="/site/css/mystyles.css" />


    {!! RecaptchaV3::initJs() !!}

    @yield('CSSJS')
    
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<body>
  