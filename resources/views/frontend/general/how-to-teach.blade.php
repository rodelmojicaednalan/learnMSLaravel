{{-- Extends layout --}}
@extends('frontend.layout.app')

{{-- Content --}}
@section('content')

<!-- Start banner slider -->
<section id="banner-slider-wrap">
    <div class="container-fulid ">
        <div class="banner-slider">
            <div class="banner-slide align-items-center">
                <div class="banner-image"  style="background-image: url('{{ asset('frontend/images/teach-banner-1.jpg') }}');">
                    <div class="container">
                        <div class="move-center-center">
                            <h2 class="banner-title align-items-center">Why Teach with ORCA</h2>
                           <h3 class="banner-subtitle">ORCA makes online teaching more engaging, and administrative work more organised and less time consuming.</h3>
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
                <h2>How ORCA benefits Trainers</h2>
            </div>
        </div>
        <div class="row box-wrap">
            <div class="col-md-4">
                <div class="box">
                    <h3>Generate income by teaching from the comfort of their home/preferred teaching space</h3>
                    <p>Reduced travelling time and minimised unnecessary hassle</p>
                    <p>Able to conduct more lessons in a day.</p>
                </div>
            </div>
            <div class="col-md-8">
                <img src="{{ asset('frontend/images/howtoteach/1.png') }}" alt="image" />
                <div class="row">
                    <div class="col-md box-wrap">
                        <div class="box">
                            <h3>Ability to broaden ones skillsets from a global platform of experts</h3>
                            <p>Learn new skills from other trainers.</p>
                        </div>
                    </div>
                    <div class="col-md box-wrap">
                        <div class="box">
                            <h3>No more forgetting or carrying heavy textbooks</h3>
                            <p>All learning materials can be downloaded online.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4  box-wrap">

                <img src="{{ asset('frontend/images/howtoteach/img-2.png') }}">
            </div>

            <div class="col-md-8 box-wrap">
                <div class="box">
                    <h3 class="equal-height">A holistic platform with the tools necessary for integrated online teaching.</h3>
                    <ol>
                        <li>Focus on creating better teaching experiences</li>
                        <ul style="list-style-type: disc;">
                            <li>Digital efficiency and reduced paperwork frees up trainers’ time</li>
                        </ul>
                        <li>Improve class participation and engagement through</li>
                        <ul style="list-style-type: disc;">
                            <li>Pop quizzes</li>
                            <li>Breakout room discussions</li>
                            <li>Q&A forums</li>
                            <li>Direct student-trainer communication</li>
                        </ul>
                        <li>No more downloading or switching between apps</li>
                        <ul style="list-style-type: disc;">
                            <li>Trainers can drag and drop the teaching aids to create their own dashboard</li>
                        </ul>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-wrap">
                <p>Other than the video conferencing feature, the unified platform aims to provide Schools and Trainers with useful features such as personalization of interface, document share, slides share, quiz builder, sketch tool, reminders, chat messaging system, past video recordings, progress reports, sales reports for book keeping purposes, and many others.</p>
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

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="reward-text-container">
                    <h2>Rewarding System</h2>
                    <p>ORCA believes that learning should be fun and rewarding too. The points can then be used to exchange for both digital and physical rewards. She incorporates a reward system where:</p>
                </div>
            </div>
        </div>
        <div class="row reward-item-wrapper">
            <div class="col-md-4 text-center">
                <div class="reward-item">

                        <img src="{{ asset('frontend/images/howtoteach/medal.png') }}" alt="medal" />

                    <p>Schools can reward teachers for their teaching excellence</p>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="reward-item">
                    <img src="{{ asset('frontend/images/howtoteach/reward.png') }}" alt="reward" />
                    <p>Teachers can reward students for their good conduct or results</p>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="reward-item giftbox">
                    <img src="{{ asset('frontend/images/howtoteach/giftbox.png') }}" alt="giftbox" />
                    <p>Students can earn from even the most basic classroom etiquette as being punctual</p>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-10 ml-auto mr-auto">
                <div class="row align-items-center">
                <div class="col-md-4">
                    <p>Be reassured that with ORCA, security is one of our top priorities. The system is secured with SHA-256 SSL certificate, CloudFlare anti-DDoS network infrastructure, encrypted on the end points and on the database level.</p>
                </div>
                <div class="col-md-8 text-right">
                    <img src="{{ asset('frontend/images/howtoteach/3.png') }}" width="577" height="395" alt="image" />
                </div>
            </div>
           </div>
        </div>
    </div>
</section>

<section class="ready-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
               <h2>Ready to Start Teaching?</h2>
               <p>Create your class and share your skills with millions of members today.</p>
               <a href="{{ url('classes') }}"><button class="btn btn-red">Start a Class</button></a>
            </div>
        </div>
    </div>
</section>

@endsection
