<div data-keyboard="false" data-backdrop="static" class="modal fade" id="upload-pre-recorded-overlay" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<div class="d-flex align-items-center">
					<a href="javascript:void(0);" class="back modal-back-btn" data-toggle="modal"
					data-dismiss="modal"><img src="{{ asset('frontend/images/icon-back.png') }}" alt="icon" /></a>
					<h2 class="modal-title">Pre Recorded</h2>
				</div>
                <div class="alert alert-success success_message_container" role="alert" style="display:none">
                    <span class="success_message"></span>
                </div>
			</div>
			<div class="modal-body nicescroll">
                <form id="pre-recorded-class-form" class="add-pre-recorded-class" data-action="{{ url('/teacher/class/ajax/add_pre_recorded_class') }}" enctype="multipart/form-data">
                    @method('POST')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input class="form-control with-validation" id="title" name="title" type="text" placeholder="Type the title">
                                <small id="title_error" class="text-danger error" style="display:none;"></small>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="11" placeholder="Type the description"></textarea>
                                <small id="description_error" class="text-danger error" style="display:none;"></small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group category-wrapper" id="category-wrapper3">
                                <label for="orca_categories_id">Category</label>
                                <select name="categories_id" id="orca_categories_id" class="selectmenu category">
                                    <option value="">Select category</option>
                                    <option value="1">Academic</option>
                                    <option value="2">Enrichment</option>
                                </select>
                                <small id="orca_categories_id.0_error" class="text-danger error" style="display:none;"></small>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <div class="price-input-group">
                                    <span class="prefix">$</span>
                                    <input class="form-control" id="price" name="price" type="text" placeholder="" value ="" onkeydown="return event.keyCode !== 69">
                                </div>
                                <small id="price_error" class="text-danger error" style="display:none;"></small>
                                <div class="note">*10% commission will be added to this price.</div>
                            </div>

                        </div>
                        <div class="col-md-5">
                            <label for="photocover">Photo Cover</label>
                            <div class="upload-wrapper">
                                <div class="form-group">
                                    <div class="image-area">
                                        <img id="imageResult3" src="" alt="" class="img-fluid">
                                    </div>
                                    <div class="">
                                        <input id="upload3" name="cover_photo" type="file" class="form-control">
                                        <div class="input-group-append">
                                            <label for="upload3" class="btn btn-red">Upload <i class="fa fa-upload"></i></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="video-wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <h6>Total Videos: <span class="red vd-count">0</span></h6>
                            </div>
                        </div>
                        <div class="row file-drag">
                            <div class="col-md-12">
                                <div class="form-group inputDnD">
                                    <input type="hidden" name="save_draft" value="1">
                                    <input type="file" multiple="multiple" class="form-control-file" id="inputFile1" accept="video/mp4,video/x-m4v,video/*"  data-title="">

                                    <div class="drag-text">
                                        <img src="{{ asset('frontend/images/icon-upload.png') }}" alt="icon" /><br>
                                        <button type="button" class="btn btn-red">Select Files</button>
                                        <br><label for="inputFile1">Drag and drop files to upload</label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div id="upload-result-wrapper">

                        </div>

                        <div class="row btn-wrapper" style="display: none;">
                            <div class="col-6">
                                <div class="add-video-wrapper">
                                    <input id="upload-video-1" class="form-control-file" type="file" multiple="multiple" accept="video/mp4,video/x-m4v,video/*"  data-title="">
                                    <div class="input-group-append">
                                        <label for="upload-video-1" class="btn btn-border-red">Add Video <i class="fa fa-plus"></i></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <button class="btn btn-border-red pre-record-save-draft" type="button">Save as Draft</button>
                                <button class="btn btn-red" type="submit">Publish</button>
                            </div>
                        </div>
                    </div>

                </form>
			</div>

		</div>
	</div>
</div>
