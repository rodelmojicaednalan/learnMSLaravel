@foreach ($classes as $class)
    <div class="class-item"><!-- Start class item -->
        <div class="row position-relative">
            <div class="col-md-9">
                <h6>{{ $class->title }}</h6>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-5 col-sm-12 text-wrapper">
                                <p>{{ $class->description }}</p>

                                <div class="item"><!-- Different value for pre recorded and live -->
                                    <label>Number of items sold:</label>
                                    <span class="pl-1">--</span>
                                </div><!-- End item -->
                            </div><!-- End text wrapper -->
                            <div class="col-md-7 item-wrapper">
                                <div class="item">
                                    <label>
                                        Tagged Curriculum:
                                    </label>
                                    <!-- if null put '-' and remove red class--><span>-</span><!-- <span><u  class="red">Drawing Shapes</u></span> -->

                                </div><!-- End item -->
                                <div class="item">
                                    <label>
                                        Total videos :
                                    </label>
                                    <div class="dropdown dropdown-style-2 video-dropdown-wrapper">
                                        <a class="dropdown-toggle" href="#" role="button" id="video-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ count($class->preRecordedVideos) }}
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="video-dropdown">

                                            <div class="left-wrapper">
                                                <h5>Title</h5>
                                            </div>
                                            <div class="right-wrapper">
                                                <h5>Duration</h5>
                                            </div>

                                            <hr>
                                            @if (count($class->preRecordedVideos) > 0)
                                                @foreach ($class->preRecordedVideos as $video)
                                                    <a class="dropdown-item video-item">
                                                        <div class="left-wrapper">
                                                            <img src="{{ asset('frontend/images/icon-play.png') }}" class="rounded-circle" width="20">
                                                            <h6 class="title">{{ $video->class_name }}</h6>
                                                        </div>
                                                        <div class="right-wrapper red">
                                                            --
                                                        </div>
                                                    </a>
                                                @endforeach
                                            @else
                                                <h6 class="title">No videos uploaded</h6>
                                            @endif

                                        </div>
                                    </div>
                                </div><!-- End item -->
                                <div class="item">
                                    <label>
                                        Duration:
                                    </label>
                                    <!-- total hours of videos -->
                                    <span>--</span>
                                </div><!-- End item -->
                                <div class="item">
                                    <label>
                                        Creator:
                                    </label>
                                    <span><b>{{ $class->user->full_name }}</b></span>
                                </div><!-- End item -->
                                <div class="item">
                                    <label>
                                        Price:
                                    </label>
                                    <span><b>${{ number_format($class->price, 2, '.', ',') }}</b></span>
                                </div><!-- End item -->
                            </div><!-- End item wrapper -->
                        </div><!-- End row -->
                    </div><!-- End col -->
                </div><!-- End row -->
            </div><!-- End col 9 -->

            <div class="col-md-3 col-sm-12 image-wrapper d-flex">
                <div class="image-bg" style="background-image: url('{{ ($class->cover_photo) ? \Storage::url('public/uploads/teacher/class/image/' . $class->cover_photo) : asset('frontend/images/product-1.png') }}');">
                </div>
            </div><!-- End col 3 -->
            <div class="icon-action">
                <div class="dropdown dropdown-style-1">
                    <a class="dropdown-toggle" href="#" role="button" id="action-edit-delete-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><!-- Note! action-edit-delete-"1,2,3" will becomes dynamic count -->
                        <img src="{{ asset('frontend/images/icon-3dots.png') }}" class="edit" alt="icon"/>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="icon-action">
                        <a class="dropdown-item class_action" data-action="edit" href="javascript:void(0);" data-id="{{ $class->id }}" data-toggle="modal" data-target="#edit-pre-recorded-overlay">Edit</a>
                        <a class="dropdown-item class_action" data-action="delete" data-type="pre_recorded"  href="javascript:void(0);" data-toggle="modal" data-id="{{ $class->id }}" data-target="#delete-class-overlay">Delete</a>
                    </div>
                </div>
            </div><!-- End icon action -->
        </div>
    </div><!-- End class item -->
@endforeach

{{ $classes->onEachSide(2)->links() }}

{{-- <div class="row pagination-wrapper float-right">
    <div class="col-md-auto col-xs-4 col-sm-6 first">
        <ul class="pagination controls">
            <li class="page-item">
                <a class="page-link btn btn-primary" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item">
                <a class="page-link btn btn-primary" href="#">Next</a>
            </li>
        </ul>
    </div><!-- End col -->
    <div class="col-md-auto col-xs-4 col-sm-6 second">
        <label>Page:</label>
        <nav aria-label="Page navigation" class="pagination-nav">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
            </ul>
        </nav>
    </div><!-- End col -->

</div><!-- End row pagination --> --}}
