{{-- Extends layout --}}
@extends('frontend.layout.app')

{{-- Additional Styles --}}
@section('styles')

<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendor/main.css') }}" media="all" />
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendor/jsCalendar.min.css') }}" media="all" />

@endsection

{{-- Content --}}
@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4 pr-md-35">
                <!-- Start Filter -->
                <div class="row filter-wrapper">
                    <!-- <div class="col">
                        <select id="year-filter" class="selectmenu">
                            <option data-year="2023">2023</option>
                            <option data-year="2022">2022</option>
                            <option data-year="2021" selected="2021">2021</option>
                            <option data-year="2020">2020</option>

                        </select>
                    </div> -->
                    <div class="col text-right">
                        <button class="btn btn-red" id="set-today">Today</button>
                    </div>
                </div>
                <!-- End Filter -->
                <!-- Starts Mini Calender -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="jsCalendarWrapper">
                            <!-- <ul class="month-filter list-unstyled">
                                <li>Jan</li>
                                <li>Feb</li>
                                <li>Mar</li>
                                <li>Apr</li>
                                <li>May</li>
                                <li>Jun</li>
                                <li>Jul</li>
                                <li class="active">Aug</li>
                                <li>Sept</li>
                                <li>Oct</li>
                                <li>Nov</li>
                                <li>Dec</li>
                            </ul> -->

                            <div id="mini-calendar" data-month-format="month YYYY" data-day-format="DDD"></div>
                            
                        </div>

                    </div>
                </div>
                <!-- End Mini Calender -->
                <!-- Start Upcoming classes -->
                <div class="row" id="upcoming-classes">
                    <div class="col-md-12">
                        <h4>Upcoming classes</h4>
                        <!-- Class item -->
                        <div class="class-item odd first">
                            <h5 class="class-date">18 July 2021, Wednesday</h5>
                            <div class="class-detail row">
                                <div class="col-md-8">
                                    <h3 class="class-time">11:00 - 12:00</h3>
                                    <h5 class="class-name">Art class - Grade 1</h5>
                                    <div class="dropdown join-students-wrapper">
                                      <div class="dropdown-toggle" type="button" id="join-students" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        5 students joining
                                      </div>
                                      <div class="dropdown-menu" aria-labelledby="join-students">
                                        <a class="dropdown-item" href="#"><img width="11" src="{{ asset('frontend/images/creater-image1.png') }}"/><span>Claeret</span></a>
                                        <a class="dropdown-item" href="#"><img width="11" src="{{ asset('frontend/images/creater-image1.png') }}"/><span>Aye Mon</span></a>
                                         <a class="dropdown-item" href="#"><img width="11" src="{{ asset('frontend/images/creater-image1.png') }}"/><span>Claeret</span></a>
                                        <a class="dropdown-item" href="#"><img width="11" src="{{ asset('frontend/images/creater-image1.png') }}"/><span>Aye Mon</span></a>
                                         <a class="dropdown-item" href="#"><img width="11" src="{{ asset('frontend/images/creater-image1.png') }}"/><span>Claeret</span></a>
                                        
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right pl-0 pr-0">
                                    <button class="btn btn-red">Join class</button>
                                </div>
                                <div class="left-line"></div>
                            </div>
                        </div>
                        <div class="class-item even">
                            <h5 class="class-date">18 July 2021, Wednesday</h5>
                            <div class="class-detail row">
                                <div class="col-md-8">
                                    <h3 class="class-time">11:00 - 12:00</h3>
                                    <h5 class="class-name">Art class - Grade 1</h5>
                                    <div class="dropdown join-students-wrapper">
                                      <div class="dropdown-toggle" type="button" id="join-students" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        5 students joining
                                      </div>
                                      <div class="dropdown-menu" aria-labelledby="join-students">
                                        <a class="dropdown-item" href="#"><img width="11" src="{{ asset('frontend/images/creater-image1.png') }}"/><span>Claeret</span></a>
                                        <a class="dropdown-item" href="#"><img width="11" src="{{ asset('frontend/images/creater-image1.png') }}"/><span>Aye Mon</span></a>
                                         <a class="dropdown-item" href="#"><img width="11" src="{{ asset('frontend/images/creater-image1.png') }}"/><span>Claeret</span></a>
                                        <a class="dropdown-item" href="#"><img width="11" src="{{ asset('frontend/images/creater-image1.png') }}"/><span>Aye Mon</span></a>
                                         <a class="dropdown-item" href="#"><img width="11" src="{{ asset('frontend/images/creater-image1.png') }}"/><span>Claeret</span></a>
                                        
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right pl-0 pr-0">
                                    <button class="btn btn-red">Join class</button>
                                </div>
                                 <div class="left-line"></div>
                            </div>
                        </div>
                    </div>

                </div>
            <!-- End Upcoming classes -->
        </div>
            <div class="col-md-8">
                <div class="text-right">
                    <button class="btn btn-red">Subscribe to calendar</button>
                </div>
              <div id="loading">loading...</div>
              <div id="calendar-main"></div>
            </div>
        </div>
    </section>

    @endsection

    {{-- Additional scripts --}}
    @section('scripts')
    <script type="text/javascript" src="{{ asset('frontend/js/vendor/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/vendor/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/vendor/jsCalendar.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('frontend/js/custom-calendar.js') }}"></script>
    @endsection




