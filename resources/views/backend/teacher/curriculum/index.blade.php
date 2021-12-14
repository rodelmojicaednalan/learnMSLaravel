{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="row">
    <div class="col-lg-12">
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                <h3 class="card-label">Manage Curriculums
                <span class="d-block text-muted pt-2 font-size-sm"></span></h3>
                </div>
            </div>
            <!--begin::Form-->

            <div class="card-body">

                <div class="row">
                    <div class="col-md-2">
                    <!-- Tabs nav -->
                        <div class="nav flex-column nav-pills nav-pills-custom" id="subjects_tab" role="tablist" aria-orientation="vertical">
                            <!-- <a class="nav-link mb-3 p-3 shadow active" id="v-pills-speech-tab" data-toggle="pill" href="#v-pills-speech" role="tab" aria-controls="v-pills-speech" aria-selected="true">
                            <i class="fa fa-user-circle-o mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Speech and Drama</span>
                            </a>

                            <a class="nav-link mb-3 p-3 shadow" id="v-pills-arts-tab" data-toggle="pill" href="#v-pills-arts" role="tab" aria-controls="v-pills-arts" aria-selected="false">
                            <i class="fa fa-calendar-minus-o mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Arts Class</span>
                            </a>                   -->
                        </div>
                    </div>


                    <div class="col-md-2">
                        <!-- Tabs content -->
                        <div class="tab-content" id="levels_tab">


                            <!-- <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-speech" role="tabpanel" aria-labelledby="v-pills-speech-tab">


                                <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <h5 class="font-italic mb-4">Speech and Drama</h5>
                                    <a class="nav-link mb-3 p-3 shadow active" id="v-pills-speech-level1-tab" data-toggle="pill" href="#v-pills-speech-level1" role="tab" aria-controls="v-pills-speech-level1" aria-selected="true">
                                        <i class="fa fa-star mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Level 1</span>
                                    </a>

                                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-speech-level2-tab" data-toggle="pill" href="#v-pills-speech-level2" role="tab" aria-controls="v-pills-speech-level2" aria-selected="false">
                                        <i class="fa fa-star mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Level 2</span></a>

                                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-speech-level3-tab" data-toggle="pill" href="#v-pills-speech-level3" role="tab" aria-controls="v-pills-speech-level3" aria-selected="false">
                                        <i class="fa fa-star mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Level 3</span></a>

                                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-speech-level4-tab" data-toggle="pill" href="#v-pills-speech-level4" role="tab" aria-controls="v-pills-speech-level4" aria-selected="false">
                                        <i class="fa fa-star mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Level 4</span>
                                    </a>
                                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-speech-level5-tab" data-toggle="pill" href="#v-pills-speech-level5" role="tab" aria-controls="v-pills-speech-level5" aria-selected="false">
                                        <i class="fa fa-star mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Level 5</span>
                                    </a>
                                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-speech-level6-tab" data-toggle="pill" href="#v-pills-speech-level6" role="tab" aria-controls="v-pills-speech-level6" aria-selected="false">
                                        <i class="fa fa-star mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Level 6</span>
                                    </a>
                                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-speech-level7-tab" data-toggle="pill" href="#v-pills-speech-level7" role="tab" aria-controls="v-pills-speech-level7" aria-selected="false">
                                        <i class="fa fa-star mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Level 7</span>
                                    </a>

                                 </div>

                            </div>
                            <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-arts" role="tabpanel" aria-labelledby="v-pills-arts-tab">


                                <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <h5 class="font-italic mb-4">Arts Class</h5>
                                    <a class="nav-link mb-3 p-3 shadow " id="v-pills-arts-level1-tab" data-toggle="pill" href="#v-pills-arts-level1" role="tab" aria-controls="v-pills-arts-level1" aria-selected="true">
                                        <i class="fa fa-star mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Level 1</span>
                                    </a>

                                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                        <i class="fa fa-star mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Level 2</span></a>

                                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                        <i class="fa fa-star mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Level 3</span></a>

                                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                                        <i class="fa fa-star mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Level 4</span></a>
                                 </div>
                            </div>   -->


                        </div>

                    </div>

                    <div class="col-md-8">
                        <!-- Tabs content -->
                        <div class="tab-content" id="v-pills-tabContent">

                            <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-speech-level1" role="tabpanel" aria-labelledby="v-pills-speech-level1-tab">
                              <div id="upload_content" style="display:none;">
                                <h4 class="font-italic mb-4" id="upload_header"></h4>
                                <div class="card card-custom">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-lg-12">

                                                <div class="datatable datatable-bordered datatable-head-custom kt_datatable" id="kt_datatable"></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <!--end::Form-->
        </div>
        <!--end::Card-->
    </div>




</div>


@endsection




{{-- Styles Section --}}
@section('styles')
    {{-- <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/> --}}
@endsection


{{-- Scripts Section --}}
@section('scripts')
    {{-- vendors --}}
    {{-- <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script> --}}
    {{-- <script src="{{ asset('js/pages/crud/ktdatatable/base/html-table.js') }}" type="text/javascript"></script> --}}

    {{-- page scripts --}}

    <script>
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var datatable;
var global_level_id = 0;
var level_click_counter = 0;
var page_reload = 0;
// var myDropzone;


var KTDatatableRemoteAjaxDemo = function() {
    // Private functions

    // basic demo
    var demo = function() {



         datatable = $('#kt_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: 'curriculum/ajax/curriculum-list',
                        data:{
                        level_id: function() { return global_level_id },
                        _token: function() { return CSRF_TOKEN },
                        // level_id: global_level_id,
                        // _token: CSRF_TOKEN,
                        },
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        // sample custom headers
                        // headers: {'x-my-custom-header': 'some value', 'x-test-header': 'the value'},
                        map: function(raw) {
                            // sample data mapping
                            var dataSet = raw;
                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;
                            }
                            return dataSet;
                        },
                    },
                },
                pageSize: 10,
                serverPaging: true,
                serverFiltering: true,
                serverSorting: true,
            },

            // layout definition
            layout: {
                scroll: false,
                footer: false,
            },

            // column sorting
            sortable: true,

            pagination: true,

            search: {
                input: $('#kt_datatable_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [{
                field: 'name',
                title: 'Name',
                template: function(row) {
                    return `<a download href="{{ asset('upload_img') }}/${row.path}" target="_blank">${row.name}</a>`;
                }
            }, {
                field: 'type',
                title: 'type',
            }, {
                field: 'view_type',
                title: 'Access',
            }, {
                field: 'size',
                title: 'Size',
            }, {
                field: 'updated_at',
                title: 'Last Modified',
                type: 'date',
                template: function(row) {
                    return moment(row.updated_at).format('DD MMMM YYYY');
                }
            }],

        });

        $('#kt_datatable_search_role').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'role');
        });

       $('#kt_datatable_search_gender').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'gender');
        });



        $('#kt_datatable_search_role').selectpicker();
    };

    return {
        // public functions
        init: function() {
            demo();
        },
    };
}();



$(document).on('click','.action_user',function(e)
{
    e.preventDefault();

 var action = $(this).attr('data-action');



 if(action == "show_levels")
 {
    $('#upload_content').hide();
    var id = $(this).attr('data-id');
    $('.levels_tab_arr').removeClass('show active');
    $('#'+id).addClass("show active");
 }

 if(action == "levels_click")
 {

    var id = $(this).attr('data-id');
    var number = $(this).attr('data-number');
    var subject = $(this).attr('data-subject');
    global_level_id = id;
    $('.levels_click_arr').removeClass('active');
    $(this).addClass('active');

    var upload_txt = subject + " - Level " + number;
    $('#upload_header').text(upload_txt);

    $('#upload_content').show();

    if(level_click_counter == 0)
    {
        // KTDatatableRemoteAjaxDemo.init();

        level_click_counter++;

    }
    else {
        datatable.reload();
    }





 }

});



function load_subjects()
{
    $('#subjects_tab').html("");
    // $('#levels_tab').html("");
    $.ajax({
        type:'POST',
        url: 'curriculum/ajax/subjects_list',
        dataType:"json",
        data:{
           _token: CSRF_TOKEN,
        },
        success:function(data)
        {
            console.log(data);
            var tmp_arr = data;
              console.log(tmp_arr);

              for(var x=0; x < tmp_arr.length; x++)
              {
                var tab_id = "subject_"+tmp_arr[x].id;
                var href_id = tmp_arr[x].id + "_subject";

                var get_lvlid=0;


                $('#subjects_tab').append('<a class="nav-link mb-3 p-3 shadow subjects_tab_arr action_user" id="'+ tab_id +'" data-id="'+href_id+'" data-action="show_levels" id="v-pills-speech-tab" data-toggle="pill" href="#'+ href_id +'" role="tab" aria-controls="v-pills-speech" aria-selected="true">'+
                '<i class="fa fa-user-circle-o mr-2"></i>'+
                '<span class="font-weight-bold small text-uppercase">'+ tmp_arr[x].subject +'</span>'+
                '</a>');

                 var levels_arr  = tmp_arr[x].levels;




                var levels_content_id = "levels_" + tmp_arr[x].id;
                        $('#levels_tab').append('<div class="tab-pane fade shadow rounded bg-white p-5 levels_tab_arr action_user" id="'+ href_id +'" role="tabpanel" aria-labelledby="v-pills-arts-tab">'+
                        '<div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">'+
                        '<h5 class="font-italic mb-4">'+ tmp_arr[x].subject +'</h5>'+
                        '<div id="'+ levels_content_id +'"></div>'+
                        '</div>'+
                        '</div>');

                    for(var z=0; z < levels_arr.length; z++)
                    {

                        var level_txt = "Level " +  levels_arr[z].number + " - " + levels_arr[z].name;
                        var make_id = "lvl_id"+x +""+z;


                        if(z == 0 && x == 0)
                        {
                            global_level_id = levels_arr[z].id;
                            get_lvlid = make_id;
                        }

                         $('#'+levels_content_id).append('<a class="nav-link mb-3 p-3 shadow levels_click_arr action_user" id="'+ make_id +'" data-number="'+ levels_arr[z].number  +'" data-subject="'+ tmp_arr[x].subject  +'" data-id="'+ levels_arr[z].id +'" data-action="levels_click" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">'+
                            '<i class="fa fa-star mr-2"></i>'+
                            '<span class="font-weight-bold small text-uppercase">'+ level_txt +'</span></a>');

                    }


                    if(x == 0)
                    {
                    $('.levels_tab_arr').removeClass('active');
                    $('#'+ href_id).addClass('show active');
                    $('#'+ tab_id).addClass("show active");


                    $('.levels_click_arr').removeClass('active');
                    $('#' + get_lvlid).addClass('active');
                    $('#upload_content').show();
                    KTDatatableRemoteAjaxDemo.init();

                    }


                    // if(x == 0)
                    // {

                    // $('#'+tab_id).addClass("active");
                    // $('.levels_tab_arr').removeClass('show active');
                    // $('#'+href_id).addClass("show active");


                    // }

              }




        }
    });

}


$(document).ready(function() {
    load_subjects();

});



    </script>


@endsection
