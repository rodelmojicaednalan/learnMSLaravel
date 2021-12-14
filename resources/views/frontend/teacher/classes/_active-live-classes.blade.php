@foreach ($programmes as $programme)
<div class="class-item"><!-- Start class item -->
    <div class="row position-relative">
        <div class="col-md-9">
            <h6>{{ $programme->title }}</h6>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 text-wrapper">
                            <p>{{ $programme->description }}</p>
                            <div class="item">
                                <label>Starting in:</label>
                                <span class="pl-1"><u>{{ isset($programme['classes'][0]['live_class'][0]['schedule_difference']) ? $programme['classes'][0]['live_class'][0]['schedule_difference'] : 'N/A' }}</u></span>
                            </div>
                            <div class="item">
                                <label>Number of students:</label>
                                <div class="dropdown dropdown-style-2">
                                    <a class="dropdown-toggle" href="#" role="button" id="eligibleStudents-dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        3
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="eligibleStudents-dropdown-2">
                                        <h5>Eligible Students</h5>
                                        <hr>

                                        <div class="dropdown-item">
                                            <div class="creater d-flex">
                                                <div class="col-auto p-0">
                                                    <img src="{{ asset('frontend/images/creater-image1.png') }}" class="rounded-circle" width="44">
                                                </div>
                                                <div class="col text-wrapper">
                                                    <h6 class="creater-name">Aye Mon</h6>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('frontend/images/like.png') }}" width="14">
                                                        <div class="like-count">10k</div>
                                                    </div>
                                                </div>
                                                <div class="col p-0 text-right">
                                                    <a href="#" class="red see-profile"><u>See Profile</u></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="creater d-flex">
                                                <div class="col-auto p-0">
                                                    <img src="{{ asset('frontend/images/creater-image2.png') }}" class="rounded-circle" width="44">
                                                </div>
                                                <div class="col text-wrapper">
                                                    <h6 class="creater-name">Mark</h6>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('frontend/images/like.png') }}" width="14">
                                                        <div class="like-count">10k</div>
                                                    </div>
                                                </div>
                                                <div class="col p-0 text-right">
                                                    <a href="#" class="red see-profile"><u>See Profile</u></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-item">
                                            <div class="creater d-flex">
                                                <div class="col-auto p-0">
                                                    <img src="{{ asset('frontend/images/creater-image2.png') }}" class="rounded-circle" width="44">
                                                </div>
                                                <div class="col text-wrapper">
                                                    <h6 class="creater-name">Mark</h6>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('frontend/images/like.png') }}" width="14">
                                                        <div class="like-count">10k</div>
                                                    </div>
                                                </div>
                                                <div class="col p-0 text-right">
                                                    <a href="#" class="red see-profile"><u>See Profile</u></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- End dropdown menu -->
                                </div><!-- End dropdown -->
                            </div>
                        </div><!-- End text wrapper -->
                        <div class="col-md-7 item-wrapper">
                            <div class="item">
                                <label>
                                    Tagged Curriculum:
                                </label>
                                <span>--</span>
                            </div><!-- End item -->
                            <div class="item">
                                <label>
                                    Date:
                                </label>
                                <span>
                                    {{ isset($programme->classes[0]->live_class[0]->formatted_start_date) ? $programme->classes[0]->live_class[0]->formatted_start_date : 'N/A' }}
                                </span>
                            </div><!-- End item -->
                            <div class="item">
                                <label>
                                    Time:
                                </label>
                                <span>
                                    {{ isset($programme->classes[0]->live_class[0]->formatted_start_time) ? $programme->classes[0]->live_class[0]->formatted_start_time : 'N/A' }} - {{ isset($programme->classes[0]->live_class[0]->formatted_end_time) ? $programme->classes[0]->live_class[0]->formatted_end_time : 'N/A' }}
                                </span>
                            </div><!-- End item -->
                            <div class="item">
                                <label>
                                    Creator:
                                </label>
                                <div class="dropdown dropdown-style-2">
                                    <a class="dropdown-toggle" href="#" role="button" id="schoolname-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{auth()->user()->first_name}}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="schoolname-dropdown">
                                        <h5>Teachers</h5>
                                        <hr>
                                        <div class="dropdown-item">
                                            <div class="creater d-flex">
                                                <div class="col-auto p-0">
                                                    <img src="{{ asset('frontend/images/creater-image1.png') }}" class="rounded-circle" width="44">
                                                </div>
                                                <div class="col text-wrapper">
                                                    <h6 class="creater-name red">{{ auth()->user()->first_name }}</h6>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('frontend/images/like.png') }}" width="14">
                                                        <div class="like-count">10k</div>
                                                    </div>
                                                </div>
                                                <div class="col p-0 text-right">
                                                    <a href="{{'/teacher/'.auth()->user()->id}}" class="red see-profile"><u>See Profile</u></a>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="dropdown-item">
                                            <div class="creater d-flex">
                                                <div class="col-auto p-0">
                                                    <img src="{{ asset('frontend/images/creater-image2.png') }}" class="rounded-circle" width="44">
                                                </div>
                                                <div class="col text-wrapper">
                                                    <h6 class="creater-name red">Clare</h6>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('frontend/images/like.png') }}" width="14">
                                                        <div class="like-count">10k</div>
                                                    </div>
                                                </div>
                                                <div class="col p-0 text-right">
                                                    <a href="#" class="red see-profile"><u>See Profile</u></a>
                                                </div>
                                            </div>
                                        </div> --}}

                                    </div>
                                </div>
                            </div><!-- End item -->
                            <div class="item">
                                <label>
                                    Price:
                                </label>
                                <span><b>${{ $programme->price }}</b></span>
                            </div><!-- End item -->

                        </div><!-- End item wrapper -->
                    </div><!-- End row -->
                </div><!-- End col -->
            </div><!-- End row -->
        </div><!--  End col 9 -->
        <div class="col-md-3 col-sm-12 image-wrapper d-flex">
            <div class="image-bg" style="background-image: url('{{ ($programme->cover_photo) ? \Storage::url('public/uploads/teacher/class/image/' . $programme->cover_photo) : asset('frontend/images/product-1.png') }}');">
            </div>
        </div><!--  End col 3 -->
        <div class="icon-action">
            <div class="dropdown dropdown-style-1">
                <a class="dropdown-toggle" href="#" role="button" id="action-edit-delete-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><!-- Note! action-edit-delete-"1,2,3" will becomes dynamic count -->
                    <img src="{{ asset('frontend/images/icon-3dots.png') }}" class="edit" alt="icon"/>
                </a>
                <div class="dropdown-menu" aria-labelledby="icon-action">
                    <a class="dropdown-item class_action" data-action="edit" href="javascript:void(0);" data-id="{{ $programme->id }}" data-toggle="modal" data-target="#edit-live-class-overlay">Edit</a>
                    <a class="dropdown-item class_action" data-action="delete" href="javascript:void(0);" data-id="{{ $programme->id }}" data-toggle="modal" data-target="#delete-class-overlay">Delete</a>
                </div>
            </div>
        </div><!--  End icon-action -->
    </div><!--  End row -->
    <div class="row">
        <div class="col-md-12 btn-wrapper">
            <a href="#">
                <button class="btn btn-red">
                    Start Class
                </button>
            </a>
        </div><!--  End col -->
    </div><!--  End row -->
</div><!-- End class item -->
@endforeach
<div id="live_class_paginate">
    {{ $programmes->onEachSide(2)->links() }}
</div>

