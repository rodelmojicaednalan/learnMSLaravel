{{-- Extends layout --}}
@extends('frontend.layout.app')

{{-- Additional Styles --}}
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/pretty-checkbox.min.css') }}" media="all">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/ion.rangeSlider.min.css') }}" media="all">
@endsection

{{-- Content --}}
@section('content')

<!-- Vertical Tabs -->
<section class="vertical-tabs">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h5 class="title">TEACHER HANDBOOK</h5>
                <hr>
                <ul class="nav flex-column" id="v-tab" role="tablist" aria-orientation="vertical">
                    <li>
                        <a class="nav-link active" id="v-lesson-overview-tab" data-toggle="pill" href="#v-lesson-overview" role="tab" aria-controls="v-lesson-overview" aria-selected="true">Lesson Overview</a>
                        <ul>
                            <li>
                                <button class="btn btn-red">Introduction to Theme/Outcome</button>
                            </li>
                            <li><a href="#">Demonstration/ Step-by-step guide</a></li>
                            <li><a href="#">Closure/ Clean up</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-link" id="v-inclass-tab" data-toggle="pill" href="#v-inclass" role="tab" aria-controls="v-inclass" aria-selected="false">In-Class Strategies</a>
                        <ul>
                            <li>
                                <button class="btn btn-red">Be prepared ahead of class</button>
                            </li>
                            <li><a href="#">Watercolour routine</a></li>
                            <li><a href="#">Use a consistent attention-getting cue</a></li>
                            <li><a href="#">Keep instructions short</a></li>
                            <li><a href="#">Provide appropriate choice</a></li>
                            <li><a href="#">Give specific feedback</a></li>
                            <li><a href="#">Use the right words</a></li>
                            <li><a href="#">Teach with enthusiasm</a></li>
                            <li><a href="#">Closure/ Clean up</a></li>
                            <li><a href="#">Watercolour routine</a></li>
                            <li><a href="#">Closure/ Clean up</a></li>

                        </ul>
                    </li>
                    <li>
                        <a class="nav-link" id="v-dresscode-tab" data-toggle="pill" href="#v-dresscode" role="tab" aria-controls="v-dresscode" aria-selected="false">Dresscode</a>
                    </li>
                    <li>
                        <a class="nav-link" id="v-lighting-tab" data-toggle="pill" href="#v-lighting" role="tab" aria-controls="v-lighting" aria-selected="false">Lighting & Camera Angles</a>
                    </li>
                    <li>
                        <a class="nav-link" id="v-punctuality-tab" data-toggle="pill" href="#v-punctuality" role="tab" aria-controls="v-punctuality" aria-selected="false">Punctuality</a>
                    </li>
                </ul>

            </div>
            <div class="col-8 pl-md-35" id="v-tabContent">
                <div class="tab-content">
                <div class="tab-pane fade show active" id="v-lesson-overview" role="tabpanel" aria-labelledby="v-lesson-overview-tab">
                    <h6>Lesson Overview</h6>
                    <h3>Introduction to Theme/Outcome</h3>
                    <hr>
                    <div class="youtube-video pos-res">
                        <div class="image">
                            <img src="{{ asset('frontend/images/img-2.png') }}" alt="play video" class="rounded-corner" height="340">
                        </div>
                        <div class="play-button"></div>
                        <div class="fluid-width-video-wrapper" style="padding-top: 100%;"><iframe class="iframe-video" src="https://www.youtube.com/embed/W_WBMSw_vFw" frameborder="0" allowfullscreen="" allow="autoplay" id="fitvid736042"></iframe></div>
                    </div>
                    <br><br>
                    <ul>
                        <li>Reference pictures MUST be shown to ensure the children are able to relate and are aware of what they will be creating.</li>
                        <li>Add value to your lesson by providing students with useful knowledge in line with the theme.</li>
                        <li>Encourage the students to share their prior knowledge and engage in a short discussion.
                        <li>Always recap and prompt the students on what they have learnt.</li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="v-inclass" role="tabpanel" aria-labelledby="v-inclass-tab">
                    <h6>In-Class Strategies</h6>
                    <h3>Be prepared ahead of class</h3>
                    <hr>
                    <div class="youtube-video pos-res">
                        <div class="image">
                            <img src="{{ asset('frontend/images/img-2.png') }}" alt="play video" class="rounded-corner" height="340">
                        </div>
                        <div class="play-button"></div>
                        <div class="fluid-width-video-wrapper" style="padding-top: 100%;"><iframe class="iframe-video" src="https://www.youtube.com/embed/W_WBMSw_vFw" frameborder="0" allowfullscreen="" allow="autoplay" id="fitvid736042"></iframe></div>
                    </div>
                    <br><br>
                    <ul>
                        <li>Before class begins, make sure that you have all of your materials are within easy reach and know your lesson inside and out</li>
                    </ul>

                </div>
                <div class="tab-pane fade" id="v-dresscode" role="tabpanel" aria-labelledby="v-dresscode-tab">
                    <h6>Dresscode</h6></div>
                <div class="tab-pane fade" id="v-lighting" role="tabpanel" aria-labelledby="v-lighting-tab"><h6>Lighting & Camera Angles</h6></div>
                <div class="tab-pane fade" id="v-punctuality" role="tabpanel" aria-labelledby="v-punctuality -tab"><h6>Punctuality</h6></div>
            </div>
              
      </div>
            </div>
        </div>
    </div>
</section>

@endsection
