<!-- Modal Upload Live Class -->
<div class="modal fade" id="upload-live-class-overlay" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<div class="d-flex align-items-center">
					<a href="javascript:void(0);" class="back" data-toggle="modal"
					data-dismiss="modal"><img src="{{ asset('frontend/images/icon-back.png') }}" alt="icon" /></a>
					<h2 class="modal-title">Live</h2>
				</div>
			</div>
			<div class="modal-body nicescroll">
                <form autocomplete="off" id="live-class-form" data-action="{{ url('/teacher/class/ajax/add_live_class') }}" enctype="multipart/form-data">
                    @method('POST')
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="live-class-title"> <span class="label-required">Title</span> </label>
                                <input class="form-control" id="live-class-title" name="title" type="text" placeholder="Type the title" value="">
                                <small id="title_error" class="text-danger error" style="display:none;"></small>
                            </div>
                            <div class="form-group">
                                <label for="live-class-description"><span class="label-required">Description</span></label>
                                <textarea class="form-control" id="live-class-description" name="description" rows="2" placeholder="Type the description"></textarea>
                                <small id="description_error" class="text-danger error" style="display:none;"></small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group category-wrapper" id="category-wrapper4">
                                <label for="live-class-orca_categories_id"><span class="label-required">Category</span></label>
                                <select id="live-class-orca_categories_id" name="categories_id" class="selectmenu category">
                                    <option value="">Select category</option>
                                    <option value="2">Academic</option>
                                    <option value="3">Enrichment</option>
                                </select>
                                <small id="orca_categories_id.0_error" class="text-danger error" style="display:none;"></small>
                            </div>
                             <div class="form-group">
                                <label for="live-class-orca_level_id"><span class="label-required">level</span></label>
                                <select id="live-class-orca_level_id" class="selectmenu level-select" name="class_level">
                                    <option value="Under 3 years old">Under 3 years old</option>
                                    @foreach ($class_levels as $key => $item)

                                        <optgroup label="&nbsp;&nbsp;&nbsp;&nbsp;{{$key}}">

                                            @foreach ($item as $levels)
                                                <option value="{{$levels->id}}">&nbsp;&nbsp;&nbsp;&nbsp;{{$levels->choices}}</option>
                                            @endforeach
                                            
                                        </optgroup>

                                    @endforeach
                                    {{-- <optgroup label="&nbsp;&nbsp;&nbsp;&nbsp;Primary (7 - 12 years old)">
                                        <option value="P1">&nbsp;&nbsp;&nbsp;&nbsp;P1</option>
                                        <option value="P2">&nbsp;&nbsp;&nbsp;&nbsp;P2</option>
                                        <option value="P3">&nbsp;&nbsp;&nbsp;&nbsp;P3</option>
                                        <option value="P4">&nbsp;&nbsp;&nbsp;&nbsp;P4</option>
                                        <option value="P3">&nbsp;&nbsp;&nbsp;&nbsp;P5</option>
                                        <option value="P4">&nbsp;&nbsp;&nbsp;&nbsp;P6</option>
                                    </optgroup>
                                    <optgroup label="&nbsp;&nbsp;&nbsp;&nbsp;Secondary (13 - 17 years old)">
                                        <option value="Sec 1">&nbsp;&nbsp;&nbsp;&nbsp;Sec 1</option>
                                        <option value="Sec 2">&nbsp;&nbsp;&nbsp;&nbsp;Sec 2</option>
                                        <option value="Sec 3">&nbsp;&nbsp;&nbsp;&nbsp;Sec 3</option>
                                        <option value="Sec 4 / Sec 5">&nbsp;&nbsp;&nbsp;&nbsp;Sec 4 / Sec 5</option>
                                    </optgroup>
                                    <option value="Nitec">Nitec</option>
                                    <option value="Polytechnic">Polytechnic</option>
                                    <option value="Junior College">Junior College</option>
                                    <option value="University">University</option>
                                    <option value="All">All</option>  --}}
                                    <option value="Others">Others</option> 
                                </select> 
                                <small id="live-class-orca_level_id_error" class="text-danger error" style="display:none;"></small>
                            </div>
                             <!-- If Others: show another textfield for teacher/school to enter -->
                            <div class="form-group orca_level_other_formgroup" style="display: none;">
                                <input type="text" name="orca_level_other" placeholder="Please enter the level">
                                <small id="live-class-level_other_error" class="text-danger error" style="display:none;"></small>
                            </div>
                            <div class="form-group">
                                <label for="live-class-no-of-student"><span class="label-required">No. of Students</span>

                                <span class="question-tooltip" data-toggle="tooltip" data-placement="top" title="No. of students allowed to enrol for this programme">?</span>
                            </label>
                                <input type="number" name="no_student" placeholder="Type the number">
                                <small id="live-class-no-of-student_error" class="text-danger error" style="display:none;"></small>
                            </div>
                            <div class="form-group">
                                <label for="price-5">
                                    <span class="label-required">Price</span>
                                    <span class="question-tooltip" data-toggle="tooltip" data-placement="top" title="Price of the programme">?</span>
                                </label>
                                <div class="price-input-group">
                                    <span class="prefix">$</span>
                                    <input class="form-control" id="price-5" name="price" type="number">
                                </div>
                                <div class="note">*10% commission will be added to this price.</div>
                            </div>
                        </div>
                        
                        <div class="col-md-5">
                            <label for="photocover"><span class="label-required">Photo Cover</span>
                            <span class="question-tooltip" data-toggle="tooltip" data-placement="top" title="Photo of the programme">?</span>
                        </label>
                            <div class="upload-wrapper">
                                <div class="form-group">
                                    <div class="image-area">
                                        <img id="imageResult4" src="" alt="" class="img-fluid">
                                    </div>
                                    <div class="">
                                        <input id="upload4" name="cover_photo" type="file" class="form-control">
                                        <div class="input-group-append">
                                            <label for="upload4" class="btn btn-red">Upload <i class="fa fa-upload"></i></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="schedule-wrapper">
                        <div class="row class-id-row">
                            <div class="col-md-6">
                                <!-- <label>Class ID: 6</label> -->
                            </div>
                            <div class="col-md-6">
                                <div class="float-right d-flex">
                                    <div class="nav nav-tabs nav-fill" id="nav-live-class-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-addedclasses-tab" data-toggle="tab" href="#nav-addedclasses" role="tab" aria-controls="nav-addedclasses" aria-selected="true"><i class="fa fa-calendar"></i> Classes</a>
                                        <a class="nav-item nav-link" id="nav-addnewclass-tab" data-toggle="tab" href="#nav-addnewclass" role="tab" aria-controls="nav-addnewclass" aria-selected="false"><i class="fa fa-plus"></i> Add new Class</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content px-3 px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade active show" id="nav-addedclasses" role="tabpanel" aria-labelledby="nav-addedclasses-tab">
                                <table id="" class="display-heading-red"  style="width:100%" valign="top"><!-- Start table -->
                                        <thead>
                                            <tr>
                                                <th>Class ID</th>
                                                <th class="date-th">Date</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="5" style="padding: 0;" id="append-classes">
                                                    <table class="empty-result">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="5" >The schedule is empty. Please add new class.</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table class="has_data">
                                                        
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table><!-- End table -->
                                <div class="row btn-wrapper">
                                    <div class="col-6">
                                        <button  class="btn btn-border-red save-draft disabled" type="button" disabled="true">Save as Draft</button>
                                    
                                    </div>
                                    <div class="col-6 text-right">
                                        <button class="btn btn-red btn-publish disabled" type="button" disabled="true">Publish</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-addnewclass" role="tabpanel" aria-labelledby="nav-addnewclass-tab">
                                <!-- will added via js -->
                                <div class="empty-slot" style="display: none;">The Time slot is empty. Please click Add Time Slot.</div>

                                <div class="append">

                                        {{-- generate row form schedule --}}
                                        
                                </div>

                                <div class="row btn-wrapper">
                                    <div class="col-6">
                                        <button  class="btn btn-border-red add-schedule-row" type="button"><i class="fa fa-plus"></i> Add Time Slot</button>
                                    
                                    </div>
                                    <div class="col-6 text-right">
                                        <input type="hidden" name="save_as">
                                        <button class="btn btn-red btn-save-classes" type="button">Save</button>
                                    </div>
                                </div>                       
                            </div>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	</div>
</div>