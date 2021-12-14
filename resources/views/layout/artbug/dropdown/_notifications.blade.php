@php
    $role = Request::segment(1);
    $notifications = config('dummy_notif.'.$role);    
@endphp

{{-- Header --}}
@if (config('layout.extras.notifications.dropdown.style') == 'light')
    <div class="d-flex flex-column pt-12 bg-dark-o-5 rounded-top">
        {{-- Title --}}
        <h4 class="d-flex flex-center">
            <span class="text-dark">User Notifications</span>
            <span class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2">23 new</span>
        </h4>

        {{-- Tabs --}}
        <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-primary mt-3 px-8" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_events"  >Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#topbar_notifications_logs"  >Logs</a>
            </li>
        </ul>
    </div>
@else
    <div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url('{{ asset('media/misc/bg-1.jpg') }}')">
        {{-- Title --}}
        <h4 class="d-flex flex-center rounded-top">
            <span class="text-white">User Notifications</span>
            <span class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2">23 new</span>
        </h4>

        {{-- Tabs --}}
        <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-line-transparent-white nav-tabs-line-active-border-success mt-3 px-8" role="tablist">

            <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_events"  >Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#topbar_notifications_logs"  >Logs</a>
            </li>
        </ul>
    </div>
@endif

{{-- Content --}}
<div class="tab-content">

    {{-- Tabpane --}}

    <div class="tab-pane active show" id="topbar_notifications_events" role="tabpanel">
        {{-- Nav --}}
        <div class="navi navi-hover scroll my-4" data-scroll="true" data-height="300" data-mobile-height="200">
            {{-- Item --}}
            @if(!empty($notifications))
                @foreach ($notifications as $item)
                    <a href="#" class="navi-item">
                        <div class="navi-link">
                            <div class="navi-icon mr-2">
                                <i class="menu-icon flaticon2-notification"></i>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">
                                    {{ $item['message'] }}
                                </div>
                                <div class="text-muted">
                                    {{ $item['date'] }}
                                </div>
                            </div>
                        </div>
                    </a>
                    
                @endforeach
            
            @else
                <div class="d-flex flex-center text-center text-muted min-h-200px">
                    All caught up!
                    <br/>
                    No new notifications.
                </div>
            @endif
        </div>
    </div>

    {{-- Tabpane --}}
    <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
        {{-- Nav --}}
        <div class="navi navi-hover scroll my-4" data-scroll="true" data-height="300" data-mobile-height="200">
            {{-- Item --}}
            @if(!empty($notifications))
                @foreach ($notifications as $item)
                    <a href="#" class="navi-item">
                        <div class="navi-link">
                            <div class="navi-icon mr-2">
                                <i class="menu-icon flaticon2-notification"></i>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">
                                    {{ $item['message'] }}
                                </div>
                                <div class="text-muted">
                                    {{ $item['date'] }}
                                </div>
                            </div>
                        </div>
                    </a>
                    
                @endforeach
            
            @else
                <div class="d-flex flex-center text-center text-muted min-h-200px">
                    All caught up!
                    <br/>
                    No new notifications.
                </div>
            @endif
        </div>
    </div>
</div>
