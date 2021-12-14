{{-- Aside --}}

{{-- @php
    $kt_logo_image = 'ArtBug.png';

    $role = Request::segment(1);

@endphp

@if (config('layout.brand.self.theme') === 'light')
    @php $kt_logo_image = 'ArtBug.png' @endphp
@elseif (config('layout.brand.self.theme') === 'dark')
    @php $kt_logo_image = 'ArtBug.png' @endphp
@endif --}}


@if (Request::is('administrator/*'))
    @include('layout.artbug.menu-administrator')
@elseif (Request::is('trainer/*'))
    @include('layout.artbug.menu-trainer')
@elseif (Request::is('teacher/*'))
    @include('layout.artbug.menu-teacher')
@elseif (Request::is('parent/*'))
    @include('layout.artbug.menu-parent')
@elseif (Request::is('school-admin/*'))
    @include('layout.artbug.menu-school-admin')
@endif

