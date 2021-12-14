{{-- Extends layout --}}
@extends('frontend.layout.app')

{{-- Content --}}
@section('content')

<!-- Start banner slider -->
<section id="banner-slider-wrap">
    <div class="container-fulid ">
        <div class="banner-slider">
            <div class="banner-slide align-items-center">
                <div class="banner-image"  style="background-image: url('{{ asset('frontend/images/collaborate-banner-1.jpg') }}');">
                    <div class="container">
                        <div class="move-center-center">
                            <h2 class="banner-title align-items-center">Integrated learning is the New Norm</h2>
                           <h3 class="banner-subtitle">Expand your base, classrooms now no walls. Teach to a wider audience and Learn from a global platform.</h3>
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
                <h2>Why selling curriculum in ORCA</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 box-wrap">
                <div class="box">
                    <p>When offering your well researched curriculums on ORCA, you will reach a targeted international audience (of all ages) who will be more willing and receptive to online learning as we embark and accept the New Norm.</p>
                </div>
            </div>
            <div class="col-md-6 box-wrap">
                <div class="box">
                <p>With the constant evolution of the Education industry, there is a need to have a unified solution to allow schools and teachers to conduct lessons efficiently and effectively without being restricted to physical boundaries.</p>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12  box-wrap">

               <div class="box">
                <p>Secured payments can also be collected worldwide via ORCA and transferred directly to your account. These features will make online learning more engaging, and administrative work more organised and less time consuming.</p>
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

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                    <h2>How to Register as a Partner</h2>
                    <!-- <p>Details that ORCA will need:</p> -->
                    <!-- <p>Please email the following details to <a href="mailto:partner_us@orcasg.com" class="red">partner_us@orcasg.com</a></p> -->
            </div>
        </div>
        <div class="row box box-twocol-image">

            <div class="col-md-6 text-wrapper">
                <h3>Company’s / Individual’s Name</h3>
                <ul>
                    <li>Company Registration Number</li>
                    <li>Bank Account Details</li>
                    <li>Office Address</li>
                    <li>Nature of Busines</li>
                </ul>
                <h3>Contact Person’s Name</h3>
                <ul>
                    <li>Contact Number</li>
                    <li>Email Address</li>
                </ul>
            </div>
            <div class="col-md-6 image-wrapper">
                <img src="{{ asset('frontend/images/collaboratewithus/1.png') }}" alt="" class="full-img" />
            </div>

        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Collaborate with Teacher</h2>
            </div>
        </div>
        <div class="row align-items-center cwt-wrap">
            <div class="col-md-6 image-wrapper">
                <img src="{{ asset('frontend/images/collaboratewithus/2.png') }}"  alt=""  width="500">
            </div>
            <div class="col-md-6 text-wrapper">
                <h3>Finding your partner in education should be effortless. Simply search for them on ORCA and connect with them directly.</h3>
            </div>

        </div>
        <div class="row align-items-center cwt-wrap flex-row-reverse">
            <div class="col-md-6 image-wrapper">
                <img src="{{ asset('frontend/images/collaboratewithus/3.png') }}"  alt="" width="464">
            </div>
            <div class="col-md-6 text-wrapper">
                <h3>Just a gentle reminder that Personal Data Protection is extremely important to us at ORCA. Basic internet etiquette and respect for all users will be appreciated.</h3>
            </div>

        </div>

    </div>
</section>

<section class="ready-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
               <h2>Ready to Collaborate with Us?</h2>
               <a href="javascript:void(0)" data-toggle="modal" data-target="#register"><button class="btn btn-red btn-wide" >Register Now</button></a>
            </div>
        </div>
    </div>
</section>

@endsection
