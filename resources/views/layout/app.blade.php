<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ Metronic::printAttrs('html') }} {{ Metronic::printClasses('html') }}>
    <head>
        <meta charset="utf-8"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- Title Section --}}
        <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>

        {{-- Meta Data --}}
        <meta name="description" content="@yield('page_description', $page_description ?? '')"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        {{-- Favicon --}}
        <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />

         <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">


        <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>


        <link href="{{ asset('css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/themes/layout/header/menu/light.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/themes/layout/aside/dark.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/themes/layout/brand/dark.css') }}" rel="stylesheet" type="text/css"/>


        {{-- Includable CSS --}}
        @yield('styles')
    </head>

    <body class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-minimize-hoverable aside-fixed">
        <div id="app">

           {{--  @if (config('layout.page-loader.type') != '')
                @include('layout.partials._page-loader')
            @endif --}}
            
            @include('layout.artbug._header-mobile')

                <div class="d-flex flex-column flex-root">
                    <div class="d-flex flex-row flex-column-fluid page">

                        
                        @include('layout.artbug._menu')


                        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                            @include('layout.artbug._header')

                            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

                               {{-- Subheader V1 --}}

                                <div class="subheader py-2 subheader-solid" id="kt_subheader">
                                    <div class="container-fluid   d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">

                                        {{-- Info --}}
                                        <div class="d-flex align-items-center flex-wrap mr-1">

                                            {{-- Page Title --}}
                                            <h5 class="text-dark font-weight-bold my-2 mr-5">
                                                {{ @$page_title }}

                                                @if (isset($page_description) && config('layout.subheader.displayDesc'))
                                                    <small>{{ @$page_description }}</small>
                                                @endif
                                            </h5>

                                            @if (!empty($page_breadcrumbs))
                                                {{-- Separator --}}
                                                <div class="subheader-separator subheader-separator-ver my-2 mr-4 d-none"></div>

                                                {{-- Breadcrumb --}}
                                                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2">
                                                    <li class="breadcrumb-item"><a href="#"><i class="flaticon2-shelter text-muted icon-1x"></i></a></li>
                                                    @foreach ($page_breadcrumbs as $k => $item)
                                                        <li class="breadcrumb-item">
                                                            <a href="{{ url($item['page']) }}" class="text-muted">
                                                                {{ $item['title'] }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>

                                        {{-- Toolbar --}}
                                        <div class="d-flex align-items-center">

                                            @hasSection('page_toolbar')
                                                @section('page_toolbar')
                                            @endif


                                            @php
                                            /*<div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
                                                <a href="#" class="btn btn-icon"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{ Metronic::getSVG("media/svg/icons/Files/File-plus.svg", "svg-icon-success svg-icon-2x") }}
                                                </a>
                                                <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                                                    {{-- Navigation --}}
                                                    <ul class="navi navi-hover">
                                                        <li class="navi-header font-weight-bold">
                                                            Jump to:
                                                            <i class="flaticon2-information" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
                                                        </li>
                                                        <li class="navi-separator mb-3"></li>
                                                        <li class="navi-item">
                                                            <a href="#" class="navi-link">
                                                                <span class="navi-icon"><i class="flaticon2-drop"></i></span>
                                                                <span class="navi-text">Recent Orders</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a href="#" class="navi-link">
                                                                <span class="navi-icon"><i class="flaticon2-calendar-8"></i></span>
                                                                <span class="navi-text">Support Cases</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a href="#" class="navi-link">
                                                                <span class="navi-icon"><i class="flaticon2-telegram-logo"></i></span>
                                                                <span class="navi-text">Projects</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a href="#" class="navi-link">
                                                                <span class="navi-icon"><i class="flaticon2-new-email"></i></span>
                                                                <span class="navi-text">Messages</span>
                                                                <span class="navi-label">
                                                                    <span class="label label-success label-rounded">5</span>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-separator mt-3"></li>
                                                        <li class="navi-footer">
                                                            <a class="btn btn-light-primary font-weight-bolder btn-sm" href="#">Upgrade plan</a>
                                                            <a class="btn btn-clean font-weight-bold btn-sm" href="#" data-toggle="tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            */
                                            @endphp
                                        </div>

                                    </div>
                                </div>


                                <div class="d-flex flex-column-fluid">
                                    <div class="container-fluid ">
                                        @yield('content')
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
        </div>
            
        <script>var HOST_URL = "{{ route('quick-search') }}";</script>

        {{-- Global Config (global config for global JS scripts) --}}
        <script>
            var KTAppSettings = {!! json_encode(config('layout.js'), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) !!};
        </script>

        {{-- Global Theme JS Bundle (used by all pages)  --}}
        @foreach(config('layout.resources.js') as $script)
            <script src="{{ asset($script) }}" type="text/javascript"></script>
        @endforeach

        {{-- <script src="{{ asset('js/app.js') }}" type="text/javascript"></script> --}}


        {{-- Includable JS --}}
        @yield('scripts')

    </body>
</html>
