{{-- Extends layout --}}
@extends('frontend.layout.app')

{{-- Content --}}
@section('content')

<!-- Start banner slider -->
<section id="banner-slider-wrap">
    <div class="container-fulid ">
        <div class="banner-slider">
            <div class="banner-slide align-items-center">
                <div class="banner-image" style="background-image: url('{{ asset('frontend/images/home-banner-1.jpg') }}');">
                    <div class="container">
                        <div class="move-center-left">
                            <?php if(isset($_GET['forgot_pass']))
                             {
                             ?>
                            <input type="hidden" value="true" id="fpass">
                            <input type="hidden" value="<?php echo $_GET['email']; ?>" id="femail">
                             <?php
                             } else {
                            ?>
                            <input type="hidden" value="false" id="fpass">
                            <input type="hidden" value="" id="femail">
                            <?php
                             }
                             ?>

                             <?php if(isset($_GET['token']))
                             {
                                 if($_GET['token'] != "0")
                              {
                             ?>
                                <input type="hidden" value="true" id="reset_checker">
                                <input type="hidden" value="<?php echo $_GET['token'] ;?>" id="rtoken">
                             <?php
                              }
                            else {
                                ?>
                                <input type="hidden" value="false" id="reset_checker">
                                <input type="hidden" value="" id="rtoken">
                            <?php
                                }
                            }
                            ?>







                            <h2 class="banner-title align-items-center">Get to Know Us</h2>
                            <!-- <p class="banner-subtitle">Lorem ipsum dolor sit amet, Lorem ipsum dolor Lorem ipsum dolor</p> -->
                            <a href="about"><button class="btn btn-red">Find Out More</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-slide align-items-center">
                <div class="banner-image" style="background-image: url('{{ asset('frontend/images/home-banner-1.jpg') }}');">
                    <div class="container">
                        <div class="move-center-left">
                            <h2 class="banner-title align-items-center">Get to Know Us</h2>
                            <!-- <p class="banner-subtitle">Lorem ipsum dolor sit amet, Lorem ipsum dolor Lorem ipsum dolor</p> -->
                            <a href="about"><button class="btn btn-red">Find Out More</button></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- End banner slider -->

<!-- Start right-video-left-text -->
<section class="pb-0">
    <div class="container right-video-left-text">
        <div class="row flex-row-reverse align-items-center">
            <div class="col-md-6 youtube-video pos-res">
                <div class="image">
                    <img src="{{ asset('frontend/images/img-2.png') }}" alt="play video" class="rounded-corner"
                        height="340">
                </div>
                <div class="play-button"></div>
                <iframe class="iframe-video" src="https://www.youtube.com/embed/W_WBMSw_vFw" width="100%" height="100%"
                    frameborder="0" allowFullScreen allow="autoplay"></iframe>

            </div>
            <div class="col-md-6">
                <div class="row mt-3">
                    <div class="col-8">
                        <h3>How This Works</h3>
                    </div>
                    <div class="col-4 text-right read-more-wrap">
                        <a href="how-to-learn" class="read-more">Read More<img
                                src="{{ asset('frontend/images/ic-chevron-down.png') }}" alt="icon" /></a>
                    </div>
                </div>
                <p>Our creative team of artists, trained educators and inspiring administrators are dedicated to teaching little and big people by helping them from the first moment they 'walk through the door'. At Orca, we believe that it doesn't matter how old you are but about you taking part and discovering the teacher in you.</p>
                <p>The aim of this platform is to provide students with a self-development platform, designed to increase their confidence, training skills and creative talents through a carefully constructed syllabus. However, this is not a talent show (nor a tuition agency) and it is important to stress that it is not our aim to be anyone's agency, but rather to help everyone realise their potential to nurture and educate our next generation.</p>
            </div>
        </div>
    </div>
</section>
<!-- End right-video-left-text -->

<!-- Start left-image-right-text -->
<section class="pb-0">
    <div class="container left-image-right-text">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('frontend/images/img-1.png') }}" alt="image" class="rounded-corner" />
            </div>
            <div class="col-md-6">
                <div class="row mt-3">
                    <div class="col-8">
                        <h3>How Teaching Works</h3>
                    </div>
                    <div class="col-4 text-right read-more-wrap">
                        <a href="how-to-teach" class="read-more">Read More<img
                                src="{{ asset('frontend/images/ic-chevron-down.png') }}" alt="icon" /></a>
                    </div>
                </div>
                <p>ORCA is a holistic teaching platform that aims to provide Trainers (even for those who thinks they can't) with the training needed to conduct your own classes and the necessary tools to grow your classes internationally.</p>


            </div>
        </div>
    </div>
</section>
<!-- End left-image-right-text -->

<!-- Start Products -->

<section id="our-products" class="product-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- <h3>Products</h3> -->
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-learn-tab" data-toggle="tab" href="#nav-learn"
                            role="tab" aria-controls="nav-learn" aria-selected="true">Learn With Us</a>
                        <a class="nav-item nav-link" id="nav-teach-tab" data-toggle="tab" href="#nav-teach" role="tab"
                            aria-controls="nav-teach" aria-selected="false">Teach With Us</a>
                    </div>
                </nav>
                <div class="tab-content px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-learn" role="tabpanel"
                        aria-labelledby="nav-learn-tab">
                        <div class="row">
                            <div class="col-8">
                                <h3>Classes</h3>
                            </div>
                            <div class="col-4 text-right read-more-wrap">
                                <a href="classes" class="read-more">Read More<img src="{{ asset('frontend/images/ic-chevron-down.png') }}" alt="icon"></a>
                            </div>
                        </div>
                        <div class="row m-tab-slider">
                            @foreach ($classes as $item)
                                <div class="col-md-3">
                                    <div class="product-item">
                                        <div class="image">
                                            <img src="{{ asset('frontend/images/product-1.png') }}" alt="product name" class="rounded">
                                        </div>
                                        <div class="move-text-left-top">
                                            <?=$item['class_type'] == 'pre_recorded_class' ? '<div class="tag bg-orange">Pre-Recorded</div>' : '<div class="tag bg-red">Live Class</div>'?>
                                        </div>
                                        <div class="creater">
                                            <img src="{{ asset('frontend/images/creater-image.png') }}" class="rounded-circle">
                                            <h6 class="creater-name">{{isset($item['creator']) ? $item['creator']['first_name']. ' ' .$item['creator']['last_name'] : 'N/A'}}</h6>
                                        </div>
                                        <h5> {{isset($item['title']) ? $item['title'] : 'Not Available'}}</h5>
                                        <p class="desc">{{isset($item['description']) ? Str::limit($item['description'], 60) : 'Not Description Available'}} </p>
                                        <div class="row">
                                            <div class="price col-6">
                                                {{isset($item['price']) ? $item['price'] . ' ' . 'SGD' : 'N/A'}} 
                                            </div>
                                            <div class="col-6 text-right">
                                            <a href='<?=$item['class_type'] == 'live_class' ? '/class/live/' . $item['id'] : '/class/pre-recorded/' .$item['id'] ?>'>
                                                <button class="btn btn-secondary">
                                                    Buy Now
                                                </button>
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="tab-pane fade" id="nav-teach" role="tabpanel" aria-labelledby="nav-teach-tab">
                        <div class="row">
                            <div class="col-8">
                                <h3>Curriculum</h3>
                            </div>
                            <div class="col-4 text-right read-more-wrap">
                                <a href="curriculum" class="read-more">Read More<img src="{{ asset('frontend/images/ic-chevron-down.png') }}" alt="icon"></a>
                            </div>
                        </div>
                        <div class="row m-tab-slider">
                            @foreach ($curriculum_list as $curriculum)
                                <div class="col-md-3">
                                    <div class="product-item">
                                        <div class="image">
                                            <img src="{{ asset('frontend/images/product-1.png') }}" alt="product name" class="rounded">
                                        </div>
                                        <div class="move-text-left-top">
                                            <div class="tag bg-red">
                                                {{isset($curriculum['category']['level']['name']) ? $curriculum['category']['level']['name'] : 'N/A'}}</div>
                                        </div>
                                        <div class="creater">
                                            <img src="{{ asset('frontend/images/creater-image.png') }}" class="rounded-circle">
                                            <h6 class="creater-name">
                                                {{isset($curriculum['school']['school_name']) ? $curriculum['school']['school_name'] : 'N/A'}}</h6>
                                        </div>
                                        <h5> {{isset($curriculum['category']['subject']) ? $curriculum['category']['subject'] : 'N/A'}}
                                        </h5>
                                        <p class="desc">
                                            {{isset($curriculum['category']['type']) ? $curriculum['category']['type'] : 'N/A'}}
                                        </p>
                                        <div class="row">
                                            <div class="price col-6">
                                                {{isset($curriculum['fee']) ? $curriculum['fee'] . 'SGD' : 'N/A'}}
                                            </div>
                                            <div class="col-6 text-right">
                                                <a href=" {{ url('/school/live-class-detail') }}">
                                                    <button class="btn btn-secondary">
                                                        Buy Now
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Products -->

<!-- Start latest News -->
<section id="latest-news">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h3>Latest News</h3>
            </div>
            <div class="col-4 text-right read-more-wrap">
                <a href="#" class="read-more">Go to Blog<img src="{{ asset('frontend/images/ic-chevron-down.png') }}"
                        alt="icon" /></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="left-blog pos-res">
                    <img src="{{ asset('frontend/images/blog-1.png') }}" alt="blog title" class="rounded" />
                    <div class="move-text-left-top">
                        <div class="tag">Crafting tips</div>
                    </div>
                    <div class="move-text-left-bottom">
                        <h4>Our teachers tips for a great and creative craft ready in 20 minutes</h4>
                        <div class="creater">
                            <!-- <img src="{{ asset('frontend/images/placeholder-eclipse.png') }}" class="rounded-circle"
                                width="24" height="24" alt="Author Image" />
                            <h6>Author</h6> -->
                            <div class="date">10. 6. 2021</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="blogs blogs-1 ">
                    <img src="{{ asset('frontend/images/blog-2.png') }}" alt="blog title" class="rounded" />
                    <div class="tag">Painting</div>
                    <h5>Which colour paint your child will love</h5>
                    <div class="creater">
                        <!-- <h6>Author</h6> -->
                        <div class="date">15. 6. 2021</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row blogs blogs-2">
                    <div class="col-8">
                        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h5>
                        <div class="creater">
                            <!-- <h6>Author</h6> -->
                            <div class="date">14.1.2021</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <img src="{{ asset('frontend/images/blog-3.png') }}" width="96" />
                    </div>
                </div>
                <div class="row blogs blogs-2">
                    <div class="col-8">
                        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h5>
                        <div class="creater">
                            <!-- <h6>Author</h6> -->
                            <div class="date">10. 6. 2021</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <img src="{{ asset('frontend/images/blog-4.png') }}" alt="blog title" class="rounded"
                            width="96" />
                    </div>
                </div>
                <div class="row blogs blogs-2 mb-0">
                    <div class="col-8">
                        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h5>
                        <div class="creater">
                            <!-- <h6>Author</h6> -->
                            <div class="date">10. 6. 2021</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <img src="{{ asset('frontend/images/blog-5.png') }}" alt="blog title" class="rounded"
                            width="96" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


