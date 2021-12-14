{{-- Extends layout --}}
@extends('frontend.layout.app')

{{-- Content --}}
@section('content')

<!-- Start banner slider -->
<section id="banner-slider-wrap">
    <div class="container-fulid ">
        <div class="banner-slider">
            <div class="banner-slide align-items-center">
                <div class="banner-image"  style="background-image: url('{{ asset('frontend/images/learn-banner-1.jpg') }}');">
                    <div class="container">
                        <div class="move-center-center">
                            <h2 class="banner-title align-items-center">Why Learn with ORCA</h2>
                           <h3 class="banner-subtitle">ORCA makes learning more immersive and inclusive.</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End banner slider -->

<!-- Start Box Grids -->
<section class="boxes-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>How ORCA benefits Students</h2>
            </div>
        </div>
        <div class="row box-wrap">
            <div class="col-md-4">
                <div class="box">
                    <h3>Access to a global platform of instructors and experts in their fields</h3>
                    <p>Improve skills and enhance knowledge at your own time and space</p>
                    <p>Reduction in traveling time</p>
                </div>
            </div>
            <div class="col-md-8">
                <img src="{{ asset('frontend/images/howtolearn/1.png') }}" alt="image" />
                <div class="row">
                    <div class="col-md box-wrap">
                        <div class="box">
                            <h3>Greater willingness to learn</h3>
                            <p>Students can ask questions or seek clarifications through class chatrooms or emails to their teachers without interrupting the class</p>
                        </div>
                    </div>
                    <div class="col-md box-wrap">
                        <div class="box">
                            <h3>No more forgetting or carrying heavy textbooks</h3>
                            <p>All learning materials can be downloaded online</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md box-wrap">
                <div class="box">
                    <h3>Self revision at their own time</h3>
                    <p>Students who missed lessons or are unable to catch up may refer to classroom recordings and shared materials</p>
                </div>
            </div>

            <div class="col-md box-wrap">
                <div class="box">
                    <h3 class="equal-height">Better equipped for work life</h3>
                    <p>Use of computer devices and internet resources help build the students’ digital capabilities</p>
                </div>
            </div>
        </div>
       
    </div>
</section>
<!-- End Box Grids -->

<!-- Start Full with background video Text -->
<section class="full-width-bg" style="background-image: url('{{ asset('frontend/images/howtolearn/2.png') }}');">
    <div class="filter-gray">
        <div class="container right-video-left-text">
            <div class="row align-items-center">
                <div class="col-md-6 youtube-video pos-res" style="height: 340px;">
                    <div class="image">
                        <img src="{{ asset('frontend/images/img-2.png') }}" alt="play video" class="rounded-corner" height="340">
                    </div>
                    <div class="play-button play-button-disable" style="cursor: not-allowed;"></div>
                    <div class="fluid-width-video-wrapper" style="padding-top: 100%;"><iframe class="iframe-video" src="https://www.youtube.com/embed/W_WBMSw_vFw" frameborder="0" allowfullscreen="" allow="autoplay" id="fitvid597906"></iframe></div>

                </div>
                <div class="col-md-6">
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <h3>Coming Soon</h3>
                        </div>
                    </div>
                    <a href="#"><button class="btn btn-red" disabled="true">Take a Tour</button></a>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Full with background video Text -->

<section class="ready-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
               <h2>Ready to Start Learning?</h2>
               <p>Please be patient with us while we put this together for you.</p>
               <a href="{{ url('classes') }}"><button class="btn btn-red">Join a Class</button></a>
            </div>
        </div>
    </div>
</section>

@endsection
