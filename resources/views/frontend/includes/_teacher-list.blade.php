
    <div class="row">
        @foreach ($teacher_list as $teacher)
            <div class="col-md-6 ">
                <div class="creater row">
                    <div class="col-auto">
                        <img src="{{ asset('frontend/images/creater-image1.png') }}" class="rounded-circle" width="64"
                            height="64" alt="Username">
                    </div>
                    <div class="col-auto pl-0">
                        <h6 class="creater-name">{{$teacher->getFullnameAttribute()}}</h6>
                        <img src="{{ asset('frontend/images/like.png') }}" width="22" alt="icon">
                        <span class="like-count">10k</span>
                    </div>
                </div>
                <div class="about-descrption">
                    <p>
                        @if (isset($teacher['teacherDetails']))

                            @if ($teacher['teacherDetails']['description'] !== null)

                                {{$teacher['teacherDetails']['description']}}

                            @else

                                No Description Available

                            @endif

                        @else

                            No Description Available

                        @endif
                    </p>
                </div>
                <a href="/teacher/{{$teacher['id']}}" class="read-profile">See Full Profile</a>
            </div>
        @endforeach
    </div>
    <div class="mt-3">
        {{$teacher_list->links()}}
    </div>