<?php $sub_total = 0; ?>
@foreach( $cart as $item )
    <div class="class-item"><!-- Start class item -->
        <div class="row">
            <div class="col-md-9">
                <h6>{{ $item->class_details->title }}</h6>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 text-wrapper">
                                <div class="item">
                                    <label>
                                        Duration:
                                    </label>
                                    <!-- total hours of videos -->
                                    <span><b>3h 3mins</b></span>
                                </div><!-- End item -->
                                <div class="item">
                                    <label>
                                        Total videos:
                                    </label>
                                    <div class="pl-1 dropdown dropdown-style-2 video-dropdown-wrapper">
                                        <a class="dropdown-toggle" href="#" role="button" id="video-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ count( $item->class_schedule_count) }}
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="video-dropdown">
                                            <div class="left-wrapper">
                                                <h5>Title</h5>
                                            </div>
                                            <div class="right-wrapper">
                                                <h5>Duration</h5>
                                            </div>
                                            
                                            <hr>
                                            @foreach ( $item->class_schedule_count as $schedule_class)

                                            <a class="dropdown-item video-item">
                                                <div class="left-wrapper">
                                                    <img src="http://127.0.0.1:8080/frontend/images/icon-play.png" class="rounded-circle" width="20">
                                                    <h6 class="title">{{ $schedule_class->class_name }}</h6>
                                                </div>
                                                <div class="right-wrapper red">
                                                    40 min
                                                </div>
                                            </a>
                                            
                                            @endforeach
                                        </div>
                                    </div>
                                </div><!-- End item -->
                            </div><!-- End text wrapper -->
                            <div class="col-md-6 item-wrapper">
                                <div class="item">
                                    <label>
                                        Tagged Curriculum:
                                    </label>
                                    <span><b>Drawing Shapes</b></span>
                                </div><!-- End item -->
                                <div class="item">
                                    <label>
                                        Creator:
                                    </label>
                                    <span><img src="http://127.0.0.1:8080/frontend/images/creater-image1.png" width="16" height="16"> <a href="/teacher/{{ $item->class_details->user_id }}" class="red text-decoration-underline">{{  $item->class_details->creator->fullname }}</a></span>
                                </div><!-- End item -->
                            </div><!-- End item wrapper -->
                            
                        </div><!-- End row -->
                    </div><!-- End col -->
                </div><!-- End row -->
            </div><!-- End col 9 -->
            <div class="col-md-3 col-sm-12 image-wrapper">
                <div class="image-bg" style="background-image: url('{{ asset('frontend/images/product-1.png') }}');">
                </div>
                
            </div><!-- End col 3 -->
        </div><!-- End row -->
        <div class="row price-item-wrapper">
            <div class="col-9">
                <div class="item">
                    <label>Price:</label>
                    <span class="red">{{ $item->class_details->price }} USD <strike>48.56 USD</strike></span>
                        <?php  $sub_total += $item->class_details->price; ?>
                </div>
            </div>
            <div class="col-3">
                <div class="action-remove text-right">
                    <a href="javascript:void(0)" id="remove-cart-item" data-toggle="modal" data-id="{{ $item->id }}"><img src="{{ asset('frontend/images/ic-actions-close-simple.png') }}"><span>Remove</span></a>
                </div>
            </div>
        </div>
    </div><!-- End class item -->
@endforeach