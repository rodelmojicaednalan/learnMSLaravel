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
                        <h1 id="school_name" data-unique="{{$school_profile['user_id']}}">{{ $school_profile['school_name'] }}</h1>
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
                                    {{ $school_profile['company_registration_number'] !== null ? $school_profile['company_registration_number'] : 'N/A' }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Address:
                                </div>
                                <div class="col-md-7">
                                     {{ $school_profile['address'] !== null ? $school_profile['address'] : "N/A" }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Website:
                                </div>
                                <div class="col-md-7">
                                    <a href=" {{ $school_profile['website'] !== null ? $school_profile['website']  : "#" }}" target="_blank">
                                         {{ $school_profile['website'] !== null ? $school_profile['website'] : "N/A" }}
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Contact Number:
                                </div>
                                <div class="col-md-7">
                                    <a href="{{ $school_profile['user']['contact_number'] !== null ? $school_profile['user']['contact_number'] : "#" }}">
                                         {{ $school_profile['user']['contact_number'] !== null ? $school_profile['user']['contact_number'] : "N/A" }}
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Country of Incorporation:
                                </div>
                                <div class="col-md-5">
                                    {{ $school_profile['country_of_incorporation'] !== null ? $school_profile['country_of_incorporation'] : "N/A" }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    Language(s):
                                </div>
                                <div class="col-md-7">
                                    {{ $school_profile['spoken_language'] !== null ? $school_profile['spoken_language'] : "N/A" }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Number of Teachers:
                                </div>
                                <div class="col-md-7">
                                    {{ $school_profile['number_of_teachers'] !== null ? $school_profile['number_of_teachers'] : "0" }}
                                </div>
                            </div>
                            <div class="social text-wrapper">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h5>Social</h5>
                                    </div>
                                </div>
                                <hr>
                                @if ($school_profile['user']['social_link']->count())
                                    @foreach ($school_profile['user']['social_link'] as $social)
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
                                                        <h6 class="creater-name">{{$teacher->getFullnameAttribute()}}</h6>
                                                        <img src="{{ asset('frontend/images/like.png') }}" width="22" alt="icon">
                                                        <span class="like-count">10k</span>
                                                    </div>
                                                </div>
                                                <div class="about-descrption">
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
                                                <a href="/teacher/{{$teacher['id']}}" class="read-profile">See Full Profile</a>
                                            </div>
                                            @endforeach
                                        @else
                                            <p class="mx-auto mt-5">No Teacher Available<p>
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
                        @if (isset($school_profile['logo']))
                            <img id="imageResult2" src="{{ asset('frontend/images/placeholder-school-profile.png') }}"
                            alt="" class="img-fluid mCS_img_loaded" width="380">
                        @else
                            <img id="imageResult" src="{{ asset('frontend/images/placeholder-school-profile.png') }}"
                            alt="" class="img-fluid mCS_img_loaded" width="380">
                        @endif

                    </div>
                </div>
                <div class="text-wrapper">
                    <h4>About</h4>
                    <hr>
                    <p>
                        {{ $school_profile['description'] ? $school_profile['description'] : "N/A" }}
                    </p>
                </div>
                <div class="tag-wrapper">
                    <h4>Related Skills</h4>
                    <hr>
                   <ul class="list-unstyled ">
                        @if (count($school_profile->getFormattedRelatedSkillsAttribute()))
                            @foreach ($school_profile->getFormattedRelatedSkillsAttribute() as $skill)
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




<!-- Modal Edit Social -->
@include('frontend.includes._social-media-modal')
@endsection

{{-- Additional scripts --}}
@section('scripts')
<script type="text/javascript" src="{{ asset('frontend/js/vendor/chosen.jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/school.js') }}"></script>
<script src="{{asset('frontend/js/teacher-paginate.js')}}"></script>
@endsection
