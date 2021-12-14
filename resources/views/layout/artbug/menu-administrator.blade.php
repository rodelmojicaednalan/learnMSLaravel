
<div class="aside aside-left d-flex flex-column flex-row-auto" id="kt_aside">

    {{-- Brand --}}
    <div class="brand flex-column-auto" id="kt_brand">
        <div class="brand-logo">
            <a href="{{ url('/') }}">
                <img alt="{{ config('app.name') }}" src="{{ asset('media/logos/ArtBug.png') }}" width="75px" />
            </a>
        </div>

        @if (config('layout.aside.self.minimize.toggle'))
            <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                <span class="svg-icon svg-icon-xl"><!--begin::Svg Icon | path:media/svg/icons/Navigation/Angle-double-left.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24"/>
                    <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) "/>
                    <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) "/>
                </g>
            </svg><!--end::Svg Icon--></span>
            </button>
        @endif

    </div>

<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">


        <div id="kt_aside_menu" class="aside-menu my-4 scroll ps ps--active-y" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500" style="height: 211px; overflow: hidden;">


            <ul class="menu-nav ">
               <li class="menu-item @if (Request::is('administrator/dashboard*')) menu-item-open menu-item-active @endif" aria-haspopup="true">
                  <a href="{{ url('administrator/dashboard') }}" class="menu-link ">
                     <i class="menu-icon flaticon2-layers-2"></i>
                     <span class="menu-text">Dashboard</span>
                  </a>
               </li>
               <li class="menu-item  @if (Request::is('administrator/school*')) menu-item-open menu-item-active @endif" aria-haspopup="true">
                <a href="{{ url('administrator/school') }}" class="menu-link ">
                    <i class="menu-icon flaticon2-architecture-and-city"></i><span class="menu-text">School</span>
                </a>
            </li>
               <li class="menu-item  @if (Request::is('administrator/users*')) menu-item-open menu-item-active @endif" aria-haspopup="true">
                    <a href="{{ url('administrator/users') }}" class="menu-link ">
                        <i class="menu-icon flaticon-user"></i><span class="menu-text">Users</span>
                    </a>
                </li>
               <!-- <li class="menu-item @if (Request::is('administrator/curriculum*')) menu-item-open menu-item-active @endif" aria-haspopup="true">
                    <a href="{{ url('administrator/curriculum') }}" class="menu-link ">
                        <i class="menu-icon flaticon2-open-text-book"></i><span class="menu-text">Curriculums</span>
                    </a>
                </li> -->
                <!-- <li class="menu-item @if (Request::is('administrator/training-schedules*')) menu-item-open menu-item-active @endif" aria-haspopup="true">
                    <a href="{{ url('administrator/training-schedules') }}" class="menu-link ">
                        <i class="menu-icon flaticon2-time"></i><span class="menu-text">Training Schedules</span>
                    </a>
                </li> -->
                <li class="menu-item @if (Request::is('administrator/partners*')) menu-item-open menu-item-active @endif" aria-haspopup="true">
                    <a href="{{ url('administrator/partners') }}" class="menu-link ">
                        <i class="menu-icon flaticon-users"></i><span class="menu-text">Partners' Deals</span>
                    </a>
                </li>
                <!-- <li class="menu-item @if (Request::is('administrator/artbug-classes*')) menu-item-open menu-item-active @endif" aria-haspopup="true">
                    <a href="{{ url('administrator/artbug-classes') }}" class="menu-link ">
                        <i class="menu-icon fas fa-book"></i><span class="menu-text">Artbug Classes</span>
                    </a>
                </li> -->
                <li class="menu-item @if (Request::is('administrator/payment-transaction*')) menu-item-open menu-item-active @endif" aria-haspopup="true">
                    <a href="{{ url('administrator/payment-transaction') }}" class="menu-link ">
                        <i class="menu-icon fas fa-wallet"></i><span class="menu-text">Payment Transactions</span>
                    </a>
                </li>

                <!-- <li class="menu-item @if (Request::is('administrator/grading-request*')) menu-item-open menu-item-active @endif" aria-haspopup="true">
                    <a href="{{ url('administrator/grading-request') }}" class="menu-link ">
                        <i class="menu-icon fas fa-wallet"></i><span class="menu-text">Grading Request</span>
                    </a>
                </li> -->

                <li class="menu-item @if (Request::is('administrator/child*')) menu-item-open menu-item-active @endif" aria-haspopup="true">
                    <a href="{{ url('administrator/child') }}" class="menu-link ">
                        <i class="menu-icon flaticon2-group"></i><span class="menu-text">Students</span>
                    </a>
                </li>


                <li class="menu-item  menu-item-submenu @if (Request::is('administrator/settings*')) menu-item-open menu-item-here @endif" aria-haspopup="true" data-menu-toggle="hover">
                  <a href="#" class="menu-link menu-toggle">
                     <i class="menu-icon flaticon2-gear"></i>
                     <span class="menu-text">Configurations &amp; Settings</span>
                  </a>
                  <div class="menu-submenu ">
                     <span class="menu-arrow"></span>
                     <ul class="menu-subnav">
                        <li class="menu-item  menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">Configurations &amp; Settings</span>
                            </span>
                        </li>
                        <!-- <li class="menu-item @if (Request::is('administrator/settings/user-roles*')) menu-item-open menu-item-active @endif" aria-haspopup="true">
                            <a href="{{ url('administrator/settings/user-roles') }}" class="menu-link ">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">User Roles</span>
                            </a>
                        </li> -->
                        <li class="menu-item @if (Request::is('administrator/settings/categories*')) menu-item-open menu-item-active @endif" aria-haspopup="true">
                            <a href="{{ url('administrator/settings/categories') }}" class="menu-link ">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">Categories</span>
                            </a>
                        </li>

                        <li class="menu-item @if (Request::is('administrator/settings/levels*')) menu-item-open menu-item-active @endif" aria-haspopup="true">
                            <a href="{{ url('administrator/settings/levels') }}" class="menu-link ">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">Levels</span>
                            </a>
                        </li>
                        <!-- <li class="menu-item @if (Request::is('administrator/settings/requirements*')) menu-item-open menu-item-active @endif" aria-haspopup="true">
                            <a href="{{ url('administrator/settings/requirements') }}" class="menu-link ">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">Requirements</span>
                            </a>
                        </li> -->
                     </ul>
                  </div>
               </li>
            </ul>

    </div>
</div>

</div>
