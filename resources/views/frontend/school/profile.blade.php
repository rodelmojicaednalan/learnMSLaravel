{{-- Extends layout --}}
@extends('frontend.layout.app')

{{-- Additional Styles --}}
@section('styles')

@endsection

{{-- Content --}}
@section('content')

<!-- Menu  Section -->
<?php // @include('includes/nav-cc.php')?>
<!-- Menu  Section -->

<!-- Start Profile Layout -->
<section>
    <div class="container">
        <div class="row align-items-start flex-row-reverse">


            <div class="col-md-8">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h1 id="school_name" data-unique="{{$school['user_id']}}">{{ auth()->user()->schoolAdmin->school_name ? Str::ucfirst(auth()->user()->schoolAdmin->school_name) : "Username" }}</h1>
                    </div>
                    <div class="col-4 text-right">
                        <button class="btn btn-red edit-profile" data-toggle="modal" data-target="#edit-profile-overlay"
                            data-dismiss="modal">Edit Profile</button>
                    </div>
                    <h5 class="red col-md-12">School</h5>
                </div>

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="profile-tab" data-toggle="tab" href="#nav-profile"
                            role="tab" aria-controls="nav-profile" aria-selected="true">Profile</a>
                        <a class="nav-item nav-link" id="nav-teachers-tab" data-toggle="tab" href="#nav-teachers"
                            role="tab" aria-controls="nav-teachers" aria-selected="false">Teachers</a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                        aria-labelledby="nav-profile-tab">
                        <div class="user-info">
                            <div class="row">
                                <div class="col-md-5">
                                    Company Registration Number:
                                </div>
                                <div class="col-md-7">
                                    {{ auth()->user()->schoolAdmin->company_registration_number ? Str::ucfirst(auth()->user()->schoolAdmin->company_registration_number) : "N/A" }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Address:
                                </div>
                                <div class="col-md-7">
                                     {{ auth()->user()->schoolAdmin->address ? auth()->user()->schoolAdmin->address : "N/A" }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Website:
                                </div>
                                <div class="col-md-7">
                                    <a href=" {{ auth()->user()->schoolAdmin->website ? auth()->user()->schoolAdmin->website : "#" }}" target="_blank">
                                         {{ auth()->user()->schoolAdmin->website ? auth()->user()->schoolAdmin->website : "N/A" }}
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Contact Number:
                                </div>
                                <div class="col-md-7">
                                    <a href="{{ auth()->user()->contact_number ? auth()->user()->contact_number : "#" }}">
                                         {{ auth()->user()->contact_number ? auth()->user()->contact_number : "N/A" }}
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Country of Incorporation:
                                </div>
                                <div class="col-md-5">
                                    {{ auth()->user()->schoolAdmin->country_of_incorporation ? auth()->user()->schoolAdmin->country_of_incorporation : "N/A" }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    Language(s):
                                </div>
                                <div class="col-md-7">
                                    {{ auth()->user()->schoolAdmin->spoken_language ? auth()->user()->schoolAdmin->spoken_language : "N/A" }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Number of Teachers:
                                </div>
                                <div class="col-md-7">
                                    {{ auth()->user()->schoolAdmin->number_of_teachers ? auth()->user()->schoolAdmin->number_of_teachers : "0" }}
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
                    <div class="tab-pane fade" id="nav-teachers" role="tabpanel" aria-labelledby="nav-teachers-tab">
                        <div class="row">
                            <div class="col-md-12 teachers-wrapper">
                                <div id="generateTeacher">
                                    <div class="row">
                                        @if (count($teacher_list))
                                            @foreach ($teacher_list as $teacher)
                                                <div class="col-md-6 ">
                                                    <div class="creater row">
                                                        <div class="col-auto">
                                                            <img src="{{ asset('frontend/images/creater-image1.png') }}" class="rounded-circle" width="64"
                                                                height="64" alt="Username">
                                                        </div>
                                                        <div class="col-auto pl-0">
                                                            <h6 class="creater-name">{{$teacher->first_name . ' ' . $teacher->last_name}}</h6>
                                                            <img src="{{ asset('frontend/images/like.png') }}" width="22" alt="icon">
                                                            <span class="like-count">10k</span>
                                                        </div>
                                                    </div>
                                                    <div class="about-descrption">
                                                        <p>
                                                            @if (isset($teacher->teacherDetails))
            
                                                                @if ($teacher->teacherDetails->getOriginal()['description'] !== null)
            
                                                                    {{$teacher->teacherDetails->getOriginal()['description']}}
            
                                                                @else
            
                                                                    No Description Available
            
                                                                @endif
            
                                                            @else
            
                                                                No Description Available
            
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <a href="/teacher/{{$teacher->id}}" class="read-profile">See Full Profile</a>
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="mx-auto mt-5">No Teacher Available</p>
                                        @endif
                                    </div>
                                    <div class="mt-3">
                                        {{$teacher_list->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group upload-wrapper">
                    <div class="image-area">
                        @if (auth()->user()->schoolAdmin()->count())
                            <img id="imageResult" src="{{ auth()->user()->schoolAdmin->logo ? \Storage::url('public/uploads/school/profile/image/' . auth()->user()->schoolAdmin->logo) :  asset('frontend/images/placeholder-school-profile.png') }}"
                            alt="" class="img-fluid mCS_img_loaded" width="380">
                        @else
                            <img id="imageResult" src="{{ asset('frontend/images/placeholder-school-profile.png') }}"
                            alt="" class="img-fluid mCS_img_loaded" width="380">
                        @endif

                    </div>
                    <div class="">
                        <form method="post" id="upload-image-form" data-action="{{ url('/school/profile/ajax/upload_profile_image') }}" enctype="multipart/form-data">
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
                        {{ auth()->user()->schoolAdmin->description ? auth()->user()->schoolAdmin->description : "N/A" }}
                    </p>
                </div>
                <div class="tag-wrapper">
                    <h4>Related Skills</h4>
                    <hr>
                   <ul class="list-unstyled ">
                        @if (auth()->user()->schoolAdmin()->count())
                            @foreach (auth()->user()->schoolAdmin->formatted_related_skills as $skill)
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

</div>

<!-- Modal Edit School Profile -->
<div class="modal fade" id="edit-profile-overlay" tabindex="-1" aria-hidden="true">
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
                <form id="update-school-profile-form" data-action="{{ url('/school/profile/ajax/update_profile') }}">
                    @method('POST')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="school_name">Name of Institution</label>
                                <input type="text" class="form-control with-validation" id="school_name" name="school_name"
                                    placeholder="Type your name of institution" value="{{ auth()->user()->schoolAdmin->school_name ? auth()->user()->schoolAdmin->school_name : "" }}">
                                    <small id="school_name_error" class="text-danger error" style="display:none;"></small>
                            </div>
                            <div class="form-group">
                                <label for="company_registration_number">Company Registration Number</label>
                                <input type="text" class="form-control with-validation" id="company_registration_number" name="company_registration_number" placeholder="Type your company registration number" value="{{ auth()->user()->schoolAdmin->company_registration_number ? auth()->user()->schoolAdmin->company_registration_number : "" }}">
                                    <small id="company_registration_number_error" class="text-danger error" style="display:none;"></small>
                            </div>
                            <div class="form-group">
                                <label for="contact-number2">Contact Number <i>(Optional)</i></label>
                                <input type="phone-number" class="form-control" id="contact-number2" name="contact_number"
                                    placeholder="Type your phone number" value="{{ auth()->user()->contact_number ? auth()->user()->contact_number : "" }}">
                            </div>

                            <div class="form-group">
                                <label for="country-of-incorporation2">Country of Incorporation</label>
                                <select class="selectmenu" id="country-of-incorporation2" name="country_of_incorporation">
                                    <option value="Singapore" {{ auth()->user()->schoolAdmin()->count() && auth()->user()->schoolAdmin->country_of_incorporation === 'Singapore' ? 'selected' : '' }}>Singapore</option>
                                    <option value="Country 2" {{ auth()->user()->schoolAdmin()->count() && auth()->user()->schoolAdmin->country_of_incorporation === 'Country 2' ? 'selected' : '' }}>Country 2</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="about">About</label>
                                <textarea class="form-control" id="about" rows="5"
                                    placeholder="Type your about" name="description">{{ auth()->user()->schoolAdmin()->count() ? auth()->user()->schoolAdmin->description : '' }}</textarea>

                            </div>


                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="about">Address</label>
                                <textarea class="form-control" id="address" rows="5"
                                    placeholder="Type your school address" name="address">{{ auth()->user()->schoolAdmin()->count() ? auth()->user()->schoolAdmin->address : '' }}</textarea>

                            </div>
                            <div class="form-group">
                                <label for="website">CWebsite</label>
                                <input type="text" class="form-control" id="company-register-number" name="website"
                                    placeholder="Type your website" value="{{ auth()->user()->schoolAdmin->website ? auth()->user()->schoolAdmin->website : "" }}">
                            </div>
                            <div class="form-group append-languages" id="append-language-1">
                                <label for="spoken-languages-1">Spoken Language/s</label>
                                <input type="text" placeholder="Select Language /s" data-toggle="collapse"
                                    data-target="#lang-content-1" aria-controls="navbars" name="spoken_language"  aria-expanded="true"
                                    aria-label="Toggle navigation" class="navbar-toggler lang-multiselect" value="{{ auth()->user()->schoolAdmin()->count() ? auth()->user()->schoolAdmin->spoken_language : '' }}"
                                    readonly="">
                                <div id="lang-content-1" class="navbar-collapse collapse lang-content">
                                    <div class="nicescroll">
                                        <ul>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-en-1" value="English" {{ auth()->user()->schoolAdmin()->count() && in_array('English', explode(', ', auth()->user()->schoolAdmin->spoken_language)) ? 'checked' : '' }}>
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-en-1"
                                                            name="language">English</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-sp-1" value="Spanish" {{ auth()->user()->schoolAdmin()->count() && in_array('Spanish', explode(', ', auth()->user()->schoolAdmin->spoken_language)) ? 'checked' : '' }}>
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-sp-1"
                                                            name="language">Spanish</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-cn-1" value="Mandarin Chinese" {{ auth()->user()->schoolAdmin()->count() && in_array('Mandarin Chinese', explode(', ', auth()->user()->schoolAdmin->spoken_language)) ? 'checked' : '' }}>
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-cn-1"
                                                            name="language">Mandarin Chinese</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-ru-1" value="Russian" {{ auth()->user()->schoolAdmin()->count() && in_array('Russian', explode(', ', auth()->user()->schoolAdmin->spoken_language)) ? 'checked' : '' }}>
                                                    <div class="state"><i class="icon icon-check"></i>
                                                        <label class="checkbox-label" for="lang-ru-1"
                                                            name="language">Russian</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="pretty p-default p-icon p-pulse">
                                                    <input type="checkbox" id="lang-fr-1" value="French" {{ auth()->user()->schoolAdmin()->count() && in_array('French', explode(', ', auth()->user()->schoolAdmin->spoken_language)) ? 'checked' : '' }}>
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
                                    class="chosen-select" data-action="{{ url('/school/profile/ajax/get_selected_skills') }}">
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
                        <div class="col">
                            <div class="delete-profile ">
                                <a href="#" class="text-navy-gray">Delete Profile</a>
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
<script type="text/javascript" src="{{ asset('frontend/js/school.js') }}"></script>
<script src="{{asset('frontend/js/teacher-paginate.js')}}"></script>
@endsection
