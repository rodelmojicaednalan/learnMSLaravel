<?php
if($page=="home"){
	$menu_home_active = 'active';
}
if($page=="about"){
	$menu_about_active = 'active';
}
if($page=="howtolearn"){
	$learnwithus_active = 'active';
	$howtolearn_active = 'active';
}
if($page=="classes"){
	$learnwithus_active = 'active';
	$classes_active = 'active';
}
if($page=="howtoteach"){
	$teachwithus_active = 'active';
	$howtoteach_active = 'active';
}
if($page=="curriculum"){
	$teachwithus_active = 'active';
	$curriculum_active = 'active';
}
if($page=="teacher_handbook"){
	$teachwithus_active = 'active';
	$teacher_handbook_active = 'active';
}
?>
  @auth
	<div id="sticky-top-progress-bar">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<p>Your Profile is incomplete. Please add more details in your <a class="white text-decoration-underline" href="{{ url(auth()->user()->roles[0]->name . '/profile') }}">profile</a> page.</p>
				</div>
			</div>
		</div>
	</div>
	@endauth
<header id="header">
	
	<div class="container">
		<div class="row align-items-center">
			<div class="col logo-wrapper">
				<a href="{{ url('/') }}"><img src="{{ asset('frontend/images/orca-logo.png') }}" alt="logo" class="logo" /></a>
			</div>
			<div class="col-md-7 align-items-center nav-wrapper">
				<nav class="navbar navbar-expand-lg navbar-light">

					<div class="collapse navbar-collapse" id="main-menu-list">
                        {{ request()->is('/about') }}
						<ul class="navbar-nav">
							<li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
								<a class="nav-link" href="{{ url('/') }}">Home</a>
							</li>
							<li class="nav-item {{ (request()->is('about')) ? 'active' : '' }}">
								<a class="nav-link" href="{{ url('about') }}">About</a>
							</li>
							<li class="nav-item dropdown">
								<a class="{{ (request()->is('how-to-learn') || request()->is('classes')) ? 'active' : '' }} nav-link dropdown-toggle" href="#" id="learnwithus" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Learn</a>
								<div class="dropdown-menu" aria-labelledby="learnwithus">
									<a class="dropdown-item {{ (request()->is('how-to-learn')) ? 'active' : '' }}" href="{{ url('how-to-learn') }}">Benefits</a>
									<a class="dropdown-item {{ (request()->is('classes')) ? 'active' : '' }}" href="{{ url('classes') }}">Programmes</a>
									<!-- <a class="dropdown-item" href="#">Pre/Live Recorded Lessons</a> -->
								</div>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle {{ (request()->is('how-to-teach') || request()->is('curriculum') || request()->is('teacher-handbook')) ? 'active' : '' }}" href="#" id="teachwithus" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Teach</a>
								<div class="dropdown-menu" aria-labelledby="teachwithus">
									<a class="dropdown-item {{ (request()->is('how-to-teach')) ? 'active' : '' }}" href="{{ url('how-to-teach') }}">Get Trained</a>
									<a class="dropdown-item {{ (request()->is('curriculum')) ? 'active' : '' }}" href="{{ url('curriculum') }}">Browse Curriculum</a>
									<a class="dropdown-item {{ (request()->is('teacher-handbook')) ? 'active' : '' }}" href="{{ url('teacher-handbook') }}">Start Teaching</a>
								</div>
							</li>
							<li class="nav-item">
								<a class="nav-link {{ (request()->is('collaborate-with-us') ) ? 'active' : '' }}" href="{{ url('collaborate-with-us') }}">Collaborate</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{ (request()->is('contact') ) ? 'active' : '' }}" href="{{ url('contact') }}">Contact</a>
							</li>
						</ul>

					</div>
				</nav>
			</div>
			<div class="col text-right btn-wrapper {{ auth()->check() ? 'icons-wrapper' : '' }}">
                @auth
                    <!-- Different only this part with login and unlogin -->
                    <nav class="navbar navbar-expand-lg  nav-right">

                        <ul class="navbar-nav">
                            <li class="nav-item message-icon-wrap">
                                <a class="nav-link">
                                    <i class="fa fa-message" aria-hidden="true"></i>
                                    <!-- <img src="images/icon-message.png" alt="icon" /> -->
                                    <span class="count rounded-circle">
                                        4
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ (request()->is(auth()->user()->roles[0]->name . '/profile') || request()->is(auth()->user()->roles[0]->name . '/frontend/dashboard') || request()->is(auth()->user()->roles[0]->name . '/settings') ) ? 'active' : '' }}" href="#" id="dropdown-user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdown-user">
									
								<a class="dropdown-item {{ (request()->is(auth()->user()->roles[0]->name . '/profile')) ? 'active' : '' }}" href="{{ url(auth()->user()->roles[0]->name . '/profile') }}">Profile</a>
                                    <!-- if login as school goes to school-profile.php -->
                                    <!-- if login as learner goes to parent-child-profile.php-->
									<?php 
									if(auth()->user()->roles[0]->name == "school_administrator")
									{
										?>
										<a class="dropdown-item {{ (request()->is('school-admin/dashboard')) ? 'active' : '' }}" href="/school-admin/dashboard">Dashboard</a>

									<?php
									}
									else{
										?>
										<a class="dropdown-item {{ (request()->is(auth()->user()->roles[0]->name . '/frontend/dashboard')) ? 'active' : '' }}" href="{{ url(auth()->user()->roles[0]->name.'/frontend/dashboard' ) }}">Dashboard</a>
										<?php
									}
									?>
									
                                    <!-- <a class="dropdown-item {{ (request()->is('teacher/frontend/dashboard')) ? 'active' : '' }}" href="/school-admin/dashboard">Dashboard</a> -->
                                    <a class="dropdown-item" href="#">Settings</a>
                                    <form class="form" novalidate="novalidate" method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                    {{-- <a class="dropdown-item" href="#">Logout</a> --}}

                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (request()->is('teacher/frontend/calendar*')) ? 'active' : '' }}" href="{{ url(auth()->user()->roles[0]->name.'/frontend/calendar' ) }}">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="nav-item cart-icon-wrap">

                                <a class="nav-link {{ (request()->is('cart')) ? 'active' : '' }}" href="{{ url('/cart/' . auth()->user()->id ) }}">
                                    <i class="fa fa-cart" aria-hidden="true"></i>
                                    <span class="count rounded-circle">
                                      {{ count(cart_count(auth()->user()->id )) }}
                                    </span>
                                </a>
                            </li>
                        </ul>

                    </nav>
                @else
                    <button type="button" class="btn btn-red login-btn" data-toggle="modal" data-target="#login" data-dismiss="modal">Login</button>
				    <button type="button" id="home_register"   data-action="open_register" class="btn btn-red register-btn action_user" data-toggle="modal" data-target="#register" data-dismiss="modal">Register</button>
                @endauth

				<!-- mobile menu -->
				<button id="" class="navbar-toggler" type="button">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>

		</div>
	</div>
</header>
<div id="mobile-menu">

</div>
