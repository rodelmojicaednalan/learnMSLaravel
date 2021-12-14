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
                    <h5 class="red col-md-12">Parent</h5>
                </div>

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="profile-tab" data-toggle="tab" href="#nav-profile"
                            role="tab" aria-controls="nav-profile" aria-selected="true">Profile</a>
                        <a class="nav-item nav-link" id="nav-children-tab" data-toggle="tab" href="#nav-children"
                            role="tab" aria-controls="nav-children" aria-selected="false">Children</a>
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
                                    Gender:
                                </div>
                                <div class="col-md-7">
                                    {{ auth()->user()->gender ? Str::ucfirst(auth()->user()->gender) : "N/A" }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    Country of Residence:
                                </div>
                                <div class="col-md-7">
                                    @if (auth()->user()->parentDetails()->count())
                                        {{ auth()->user()->parentDetails->country_of_incorporation ? auth()->user()->parentDetails->country_of_incorporation : "N/A" }}
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
                                    @if (auth()->user()->parentDetails()->count())
                                        {{ auth()->user()->parentDetails->spoken_language ? auth()->user()->parentDetails->spoken_language : "N/A" }}
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
                                        @if ($social->social_media_link)
                                            <div class="row">
                                                <div class="col-md-5">
                                                    {{ $social->social_media_name }}:
                                                </div>
                                                <div class="col-md-7">
                                                    <a href="{{ $social->social_media_link }}" target="_blank">{{ $social->social_media_link }}</a>
                                                </div>
                                            </div>
                                        @endif

                                    @endforeach
                                @else
                                    N/A
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-children" role="tabpanel" aria-labelledby="nav-children-tab">
                        <div class="user-info">
                            <button class="btn btn-red add-child" data-toggle="modal" data-target="#add-child-overlay"
                                data-dismiss="modal">+ Add Child</button>
                            <!-- Start -->
                            @if (auth()->user()->children()->count())
                                @foreach (auth()->user()->children as $key => $child)
                                    <div class="child-wrapper {{ $key === 0 ? 'first' : '' }}">
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <h3>{{ $child->full_name }}</h3>
                                            </div>
                                            <div class="col-4 text-right">
                                                <button class="btn btn-red edit-child" data-toggle="modal"
                                                    data-target="#edit-child-overlay" data-action="{{ url('parent/profile/ajax/get_child_details') }}" data-child-id={{ $child->id }} data-dismiss="modal">Edit Child</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                Name:
                                            </div>
                                            <div class="col-md-7">
                                                {{ ($child->full_name) ? $child->full_name : 'N/A' }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                Gender:
                                            </div>
                                            <div class="col-md-7">
                                                {{ ($child->gender) ? $child->gender : 'N/A' }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                Birthday:
                                            </div>
                                            <div class="col-md-7">
                                                {{ ($child->birthdate) ? $child->birthdate : 'N/A' }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                Grade:
                                            </div>
                                            <div class="col-md-7">
                                                {{ ($child->grade) ? $child->grade : 'N/A' }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                School:
                                            </div>
                                            <div class="col-md-7">
                                                {{ ($child->school) ? $child->school : 'N/A' }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                Country of residency:
                                            </div>
                                            <div class="col-md-7">
                                                {{ ($child->country_of_residency) ? $child->country_of_residency : 'N/A' }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                Spoken language:
                                            </div>
                                            <div class="col-md-7">
                                                {{ ($child->spoken_language) ? $child->spoken_language : 'N/A' }}
                                            </div>
                                        </div>
                                        <!-- <hr> -->
                                    </div>
                                @endforeach
                            @endif
                            <!-- End child -->

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pr-md-35">
                <div class="form-group upload-wrapper">
                    <div class="image-area">
                        @if (auth()->user()->parentDetails()->count())
                            <img id="imageResult2" src="{{ auth()->user()->parentDetails->profile_picture ? \Storage::url('public/uploads/parent/profile/image/' . auth()->user()->parentDetails->profile_picture) :  asset('frontend/images/placeholder-user.png') }}"
                            alt="" class="img-fluid mCS_img_loaded" width="380">
                        @else
                            <img id="imageResult" src="{{ asset('frontend/images/placeholder-user.png') }}"
                            alt="" class="img-fluid mCS_img_loaded" width="380">
                        @endif

                    </div>
                    <div class="">
                        <form method="post" id="upload-image-form" data-action="{{ url('/parent/profile/ajax/upload_profile_image') }}" enctype="multipart/form-data">
                            @csrf
                            <input id="upload" type="file" class="form-control border-0">
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
                        @if (auth()->user()->parentDetails()->count())
                            {{ auth()->user()->parentDetails->description ? auth()->user()->parentDetails->description : "N/A" }}
                        @else
                            N/A
                        @endif
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- End Profile Layout -->

</div>

<!-- Modal Edit Parent Profile -->
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
                <form id="update-profile-form" data-action="{{ url('/parent/profile/ajax/update_profile') }}">
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
                                <label for="gender">Gender</label>
                                <select id="gender" class="selectmenu with-validation" name="gender">
                                    <option value="">Select your gender</option>
                                    <option value="Male" {{ auth()->user()->gender === 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ auth()->user()->gender === 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                                <small id="gender_error" class="text-danger error" style="display:none;"></small>
                            </div>
                            <div class="form-group">
                                <label for="relationship">Relationship</label>
                                <select class="selectmenu with-validation" id="relationship" name="relationship">
                                    <option value="">select</option>
                                    <option value="Mother" {{ auth()->user()->parentDetails()->count() && auth()->user()->parentDetails->relationship === 'Mother' ? 'selected' : '' }}>Mother</option>
                                    <option value="Father" {{ auth()->user()->parentDetails()->count() && auth()->user()->parentDetails->relationship === 'Father' ? 'selected' : '' }}>Father</option>
                                    <option value="Guardian" {{ auth()->user()->parentDetails()->count() && auth()->user()->parentDetails->relationship === 'Guardian' ? 'selected' : '' }}>Guardian</option>
                                </select>
                                <small id="relationship_error" class="text-danger error" style="display:none;"></small>
                            </div>
                            <div class="form-group">
                                <label for="contact-number2">Contact Number <i>(Optional)</i></label>
                                <input type="phone-number" class="form-control" id="contact-number2" name="contact_number"
                                    placeholder="Type your phone number" value="{{ auth()->user()->contact_number }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">About</label>
                                <textarea class="form-control with-validations" id="description" rows="5"
                                    placeholder="Type your about" name="description">{{ auth()->user()->parentDetails()->count() ? auth()->user()->parentDetails->description : '' }}</textarea>
                                <small id="description_error" class="text-danger error" style="display:none;"></small>
                            </div>
                            <div class="form-group append-languages" id="append-language-1">
                                <label for="spoken_language">Spoken Language/s</label>
                                <input id="spoken_language" type="text" placeholder="Select Language /s" data-toggle="collapse"
                                    data-target="#lang-content-1" aria-controls="navbars" aria-expanded="true"
                                    aria-label="Toggle navigation" name="spoken_language" class="navbar-toggler lang-multiselect" value="{{ auth()->user()->parentDetails()->count() ? auth()->user()->parentDetails->spoken_language : '' }}"
                                    readonly="">
                                <div id="lang-content-1" class="navbar-collapse collapse lang-content">
                                    <div class="nicescroll">
                                        <ul>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-en-1" value="English" {{ auth()->user()->parentDetails()->count() && in_array('English', explode(', ', auth()->user()->parentDetails->spoken_language)) ? 'checked' : '' }}>
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-en-1"
                                                            name="language">English</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-sp-1" value="Spanish" {{ auth()->user()->parentDetails()->count() && in_array('Spanish', explode(', ', auth()->user()->parentDetails->spoken_language)) ? 'checked' : '' }}>
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-sp-1"
                                                            name="language">Spanish</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-cn-1" value="Mandarin Chinese" {{ auth()->user()->parentDetails()->count() && in_array('Mandarin Chinese', explode(', ', auth()->user()->parentDetails->spoken_language)) ? 'checked' : '' }}>
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-cn-1"
                                                            name="language">Mandarin Chinese</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-ru-1" value="Russian" {{ auth()->user()->parentDetails()->count() && in_array('Russian', explode(', ', auth()->user()->parentDetails->spoken_language)) ? 'checked' : '' }}>
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-ru-1"
                                                            name="language">Russian</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-fr-1" value="French" {{ auth()->user()->parentDetails()->count() && in_array('French', explode(', ', auth()->user()->parentDetails->spoken_language)) ? 'checked' : '' }}>
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-fr-1"
                                                            name="language">French</label>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <small id="spoken_language_error" class="text-danger error" style="display:none;"></small>
                            </div>
                            <div class="form-group">
                                <label for="country_of_incorporation">Country of Residence</label>
                                <select class="selectmenu" id="country_of_incorporation" name="country_of_incorporation">
                               
                                    <option value="{{ auth()->user()->parentDetails->country_of_incorporation }}">{{ auth()->user()->parentDetails->country_of_incorporation }}</option>
                                    @foreach($countries ?? '' as $country)
                                    <option value="{{ $country->name }}">{{ $country->name }}</option>
                                    @endforeach

                                </select>
                                <small id="country_of_incorporation_error" class="text-danger error" style="display:none;"></small>
                            </div>

                        </div>
                    </div>

                    <div class="form-submit text-center row align-items-center">
                        <div class="col text-left">
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

<!-- Modal Add child Profile -->
<div class="modal fade" id="add-child-overlay" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
        <div class="modal-content">

            <div class="modal-header">
                <div class="d-flex align-items-center">
                    <a href="javascript:void(0);" class="back update-profile-form-back-btn" data-toggle="modal" data-target="#"
                        data-dismiss="modal"><img src="{{ asset('frontend/images/icon-back.png') }}" alt="icon" /></a>
                    <h2 class="modal-title">Add Child</h2>
                </div>
                <div class="alert alert-success success_message_container" role="alert" style="display:none">
                    <span class="success_message"></span>
                </div>

            </div>
            <div class="modal-body nicescroll">
                <form id="add-child-form" data-action="{{ url('/parent/profile/ajax/add_child_profile') }}">
                    @method('POST')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="child-name">Child Name</label>
                                <input type="text" class="form-control with-validation" id="child-name"
                                    placeholder="Type your child name" value="" name="full_name">
                                    <small id="full_name_error" class="text-danger error" style="display:none;"></small>
                            </div>
                            <div class="form-group">
                                <label for="relationship">Relationship</label>
                                <select class="selectmenu" id="relationship" name="relationship">
                                    <option value="">select</option>
                                    <option value="Daughter">Daughter</option>
                                    <option value="Son">Son</option>
                                </select>
                                <small id="relationship_error" class="text-danger error" style="display:none;"></small>
                            </div>
                            <div class="form-group">
                                <label for="gender3">Gender</label>
                                <select id="gender3" class="selectmenu" name="gender">
                                    <option>Select your gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="child-birthdate">Birthday</label>
                                <input type="date" class="with-validation" id="child-birthdate" name="birthdate" />
                                <small id="birthdate_error" class="text-danger error" style="display:none;"></small>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group append-languages" id="append-language-1">
                                <label for="spoken-languages-1">Spoken Language/s</label>
                                <input type="text" placeholder="Select Language /s" data-toggle="collapse"
                                    data-target="#lang-content-1" aria-controls="navbars" aria-expanded="true"
                                    aria-label="Toggle navigation" name="spoken_language" class="navbar-toggler lang-multiselect" value=""
                                    readonly="">
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
                                <label for="country-of-residency">Country of Residence</label>
                                <select class="selectmenu" id="country-of-residency" name="country_of_residency">
                                    @foreach($countries ?? '' as $country)
                                    <option value="{{ $country->name }}">{{ $country->name }}</option>
                                    @endforeach 
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="school">School <i>(Optional)</i></label>
                                <input type="text" name="school" placeholder="Type school name here" />
                            </div>

                        </div>
                    </div>

                    <div class="form-submit text-center">
                        {{-- <button type="submit" class="btn btn-red btn-full" data-dismiss="modal">Add</button> --}}
                        <button type="submit" class="btn btn-red btn-full">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit child Profile -->
<div class="modal fade" id="edit-child-overlay" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
        <div class="modal-content">

            <div class="modal-header">
                <div class="d-flex align-items-center">
                    <a href="javascript:void(0);" class="back update-profile-form-back-btn" data-toggle="modal" data-target="#"
                        data-dismiss="modal"><img src="{{ asset('frontend/images/icon-back.png') }}" alt="icon" /></a>
                    <h2 class="modal-title">Edit Child Profile</h2>
                </div>
                <div class="alert alert-success success_message_container" role="alert" style="display:none">
                    <span class="success_message"></span>
                </div>

            </div>
            <div class="modal-body nicescroll">
                <form id="update-child-form" data-action="{{ url('/parent/profile/ajax/update_child_profile') }}">
                    @method('POST')
                    <input type="hidden" id="update-child-id" name="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="update-child-full_name">Child Name</label>
                                <input type="text" class="form-control with-validation" id="update-child-full_name" name="full_name"
                                    placeholder="Type your child name" value="">
                                    <small id="full_name_error" class="text-danger error" style="display:none;"></small>
                            </div>
                            <div class="form-group">
                                <label for="update-child-relationship">Relationship</label>
                                <select class="selectmenu" id="update-child-relationship">
                                    <option>select</option>
                                    <option value="Daughter">Daughter</option>
                                    <option value="Son">Son</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="update-child-gender">Gender</label>
                                <select id="update-child-gender" class="selectmenu" name="gender">
                                    <option>Select your gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="birthdate">Birthday</label>
                                <input type="date" class="with-validation" id="update-child-birthdate" name="birthdate"/>
                                {{-- <input class='form-control datepicker' id="update-child-birthdate" type='text' placeholder='Date'> --}}
                                <small id="birthdate_error" class="text-danger error" style="display:none;"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group append-languages" id="append-language-1">
                                <label for="update-child-spoken_language">Spoken Language/s</label>
                                <input type="text" placeholder="Select Language /s" data-toggle="collapse"
                                    data-target="#lang-content-1" id="update-child-spoken_language" aria-controls="navbars" aria-expanded="true"
                                    aria-label="Toggle navigation" class="navbar-toggler lang-multiselect" name="spoken_language" value=""
                                    readonly="">
                                <div id="lang-content-1" class="navbar-collapse collapse lang-content">
                                    <div class="nicescroll">
                                        <ul>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" class="spoken_language_selection" id="update-child-lang-en-1" value="English">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-en-1"
                                                            name="language">English</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" class="spoken_language_selection" id="update-child-lang-sp-1" value="Spanish">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-sp-1"
                                                            name="language">Spanish</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" class="spoken_language_selection" id="update-child-lang-cn-1" value="Mandarin Chinese">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-cn-1"
                                                            name="language">Mandarin Chinese</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" class="spoken_language_selection" id="update-child-lang-ru-1" value="Russian">
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-ru-1"
                                                            name="language">Russian</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" class="spoken_language_selection" id="update-child-lang-fr-1" value="French">
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
                                <label for="update-child-country_of_residency">Country of Residence</label>
                                <select class="selectmenu" id="update-child-country_of_residency" name="country_of_residency">
                                   <option value="{{ auth()->user()->parentDetails->country_of_incorporation }}">{{ auth()->user()->parentDetails->country_of_incorporation }}</option>
                                    @foreach($countries ?? '' as $country)
                                    <option value="{{ $country->name }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="update-child-school">School <i>(Optional)</i></label>
                                <input type="text" id="update-child-school" name="school" placeholder="Type school name here" />
                            </div>

                        </div>
                    </div>

                    <div class="form-submit text-center row align-items-center">
                        <div class="col">
                            <div class="delete-profile ">
                                <a href="javascript:void(0)" data-action="{{ url('/parent/profile/ajax/delete_child_profile') }}" class="delete-profile-btn text-navy-gray">Delete Profile</a>
                            </div>
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
<script>
    $("input.datepicker").datepicker();
</script>
@endsection
