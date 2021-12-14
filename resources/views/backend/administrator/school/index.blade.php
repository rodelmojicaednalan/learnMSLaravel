{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

 


    <!--begin::Card-->
    <div class="card card-custom" id="main_page">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Manage School
                <span class="d-block text-muted pt-2 font-size-sm"></span></h3>
            </div>
            <div class="card-toolbar">
                {{-- <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline mr-2">
                    <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
                                <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>Export</button>
                    <!--begin::Dropdown Menu-->
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <!--begin::Navigation-->
                        <ul class="navi flex-column navi-hover py-2">
                            <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-print"></i>
                                    </span>
                                    <span class="navi-text">Print</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-copy"></i>
                                    </span>
                                    <span class="navi-text">Copy</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-excel-o"></i>
                                    </span>
                                    <span class="navi-text">Excel</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-text-o"></i>
                                    </span>
                                    <span class="navi-text">CSV</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-pdf-o"></i>
                                    </span>
                                    <span class="navi-text">PDF</span>
                                </a>
                            </li>
                        </ul>
                        <!--end::Navigation-->
                    </div>
                    <!--end::Dropdown Menu-->
                </div>
                <!--end::Dropdown--> --}}
                <!--begin::Button-->
                <a href="#" class="btn btn-primary font-weight-bolder action_user" data-action="add" data-toggle="modal" data-target="#exampleModal">
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <circle fill="#000000" cx="9" cy="15" r="6" />
                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>Add New School</a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Search Form-->
            <!--begin::Search Form-->
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-xl-6">
                        <div class="row align-items-center">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                                    <span>
                                        <i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                                </div>

                       
                            </div>
                           
                            <div class="col-md-4 my-2 my-md-0">
                                  <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
                            </div>

                            <!-- <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Gender:</label>
                                    <select class="form-control" id="kt_datatable_search_gender">
                                        <option value="">All</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>                                        
                                    </select>
                                </div>
                            </div> -->
                            
                        </div>
                    </div>
                    <!-- <div class="col-lg-4 col-xl-4 mt-5 mt-lg-0">
                        <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
                    </div> -->
                </div>
            </div>
            <!--end::Search Form-->
            <!--end: Search Form-->
            <!--begin: Datatable-->

             <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>

           
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->


        <!--begin::Card-->
        <div class="card card-custom" id="user_page" style="display:none;">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
            <h3 class="card-label" id="school_title">
                <span class="d-block text-muted pt-2 font-size-sm"></span></h3>
            </div>
            <div class="card-toolbar">
                {{-- <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline mr-2">
                    <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
                                <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>Export</button>
                    <!--begin::Dropdown Menu-->
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <!--begin::Navigation-->
                        <ul class="navi flex-column navi-hover py-2">
                            <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-print"></i>
                                    </span>
                                    <span class="navi-text">Print</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-copy"></i>
                                    </span>
                                    <span class="navi-text">Copy</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-excel-o"></i>
                                    </span>
                                    <span class="navi-text">Excel</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-text-o"></i>
                                    </span>
                                    <span class="navi-text">CSV</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-pdf-o"></i>
                                    </span>
                                    <span class="navi-text">PDF</span>
                                </a>
                            </li>
                        </ul>
                        <!--end::Navigation-->
                    </div>
                    <!--end::Dropdown Menu-->
                </div>
                <!--end::Dropdown--> --}}
                <!--begin::Button-->
                <a href="#" class="btn btn-primary font-weight-bolder action_user" data-action="add_teacher" data-toggle="modal" data-target="#teacherModal">
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <circle fill="#000000" cx="9" cy="15" r="6" />
                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>Add New Teacher</a>
                &nbsp;
                <a class="btn btn-success action_user" data-action="back_user">Back</a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
         
            <div class="mb-7">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-xl-6">
                            <div class="row align-items-center">
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                    </div>

                            
                                </div>
                                
                                <div class="col-md-4 my-2 my-md-0">
                                        <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
                                </div>

                        
                    </div>
                </div>
            

               
            

                
                <!--end: Datatable-->
                </div>
             </div>

             <div class="datatable datatable-bordered datatable-head-custom" id="users_datatable"></div>
        </div>
    </div>
    <!--end::Card-->


       <!--begin::Card-->
       <div class="card card-custom" id="curriculum_page" style="display:none;">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
            <h3 class="card-label">Manage Curriculum
                <span class="d-block text-muted pt-2 font-size-sm"></span></h3>
            </div>
            <div class="card-toolbar">
                {{-- <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline mr-2">
                    <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
                                <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>Export</button>
                    <!--begin::Dropdown Menu-->
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <!--begin::Navigation-->
                        <ul class="navi flex-column navi-hover py-2">
                            <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-print"></i>
                                    </span>
                                    <span class="navi-text">Print</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-copy"></i>
                                    </span>
                                    <span class="navi-text">Copy</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-excel-o"></i>
                                    </span>
                                    <span class="navi-text">Excel</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-text-o"></i>
                                    </span>
                                    <span class="navi-text">CSV</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-pdf-o"></i>
                                    </span>
                                    <span class="navi-text">PDF</span>
                                </a>
                            </li>
                        </ul>
                        <!--end::Navigation-->
                    </div>
                    <!--end::Dropdown Menu-->
                </div>
                <!--end::Dropdown--> --}}
                <!--begin::Button-->
       
                <a class="btn btn-success action_user" data-action="back_curriculum">Back</a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
         


             <div class="datatable datatable-bordered datatable-head-custom" id="curriculum_datatable"></div>
        </div>
    </div>
    <!--end::Card-->

    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="form_txt"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i aria-hidden="true" class="ki ki-close"></i>
            </button>
        </div>
        <div class="modal-body">

                    <div id="school_div">   
                        <h3>School Information</h3>
                        <hr>

                        <div class="form-group">
                        <label for="exampleInputEmail1">School Name</label>
                        <input type="text" class="form-control clear_data" id="txt_school" placeholder="School Name">
                        </div>

                        
                        <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control clear_data" id="txt_address" placeholder="Address">
                        </div>
                
                        <div class="form-group">
                        <label for="exampleInputEmail1">Website</label>
                        <input type="text" class="form-control clear_data" id="txt_website" placeholder="Website">
                        </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1">Company Registration No.</label>
                        <input type="text" class="form-control clear_data" id="txt_crn" placeholder="Company Registration No.">
                        </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <input type="text" class="form-control clear_data" id="txt_description" placeholder="Description">
                        </div>



                        <div class="form-group">
                        <label for="exampleInputEmail1">Logo</label>
                        <input type="file"  id="customFile" />
                        </div>

                    </div>

                    <div id="user_div">   

                        <h3>User Information</h3>
                        <hr>

                        <div class="form-group">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" class="form-control clear_data" id="txt_fname" placeholder="First Name">
                        </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input type="text" class="form-control clear_data" id="txt_lname" placeholder="Last Name">
                        </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control clear_data" id="txt_email" placeholder="Email">
                        </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1">Contact Number</label>
                        <input type="text" class="form-control clear_data" id="txt_contact" placeholder="Contact">
                        </div>

            

                        <div class="form-group">
                        <label for="exampleInputEmail1">Generate Password</label>
                        <input type="text" class="form-control clear_data" id="txt_password" placeholder="">
                        <button class="btn btn-success" onclick="generatePass('txt_password')">Generate Passowrd</button>
                        </div>

                    </div>
           
        </div>
        <div class="modal-footer">

            <button type="button" class="btn btn-primary" id="btnAdd">Save</button>
            <button type="button" class="btn btn-primary" style="display:none;" id="btnUpdate">Update</button>
        </div>
        </div>
    </div>
    </div>



       <!--begin::Card-->
       <div class="card card-custom" id="class_page" style="display:none;">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
            <h3 class="card-label">Manage Classes
                <span class="d-block text-muted pt-2 font-size-sm"></span></h3>
            </div>
            <div class="card-toolbar">
                {{-- <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline mr-2">
                    <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
                                <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>Export</button>
                    <!--begin::Dropdown Menu-->
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <!--begin::Navigation-->
                        <ul class="navi flex-column navi-hover py-2">
                            <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-print"></i>
                                    </span>
                                    <span class="navi-text">Print</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-copy"></i>
                                    </span>
                                    <span class="navi-text">Copy</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-excel-o"></i>
                                    </span>
                                    <span class="navi-text">Excel</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-text-o"></i>
                                    </span>
                                    <span class="navi-text">CSV</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-pdf-o"></i>
                                    </span>
                                    <span class="navi-text">PDF</span>
                                </a>
                            </li>
                        </ul>
                        <!--end::Navigation-->
                    </div>
                    <!--end::Dropdown Menu-->
                </div>
                <!--end::Dropdown--> --}}
                <!--begin::Button-->
                <a href="#" class="btn btn-primary font-weight-bolder action_user" data-action="add_class" data-toggle="modal" data-target="#classModal">
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <circle fill="#000000" cx="9" cy="15" r="6" />
                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>Add New Class</a>
                &nbsp;
                <a class="btn btn-success action_user" data-action="back_class">Back</a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
         
            <div class="mb-7">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-xl-6">
                            <div class="row align-items-center">
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                    </div>

                            
                                </div>
                                
                                <div class="col-md-4 my-2 my-md-0">
                                        <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
                                </div>

                        
                    </div>
                </div>
            

               
            

                
                <!--end: Datatable-->
                </div>
             </div>

             <div class="datatable datatable-bordered datatable-head-custom" id="class_datatable"></div>

        </div>
    </div>
    <!--end::Card-->


  <div class="modal fade" id="teacherModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="teacher_form_txt"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i aria-hidden="true" class="ki ki-close"></i>
            </button>
        </div>
        <div class="modal-body">

                

                <div id="teacher_info_div">   

                        <h3>User Information</h3>
                        <hr>

                        <div class="form-group">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" class="form-control clear_data" id="txt_fname2" placeholder="First Name">
                        </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input type="text" class="form-control clear_data" id="txt_lname2" placeholder="Last Name">
                        </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1">Contact Number</label>
                        <input type="text" class="form-control clear_data" id="txt_contact2" placeholder="Contact">
                        </div>


                        <div class="form-group">
                                <label for="name-of-institution">Name of Institution</label>
                                <input type="text" class="form-control" id="txt_schoolname2"
                                    placeholder="Type your name of institution">
                        </div>

                        <div class="form-group">
                            <label for="highest-education-qualification">Highest Education Qualification</label>
                            <select id="txt_diploma2" class="form-control">
                            <option value="Diploma">Diploma</option>
                            <option value="Postgraduate Diploma">Postgraduate Diploma</option>
                            <option value="Bachelor Degree">Bachelor Degree</option>
                            <option value="Master Degree or Above">Master Degree or Above</option>
                            </select>
                        </div>
                        

                        <div class="form-group">
                                <label for="txt_gender2" >Gender</label>
                                <select id="txt_gender2" class="form-control">
                                    <option value="0">Select your gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>  
                         </div>

                   

                    </div>

                <div id="teacher_account_div">
                    
                      <h3>Account Credential </h3>
                          <hr>

                       <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control clear_data" id="txt_email2" placeholder="Email">
                        </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1">Generate Password</label>
                        <input type="text" class="form-control clear_data" id="txt_password2" placeholder="">
                        <button class="btn btn-success" onclick="generatePass('txt_password2')">Generate Passowrd</button>
                        </div>
                </div>   
           
        </div>
        <div class="modal-footer">

            <button type="button" class="btn btn-primary" id="btnAddTeacher">Save</button>
            <button type="button" class="btn btn-primary" style="display:none;" id="btnUpdateTeacher">Update</button>
        </div>
        </div>
    </div>
    </div>


    

  <div class="modal fade" id="resourceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="resource_modal">Curriculum Resources</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i aria-hidden="true" class="ki ki-close"></i>
            </button>
        </div>
        <div class="modal-body">

            <div class="datatable datatable-bordered datatable-head-custom" id="resource_datatable"></div>  
           
        </div>
        <div class="modal-footer">

        </div>
        </div>
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
var datatable,users_datatable,curriculum_datatable,resource_datatable;
var users_click_counter=0;
var resource_click_counter=0;
var curriculum_click_counter=0;
var global_schoolid=0;
var global_currid=0;



var keylist="abcdefghijklmnopqrstuvwxyz123456789"
var temp=''


function generatePass(id)
{
  
  var get_id = id;
    $('#'+ get_id).val(generatePassword(10));
}

function generatePassword(passwordLength) {
  var numberChars = "0123456789";
  var upperChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  var lowerChars = "abcdefghijklmnopqrstuvwxyz";
  var allChars = numberChars + upperChars + lowerChars;
  var randPasswordArray = Array(passwordLength);
  randPasswordArray[0] = numberChars;
  randPasswordArray[1] = upperChars;
  randPasswordArray[2] = lowerChars;
  randPasswordArray = randPasswordArray.fill(allChars, 3);
  return shuffleArray(randPasswordArray.map(function(x) { return x[Math.floor(Math.random() * x.length)] })).join('');
}

function shuffleArray(array) {
  for (var i = array.length - 1; i > 0; i--) {
    var j = Math.floor(Math.random() * (i + 1));
    var temp = array[i];
    array[i] = array[j];
    array[j] = temp;
  }
  return array;
}

$(document).on('click','.action_user',function(e)
{
    e.preventDefault();

 var action = $(this).attr('data-action');


if(action == "back_user")
{
    $('#main_page').show();
    $('#user_page').hide();

}

if(action == "back_class")
{
    $('#main_page').show();
    $('#class_page').hide();

}


if(action == "back_curriculum")
{
    $('#main_page').show();
    $('#curriculum_page').hide();

}



 if(action == "add")
 {

     $('#school_div').show();
     $('#user_div').show();

    $('.clear_data').val("");

    $('#form_txt').text("Add School");
    $('#btnAdd').show();
    $('#btnUpdate').hide();
 }

 if(action == "add_teacher")
 {

    $('.clear_data').val("");
    $('#teacher_form_txt').text("Add Teacher");
    $('#btnAddTeacher').show();
    $('#btnUpdateTeacher').hide();
 }
 if(action == "update_teacher")
 {

    $('.clear_data').val("");
    $('#teacher_form_txt').text("Update Teacher");
    $('#btnAddTeacher').hide();
    $('#btnUpdateTeacher').show();

    $('#teacherModal').toggle('show');

    var id = $(this).attr('data-id');
    $.ajax({
        type:'POST',
        url: 'school/ajax/load_single_teacher',
        dataType:"json",
        data:{
            id: id,
           _token: CSRF_TOKEN,
        },
        success:function(data)
        {

         
            $('#txt_fname2').val(data.user.first_name);
            $('#txt_fname2').attr("old_email", data.user.email);
            $('#txt_fname2').attr("user_id", data.user.id);
            $('#txt_lname2').val(data.user.last_name);
            $('#txt_contact2').val(data.user.contact_number);
            $('#txt_gender2').val(data.user.gender);
            $('#txt_email2').val(data.user.email);
            $('#txt_password2').val(data.user.password);

            $('#txt_schoolname2').val(data.teacher.name_of_institution);
            $('#txt_diploma2').val(data.teacher.highest_education_qualification);
           
        }
    });
    
 }


 if(action == "open_resource_modal")
 {
  
    var id = $(this).attr('data-id');

    global_currid = id;



    if(resource_click_counter == 0)
    {
        ResourceDatatableRemoteAjaxDemo.init();

        resource_click_counter++;

    }
    else {
        resource_datatable.reload();
    }
 }
 if(action == "show_create_class")
 {
    $('#main_page').hide();
    $('#class_page').show();

 }
 if(action == "show_curriculum_page")
 {
    $('#main_page').hide();
    $('#curriculum_page').show();

    var id = $(this).attr('data-id');

    global_schoolid = id;



    if(curriculum_click_counter == 0)
    {
        CurriculumDatatableRemoteAjaxDemo.init();

        curriculum_click_counter++;

    }
    else {
        curriculum_datatable.reload();
    }


 }
 if(action == "show_user_page")
 {
    var id = $(this).attr('data-id');

    global_schoolid = id;

    
    if(users_click_counter == 0)
    {
        UsersDatatableRemoteAjaxDemo.init();

        users_click_counter++;

    }
    else {
        users_datatable.reload();
    }

    $.ajax({
        type:'POST',
        url: 'school/ajax/load_single_school',
        dataType:"json",
        data:{
            id: id,
           _token: CSRF_TOKEN,
        },
        success:function(data)
        {
            // console.log(data);
   
            $('#school_title').html("Manage " + data.school_name + " Users");       
       
        }
    });


     $('#main_page').hide();
     $('#user_page').show();

 }
 if(action == "update")
 {

    $('#school_div').show();
    $('#user_div').hide();

    $('#btnAdd').hide();
    $('#btnUpdate').show();

    $('#form_txt').text("Update School");
    var id = $(this).attr('data-id');


    $.ajax({
        type:'POST',
        url: 'school/ajax/load_single_school',
        dataType:"json",
        data:{
            id: id,
           _token: CSRF_TOKEN,
        },
        success:function(data)
        {
   
            $('#txt_school').val(data.school_name);
            $('#txt_school').attr("old_name", data.school_name);
            $('#txt_school').attr("old_img", data.logo);
            $('#txt_school').attr("school_id", data.id);
            $('#txt_address').val(data.address);
            $('#txt_description').val(data.description);
            $('#txt_website').val(data.website);
            $('#txt_crn').val(data.company_registration_number);

       
        }
    });



    $("#exampleModal").modal('toggle');

 }

});

$(document).on('click','#btnAddTeacher',function(e)
{


var formData =  new FormData();


//user
var first_name=$('#txt_fname2').val();
var last_name=$('#txt_lname2').val();
var email=$('#txt_email2').val();
var password=$('#txt_password2').val();

var school = $('#txt_schoolname2').val();
var gender = $('#txt_gender2').val();
var diploma = $('#txt_diploma2').val();

formData.append('first_name', first_name);
formData.append('last_name', last_name);
formData.append('email', email);
formData.append('password', password);

formData.append('school', school);
formData.append('gender', gender);
formData.append('diploma', diploma);
formData.append('school_id', global_schoolid);

formData.append('id', 0);
formData.append('_token', CSRF_TOKEN);

$.ajax({
        type:'POST',
        url: 'school/ajax/add_new_teacher',
        dataType:"json",
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data:formData,
        success:function(data)
        {
           

            if(data.error == false)
            {
                Swal.fire({
                icon: "success",
                title: "Add",
                html: data.message,
                });

                    $("#teacherModal").modal('toggle');
                    // KTDatatableRemoteAjaxDemo.init();
                     users_datatable.reload();
                  
            }

            else {

            var err_txt = "";
            var get_text = "";
            for(var x=0 ; x < data.errors.length ; x++){

            get_text =  data.errors[x];

            err_txt += get_text + "<br>";
            }


            Swal.fire({
            icon: "error",
            title: "Add",
            html: err_txt,
            });

            }
   
            
       
        }
    });

});

$(document).on('click','#btnUpdateTeacher',function(e)
{


var formData =  new FormData();


//user
var first_name=$('#txt_fname2').val();
var id = $('#txt_fname2').attr('user_id');
var old_email = $('#txt_fname2').attr('old_email');
var last_name=$('#txt_lname2').val();
var email=$('#txt_email2').val();
var password=$('#txt_password2').val();


var school = $('#txt_schoolname2').val();
var gender = $('#txt_gender2').val();
var diploma = $('#txt_diploma2').val();

formData.append('first_name', first_name);
formData.append('last_name', last_name);
formData.append('email', email);
formData.append('password', password);
formData.append('old_email', old_email);

formData.append('school', school);
formData.append('gender', gender);
formData.append('diploma', diploma);
formData.append('school_id', global_schoolid);

formData.append('id', id);
formData.append('_token', CSRF_TOKEN);

$.ajax({
        type:'POST',
        url: 'school/ajax/add_new_teacher',
        dataType:"json",
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data:formData,
        success:function(data)
        {
           

            if(data.error == false)
            {
                Swal.fire({
                icon: "success",
                title: "Add",
                html: data.message,
                });

                    $("#teacherModal").modal('toggle');
                    // KTDatatableRemoteAjaxDemo.init();
                     users_datatable.reload();
                  
            }

            else {

            var err_txt = "";
            var get_text = "";
            for(var x=0 ; x < data.errors.length ; x++){

            get_text =  data.errors[x];

            err_txt += get_text + "<br>";
            }


            Swal.fire({
            icon: "error",
            title: "Add",
            html: err_txt,
            });

            }
   
            
       
        }
    });

});

$(document).on('click','#btnAdd',function(e)
{


var formData =  new FormData();

var school = $('#txt_school').val();
var description = $('#txt_description').val();
var txt_website = $('#txt_website').val();
var txt_crn = $('#txt_crn').val();
var txt_address = $('#txt_address').val();

//user
var first_name=$('#txt_fname').val();
var last_name=$('#txt_lname').val();
var email=$('#txt_email').val();
var password=$('#txt_password').val();
// var get_file = $('input[type=file]')[0].files[0];

formData.append('first_name', first_name);
formData.append('last_name', last_name);
formData.append('email', email);
formData.append('password', password);

formData.append('school_name', school);
formData.append('description', description);
formData.append('website', txt_website);
formData.append('crn', txt_crn);
formData.append('address', txt_address);
formData.append('id', 0);
formData.append('get_file', $('input[type=file]')[0].files[0]);
formData.append('_token', CSRF_TOKEN);

$.ajax({
        type:'POST',
        url: 'school/ajax/add_new_school',
        dataType:"json",
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data:formData,
        success:function(data)
        {
           

            if(data.error == false)
            {
                Swal.fire({
                icon: "success",
                title: "Add",
                html: data.message,
                });

                    $("#exampleModal").modal('toggle');
                    // KTDatatableRemoteAjaxDemo.init();
                    datatable.reload();
                  
            }

            else {

            var err_txt = "";
            var get_text = "";
            for(var x=0 ; x < data.errors.length ; x++){

            get_text =  data.errors[x];

            err_txt += get_text + "<br>";
            }


            Swal.fire({
            icon: "error",
            title: "Add",
            html: err_txt,
            });

            }
   
            
       
        }
    });

});


$(document).on('click','#btnUpdate',function(e)
{


var formData =  new FormData();

var school = $('#txt_school').val();
var old_img = $('#txt_school').attr('old_img');
var old_name = $('#txt_school').attr('old_name');
var id = $('#txt_school').attr('school_id');
var description = $('#txt_description').val();
var txt_website = $('#txt_website').val();
var txt_crn = $('#txt_crn').val();
var txt_address = $('#txt_address').val();


formData.append('old_img', old_img);
formData.append('old_name', old_name);
formData.append('school_name', school);
formData.append('description', description);
formData.append('website', txt_website);
formData.append('crn', txt_crn);
formData.append('address', txt_address);
formData.append('id', id);
formData.append('get_file', $('input[type=file]')[0].files[0]);
formData.append('_token', CSRF_TOKEN);

$.ajax({
        type:'POST',
        url: 'school/ajax/update_school_information',
        dataType:"json",
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data:formData,
        success:function(data)
        {
           

            if(data.error == false)
            {
                Swal.fire({
                icon: "success",
                title: "Add",
                html: data.message,
                });

                    $("#exampleModal").modal('toggle');
                    // KTDatatableRemoteAjaxDemo.init();
                    datatable.reload();
                  
            }

            else {

            var err_txt = "";
            var get_text = "";
            for(var x=0 ; x < data.errors.length ; x++){

            get_text =  data.errors[x];

            err_txt += get_text + "<br>";
            }


            Swal.fire({
            icon: "error",
            title: "Add",
            html: err_txt,
            });

            }
   
            
       
        }
    });

});

var ResourceDatatableRemoteAjaxDemo = function() {
    // Private functions



    // basic demo
    var demo = function() {



        resource_datatable = $('#resource_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: 'school/ajax/resource-list',
                        data:{
                        curr_id: function() { return global_currid },
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
                field: 'id',
                title: '#',
                sortable: false,
                width: 20,
                type: 'number',
                selector: {
                    class: ''
                },
                textAlign: 'center',
            },{
                field: 'name',
                title: 'Name',
                template: function(row) {

                    var gpath = '<?php echo Storage::url('public/uploads/school/curriculum/image/'); ?>' + row.path;
                    return `<a download href="${gpath }" target="_blank">${row.name}</a>`;
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
                field: 'description',
                title: 'Description',
            },{
                field: 'updated_at',
                title: 'Last Modified',
                type: 'date',
                template: function(row) {
                    return moment(row.updated_at).format('DD MMMM YYYY');
                }
            },  
             {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function(row) {
                    return `
                     <a href="javascript:;" data-id="${row.id}" class="btn btn-sm btn-clean btn-icon action_user" data-action="open_resource_modal" data-toggle="modal" data-target="#resourceModal" title="View">
                            <span class="svg-icon svg-icon-md">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                    <rect x="0" y="0" width="24" height="24"/>\
                                    <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
                                    </g>\
                                </svg>\
                            </span>
                        </a>
                    `;
                },
            }],

        });


    };

    return {
        // public functions
        init: function() {
            demo();
        
        },
    };
}();


var CurriculumDatatableRemoteAjaxDemo = function() {
    // Private functions


      

    // basic demo
    var demo = function() {



        curriculum_datatable = $('#curriculum_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: 'school/ajax/curriculum-list',
                        data:{
                        school_id: function() { return global_schoolid },
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
                field: 'id',
                title: '#',
                sortable: false,
                width: 20,
                type: 'number',
                selector: {
                    class: ''
                },
                textAlign: 'center',
            },{
                field: 'name',
                title: 'Name',
            }, {
                field: 'subject.subject',
                title: 'Subject',
            }, {
                field: 'fee',
                title: 'Fee',
            },
            {
                field: 'description',
                title: 'Description',
            },
             {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function(row) {
                    return `
                     <a href="javascript:;" data-id="${row.id}" class="btn btn-sm btn-clean btn-icon action_user" data-action="open_resource_modal" data-toggle="modal" data-target="#resourceModal" title="View">
                          <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/General/Settings-1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                            <rect x="0" y="0" width="24" height="24"/>\
                            <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"/>\
                            <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"/>\
                            </g>\
                            </svg><!--end::Svg Icon--></span>\
                        </a>
                    `;
                },
            }],

        });


    };

    return {
        // public functions
        init: function() {
            demo();
        
        },
    };
}();



var UsersDatatableRemoteAjaxDemo = function() {
    // Private functions


      

    // basic demo
    var demo = function() {



        users_datatable = $('#users_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: 'school/ajax/users-list',
                        data:{
                        school_id: function() { return global_schoolid },
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
                field: 'id',
                title: '#',
                sortable: false,
                width: 20,
                type: 'number',
                selector: {
                    class: ''
                },
                textAlign: 'center',
            },{
                field: 'first_name',
                title: 'First Name',
            }, {
                field: 'last_name',
                title: 'Last Name',
            }, {
                field: 'email',
                title: 'Email',
            }, {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function(row) {
                    return `
                     <a href="javascript:;" data-id="${row.id}" class="btn btn-sm btn-clean btn-icon action_user" data-action="update_teacher" data-toggle="modal" data-target="#teacherModal" title="Update">
                            <span class="svg-icon svg-icon-md">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                    <rect x="0" y="0" width="24" height="24"/>\
                                    <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
                                    </g>\
                                </svg>\
                            </span>
                        </a>
                    `;
                },
            }],

        });

    //     $('#kt_datatable_search_role').on('change', function() {
    //         datatable.search($(this).val().toLowerCase(), 'role');
    //     });

    //    $('#kt_datatable_search_gender').on('change', function() {
    //         datatable.search($(this).val().toLowerCase(), 'gender');
    //     });



    //     $('#kt_datatable_search_role').selectpicker();
    };

    return {
        // public functions
        init: function() {
            demo();
        
        },
    };
}();


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
                        url: 'school/ajax/list',
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
                field: 'id',
                title: '#',
                sortable: false,
                width: 20,
                type: 'number',
                selector: {
                    class: ''
                },
                textAlign: 'center',
            }, {
                field: 'school_name',
                title: 'School',
            },
            // {
            //     field: 'image_url',
            //     title: 'Logo',
            //     template: function(row) {
            //         if(row.image_url === null || row.image_url === "")
            //         {
            //             return "<p>No image</p>";
            //         }
            //         else 
            //         {
                   
            //             var site_url = document.location.origin;
            //             var file_p = site_url + '/storage/public/uploads/school/profile/image/'  + row.logo;

            //             return '<img style="width:150px;" src="'+ file_p +'">';

                   

            //         }
                   
            //     }
            // },
            {
                field: 'address',
                title: 'Address',
            },{
                field: 'website',
                title: 'Website',
            }, {
                field: 'Actions',
                title: 'Actions',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function(row) {
                    return '\
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2 action_user" data-action="update" data-id="'+ row.id +'" title="Edit">\
                            <span class="svg-icon svg-icon-md">\
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                        <rect x="0" y="0" width="24" height="24"/>\
                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
                                    </g>\
                                </svg>\
                            </span>\
                        </a>\
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2 action_user" data-action="show_user_page"  data-id="'+ row.id +'" title="User Page">\
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Communication/Add-user.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                            <polygon points="0 0 24 0 24 24 0 24"/>\
                            <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>\
                            <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>\
                            </g>\
                            </svg><!--end::Svg Icon--></span>\
                        </a>\
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2 action_user" data-action="show_curriculum_page"  data-id="'+ row.id +'" title="Curriculum">\
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Files/Uploaded-file.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                <polygon points="0 0 24 0 24 24 0 24"/>\
                                <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>\
                                <path d="M8.95128003,13.8153448 L10.9077535,13.8153448 L10.9077535,15.8230161 C10.9077535,16.0991584 11.1316112,16.3230161 11.4077535,16.3230161 L12.4310522,16.3230161 C12.7071946,16.3230161 12.9310522,16.0991584 12.9310522,15.8230161 L12.9310522,13.8153448 L14.8875257,13.8153448 C15.1636681,13.8153448 15.3875257,13.5914871 15.3875257,13.3153448 C15.3875257,13.1970331 15.345572,13.0825545 15.2691225,12.9922598 L12.3009997,9.48659872 C12.1225648,9.27584861 11.8070681,9.24965194 11.596318,9.42808682 C11.5752308,9.44594059 11.5556598,9.46551156 11.5378061,9.48659872 L8.56968321,12.9922598 C8.39124833,13.2030099 8.417445,13.5185067 8.62819511,13.6969416 C8.71848979,13.773391 8.8329684,13.8153448 8.95128003,13.8153448 Z" fill="#000000"/>\
                                </g>\
                            </svg><!--end::Svg Icon--></span>\
                        </a>\
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2 action_user" data-action="show_create_class"  data-id="'+ row.id +'" title="Classes">\
                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Home/Book-open.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                <rect x="0" y="0" width="24" height="24"/>\
                                <path d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" fill="#000000"/>\
                                <path d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z" fill="#000000" opacity="0.3"/>\
                                </g>\
                                </svg><!--end::Svg Icon--></span>\
                        </a>\
                    ';
                },
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

jQuery(document).ready(function() {
    KTDatatableRemoteAjaxDemo.init();
});


       
    </script>


@endsection
