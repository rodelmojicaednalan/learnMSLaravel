<!-- Modal Login -->
<div class="modal fade" id="login" tabindex="-1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Login</h2>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body nicescroll">

            <form id="login-form" class="form" method="POST" action="{{ route('login') }}">
            @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-group">
                            <i class="fa fa-mail" aria-hidden="true"></i>
                            <input type="email" id="login-email" name="email" class="form-control" placeholder="Type your email address">
                        </div>
                        <small id="email_error" class="text-danger error" style="display:none;"></small>

                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-group show_hide_password" id="shp">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            <input class="form-control" id="login-password" name="password" type="password" placeholder="Type your password">
                            <span class="show-password"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                        </div>

                        <small id="password_error" class="text-danger error" style="display:none;"></small>


                    </div>
                    <p class="text-right"><a href="javascript:void(0)" data-toggle="modal"
                            data-target="#forgot-password" data-dismiss="modal">Forgot Password?</a></p>
                    <div class="form-submit text-center">
                        <button type="submit" id="kt_login_signin_submit" class="btn btn-red btn-full">Login</button>
                    </div>
            </form>
            <div class="modal-footer">
                <p class="text-center">or login using</p>
                <div class="social-wrapper">

                    <a href="{{ url('auth/google') }}"><img src="{{ asset('frontend/images/google.png') }}" alt="icon" /></a>
                    <a href="{{ url('auth/facebook') }}"><img src="{{ asset('frontend/images/facebook.png') }}" alt="icon" /></a>
                    <a href="{{ url('auth/linkedin') }}"><img src="{{ asset('frontend/images/linkedin.png') }}" alt="icon" /></a>
                    <a href="{{ url('auth/twitter') }}"><img src="{{ asset('frontend/images/twitter.png') }}" alt="icon" /></a>
                </div>
                <p class="text-center">Don’t have an ORCA account? <a href="javascript:void(0)" data-toggle="modal"
                        data-target="#register" data-dismiss="modal">Register</a> here.</p>
            </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal Register -->
<div class="modal fade" id="register" tabindex="-1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Register</h2>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body nicescroll">

                    <div class="form-group">
                        <label for="email" id="register_email_text" class="label_error">Email</label>
                        <div class="input-group">
                            <i class="fa fa-mail" aria-hidden="true"></i>
                            <input type="email" id="register_email" class="form-control reset_f" placeholder="Type your email address">

                        </div>
                       <small id="register_email_error" class="text-danger error" style="display:none;">
                           This field is required.
                        </small>
                    </div>

                    <div class="form-group">
                        <label id="register_password_text" class="label_error">Password</label>
                        <div class="input-group show_hide_password" id="shp-1">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            <input class="form-control reset_f" id="register_password" type="password" placeholder="Type your password">
                            <span class="show-password"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>

                        </div>
                        <small id="register_password_error" class="text-danger error" style="display:none;">
                        This field is required.
                        </small>
                    </div>
                    <div class="form-group">
                        <label id="register_confirm_text" class="label_error">Confirm Password</label>
                        <div class="input-group show_hide_password" id="shp-2">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            <input class="form-control reset_f" id="register_confirm" type="password" placeholder="Re-type your password">
                            <span class="show-password"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>

                        </div>
                        <small id="confirm_error" class="text-danger error" style="display:none;">

                            </small>
                    </div>
                    <div class="form-submit text-center">
                        <button type="submit" id="btnRegister" class="btn btn-red btn-full action_user" data-action="btn_register">Register</button>
                    </div>
                    <div class="modal-footer">
                         <p class="text-center">or Register using</p>
                         <div class="social-wrapper">

                            <a href="{{ url('auth/google') }}"><img src="{{ asset('frontend/images/google.png') }}" alt="icon" /></a>
                            <a href="{{ url('auth/facebook') }}"><img src="{{ asset('frontend/images/facebook.png') }}" alt="icon" /></a>
                            <a href="{{ url('auth/linkedin') }}"><img src="{{ asset('frontend/images/linkedin.png') }}" alt="icon" /></a>
                            <a href="{{ url('auth/twitter') }}"><img src="{{ asset('frontend/images/twitter.png') }}" alt="icon" /></a>
                        </div>
                <p class="text-center">Already have an account? <a href="javascript:void(0);" data-toggle="modal"
                        data-target="#login" data-dismiss="modal">Login</a> here.</p>
            </div>
            </div>

        </div>
    </div>
</div>
<!-- Modal Reset Password -->
<div class="modal fade" id="reset-password" tabindex="-1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex">
                    <a href="javascript:void(0);" class="back" data-toggle="modal" data-target="#login"
                        data-dismiss="modal"><img src="{{ asset('frontend/images/icon-back.png') }}" alt="icon" /></a>
                    <h2 class="modal-title">Reset Password</h2>
                    <button type="button" class="close" data-dismiss="modal">×</button>

                </div>
               <!--  <div class="text-wrapper">
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt.</p>
                </div> -->
            </div>
            <div class="modal-body nicescroll">
                <form class="form" method="POST">
                    <div class="form-group">
                        <label id="reset_password_text" class="label_error">Password</label>
                        <div class="input-group show_hide_password" id="shp-1">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            <input class="form-control reset_f" id="reset_password" type="password" placeholder="Type your password">
                            <span class="show-password"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>

                        </div>
                        <small id="reset_password_error" class="text-danger error" style="display:none;">
                        This field is required.
                        </small>
                    </div>
                    <div class="form-group">
                        <label id="reset_confirm_text" class="label_error">Confirm Password</label>
                        <div class="input-group show_hide_password" id="shp-2">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            <input class="form-control reset_f" id="reset_confirm" type="password" placeholder="Re-type your password">
                            <span class="show-password"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>

                        </div>
                        <small id="reset_confirm_error" class="text-danger error" style="display:none;">

                            </small>
                    </div>


                    <div class="form-submit text-center">
                        <button type="submit" id="btnReset" class="btn btn-red btn-full">Reset</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Modal Forgot Password -->
<div class="modal fade" id="forgot-password" tabindex="-1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex align-items-center">
                    <a href="javascript:void(0);" class="back" data-toggle="modal" data-target="#login"
                        data-dismiss="modal"><img src="{{ asset('frontend/images/icon-back.png') }}" alt="icon" /></a>
                    <h2 class="modal-title">Forgot Password</h2>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
            </div>

            <div class="modal-body nicescroll">

                    <div class="form-group">
                        <label for="email" id="forgot_email_text" class="label_error">Email</label>
                        <div class="input-group">
                            <i class="fa fa-mail" aria-hidden="true"></i>
                            <input type="email" id="forgot_email" class="form-control" placeholder="Type your email address">
                        </div>
                        <small id="forgot_email_error" class="text-danger error" style="display:none;">
                           </small>
                    </div>
                    <div class="form-submit text-center">
                        <button type="button" id="btnRequest" class="btn btn-red btn-full">Request</button>
                    </div>

            </div>

        </div>
    </div>
</div>

<!-- Modal Password Sent -->
<div class="modal fade" id="password-sent" tabindex="-1" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Forgot Password</h2>
            </div>
            <div class="modal-body text-center nicescroll">
                <img src="{{ asset('frontend/images/open-email.png') }}" alt="icon" />
                <div class="text-wrapper">
                    <p>We’ve sent a link to your email. Check the link in order to reset your password.</p>
                </div>
                <button class="btn btn-red btn-full" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Select Role -->
<div class="modal fade" id="select-role" tabindex="-1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                 <a href="javascript:void(0);" class="back" data-toggle="modal" data-target="#register"
                        data-dismiss="modal"><img src="{{ asset('frontend/images/icon-back.png') }}" alt="icon" /></a>
                <h2 class="modal-title">Select Role</h2>

            </div>
            <div class="modal-body text-center nicescroll">
                <div class="row">
                    <div class="col-md-4 select-item action_user" data-action="select_school" data-overlay="school-additional-info">
                        <img src="{{ asset('frontend/images/school.png') }}" alt="icon" />
                        <div class="title">School</div>
                    </div>
                    <div class="col-md-4 select-item action_user" data-action="select_teacher" data-overlay="teacher-additional-info">
                        <img src="{{ asset('frontend/images/teacher.png') }}" alt="icon" />
                        <div class="title">Teacher</div>
                    </div>
                     <div class="col-md-4 select-item action_user" data-action="select_learner" data-overlay="parent-additional-info">
                        <img src="{{ asset('frontend/images/learner.png') }}" alt="icon" />
                        <div class="title">Learner</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-red btn-full disabled" id="selected-role" disabled="true"
                            data-toggle="modal" data-target="" data-dismiss="modal">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Create  School Profile -->
<div class="modal fade" id="school-additional-info" tabindex="-1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex">
                    <a href="javascript:void(0);" class="back" data-toggle="modal" data-target="#select-role"
                        data-dismiss="modal"><img src="{{ asset('frontend/images/icon-back.png') }}" alt="icon" /></a>
                    <h2 class="modal-title">Create School Profile</h2>
                </div>

            </div>
            <div class="modal-body nicescroll">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="NameofInstitution" class="label_error" id="register_school_text">Name of Institution</label>
                                <input type="text" class="form-control" id="NameofInstitution"
                                    placeholder="Type institution name">

                                    <small id="school_error" class="text-danger error" style="display:none;">
                                This field is required.
                                </small>
                            </div>


                            <div class="form-group">
                                <label for="crn" class="label_error" id="register_crn_text">Company Registration Number</label>
                                <input type="text" class="form-control" id="crn" placeholder="Type registration number">
                                <small id="crn_error" class="text-danger error" style="display:none;">
                                This field is required.
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="Type address">
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" class="form-control" id="website" placeholder="Add your website">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact-number3">Contact Number</label>
                                <input type="phone-number" class="form-control" id="contact-number3"
                                    placeholder="Type your number">
                            </div>
                            <div class="form-group">
                                <label for="country">Country of Residence</label>
                                <select id="country" class="selectmenu">

                                    @foreach($countries ?? '' as $country)
                                    <option value="{{ $country->name }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group append-languages" id="append-language-2">
                                <label for="spoken-languages-2">Spoken Language/s</label>

                                <input type="text" placeholder="Select Language /s" data-toggle="collapse"
                                    data-target="#lang-content-2" aria-controls="navbars" aria-expanded="true"
                                    aria-label="Toggle navigation" class="navbar-toggler lang-multiselect" value=""
                                    readonly="" id="select_lang2">
                                <div id="lang-content-2" class="navbar-collapse collapse lang-content">
                                    <div class="nicescroll">
                                        <ul>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-en-2" value="English">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-en-2"
                                                            name="language">English</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-sp-2" value="Spanish">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-sp-2"
                                                            name="language">Spanish</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-cn-2" value="Mandarin Chinese">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-cn-2"
                                                            name="language">Mandarin Chinese</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-ru-2" value="Russian">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-ru-2"
                                                            name="language">Russian</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-fr-2" value="French">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-fr-2"
                                                            name="language">French</label>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="no-of-teacher">Number of Teachers</label>
                                <select id="no-of-teacher" class="selectmenu">
                                    <option value="">Select</option>
                                    @php
                                        for( $i=1; $i<=100; $i++ ){
                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                        }
                                    @endphp
                                    {{-- <option value="1">1</option>
                                    <option value="2">2</option> --}}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-submit text-center">
                        <button type="submit" id="cont_school_btn" class="btn btn-red btn-full action_user" data-action="cont_school_profile">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal School Logo & About -->
<div class="modal fade" id="school-profile-picture" tabindex="-1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex">
                    <a href="javascript:void(0);" class="back" data-toggle="modal" data-target="#school-additional-info"
                        data-dismiss="modal"><img src="{{ asset('frontend/images/icon-back.png') }}" alt="icon" /></a>
                    <h2 class="modal-title">Logo and About</h2>
                </div>

            </div>
            <div class="modal-body">
                <div class="row align-items-start">
                    <div class="col-md-6  upload-wrapper">
                        <div class="form-group">
                            <div class="image-area">
                                <img id="imageResult2" src="{{ asset('frontend/images/placeholder-user.png') }}" alt="" class="img-fluid"></div>
                            <div class="">
                                <input id="upload" type="file" class="form-control border-0">
                                <div class="input-group-append">
                                    <label for="upload" class="btn btn-red">Upload <i class="fa fa-upload"></i></label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first-name2">About</label>
                            <input type="text" class="form-control reset_f" id="about" placeholder="Type here">
                        </div>
                    </div>
                </div>
                <div class="form-submit text-center">
                    <button type="submit" id="tnc-btn" class="btn btn-red btn-full" data-toggle="modal" data-target="#tnc"
                        data-dismiss="modal">Continue</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Create Parent/Student Profile -->
<div class="modal fade" id="parent-additional-info" tabindex="-1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex">
                    <a href="javascript:void(0);" class="back" data-toggle="modal" data-target="#select-role"
                        data-dismiss="modal"><img src="{{ asset('frontend/images/icon-back.png') }}" alt="icon" /></a>
                    <h2 class="modal-title">Create Parent Profile</h2>
                </div>
               <!--  <div class="text-wrapper">
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt.</p>
                </div> -->
            </div>
            <div class="modal-body nicescroll">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first-name2"  class="label_error" id="learner_fname_text">First Name</label>

                                <input type="text" class="form-control" id="first-name2"
                                    placeholder="Type your first name">
                                    <small id="learner_fname_error" class="text-danger error" style="display:none;">
                                This field is required.
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="latest-name2" class="label_error" id="learner_lname_text">Last Name</label>
                                <input type="text" class="form-control" id="last-name2"
                                    placeholder="Type your last name">
                                    <small id="learner_lname_error" class="text-danger error" style="display:none;">
                                This field is required.
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="gender2" class="label_error" id="learner_gender_text">Gender</label>
                                <select id="gender2" class="selectmenu">
                                    <option value="0">Select Your Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <small id="learner_gender_error" class="text-danger error" style="display:none;">
                                This field is required.
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="contact-number1">Contact Number <i>(Optional)</i></label>
                                <input type="phone-number" class="form-control" id="contact-number1"
                                    placeholder="Type your phone number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group append-languages" id="append-language-3">
                                <label for="spoken-languages-3">Spoken Language/s</label>

                                <input type="text" placeholder="Select Language /s" data-toggle="collapse"
                                    data-target="#lang-content-3" aria-controls="navbars" aria-expanded="true"
                                    aria-label="Toggle navigation" class="navbar-toggler lang-multiselect" value=""
                                    readonly="" id="lang3">
                                <div id="lang-content-3" class="navbar-collapse collapse lang-content">
                                    <div class="nicescroll">
                                        <ul>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-en-3" value="English">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-en-3"
                                                            name="language">English</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-sp-3" value="Spanish">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-sp-3"
                                                            name="language">Spanish</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-cn-3" value="Mandarin Chinese">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-cn-3"
                                                            name="language">Mandarin Chinese</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-ru-3" value="Russian">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-ru-3"
                                                            name="language">Russian</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-fr-3" value="French">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-fr-3"
                                                            name="language">French</label>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country-of-residence-1">Country of Residence</label>
                                <select id="country-of-residence-1" class="selectmenu">
                                        <option value="Singapore">Singapore</option>
                                        @foreach($countries ?? '' as $country)
                                        <option value="{{ $country->name }}">{{ $country->name }}</option>
                                        @endforeach
                                </select>
                            </div>


                        </div>
                    </div>
                    <div class="form-submit text-center">
                        <button type="submit" class="btn btn-red btn-full action_user" id="cont_learner_profile_btn" data-action="cont_learner_profile">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Create Teacher Profile -->
<div class="modal fade" id="teacher-additional-info" tabindex="-1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
        <div class="modal-content">

            <div class="modal-header">
                <div class="d-flex">
                    <a href="javascript:void(0);" class="back" data-toggle="modal" data-target="#select-role"
                        data-dismiss="modal"><img src="{{ asset('frontend/images/icon-back.png') }}" alt="icon" /></a>
                    <h2 class="modal-title">Create Teacher Profile</h2>
                </div>
                <!-- <div class="text-wrapper">
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt.</p>
                </div> -->
            </div>
            <div class="modal-body nicescroll">
            <!-- register_form -->
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first-name1" class="label_error" id="register_fname1_text">First Name</label>
                                <input type="text" class="form-control reset_f" id="first-name1"
                                    placeholder="Type your first name">
                                    <small id="fname1_error" class="text-danger error" style="display:none;">
                                This field is required.
                                </small>

                            </div>
                            <div class="form-group">
                                <label for="last-name1" class="label_error" id="register_lname1_text">Last Name</label>
                                <input type="text" class="form-control reset_f" id="last-name1"
                                    placeholder="Type your last name">
                                    <small id="lname1_error" class="text-danger error" style="display:none;">
                                This field is required.
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="gender1" id="register_gender1_text">Gender</label>
                                <select id="gender1" class="selectmenu">
                                    <option value="0">Select your gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <small id="gender1_error" class="text-danger error" style="display:none;">
                                This field is required.
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="contact-number2">Contact Number <i>(Optional)</i></label>
                                <input type="phone-number" class="form-control" id="contact-number2"
                                    placeholder="Type your phone number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group append-languages" id="append-language-1">
                                <label for="spoken-languages-1">Spoken Language/s</label>

                                <input type="text" placeholder="Select Language /s" data-toggle="collapse"
                                    data-target="#lang-content-1" aria-controls="navbars" aria-expanded="true"
                                    aria-label="Toggle navigation" class="navbar-toggler lang-multiselect" value=""
                                    readonly="" id="select_lang">
                                <div id="lang-content-1" class="navbar-collapse collapse lang-content">
                                    <div class="nicescroll">
                                        <ul>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-en-1" value="English">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-en-1"
                                                            name="language">English</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-sp-1" value="Spanish">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-sp-1"
                                                            name="language">Spanish</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-cn-1" value="Mandarin Chinese">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-cn-1"
                                                            name="language">Mandarin Chinese</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-ru-1" value="Russian">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-ru-1"
                                                            name="language">Russian</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-fr-1" value="French">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-fr-1"
                                                            name="language">French</label>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="highest-education-qualification">Highest Education Qualification</label>
                                <select id="highest-education-qualification" class="selectmenu">
                                    <option value="Diploma">Diploma</option>
                                    <option value="Postgraduate Diploma">Postgraduate Diploma</option>
                                    <option value="Bachelor Degree">Bachelor Degree</option>
                                    <option value="Master Degree or Above">Master Degree or Above</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name-of-institution">Name of Institution</label>
                                <input type="text" class="form-control" id="name-of-institution"
                                    placeholder="Type your name of institution">
                            </div>
                            <div class="form-group">
                                <label for="country-of-Residence-3">Country of Residence</label>
                                <select class="selectmenu" id="country-of-Residence-3">
                                    <option value="Singapore">Singapore</option>
                                    @foreach($countries ?? '' as $country)
                                    <option value="{{ $country->name }}">{{ $country->name }}</option>
                                    @endforeach

                                </select>
                            </div>


                        </div>
                    </div>
                    <div class="form-submit text-center">
                        <button type="submit" id="cont_teacher_profile_btn" class="btn btn-red btn-full action_user" data-action="cont_teacher_profile">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Create Child/Student Profile -->
<div class="modal fade" id="student-additional-info" tabindex="-1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex">
                    <a href="javascript:void(0);" class="back" data-toggle="modal" data-target="#parent-additional-info"
                        data-dismiss="modal"><img src="{{ asset('frontend/images/icon-back.png') }}" alt="icon" /></a>
                    <h2 class="modal-title">Create Student Profile</h2>
                </div>
                <!-- <div class="text-wrapper">
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt.</p>
                </div> -->
            </div>
            <div class="modal-body nicescroll">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="child-name"  class="label_error"  id="childfname_text">Fullname</label>
                                <input type="text" class="form-control" id="child-fname"
                                    placeholder="Type your child name">
                                    <small id="childfname_error" class="text-danger error" style="display:none;">
                                    This field is required.
                                    </small>
                            </div>




                            <div class="form-group">
                                <label for="gender3" class="label_error"  id="childgender_text">Gender</label>
                                 <select class="selectmenu" id="gender3">
                                    <option value="0">Select Your Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <small id="childgender_error" class="text-danger error" style="display:none;">
                                This field is required.
                                </small>
                            </div>


                            <div class="form-group">
                                <label for="grade">Grade</label>
                                <select id="grade" class="selectmenu">
                                    <option>Select your grade</option>
                                    <option value="A">A</option>
                                    <option value="A">B</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="grade" class="label_error" id="childbday_text">Birthday</label>
                                <input type="date" id="child_bday" />
                                <small id="childbday_error" class="text-danger error" style="display:none;">
                                This field is required.
                                </small>
                            </div>


                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="country-of-residence-2">Country of Residence</label>
                                <select id="country-of-residence-2" class="selectmenu">
                                        <option value="Singapore">Singapore</option>
                                        @foreach($countries ?? '' as $country)
                                        <option value="{{ $country->name }}">{{ $country->name }}</option>
                                        @endforeach

                                </select>
                            </div>
                            <div class="form-group append-languages" id="append-language-4">
                                <label for="spoken-languages-4">Spoken Language/s</label>

                                <input type="text" placeholder="Select Language /s" data-toggle="collapse"
                                    data-target="#lang-content-4" aria-controls="navbars" aria-expanded="true"
                                    aria-label="Toggle navigation" class="navbar-toggler lang-multiselect" value=""
                                    readonly="" id="child_language">
                                <div id="lang-content-4" class="navbar-collapse collapse lang-content">
                                    <div class="nicescroll">
                                        <ul>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-en-4" value="English">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-en-1"
                                                            name="language">English</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-sp-4" value="Spanish">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-sp-4"
                                                            name="language">Spanish</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-cn-4" value="Mandarin Chinese">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-cn-4"
                                                            name="language">Mandarin Chinese</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-ru-4" value="Russian">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-ru-4"
                                                            name="language">Russian</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-fr-4" value="French">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-fr-4"
                                                            name="language">French</label>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="school">School <i>(Optional)</i></label>
                                <input type="text" id="child_school" name="" placeholder="Type your school">
                            </div>
                        </div>
                    </div>
                    <div class="form-submit text-center">
                        <button type="submit" class="btn btn-red btn-full action_user" id="cont_student_profile_btn" data-action="cont_student_profile">Continue</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Modal Profile Picture -->
<div class="modal fade" id="profile-picture" tabindex="-1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex">
                    <a href="javascript:void(0);" class="back" data-toggle="modal" data-target="#teacher-additional-info"
                    data-dismiss="modal"><img src="{{ asset('frontend/images/icon-back.png') }}" alt="icon" /></a>
                    <h2 class="modal-title">Profile Picture</h2>
                </div>
                <!-- <div class="text-wrapper">
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt.</p>
                    </div> -->
            </div>
            <div class="modal-body">
                <div class="row align-items-start upload-wrapper">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="image-area">
                                <img id="imageResult" src="{{ asset('frontend/images/placeholder-user.png') }}" alt="" class="img-fluid">
                            </div>
                            <div class="">
                                <input id="upload-logo" type="file" class="form-control border-0">

                                <div class="input-group-append">
                                    <label for="upload-logo" class="btn btn-red">Upload <i
                                        class="fa fa-upload"></i></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                             <div class="form-group">
                                <label for="first-name2">About</label>
                                <input type="text" class="form-control reset_f" id="cpp-about" placeholder="Type here">
                            </div>
                           <!--  Please check our Photo Submission Guidelines link in order for you
                            to upload your picture. -->
                        </div>
                    </div>
                    <div class="form-submit text-center">
                        <button type="submit" class="btn btn-red btn-full" data-toggle="modal" data-target="#tnc"
                        data-dismiss="modal">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal Terms & Condition -->
<div class="modal fade" id="tnc" tabindex="-1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex">
                    <a href="javascript:void(0);" class="back" data-toggle="modal" data-target="#"
                    data-dismiss="modal"><img src="{{ asset('frontend/images/icon-back.png') }}" alt="icon" /></a>
                    <h2 class="modal-title">Terms & Condition</h2>
                </div>
                <div class="text-wrapper" style="max-width: 80%">
                    <p class="text-center">PLEASE NOTE THAT YOUR USE OF AND ACCESS TO OUR SERVICES (DEFINED BELOW) ARE SUBJECT TO THE FOLLOWING TERMS; IF YOU DO NOT AGREE TO ALL OF THE FOLLOWING, YOU MAY NOT USE OR ACCESS THE SERVICES IN ANY MANNER.</p>
                </div>
            </div>
            <div class="modal-body">
                <div class="gray-bg-scroll nicescroll">
                    <h6>Terms of Use</h6>
                    <p>Effective date: XXXX XX, 2017</p>
                    <p>Welcome to ORCA.  Please read on to learn the rules and restrictions that govern your use of our website(s), any associated mobile applications, services and applications (the “Services”).  If you have any questions, comments, or concerns regarding these terms or the Services, please contact us at <a href="mailto:info@myorca.com" target="_blank">info@myorca.com</a>.</p>
                    <p>These Terms of Use (the “Terms”) are a binding contract between you and JV, Inc. (“ORCA,” “we” and “us”).   You must agree to and accept all of the Terms, or you don’t have the right to use the Services.  Your using the Services in any way means that you agree to all of these Terms, and these Terms will remain in effect while you use the Services.  These Terms include the provisions in this document, as well as those in the Privacy Policy and Copyright Policy.</p>
                    <h6>Will these Terms ever change?</h6>
                    <p>We are always working to improve our Services, so these Terms may need to change along with the Services.  We reserve the right to change the Terms at any time.  If we do, we will do our best to bring it to your attention by placing a notice on our website, by sending you an email, and/or by some other means, but you are responsible for knowing what the current Terms are.</p> 
                    <p>If you don’t agree with the new Terms, then you will no longer be able to use the Services.  If you use the Services in any way after a change to the Terms is effective, that means you agree to all of the changes.</p> 
                    <p>Except for changes by us as described here, no other amendment or modification of these Terms will be effective unless in writing and signed by both you and us.</p> 
                    <h6>What about my privacy?</h6>
                    <p>We take the privacy of its users very seriously.  Our current Privacy Policy complies with the Personal Data Protection Act 2012 of Singapore and other international jurisdictions (e.g., Children’s Online Privacy Protection Act (“COPPA”) in USA, General Data Protection Regulation in EU).  The Privacy Policy is contained in this document after the Terms of Services section.</p>
                    <p>The international data privacy law (including the laws in Singapore, U.S. and EU) requires that online service providers obtain parental consent before they knowingly collect personally identifiable information online from children who are under 13.  We do not knowingly collect or solicit personally identifiable information from children under 13; if you are a child under 13, please do not attempt to register for the Services or send any personal information about yourself to us.  If you believe that a child under 13 may have provided us personal information, please contact us at <a href="" target="_blank">info@myorca.com</a>.</p> 
                    <h6>What are the basics of using ORCA?</h6>
                    <p>You may be required to sign up for an account, and select a password and user name (“ORCA User ID”).  You promise to provide us with accurate and complete information about yourself.  You may not select as your ORCA User ID a name that you don’t have the right to use, or another person’s name with the intent to impersonate that person. You may not transfer your account to anyone else without our prior written permission.</p>
                    <p>You represent and warrant that you are an individual of legal age to form a binding contract.  If you’re agreeing to these Terms on behalf of an organization or entity, you represent and warrant that you are authorized to agree to these Terms on that organization or entity’s behalf and bind them to these Terms (in which case, the references to “you” and “your” in these Terms, except for in this sentence, refer to that organization or entity).</p>
                    <p>You will only use the Services for your own internal, non-commercial use, and not on behalf of or for the benefit of any third party, and only in a manner that complies with all laws that apply to you.  If your use of the Services is prohibited by applicable laws, then you aren’t authorized to use the Services.  We can’t and won’t be responsible for your using the Services in a way that breaks the law.</p>
                    <p>You must protect the security of your account and your password.  You’re responsible for any activity associated with your account.</p>
                    <p>Your use of the Services is subject to the following additional restrictions:<br>
                    You represent, warrant, and agree that you will not contribute any Content or User Submission (each of those terms is defined below) or otherwise use the Services or interact with the Services in a manner that:
                    </p>
                    <ol class="alpha-lower">
                        <li>Infringes or violates the intellectual property rights or any other rights of anyone else (including ORCA);</li>
                        <li>Violates any law or regulation, including any applicable export control laws;</li>
                        <li>Is harmful, fraudulent, deceptive, threatening, harassing, defamatory, obscene, or otherwise objectionable;</li>
                        <li>Jeopardizes the security of your ORCA account or anyone else’s;</li>
                        <li>Attempts, in any manner, to obtain the password, account, or other security information from any other user;</li>
                        <li>Violates the security of any computer network, or cracks any passwords or security encryption codes;</li>
                        <li>Runs Maillist, Listserv, any form of auto-responder or “spam” on the Services, or any processes that run or are activated while you are not logged into the Services, or that otherwise interfere with the proper working of the Services (including by placing an unreasonable load on the Services’ infrastructure);</li>
                        <li>Crawls,” “scrapes,” or “spiders” any page, data, or portion of or relating to the Services or Content (through use of manual or automated means);</li>
                        <li>Copies or stores any significant portion of the Content;</li>
                        <li>Decompiles, reverse engineers, or otherwise attempts to obtain the source code or underlying ideas or information of or relating to the Services.</li>
                    </ol>
 
<p>A violation of any of the foregoing is grounds for termination of your right to use or access the Services. </p>
<h6>What are my rights in ORCA?</h6>
<p>The materials displayed or performed or available on or through the Services, including, but not limited to, text, graphics, data, articles, photos, images, illustrations, User Submissions, and so forth (all of the foregoing, the “Content”) are protected by copyright and/or other intellectual property laws.  You promise to abide by all copyright notices, trademark rules, information, and restrictions contained in any Content you access through the Services, and you won’t use, copy, reproduce, modify, translate, publish, broadcast, transmit, distribute, perform, upload, display, license, sell or otherwise exploit for any purpose any Content not owned by you, (i) without the prior consent of the owner of that Content or (ii) in a way that violates someone else’s (including ORCA’s) rights.</p> 
<p>You understand that ORCA owns the Services. You won’t modify, publish, transmit, participate in the transfer or sale of, reproduce (except as expressly provided in this Section), create derivative works based on, or otherwise exploit any of the Services.</p>
<p>The Services may allow you to copy or download certain Content; please remember that just because this functionality exists, doesn’t mean that all the restrictions above don’t apply – they do!</p>
<h6>Do I have to grant any licenses to ORCA or to other users?</h6>
<p>Anything you post, upload, share, store, or otherwise provide through the Services is your “User Submission.”  Some User Submissions are viewable by other users.  In order to display your User Submissions on the Services, and to allow other users to enjoy them (where applicable), you grant us certain rights in those User Submissions.  Please note that all of the following licenses are subject to our Privacy Policy to the extent they relate to User Submissions that are also your personally-identifiable information.</p>
<p>You retain all ownership rights in your User Submissions.</p>
<p>In order to allow ORCA to provide the Service, you hereby grant to us a perpetual, irrevocable, non-exclusive, sublicensable (as necessary to perform the Service), worldwide, royalty-free, and transferable (only to a successor) right and license to (i) use, copy, store, distribute, publicly perform and display, modify, and create derivative works (such as changes we make so that your content works better with our Service) such User Submissions as necessary to provide, improve and make the Service available to you and other users, including through any future media in which the Service may be distributed, (ii) use and disclose metrics and analytics regarding the User Submissions in an aggregate or other non-personally identifiable manner (including, for use in improving our service or in marketing and business development purposes), (iii) use any User Submission (including any Education Record) that has been de-identified for any product development, research or other purpose; and (iv) use for other purposes permitted by our Privacy Policy.</p>      
<p>If you store a User Submission in your own personal ORCA account, in a manner that is not viewable by any other user except you (a “Personal User Submission”), you grant ORCA the license above, as well as a license to display, perform, and distribute your Personal User Submission for the sole purpose of making that Personal User Submission accessible to you and providing the Services necessary to do so.</p>
<p>If you share a User Submission only in a manner that only certain specified users can view (for example, a private message to one or more other users) (a “Limited Audience User Submission”), then you grant ORCA the licenses above, as well as a license to display, perform, and distribute your Limited Audience User Submission for the sole purpose of making that Limited Audience User Submission accessible to such other specified users, and providing the Services necessary to do so.  Also, you grant such other specified users a license to access that Limited Audience User Submission, and to use and exercise all rights in it, as permitted by the functionality of the Services.</p>
<p>If you share a User Submission publicly on the Services and/or in a manner that more than just you or certain specified users can view, or if you provide us (in a direct email or otherwise) with any feedback, suggestions, improvements, enhancements, and/or feature requests relating to the Services (each of the foregoing, a “Public User Submission”), then you grant ORCA the licenses above, as well as a license to display, perform, and distribute your Public User Submission for the purpose of making that Public User Submission accessible to all ORCA users and providing the Services necessary to do so, as well as all other rights necessary to use and exercise all rights in that Public User Submission in connection with the Services and/or otherwise in connection with ORCA’s business, provided that ORCA will try to notify you if it uses your Public User Submission for any reason other than displaying it on the Services.  Also, you grant all other users of the Services a license to access that Public User Submission, and to use and exercise all rights in it, as permitted by the functionality of the Services.</p>

<p>When you delete your ORCA account, we will stop displaying your User Submissions (other than Public User Submissions, which may remain fully available) to other users (if applicable), but you understand and agree that it may not be possible to completely delete that content from ORCA’s records, and that your User Submissions may remain viewable elsewhere to the extent that they were copied or stored by other users.</p>
<p>Finally, you understand and agree that ORCA, in performing the required technical steps to provide the Services to our users (including you), may need to make changes to your User Submissions to conform and adapt those User Submissions to the technical requirements of connection networks, devices, services, or media, and the foregoing licenses include the rights to do so.</p>
<h6>What if I see something on the Services that infringes my copyright?</h6>
<p>To review our complete Copyright Policy and learn how to report potentially infringing content, click here.  To learn more about the Digital Millennium Copyright Act, click here: <a href="http://www.copyright.gov/legislation/dmca.pdf" target="_blank">http://www.copyright.gov/legislation/dmca.pdf</a>.</p>
<h6>Who is responsible for what I see and do on the Services?</h6>
<p>Any information or content publicly posted or privately transmitted through the Services is the sole responsibility of the person from whom such content originated, and you access all such information and content at your own risk, and we aren’t liable for any errors or omissions in that information or content or for any damages or loss you might suffer in connection with it.   We cannot control and have no duty to take any action regarding how you may interpret and use the Content or what actions you may take as a result of having been exposed to the Content, and you hereby release us from all liability for you having acquired or not acquired Content through the Services.  We can’t guarantee the identity of any users with whom you interact in using the Services and are not responsible for which users gain access to the Services.</p>
<p>You are responsible for all Content you contribute, in any manner, to the Services, and you represent and warrant you have all rights necessary to do so, in the manner in which you contribute it.  You will keep all your registration information accurate and current.  You are responsible for all your activity in connection with the Services.
The Services may contain links or connections to third party websites or services that are not owned or controlled by ORCA. When you access third party websites or use third party services, you accept that there are risks in doing so, and that ORCA is not responsible for such risks.  We encourage you to be aware when you leave the Services and to read the terms and conditions and privacy policy of each third party website or service that you visit or utilize.</p>
<p>We have no control over, and assumes no responsibility for, the content, accuracy, privacy policies, or practices of or opinions expressed in any third party websites or by any third party that you interact with through the Services. In addition, we will not and cannot monitor, verify, censor or edit the content of any third party site or service. By using the Services, you release and hold us harmless from any and all liability arising from your use of any third party website or service. </p>
<p>Your interactions with organizations and/or individuals found on or through the Services, including payment and delivery of goods or services, and any other terms, conditions, warranties or representations associated with such dealings, are solely between you and such organizations and/or individuals. You should make whatever investigation you feel necessary or appropriate before proceeding with any online or offline transaction with any of these third parties. You agree that ORCA shall not be responsible or liable for any loss or damage of any sort incurred as the result of any such dealings. </p>
<p>If there is a dispute between participants on this site, or between users and any third party, you agree that ORCA is under no obligation to become involved. In the event that you have a dispute with one or more other users, you release ORCA, its officers, employees, agents, and successors from claims, demands, and damages of every kind or nature, known or unknown, suspected or unsuspected, disclosed or undisclosed, arising out of or in any way related to such disputes and/or our Services. If you are a California resident, you shall and hereby do waive California Civil Code Section 1542, which says: “A general release does not extend to claims which the creditor does not know or suspect to exist in his or her favor at the time of executing the release, which, if known by him or her must have materially affected his or her settlement with the debtor.” And, if you are not a California resident, you waive any applicable state statutes of a similar effect.</p>
<h6>Will ORCA ever change the Services?</h6>
<p>We’re always trying to improve the Services, so they may change over time.  We may suspend or discontinue any part of the Services, or we may introduce new features or impose limits on certain features or restrict access to parts or all of the Services.  We’ll try to give you notice when we make a material change to the Services that would adversely affect you, but this isn’t always practical. Similarly, we reserve the right to remove any Content from the Services at any time, for any reason (including, but not limited to, if someone alleges you contributed that Content in violation of these Terms), in our sole discretion, and without notice. </p>
<h6>Does ORCA cost anything?</h6>
<p>If you choose to enroll in any premium services that ORCA may offer (the “Premium Services”), you will be charged a subscription fee (the “Subscription Fee”) in advance, to the method of payment you provide upon enrollment in the Premium Services.   Subscription Fees are non-refundable. Your enrollment in the Premium Services will be automatically renewed on a monthly or annual basis, depending on whether you elect monthly or annual billing during enrollment. If you wish to cancel auto-renewal of the Premium Services for the following billing period, you must notify ORCA within thirty (30) days prior to the auto renewal date. ORCA may change the Subscription Fee upon notice to you, but such change will only take effect once your then-current Premium Services term has ended.  If you do not wish to pay the new Subscription Fee, your only remedy shall be to cancel your enrollment in the Premium Services for the following billing period, prior to the expiration of your then-current Premium Services term.  You may cancel your Premium Services subscription at any time, but again, no refunds will be granted for Subscription Fees paid.</p>
<p>If you are participating in the Tuition Program (the “Tuition Program”), then you are also subject to our Tuition Program Payment Terms set forth below and we (or a third-party service provider) may accept and process payments on your behalf, for which we may charge a fee.</p>
<p>Many of the ORCA Services are currently free.  In addition, we reserve the right to charge for certain or all Services in the future, including new Services that we add.  We will notify you before any Services you are then using begin carrying a fee, and if you wish to continue using such Services, you must pay all applicable fees for such Services.</p>
<h6>What if I want to stop using ORCA?</h6>
<p>You’re free to do that at any time, by contacting us at info@myorca.com; please refer to our Privacy Policy below, as well as the licenses above, to understand how we treat information you provide to us after you have stopped using our Services. If you have signed up for an annual contract with us, any fees already paid are non-refundable and, if you are on a monthly payment plan, you will continue to be responsible for making your monthly payments for the remainder of your then-current annual contract. </p>   
<p>ORCA is also free to terminate (or suspend access to) your use of the Services or your account, for any reason in our discretion, including your breach of these Terms. ORCA has the sole right to decide whether you are in violation of any of the restrictions set forth in these Terms.</p>
<p>Account termination may result in destruction of any Content associated with your account, so keep that in mind before you decide to terminate your account. We will try to provide advance notice to you prior to our terminating your account so that you are able to retrieve any important User Submissions you may have stored in your account (to the extent allowed by law and these Terms), but we may not do so if we determine it would be impractical, illegal, not in the interest of someone’s safety or security, or otherwise harmful to the rights or property of ORCA.
If you have deleted your account by mistake, contact us immediately at <a href="mailto:info@myorca.com" target="_blank">info@myorca.com</a> – we will try to help, but unfortunately, we can’t promise that we can recover or restore anything.</p>
<p>Provisions that, by their nature, should survive termination of these Terms shall survive termination.  By way of example, all of the following will survive termination: any obligation you have to pay us or indemnify us, any limitations on our liability, any terms regarding ownership or intellectual property rights, and terms regarding disputes between us.</p>
<p>Basically, there is no obligation to use our Service, and you can stop using your account, or delete it completely, at any time. We can do that for you, too.</p>

<h6>I use the ORCA App available via the Apple App Store – should I know anything about that?</h6>

These Terms apply to your use of all the Services, including the iPhone, iPod Touch, and iPad applications available via the Apple, Inc. (“Apple”) App Store (the “Application”), but the following additional terms also apply to the Application:
(a) Both you and ORCA acknowledge that the Terms are concluded between you and ORCA only, and not with Apple, and that Apple is not responsible for the Application or the Content;
(b) The Application is licensed to you on a limited, non-exclusive, non-transferrable, non-sublicensable basis, solely to be used in connection with the Services for your private, personal, non-commercial use, subject to all the terms and conditions of these Terms as they are applicable to the Services;
(c) You will only use the Application in connection with an Apple device that you own or control;
(d) You acknowledge and agree that Apple has no obligation whatsoever to furnish any maintenance and support services with respect to the Application;
(e) In the event of any failure of the Application to conform to any applicable warranty, including those implied by law, you may notify Apple of such failure; upon notification, Apple’s sole warranty obligation to you will be to refund to you the purchase price, if any, of the Application;
(f) You acknowledge and agree that ORCA, and not Apple, is responsible for addressing any claims you or any third party may have in relation to the Application;
(g) You acknowledge and agree that, in the event of any third party claim that the Application or your possession and use of the Application infringes that third party’s intellectual property rights, ORCA, and not Apple, will be responsible for the investigation, defense, settlement and discharge of any such infringement claim;
(h) You represent and warrant that you are not located in a country subject to a U.S. Government embargo, or that has been designated by the U.S. Government as a “terrorist supporting” country, and that you are not listed on any U.S. Government list of prohibited or restricted parties;
(i) Both you and ORCA acknowledge and agree that, in your use of the Application, you will comply with any applicable third party terms of agreement which may affect or be affected by such use; and
(j) Both you and ORCA acknowledge and agree that Apple and Apple’s subsidiaries are third party beneficiaries of these Terms, and that upon your acceptance of these Terms, Apple will have the right (and will be deemed to have accepted the right) to enforce these Terms against you as the third party beneficiary hereof.
What else do I need to know?</p>
<p>Warranty Disclaimer.  Neither ORCA nor its licensors or suppliers makes any representations or warranties concerning any content contained in or accessed through the Services, and we will not be responsible or liable for the accuracy, copyright compliance, legality, or decency of material contained in or accessed through the Services.  We (and our licensors and suppliers) make no representations or warranties regarding suggestions or recommendations of services or products offered or purchased through the Services. THE SERVICES AND CONTENT ARE PROVIDED BY ORCA (AND ITS LICENSORS AND SUPPLIERS) ON AN “AS-IS” BASIS, WITHOUT WARRANTY OR ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING, WITHOUT LIMITATION, IMPLIED WARRANTIES OF QUALITY, ACCURACY, PERFORMANCE, AVAILABILITY, MERCHANTABILITY, QUIET ENJOYMENT, FITNESS FOR A PARTICULAR PURPOSE, TITLE OR NON-INFRINGEMENT.  WITHOUT LIMITING THE GENERALITY OF THE FOREGOING, ORCA MAKES NO REPRESENTATION OR WARRANTY THAT THE SERVICES WILL MEET YOUR REQUIREMENTS, BE ERROR FREE OR UNINTERRUPTED, THAT ALL ERRORS WILL BE CORRECTED OR THAT THE SERVICES ARE FREE FROM VIRUSES OR OTHER HARMFUL COMPONENTS. SOME FEATURES ARE EXPERIMENTAL AND HAVE NOT BEEN TESTED IN ANY MANNER.
</p>

<p>Limitation of Liability.  TO THE FULLEST EXTENT ALLOWED BY APPLICABLE LAW, UNDER NO CIRCUMSTANCES AND UNDER NO LEGAL THEORY (INCLUDING, WITHOUT LIMITATION, TORT, CONTRACT, STRICT LIABILITY, OR OTHERWISE) SHALL ORCA (OR ITS SUCCESSORS, AFFILIATES, CONTRACTORS, EMPLOYEES, LICENSORS, PARTNERS, SUPPLIERS OR AGENTS) BE LIABLE TO YOU OR TO ANY OTHER PERSON FOR <br>
    <ol class="alpha-capital">
        <li>ANY INDIRECT, SPECIAL, INCIDENTAL, OR CONSEQUENTIAL DAMAGES OF ANY KIND, INCLUDING, BUT NOT LIMITED TO, DAMAGES FOR LOST PROFITS, COST OF COVER, LOSS OF GOODWILL, WORK STOPPAGE, ACCURACY OF RESULTS, COMPUTER FAILURE OR MALFUNCTION, LOSS OF USE OR DATA, OR OTHER INTANGIBLE LOSSES (EVEN IF ORCA HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES OR </li>
        <li>ANY AMOUNT, IN THE AGGREGATE, IN EXCESS OF THE GREATER OF (I) $100 OR (II) THE AMOUNTS PAID BY YOU TO ORCA IN CONNECTION WITH THE SERVICES IN THE TWELVE (12) -MONTH PERIOD PRECEDING THIS APPLICABLE CLAIM, OR (III) ANY MATTER BEYOND OUR REASONABLE CONTROL, 
ARISING FROM OR RELATING TO </li>
    </ol>
 

(i) THIS AGREEMENT; 
(ii)    YOUR USE OR THE INABILITY TO USE THE SERVICES, CONTENT, OR USER SUBMISSIONS; OR 
(iii)   ANY INTERACTION WITH ANY THIRD PARTY THROUGH OR IN CONNECTION WITH THE SERVICE, INCLUDING OTHER USERS.
</p>
<p>
CERTAIN JURISDICTIONS DO NOT ALLOW LIMITATIONS ON IMPLIED WARRANTIES OR THE EXCLUSION OR LIMITATION OF CERTAIN DAMAGES. IF YOU RESIDE IN SUCH A JURISDICTION, SOME OR ALL OF THE ABOVE DISCLAIMERS, EXCLUSIONS, OR LIMITATIONS MAY NOT APPLY TO YOU, AND YOU MAY HAVE ADDITIONAL RIGHTS.</p> 
<p>Indemnity. You agree to indemnify and hold ORCA, its affiliates, officers, agents, employees, and partners harmless from and against any and all claims, liabilities, damages (actual and consequential), losses and expenses (including attorneys’ fees) arising from or in any way related to any third party claims relating to or arising out of (a) your access to, use, or misuse of the Service, (b) your violation of this Agreement (including any failure to obtain or provide any necessary consent and/or violation of applicable laws or regulations), or (c) the infringement by you or any third party using your account of any intellectual property or other right of any person or entity, including in connection with your User Submissions.  In the event of such a claim, suit, or action (“Claim”), we will attempt to provide notice of the Claim to the contact information we have for your account (provided that failure to deliver such notice shall not eliminate or reduce your indemnification obligations hereunder).</p> 
<p>Basically,<br>
If someone brings a claim against us related to your content or use of the Service, you promise to pay for the cost of legal expenses and any loss or damages we incur.</p>
<p>
Assignment.  You may not assign, delegate or transfer these Terms or your rights or obligations hereunder, or your Services account, in any way (by operation of law or otherwise) without ORCA’s prior written consent.  We may transfer, assign, or delegate these Terms and our rights and obligations without consent.
Choice of Law; Arbitration.  These Terms are governed by and will be construed under the laws of Republic of Singapore (“Singapore”), without regard to the conflicts of laws provisions thereof.  Any dispute arising from or relating to the subject matter of these Terms shall be finally settled in Singapore, in English, in accordance with the UNCITRAL Model Law on International Commercial Arbitration 1985 (UNCITRAL Model Arbitration Law), by one commercial arbitrator with substantial experience in resolving intellectual property and commercial contract disputes, who shall be selected from the appropriate list of Singapore International Arbitration Centre (SIAC) arbitrators in accordance with such Rules. Judgment upon the award rendered by such arbitrator may be entered in any court of competent jurisdiction. Notwithstanding the foregoing obligation to arbitrate disputes, each party shall have the right to pursue injunctive or other equitable relief at any time, from any court of competent jurisdiction. For all purposes of this Agreement, the parties consent to exclusive jurisdiction and venue in Singapore. Any arbitration under these Terms will take place on an individual basis: class or representative arbitrations and class or representative actions are not permitted.  YOU UNDERSTAND AND AGREE THAT BY ENTERING INTO THESE TERMS, YOU AND ORCA ARE EACH WAIVING THE RIGHT TO TRIAL BY JURY OR TO PARTICIPATE IN A CLASS OR REPRESENTATIVE ACTION.</p> 
<p>Miscellaneous.  You will be responsible for paying, withholding, filing, and reporting all taxes, duties, and other governmental assessments associated with your activity in connection with the Services, provided that ORCA may, in its sole discretion, do any of the foregoing on your behalf or for itself as it sees fit.  The failure of either you or us to exercise, in any way, any right herein shall not be deemed a waiver of any further rights hereunder.  If any provision of these Terms is found to be unenforceable or invalid, that provision will be limited or eliminated, to the minimum extent necessary, so that these Terms shall otherwise remain in full force and effect and enforceable.  You and ORCA agree that these Terms are the complete and exclusive statement of the mutual understanding between you and ORCA, and that it supersedes and cancels all previous written and oral agreements, communications and other understandings relating to the subject matter of these Terms.  You hereby acknowledge and agree that you are not an employee, agent, partner, or joint venture of ORCA, and you do not have any authority of any kind to bind ORCA in any respect whatsoever. Except as expressly set forth in the section above regarding the Apple Application, you and ORCA agree there are no third-party beneficiaries intended under these Terms.</p> 
<p>Remember that your use of our Services is at all times subject to these Terms, which incorporates the following Privacy Policy.</p> 


                 
                </div>
                <div class="row checkbox-wrapper">
                    <div class="col-md-12">
                        <div class="pretty p-default p-icon p-pulse">
                            <input type="checkbox" id="accept-check-1">
                            <div class="state"><i class="icon icon-check"></i>
                                <label class="checkbox-label" for="accept-check"><i>I’ve read and understand the
                                agreement.</i></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="pretty p-default p-icon p-pulse">
                            <input type="checkbox" id="accept-check-2">
                            <div class="state"><i class="icon icon-check"></i>
                                <label class="checkbox-label" for="accept-check"><i>I’ve read and understand <a href="{{ asset('frontend/docx/Orca-technologies-PDPA.docx') }}" target="_blank" class="red"><u>Personal Data Protection Act</u></a>.</i></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-submit text-center">
                    <button id="btnAccept" type="submit" class="btn btn-red btn-full disabled"
                      disabled="true">I Accept</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Verification -->
<div class="modal fade" id="complete" tabindex="-1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Thanks for registering!</h2>
            </div>
            <div class="modal-body text-center nicescroll">
                <div class="text-wrapper">
                    <p>Our team will review your profile and will get back to you as soon as possible.</p>
                </div>
                <img src="{{ asset('frontend/images/open-email.png') }}" alt="icon" />
                <div class="text-wrapper">
                    <p>Please kindly check your email address for further notice.</p>
                </div>
            </div>
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-red btn-full hash-null" data-dismiss="modal">I Understand</button>
            </div>
        </div>
    </div>
</div>

