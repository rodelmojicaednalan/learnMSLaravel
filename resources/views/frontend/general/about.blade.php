{{-- Extends layout --}}
@extends('frontend.layout.app')

{{-- Content --}}
@section('content')

<!-- Start banner slider -->
<section id="banner-slider-wrap">
    <div class="container-fulid ">
        <div class="banner-slider">
            <div class="banner-slide align-items-center">
                <div class="banner-image"  style="background-image: url('{{ asset('frontend/images/about/banner-1.png') }}');">
                    <div class="container">
                        <div class="move-center-center">
                            <h2 class="banner-title align-items-center">About Us</h2>
                           <h3 class="banner-subtitle">Integrated Learning is the New Norm</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End banner slider -->



<!-- 3col -->
<section class="col3-align-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md">
                <p>Learning needs to be available at the time and place that the student desires. Students should be able to access information on any device of their choice and benefit from self-directed learning.</p>
                <p>Apart from this, with teaching shifting from the traditional classroom to the virtual platforms, the role ofthe educator has also evolved. They have since been required to future-proof their courses and teaching methods.</p>
            </div>
            <div class="col-md-auto text-center">
                <img src="{{ asset('frontend/images/about/1.png') }}" alt="image" width="492" />
            </div>
            <div class="col-md">
                <p>ORCA goes beyond e-learning. She is designed to be the holistic online learning marketplace that aims to provide a comprehensive suite of features for the education industry. Schools (i.e. educational institutions,enrichment centres and tuition centres) can sell their courses; teachers can conduct the lesson; parents can enroll their child in the course; students can join the online class and participate with their peers.</p>

            </div>
        </div>
    </div>
</section>

<!-- Start main-bjectives -->
<section class="main-bjectives">
    <div class="filter-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Main Objectives</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="item">
                        <h4 class="equal-height">Schools / Programme / Content Providers</h4>
                        <ul>
                            <li>List and sell their courses</li>
                            <li>Interview, train and recruit teachers into their education team</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <h4 class="equal-height">Teachers/Trainers</h4>
                        <ul>
                            <li>Search for suitable Programmes</li>
                            <li>Undergo the necessary training conducted by the schools online/in person</li>
                            <li>Join the school as a Trainer and earn from the lesson they conduct</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item ">
                        <h4 class="equal-height">Parents/Students</h4>
                        <ul>
                            <li>Compare and find suitable Programmes</li>
                            <li>Keeps parents ahead of their child’s education journey</li>
                            <li>Join the lessons</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End main-bjectives -->

<!-- Start Brain -->
<section class="brain">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h2>Brains behind ORCA</h2>
                <p>ORCA is the brainchild of 2 organizations with over 10 years of experience in Education and Digital Technologies respectively.</p>

                <p>Cerebral was born out of a desire to nurture the often-neglected right brain. With the understanding that the right hemisphere of the brain is our creative centre, the programs in language, visual and performing arts focus on helping over 5,000 students annually discover and develop their creativity. Cerebral believes that this will, in turn, lead to the full and balanced functioning of both sides of their brain and ultimately, enhanced whole-brain intelligence.</p>
            </div>
            <div class="col-md-5 text-center">
                <img src="{{ asset('frontend/images/about/brain.png') }}" width="398" />
            </div>
        </div>
    </div>
</section>
<!-- End Brain -->
<!-- Start Our Mission -->
<section id="our-mission">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Our Mission</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="item">
                <img src="{{ asset('frontend/images/about/tournament.png') }}" />
                <p>ORCA is positioned as a well-structured and easily maintained system while being highly customisable according to various clients’ needs across the globe.</p>
            </div>
            </div>
            <div class="col-md-4">
                <div class="item">
                    <img src="{{ asset('frontend/images/about/scholarship.png') }}" />
                    <p>ORCA aspires to be well-recognised and constantly having the competitive edge in the education industry.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item">
                    <img src="{{ asset('frontend/images/about/clipboard.png') }}" />
                    <p>ORCA not only facilitates the management of work operations, she is also fun and highly adaptable to ensure that all users are engaged and find great benefits added to their daily lives.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Our Mission -->

@endsection
