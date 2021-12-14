<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Manage Private Classes
            </h3>
        </div>
    </div>
    <div class="card-body">
        <!--begin::Search Form-->
        <div class="mt-2 mb-5 mt-lg-5 mb-lg-10">
            <div class="row align-items-center">
                <div class="col-lg-9 col-xl-8">
                    <div class="row align-items-center">
                        <div class="col-md-12 my-2 my-md-0">
                            <div class="input-icon">
                                <input type="text" class="form-control" placeholder="Search..." id="private_class_datatable_search_query"/>
                                <span><i class="flaticon2-search-1 text-muted"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Search Form-->
        <div class="datatable datatable-bordered datatable-head-custom" id="private-class"></div>
    </div>
</div>

<div class="card card-custom mt-10">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Manage Public Classes
            </h3>
        </div>
    </div>
    <div class="card-body">
        <!--begin::Search Form-->
        <div class="mt-2 mb-5 mt-lg-5 mb-lg-10">
            <div class="row align-items-center">
                <div class="col-lg-9 col-xl-8">
                    <div class="row align-items-center">
                        <div class="col-md-12 my-2 my-md-0">
                            <div class="input-icon">
                                <input type="text" class="form-control" placeholder="Search..." id="public_class_datatable_search_query"/>
                                <span><i class="flaticon2-search-1 text-muted"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Search Form-->
        <div class="datatable datatable-bordered datatable-head-custom" id="public-class"></div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Request Grading<h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">



        <div class="form-group">
                    <label>Children</label>
                    <select class="form-control" id="txt_children">
                    @foreach($childrens as $children)
                    <option value="{{ $children->id }}">{{ $children->firstname }}</option>
                    @endforeach
                    </select>
            </div>



            <div class="form-group">
            <label>Subjects</label>
            <div class="checkbox-inline">
                    @foreach($subjects as $subject)
                        <label class="checkbox">
                        <input type="checkbox" class="arr_subjects"  value="{{ $subject->id }}" />
                        <span></span>{{ $subject->subject }}</label>


                    @endforeach

            </div>
            <span class="form-text text-muted">Some help text goes here</span>
            </div>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="btnRequest">Request</button>

        </div>
        </div>
    </div>
    </div>
