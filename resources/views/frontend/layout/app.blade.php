<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- Title Section --}}
        <title>{{ config('app.name', 'Orca') }} | @yield('title', $page_title ?? '')</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Find out where the opportunities lie.">
        <meta name="author" content="we/ui">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.ico') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendor/bootstrap.min.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendor/jquery-ui.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendor/slick.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendor/slick-theme.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendor/fontawesome/fontawesome.min.css') }}"  media="all">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendor/fontawesome/brands.min.css') }}" media="all">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendor/fontawesome/solid.min.css') }}" media="all">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendor/pretty-checkbox.min.css') }}"  media="all">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendor/jquery.mCustomScrollbar.css') }}"  media="all">
         <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendor/chosen.min.css') }}"  media="all">

        {{-- Add CSS for specific pages --}}
        @yield('styles')

        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/fonts.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/artbug.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/artbug-media.css') }}" media="all" />

    </head>
    <body>
        @include('frontend.includes.header')
        @if($page == 'home')
        <div class="main-content front page-{{ isset($page) ? $page : 'home' }}">
        @else 
        <div class="main-content not-front page-{{ isset($page) ? $page : 'home' }}">
        @endif
        
            @yield('content')
        </div>

        @include('frontend.includes.footer')
    </body>
</html>
