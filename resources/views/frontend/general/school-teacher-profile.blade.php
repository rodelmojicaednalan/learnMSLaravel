{{-- Extends layout --}}
@extends('frontend.layout.app')

{{-- Additional Styles --}}
@section('styles')

@endsection

{{-- Content --}}
@section('content')

<!-- Start Profile Layout -->
<section>
    <div class="container teacher-profile">
        <div class="row align-items-start flex-row-reverse">

            <div class="col-md-8">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h1>{{ $teacher_profile->getFullnameAttribute() !== null ? $teacher_profile->getFullnameAttribute() : 'N/A' }}</h1>
                    </div>
                    <h5 class="red col-md-12">Teacher</h5>
                </div>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="profile-tab" data-toggle="tab" href="#nav-profile"
                            role="tab" aria-controls="nav-profile" aria-selected="true">Profile</a>
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
                                    <a href="#">{{isset($teacher_profile['email']) ? $teacher_profile['email'] : 'N/A'}}</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Gender:
                                </div>
                                <div class="col-md-7">
                                    {{isset($teacher_profile['gender']) ? $teacher_profile['gender'] : 'N/A'}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Contact Number:
                                </div>
                                <div class="col-md-7">
                                    {{isset($teacher_profile['contact']) ? $teacher_profile['contact'] : 'N/A'}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Highest Education Qualification:
                                </div>
                                <div class="col-md-7">
                                    @if (isset($teacher_profile['teacherDetails']['highest_education_qualification']))

                                        {{$teacher_profile['teacherDetails']['highest_education_qualification']}}

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
                                    @if (isset($teacher_profile['teacherDetails']['name_of_institution']))

                                            {{$teacher_profile['teacherDetails']['name_of_institution']}}

                                    @else

                                            N/A

                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    Country of Incorporation:
                                </div>
                                <div class="col-md-7">
                                   @if (isset($teacher_profile['teacherDetails']['country_of_incorporation']))

                                        {{$teacher_profile['teacherDetails']['country_of_incorporation']}}

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
                                    @if (isset($teacher_profile['teacherDetails']['spoken_language']))

                                        {{$teacher_profile['teacherDetails']['spoken_language']}}

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
                                </div>
                                <hr>

                                    @if ($teacher_profile['social_link']->count())
                                        @foreach ($teacher_profile['social_link'] as $social)
                                        <div class="row">
                                            <div class="col-md-5">
                                                {{ $social['social_media_name'] }}:
                                            </div>
                                            <div class="col-md-7">
                                                <a href="{{ $social['social_media_link'] }}" target="_blank">{{ $social['social_media_link'] }}</a>
                                            </div>
                                        </div>
                                        @endforeach
                                    @else
                                        N/A
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group upload-wrapper">
                    <div class="image-area">
                        <img id="imageResult" src="{{ asset('frontend/images/placeholder-user.png') }}"
                        alt="" class="img-fluid mCS_img_loaded" width="380">
                    </div>
                </div>
                <div class="text-wrapper">
                    <h4>About</h4>
                    <hr>
                    <p>
                        @if (isset($teacher['teacherDetails']))
    
                            @if ($teacher['teacherDetails']['description'] !== null)

                                {{$teacher['teacherDetails']['description']}}

                            @else

                                No Description Available

                            @endif

                        @else

                            No Description Available

                        @endif

                    </p>
                </div>
                <div class="tag-wrapper">
                    <h4>Related Skills</h4>
                    <hr>
                    <ul class="list-unstyled ">
                        @if (isset($teacher['teacherDetails']))
    
                            @if ($teacher['teacherDetails']['related_skills'] !== null)

                                {{$teacher['teacherDetails']['related_skills']}}

                            @else

                               No Related Skills Available

                            @endif

                        @else

                            No Related Skills Available

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


<!-- Modal Edit Social -->
@include('frontend.includes._social-media-modal')

@endsection

{{-- Additional scripts --}}
@section('scripts')
<script type="text/javascript" src="{{ asset('frontend/js/vendor/chosen.jquery.min.js') }}"></script>
@endsection
