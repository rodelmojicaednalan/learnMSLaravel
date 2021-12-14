{{-- Extends layout --}}

@extends('layout.default')



{{-- Content --}}

@section('content')



<div class="row">

    <div class="col-lg-6">

        <!--begin::Card-->

        <div class="card card-custom">

            <div class="card-header">

                <div class="card-title">

                    <h3 class="card-label">Manage Requirements</h3>

                </div>

            </div>

            <!--begin::Form-->

            <form>

                <div class="card-body">

                    <div class="form-group row">

                        <label class="col-lg-4 col-form-label">Minimum teaching hours:</label>

                        <div class="col-lg-6">

                            <input type="text" class="form-control" value="0">

        

                        </div>

                    </div>

                    <div class="form-group row">

                        <label class="col-lg-4 col-form-label">Membership sign-up fee (one-off):</label>

                        <div class="col-lg-6">

                            <input type="text" class="form-control" value="0">



                        </div>

                    </div>

                    <div class="form-group row">

                        <label class="col-lg-4 col-form-label">Membership renewal fee (annually):</label>

                        <div class="col-lg-6">

                            <input type="text" class="form-control" value="0">

                            {{-- <dropzone-vue></dropzone-vue> --}}

                        </div>

                    </div>

                </div>

                <div class="card-footer">

                    <div class="row">

                        <div class="col-lg-3"></div>

                        <div class="col-lg-9">

                            <button type="reset" class="btn btn-light-primary mr-2">Submit</button>

                            <button type="reset" class="btn btn-primary">Cancel</button>

                        </div>

                    </div>

                </div>

            </form>

            <!--end::Form-->

        </div>

        <!--end::Card-->

    </div>

</div>





@endsection



{{-- Styles Section --}}

@section('styles')

    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>

@endsection





{{-- Scripts Section --}}

@section('scripts')

    {{-- vendors --}}

    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>



    {{-- page scripts --}}





@endsection

