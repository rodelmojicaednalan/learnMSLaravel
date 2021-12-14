{{-- Header --}}
<div id="kt_header" class="header header-fixed">

    {{-- Container --}}
    <div class="container-fluid d-flex align-items-center justify-content-between">

    @if(Auth::check())
        @if (config('layout.header.self.display'))

            {{-- @php
                $kt_logo_image = 'logo-light.png';
            @endphp

            @if (config('layout.header.self.theme') === 'light')
                @php $kt_logo_image = 'logo-dark.png' @endphp
            @elseif (config('layout.header.self.theme') === 'dark')
                @php $kt_logo_image = 'logo-light.png' @endphp
            @endif --}}

            {{-- Header Menu --}}
            <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                @if(config('layout.aside.self.display') == false)
                    <div class="header-logo">
                        <a href="{{ url('/') }}">
                            <img alt="Logo" src="{{ asset('media/logos/ArtBug.png') }}"/>
                        </a>
                    </div>
                @endif

                <div id="kt_header_menu" class="header-menu header-menu-mobile  header-menu-layout-default ">
                    <!-- <ul class="menu-nav ">
                        <li class="menu-item " aria-haspopup="true">
                            <a href="{{ url('administrator/dashboard') }}" class="menu-link "><span class="menu-text">Dashboard</span></a>
                        </li>
                        <li class="menu-item " aria-haspopup="true">
                            <a href="{{ url('trainer/dashboard') }}" class="menu-link "><span class="menu-text">Trainer</span></a>
                        </li>
                        <li class="menu-item " aria-haspopup="true">
                            <a href="{{ url('teacher/dashboard') }}" class="menu-link "><span class="menu-text">Teacher</span></a>
                        </li>
                        <li class="menu-item " aria-haspopup="true">
                            <a href="{{ url('parent/dashboard') }}" class="menu-link "><span class="menu-text">Parents / Students</span></a>
                        </li>
                    </ul> -->
                </div>
            </div>

        @else
            <div></div>
        @endif

        <div class="topbar">

            {{-- Search --}}
            @if (config('layout.extras.search.display'))
                @if (config('layout.extras.search.layout') == 'offcanvas')
                    <div class="topbar-item">
                        <div class="btn btn-icon btn-clean btn-lg mr-1" id="kt_quick_search_toggle">
                            {{ Metronic::getSVG("media/svg/icons/General/Search.svg", "svg-icon-xl svg-icon-primary") }}
                        </div>
                    </div>
                @else
                    <div class="dropdown" id="kt_quick_search_toggle">
                        {{-- Toggle --}}
                  
                        {{-- Dropdown --}}
                        <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                            <div class="quick-search quick-search-dropdown" id="kt_quick_search_dropdown">
                                {{-- Form --}}
                                <form method="get" class="quick-search-form">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                {{ Metronic::getSVG("media/svg/icons/General/Search.svg", "svg-icon-lg") }}
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Search..."/>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="quick-search-close ki ki-close icon-sm text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                </form>

                                {{-- Scroll --}}
                                <div class="quick-search-wrapper scroll" data-scroll="true" data-height="325" data-mobile-height="200">
                                </div>
                            </div>

                        </div>
                    </div>
                @endif
            @endif

            {{-- Notifications --}}
            @if (config('layout.extras.notifications.display'))
                @if (config('layout.extras.notifications.layout') == 'offcanvas')
                    <div class="topbar-item">
                        <div class="btn btn-icon btn-clean btn-lg mr-1 pulse pulse-primary" id="kt_quick_notifications_toggle">
                            {{-- {{ Metronic::getSVG("media/svg/icons/Code/Compiling.svg", "svg-icon-xl svg-icon-primary") }} --}}
                            <i class="menu-icon flaticon2-notification"></i>
                            <span class="pulse-ring"></span>
                        </div>
                    </div>
                @else
                    <div class="dropdown">
                        {{-- Toggle --}}
                        <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                            <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary">
                                {{ Metronic::getSVG("media/svg/icons/Code/Compiling.svg", "svg-icon-xl svg-icon-primary") }}
                                <span class="pulse-ring"></span>
                            </div>
                        </div>

                        {{-- Dropdown --}}
                        <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                            <form>
                                @include('layout.artbug.dropdown._notifications')
                            </form>
                        </div>
                    </div>
                @endif
            @endif

            {{-- Quick Actions --}}
            @if (config('layout.extras.quick-actions.display'))
                @if (config('layout.extras.quick-actions.layout') == 'offcanvas')
                    <div class="topbar-item">
                        <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1" id="kt_quick_actions_toggle">
                            {{ Metronic::getSVG("media/svg/icons/Media/Equalizer.svg", "svg-icon-xl svg-icon-primary") }}
                        </div>
                    </div>
                @else
                    <div class="dropdown">
                        {{-- Toggle --}}
                        <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                            <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                                {{ Metronic::getSVG("media/svg/icons/Media/Equalizer.svg", "svg-icon-xl svg-icon-primary") }}
                            </div>
                        </div>

                        {{-- Dropdown --}}
                        <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                            @include('layout.artbug.dropdown._quick-actions')
                        </div>
                    </div>
                @endif
            @endif

            {{-- Quick panel --}}
            @if (config('layout.extras.quick-panel.display'))
              
            @endif

            {{-- User --}}
            @if (config('layout.extras.user.display'))
                @if (config('layout.extras.user.layout') == 'offcanvas')
                    <div class="topbar-item">
                        <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                            <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                            <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ Auth::user()->first_name }}</span>
                            <span class="symbol symbol-35 symbol-light-success">
                                <span class="symbol-label font-size-h5 font-weight-bold">S</span>
                            </span>
                        </div>
                    </div>
                @else
                    <div class="dropdown">
                        {{-- Toggle --}}
                        <div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
                            <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2">
                                <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                                <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ Auth::user()->first_name }}</span>
                                <span class="symbol symbol-35 symbol-light-success">
                                    <span class="symbol-label font-size-h5 font-weight-bold">S</span>
                                </span>
                            </div>
                        </div>

                        {{-- Dropdown --}}
                        <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg p-0">
                            @include('layout.artbug.dropdown._user')
                        </div>
                    </div>
                @endif
            @endif
        </div>
    @endif {{--  user check --}}
    </div>
</div>
