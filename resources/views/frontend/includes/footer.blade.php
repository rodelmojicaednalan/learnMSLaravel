<footer>
	<div class="footer-inner container">
		<div class="row">
			<div class="col-md">
				<h5>Get in touch</h5>
				<ul>
					<li><a href="{{ url('/') }}">Home</a></li>
					<li><a href="{{ url('/about') }}">About</a></li>
					<li><a href="{{ url('/contact') }}">Contact</a></li>
				</ul>
			</div>
			<div class="col-md">
				<h5>Connections</h5>
				<ul>
					<li><a href="#" target="_blank">Facebook</a></li>
					<!-- <li><a href="#" target="_blank">Twitter</a></li> -->
					<li><a href="#" target="_blank">Youtube</a></li>
					<li><a href="#" target="_blank">LinkedIn</a></li>
				</ul>
			</div>
			<div class="col-md">
				<h5>Earnings</h5>
				<ul>
					<li><a href="{{ url('/how-to-teach') }}">Teach with us</a></li>
					<li><a href="{{ url('/collaborate-with-us') }}">Collaborate with us</a></li>
				</ul>
			</div>
			<div class="col-md">
				<h5>Account</h5>
				<ul>
					<li><a href="#" target="_blank">Profile</a></li>
				</ul>
			</div>
		</div>
	</div>
	


	
</footer>
<div class="cn-bottom" id="cookie-notice" role="banner">
		<div class="container">
			<div class="row">
			<div class="col-md-12">
				<p id="cn-notice-text">This website uses cookies – by continuing to use this site or closing this message, you are agreeing to our <a href="#" target="_blank" class="red text-decoration-underline">Cookie Policy</a>.<br>We have recently updated our <a href="#" target="_blank" class="red text-decoration-underline">Privacy Notices</a>, you can read more about these at any time</span> <a class="cn-set-cookie cn-button btn btn-red" data-cookie-set="accept" href="javascript:void(0);" id="cn-accept-cookie">Thanks, don’t tell me again</a>
				</p>
			</div>
		</div>
	</div>
		</div>
	</div>
<!-- Image loader -->
<div id='loader' style='display: none;'>
  <img src="{{ asset('frontend/images/loader.gif')}}" width='32px' height='32px'>
</div>
<!-- Image loader -->
@guest
    @include('frontend.includes.overlay')
@endguest

<!-- {{ asset('frontend/js/jquery-3.6.0.min.js') }} -->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="{{ asset('frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/vendor/jquery-ui.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/vendor/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/vendor/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/vendor/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/vendor/jquery.fitvids.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/vendor/ion.rangeSlider.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/vendor/jquery.mCustomScrollbar.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/vendor/chosen.jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/vendor/jquery.mousewheel.min.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.25.1/moment.min.js"></script>
<script type="text/javascript" src="{{ asset('frontend/js/artbug.js') }}"></script>

{{-- Add JS for specific pages --}}
@yield('scripts')
