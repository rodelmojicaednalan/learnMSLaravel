{{-- Extends layout --}}
@extends('frontend.layout.app')

{{-- Additional Styles --}}
@section('styles')

@endsection

{{-- Content --}}
@section('content')

<!-- Start Profile Layout -->
<section>
    <div class="container">
        <div class="row align-items-start flex-row-reverse">

            <div class="col-md-8">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h1>{{ auth()->user()->first_name ? Str::ucfirst(auth()->user()->first_name) : "Username" }}</h1>
                    </div>
                    <div class="col-4 text-right">
                        <button class="btn btn-red edit-profile" data-toggle="modal" data-target="#edit-profile-overlay"
                            data-dismiss="modal">Edit Profile</button>
                    </div>
                    <h5 class="red col-md-12">Teacher</h5>
                </div>

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="profile-tab" data-toggle="tab" href="#nav-profile"
                            role="tab" aria-controls="nav-profile" aria-selected="true">Profile</a>
                        <a class="nav-item nav-link" id="nav-classes-tab" data-toggle="tab" href="#nav-classes"
                            role="tab" aria-controls="nav-classes" aria-selected="false">Classes</a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                        aria-labelledby="nav-profile-tab">
                        <div class="user-info">
                            <div class="row">
                                <div class="col-md-5">
                                    Email Address:
                                </div>
                                <div class="col-md-7">
                                    <a href="mailto:{{ auth()->user()->email ? auth()->user()->email : "useremail@email.com" }}">{{ auth()->user()->email ? auth()->user()->email : "useremail@email.com" }}</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Gender:
                                </div>
                                <div class="col-md-7">
                                    {{ auth()->user()->gender ? Str::ucfirst(auth()->user()->gender) : "N/A" }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Contact Number:
                                </div>
                                <div class="col-md-7">
                                    @if (auth()->user()->contact_number)
                                        <a href="tel:{{ auth()->user()->contact_number }}">{{ auth()->user()->contact_number }}</a>
                                    @else
                                        N/A
                                    @endif

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Highest Education Qualification:
                                </div>
                                <div class="col-md-7">
                                    @if (auth()->user()->teacherDetails()->count())
                                        {{ auth()->user()->teacherDetails->highest_education_qualification ? auth()->user()->teacherDetails->highest_education_qualification : "N/A" }}
                                    @else
                                        N/A
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Name of Institution:
                                </div>
                                <div class="col-md-5">
                                    @if (auth()->user()->teacherDetails()->count())
                                        {{ auth()->user()->teacherDetails->name_of_institution ? auth()->user()->teacherDetails->name_of_institution : "N/A" }}
                                    @else
                                       N/A
                                    @endif
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-5">
                                    MOE Registration Number:
                                </div>
                                <div class="col-md-5">
                                    @if (auth()->user()->teacherDetails()->count())
                                        @if (auth()->user()->teacherDetails->moe_registration_number_verified)
                                            {{ auth()->user()->teacherDetails->masked_moe_registration_number }}
                                        @else
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#verify-moe-overlay"
                                            data-dismiss="modal">Not verified yet</a>
                                        @endif
                                    @else
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#verify-moe-overlay"
                                            data-dismiss="modal">Not verified yet</a>
                                    @endif

                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col-md-5">
                                    Country of Residence:
                                </div>
                                <div class="col-md-7">
                                    @if (auth()->user()->teacherDetails()->count())
                                        {{ auth()->user()->teacherDetails->country_of_incorporation ? auth()->user()->teacherDetails->country_of_incorporation : "N/A" }}
                                    @else
                                        N/A
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Spoken Language:
                                </div>
                                <div class="col-md-7">
                                    @if (auth()->user()->teacherDetails()->count())
                                        {{ auth()->user()->teacherDetails->spoken_language ? auth()->user()->teacherDetails->spoken_language : "N/A" }}
                                    @else
                                        N/A
                                    @endif

                                </div>
                            </div>
                            <div class="social text-wrapper">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h5>Social</h5>
                                    </div>
                                    <div class="col-4 text-right">
                                        <button class="btn btn-red edit-profile" data-toggle="modal" data-target="#edit-social-overlay"
                                        data-dismiss="modal">Edit Social</button>
                                    </div>
                                </div>
                                <hr>

                                    @if (auth()->user()->social_link()->count())
                                        @foreach (auth()->user()->social_link as $social)
                                        <div class="row">
                                            <div class="col-md-5">
                                                {{ $social->social_media_name }}:
                                            </div>
                                            <div class="col-md-7">
                                                <a href="{{ $social->social_media_link }}" target="_blank">{{ $social->social_media_link }}</a>
                                            </div>
                                        </div>
                                        @endforeach
                                    @else
                                        N/A
                                    @endif
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-classes" role="tabpanel" aria-labelledby="nav-classes-tab">
                        <div class="row">
                            <div class="col-md-12 product-wrapper">
                                <div class="row">
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                        <div class="product-item">
                                            <div class="image">
                                                <img src="{{ asset('frontend/images/product-1.png') }}"
                                                    alt="product name" class="rounded">
                                            </div>

                                            <div class="creater">
                                                <img src="{{ asset('frontend/images/creater-image.png') }}"
                                                    class="rounded-circle">
                                                <h6 class="creater-name">Creator Name</h6>
                                            </div>
                                            <h5> Art &amp; Craft - Drawing Shapes</h5>
                                            <p class="desc">Space for a small product description </p>
                                            <div class="row align-items-center">
                                                <div class="price col-6">
                                                    1.48 SGD
                                                </div>
                                                <div class="col-6 text-right">
                                                    <a href="school-live-class-detail.php"><button
                                                            class="btn btn-secondary">
                                                            Buy Now
                                                        </button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                        <div class="product-item">
                                            <div class="image">
                                                <img src="{{ asset('frontend/images/product-2.png') }}"
                                                    alt="product name" class="rounded">
                                            </div>

                                            <div class="creater">
                                                <img src="{{ asset('frontend/images/creater-image.png') }}"
                                                    class="rounded-circle">
                                                <h6 class="creater-name">Creator Name</h6>
                                            </div>
                                            <h5> Art &amp; Craft - Drawing Shapes</h5>
                                            <p class="desc">Space for a small product description </p>
                                            <div class="row align-items-center">
                                                <div class="price col-6">
                                                    1.48 SGD
                                                </div>
                                                <div class="col-6 text-right">
                                                    <a href="school-pre-recorded-detail.php">
                                                        <button class="btn btn-secondary">
                                                            Buy Now
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                        <div class="product-item">
                                            <div class="image">
                                                <img src="{{ asset('frontend/images/product-1.png') }}"
                                                    alt="product name" class="rounded">
                                            </div>

                                            <div class="creater">
                                                <img src="{{ asset('frontend/images/creater-image.png') }}"
                                                    class="rounded-circle">
                                                <h6 class="creater-name">Creator Name</h6>
                                            </div>
                                            <h5> Art &amp; Craft - Drawing Shapes</h5>
                                            <p class="desc">Space for a small product description </p>
                                            <div class="row align-items-center">
                                                <div class="price col-6">
                                                    1.48 SGD
                                                </div>
                                                <div class="col-6 text-right">
                                                    <a href="school-pre-recorded-detail.php">
                                                        <button class="btn btn-secondary">
                                                            Buy Now
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                        <div class="product-item">
                                            <div class="image">
                                                <img src="{{ asset('frontend/images/product-1.png') }}"
                                                    alt="product name" class="rounded">
                                            </div>

                                            <div class="creater">
                                                <img src="{{ asset('frontend/images/creater-image.png') }}"
                                                    class="rounded-circle">
                                                <h6 class="creater-name">Creator Name</h6>
                                            </div>
                                            <h5> Art &amp; Craft - Drawing Shapes</h5>
                                            <p class="desc">Space for a small product description </p>
                                            <div class="row align-items-center">
                                                <div class="price col-6">
                                                    1.48 SGD
                                                </div>
                                                <div class="col-6 text-right">
                                                    <a href="school-live-class-detail.php"><button
                                                            class="btn btn-secondary">
                                                            Buy Now
                                                        </button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                        <div class="product-item">
                                            <div class="image">
                                                <img src="{{ asset('frontend/images/product-2.png') }}"
                                                    alt="product name" class="rounded">
                                            </div>

                                            <div class="creater">
                                                <img src="{{ asset('frontend/images/creater-image.png') }}"
                                                    class="rounded-circle">
                                                <h6 class="creater-name">Creator Name</h6>
                                            </div>
                                            <h5> Art &amp; Craft - Drawing Shapes</h5>
                                            <p class="desc">Space for a small product description </p>
                                            <div class="row align-items-center">
                                                <div class="price col-6">
                                                    1.48 SGD
                                                </div>
                                                <div class="col-6 text-right">
                                                    <button class="btn btn-secondary">
                                                        Buy Now
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                        <div class="product-item">
                                            <div class="image">
                                                <img src="{{ asset('frontend/images/product-1.png') }}"
                                                    alt="product name" class="rounded">
                                            </div>

                                            <div class="creater">
                                                <img src="{{ asset('frontend/images/creater-image.png') }}"
                                                    class="rounded-circle">
                                                <h6 class="creater-name">Creator Name</h6>
                                            </div>
                                            <h5> Art &amp; Craft - Drawing Shapes</h5>
                                            <p class="desc">Space for a small product description </p>
                                            <div class="row align-items-center">
                                                <div class="price col-6">
                                                    1.48 SGD
                                                </div>
                                                <div class="col-6 text-right">
                                                    <button class="btn btn-secondary">
                                                        Buy Now
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                        <div class="product-item">
                                            <div class="image">
                                                <img src="{{ asset('frontend/images/product-1.png') }}"
                                                    alt="product name" class="rounded">
                                            </div>

                                            <div class="creater">
                                                <img src="{{ asset('frontend/images/creater-image.png') }}"
                                                    class="rounded-circle">
                                                <h6 class="creater-name">Creator Name</h6>
                                            </div>
                                            <h5> Art &amp; Craft - Drawing Shapes</h5>
                                            <p class="desc">Space for a small product description </p>
                                            <div class="row align-items-center">
                                                <div class="price col-6">
                                                    1.48 SGD
                                                </div>
                                                <div class="col-6 text-right">
                                                    <a href="school-live-class-detail.php"><button
                                                            class="btn btn-secondary">
                                                            Buy Now
                                                        </button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                        <div class="product-item">
                                            <div class="image">
                                                <img src="{{ asset('frontend/images/product-2.png') }}"
                                                    alt="product name" class="rounded">
                                            </div>

                                            <div class="creater">
                                                <img src="{{ asset('frontend/images/creater-image.png') }}"
                                                    class="rounded-circle">
                                                <h6 class="creater-name">Creator Name</h6>
                                            </div>
                                            <h5> Art &amp; Craft - Drawing Shapes</h5>
                                            <p class="desc">Space for a small product description </p>
                                            <div class="row align-items-center">
                                                <div class="price col-6">
                                                    1.48 SGD
                                                </div>
                                                <div class="col-6 text-right">
                                                    <button class="btn btn-secondary">
                                                        Buy Now
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="row pagination-wrapper">
                                    <div class="col-md-4 first">
                                        <label>Page:</label>
                                        <nav aria-label="Page navigation" class="pagination-nav">
                                            <ul class="pagination">
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="col-md-4 second">
                                        <ul class="pagination controls">
                                            <li class="page-item disabled ">
                                                <a class="page-link btn btn-red" href="#" tabindex="-1">Previous</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link btn btn-red" href="#">Next</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4 total-product third">
                                        <div class="tag">
                                            336
                                        </div>
                                        <span>Products</span>
                                    </div>




                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 pr-md-35">
                <div class="form-group upload-wrapper">
                    <div class="image-area">
                        @if (auth()->user()->teacherDetails()->count())
                            <img id="imageResult" src="{{ auth()->user()->teacherDetails->profile_picture ? \Storage::url('public/uploads/teacher/profile/image/' . auth()->user()->teacherDetails->profile_picture) :  asset('frontend/images/placeholder-user.png') }}"
                            alt="" class="img-fluid mCS_img_loaded" width="380">
                        @else
                            <img id="imageResult2" src="{{ asset('frontend/images/placeholder-user.png') }}"
                            alt="" class="img-fluid mCS_img_loaded" width="380">
                        @endif

                    </div>
                    <div class="">
                        <form method="post" id="upload-image-form" data-action="{{ url('/teacher/profile/ajax/upload_profile_image') }}" enctype="multipart/form-data">
                            @csrf
                            <input id="upload" name="file" type="file" class="form-control border-0">
                            <div class="input-group-append">
                                <label for="upload" class="btn btn-red">Upload <i class="fa fa-upload"></i></label>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-wrapper">
                    <h4>About</h4>
                    <hr>
                    <p>
                        @if (auth()->user()->teacherDetails()->count())
                            {{ auth()->user()->teacherDetails->description ? auth()->user()->teacherDetails->description : "N/A" }}
                        @else
                            N/A
                        @endif

                    </p>
                </div>
                <div class="tag-wrapper">
                    <h4>Related Skills</h4>
                    <hr>
                    <ul class="list-unstyled ">
                        @if (auth()->user()->teacherDetails()->count())
                            @foreach (auth()->user()->teacherDetails->formatted_related_skills as $skill)
                                <li><a href="#" class="tag border-gray">{{ $skill }}</a></li>
                            @endforeach

                        @else
                            N/A
                        @endif

                        {{-- <li><a href="#" class="tag border-gray">Life Style</a></li>
                        <li><a href="#" class="tag border-gray">Teaching</a></li>
                        <li><a href="#" class="tag border-gray">Artbug</a></li> --}}
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- End Profile Layout -->

<!-- Modal Verify MOE -->
<div class="modal fade" id="verify-moe-overlay" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Verify MOE</h2>
            </div>
            <div class="modal-body nicescroll">
                <form>
                    <div class="form-group">
                        <label for="moe-number">MOE Registration Number</label>
                        <div class="input-group">
                            <input type="number" class="form-control" placeholder="Enter registration number">
                        </div>

                    </div>

                    <div class="text-wrapper">
                        <p>Our team will check the MOE Registration Number that you are submitted.</p>
                    </div>
                    <div class="form-submit text-center">
                        <button type="submit" class="btn btn-red btn-full">Submit</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>

<!-- Modal Edit Teacher Profile -->
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="edit-profile-overlay" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
        <div class="modal-content">

            <div class="modal-header">
                <div class="d-flex align-items-center">
                    <a href="javascript:void(0);" class="back update-profile-form-back-btn" data-toggle="modal" data-target="#"
                        data-dismiss="modal"><img src="{{ asset('frontend/images/icon-back.png') }}" alt="icon" /></a>
                    <h2 class="modal-title">Edit Profile</h2>
                </div>
                <div class="alert alert-success success_message_container" role="alert" style="display:none">
                    <span class="success_message"></span>
                </div>

            </div>
            <div class="modal-body nicescroll">
                <form id="update-profile-form" data-action="{{ url('/teacher/profile/ajax/update_profile') }}">
                    @method('POST')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control with-validation" id="first_name" name="first_name"
                                    placeholder="Type your first name" value="{{ auth()->user()->first_name }}">
                                <small id="first_name_error" class="text-danger error" style="display:none;"></small>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control with-validation" id="last_name" name="last_name"
                                    placeholder="Type your last name" value="{{ auth()->user()->last_name }}">
                                <small id="last_name_error" class="text-danger error" style="display:none;"></small>
                            </div>
                            <div class="form-group">
                                <label for="gender1">Gender</label>
                                <select id="gender1" class="selectmenu" name="gender">
                                    <option>Select your gender</option>
                                    <option value="Male" {{ auth()->user()->gender === 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ auth()->user()->gender === 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="contact-number2">Contact Number <i>(Optional)</i></label>
                                <input type="phone-number" class="form-control" id="contact_number2" name="contact_number"
                                    placeholder="Type your phone number" value="{{ auth()->user()->contact_number }}">
                            </div>

                            <div class="form-group">
                                <label for="country-of-incorporation2">Country of Residence</label>
                                <select class="selectmenu" id="country-of-incorporation2" name="country_of_incorporation">
                                    <option value="{{ auth()->user()->teacherDetails->country_of_incorporation }}">{{ auth()->user()->teacherDetails->country_of_incorporation }}</option>
                                    @foreach($countries ?? '' as $country)
                                    <option value="{{ $country->name }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="highest-education-qualification">Highest Education Qualification</label>
                                <select id="highest-education-qualification" class="selectmenu" name="highest_education_qualification">
                                    <option>Select education</option>
                                    <option value="Bachelor Degree of Science" {{ auth()->user()->teacherDetails()->count() && auth()->user()->teacherDetails->highest_education_qualification === 'Bachelor Degree of Science' ? 'selected' : '' }}>Bachelor Degree of Science</option>
                                    <option value="Education 2" {{ auth()->user()->teacherDetails()->count() && auth()->user()->teacherDetails->highest_education_qualification === 'Education 2' ? 'selected' : '' }}>Education 2</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="about">About</label>
                                <textarea class="form-control" id="about-teacher" rows="5"
                                    placeholder="Type your about" name="description">{{ auth()->user()->teacherDetails()->count() ? auth()->user()->teacherDetails->description : '' }}</textarea>

                            </div>
                            <div class="form-group">
                                <label for="name-of-institution">Name of Institution</label>
                                <input type="text" class="form-control" id="name_of_institution"
                                    placeholder="Type your name of institution" value="{{ auth()->user()->teacherDetails()->count() ? auth()->user()->teacherDetails->name_of_institution : '' }}" name="name_of_institution">
                            </div>
                            <div class="form-group append-languages" id="append-language-1">
                                <label for="spoken-languages-1">Spoken Language/s</label>
                                <input type="text" placeholder="Select Language /s" data-toggle="collapse"
                                    data-target="#lang-content-1" name="spoken_language" aria-controls="navbars" aria-expanded="true"
                                    aria-label="Toggle navigation" class="navbar-toggler lang-multiselect" value="{{ auth()->user()->teacherDetails()->count() ? auth()->user()->teacherDetails->spoken_language : '' }}"
                                    readonly="">
                                <div id="lang-content-1" class="navbar-collapse collapse lang-content">
                                    <div class="nicescroll">
                                        <ul>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-en-1" value="English" {{ auth()->user()->teacherDetails()->count() && in_array('English', explode(', ', auth()->user()->teacherDetails->spoken_language)) ? 'checked' : '' }}>
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-en-1"
                                                            name="language">English</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-en-1" value="Dutch" {{ auth()->user()->teacherDetails()->count() && in_array('Dutch', explode(', ', auth()->user()->teacherDetails->spoken_language)) ? 'checked' : '' }}>
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-en-1"
                                                            name="language">Dutch</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-sp-1" value="Spanish" {{ auth()->user()->teacherDetails()->count() && in_array('Spanish', explode(', ', auth()->user()->teacherDetails->spoken_language)) ? 'checked' : '' }}>
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-sp-1"
                                                            name="language">Spanish</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-cn-1" value="Mandarin Chinese" {{ auth()->user()->teacherDetails()->count() && in_array('Mandarin Chinese', explode(', ', auth()->user()->teacherDetails->spoken_language)) ? 'checked' : '' }}>
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-cn-1"
                                                            name="language">Mandarin Chinese</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-ru-1" value="Russian" {{ auth()->user()->teacherDetails()->count() && in_array('Russian', explode(', ', auth()->user()->teacherDetails->spoken_language)) ? 'checked' : '' }}>
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-ru-1"
                                                            name="language">Russian</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-fr-1" value="French" {{ auth()->user()->teacherDetails()->count() && in_array('French', explode(', ', auth()->user()->teacherDetails->spoken_language)) ? 'checked' : '' }}>
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
                                <label for="related-skills">Related Skills</label>
                                <select data-placeholder="Search" name="related_skills[]" multiple id="related_skills"
                                    class="chosen-select" data-action="{{ url('/teacher/profile/ajax/get_selected_skills') }}">
                                    <option value=""></option>
                                    <option value="Entrepreneurship">Entrepreneurship</option>
                                    <option value="Life Style">Life Style</option>
                                    <option value="Artbug">Artbug</option>
                                    <option value="Teaching">Teaching</option>
                                </select>

                            </div>



                        </div>
                    </div>

                    <div class="form-submit text-center row align-items-center">
                        <div class="col text-left delete-profile-wrapper">
                            <a href="#" class="delete-profile text-navy-gray">Delete Profile</a>
                        </div>
                        <div class="col-auto">
                            {{-- <button type="submit" class="btn btn-red btn-full" data-dismiss="modal">Save</button> --}}
                            <button type="submit" class="btn btn-red btn-full">Save</button>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Social -->
@include('frontend.includes._social-media-modal')

@endsection

{{-- Additional scripts --}}
@section('scripts')
<script type="text/javascript" src="{{ asset('frontend/js/vendor/chosen.jquery.min.js') }}"></script>
@endsection
