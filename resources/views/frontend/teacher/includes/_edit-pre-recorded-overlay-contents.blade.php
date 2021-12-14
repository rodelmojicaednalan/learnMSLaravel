

<form id="edit-pre-recorded-class" class="edit-pre-recorded-class"  data-action="{{ url('/teacher/class/ajax/edit_pre_recorded_class') }}" enctype="multipart/form-data">
@method('POST')
<input type="hidden" name="id" value="{{ $class->id }}">
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="hidden" name="edit_save_draft" value="1">
            <input class="form-control" id="title" name="title" type="text" placeholder="Type the title" value="{{ $class->title }}">
            <small id="title_error" class="text-danger error" style="display:none;"></small>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="11" placeholder="Type the description">{{ $class->description }}</textarea>
            <small id="description_error" class="text-danger error" style="display:none;"></small>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group category-wrapper" id="category-wrapper1">
            <label for="cat-1">Category</label>
            <select id="cat-1" class="selectmenu category" name="categories_id">
                <option value="">Select category</option>
                    <option {{ $class->categories_id == 1 ? 'selected' : '' }} value="1">Academic</option>
                    <option {{ $class->categories_id == 2 ? 'selected' : '' }} value="2">Enrichment</option>
            </select>
            <small id="orca_categories_id.0_error" class="text-danger error" style="display:none;"></small>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <div class="price-input-group">
                <span class="prefix">$</span>
                <input class="form-control" id="price" name="price" type="number" placeholder="" value ="{{ number_format($class->price, 2) }}" onkeydown="return event.keyCode !== 69">
                <small id="price_error" class="text-danger error" style="display:none;"></small>
                <div class="note">*10% commission will be added to this price.</div>
            </div>

        </div>

    </div>
    <div class="col-md-5">
        <label for="photocover">Photo Cover</label>
        <div class="upload-wrapper">
            <div class="form-group">
                <div class="image-area">
                    <img id="imageResult2" src="{{ ($class->cover_photo) ? \Storage::url('public/uploads/teacher/class/image/' . $class->cover_photo) : asset('frontend/images/product-1.png') }}" alt="" class="img-fluid"></div>
                    <div class="">
                        <input id="upload" name="cover_photo" type="file" class="form-control">
                        <div class="input-group-append">
                            <label for="upload" class="btn btn-red">Upload <i class="fa fa-upload"></i></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="video-wrapper">
        <div class="row">
            <div class="col-md-12">
                <h6>Total Videos: <span class="red vd-count">{{ count($class->preRecordedVideos) }}</span></h6>
            </div>
        </div>

        @if (count($class->preRecordedVideos) > 0)
            <div class="row file-drag" style="display: none;" >
                <div class="col-md-12">
                    <div class="form-group inputDnD">
                    <input type="file" data-class-id="{{ $class->id }}" multiple="multiple" class="form-control-file" id="inputFile2" accept="video/mp4,video/x-m4v,video/*"  data-title="">

                    <div class="drag-text">
                        <img src="{{ asset('frontend/images/icon-upload.png') }}" alt="icon" /><br>
                        <button type="button" class="btn btn-red">Select Files</button>
                        <br><label for="inputFile2">Drag and drop files to upload</label>
                    </div>
                </div>

                </div>
            </div>

            <div id="upload-result-wrapper">
            @foreach ($class->preRecordedVideos as $video)
                <div class="row video-row" data-video-entry="{{ $video->id }}">
                    <div class="col-md-3">
                        <!-- image dimention 200*126 -->
                        <img src="{{ asset('frontend/images/placeholder-thumbnail.png') }}" alt="{{ $video->class_name }}">
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="class-name">Class Name</label>
                            <input type="hidden" name="pre_recorded_video[{{ $video->id }}]" value="{{ $video->id }}">
                            <input required class="form-control" type="text" name="pre_recorded_video[{{ $video->id }}][class_name]" placeholder="Type the class name" value="{{ $video->class_name }}">
                        </div>
                        <div class="item">
                            <label>
                                Duration:
                            </label>
                            <span>--</span>
                        </div><!-- End item -->

                    </div>
                    <div class="col-md-6">
                        <div class="action-remove text-right">
                            <a class="remove-video" data-class-id="{{ $video->orca_classes_id }}" data-id="{{ $video->id }}" href="javascript:void(0)"><img src="{{ asset('frontend/images/ic-actions-close-simple.png') }}"><span>Remove</span></a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>


            <div class="row btn-wrapper">
                <div class="col-6">
                    <div class="edit-video-wrapper">
                        <input id="upload-video-2" type="file" multiple="multiple" class="form-control-file" data-class-id="{{ $class->id }}">
                        <div class="input-group-append">
                            <label for="upload-video-2" class="btn btn-border-red">Add Video <i class="fa fa-plus"></i></label>
                        </div>
                    </div>
                </div>
                <div class="col-6 text-right">
                    <button  class="btn btn-border-red edit-pre-record-save-draft" type="button">Save as Draft</button>
                    <button class="btn btn-red" type="submit">Save</button>
                </div>
            </div>

        @else

        <div class="row file-drag">
            <div class="col-md-12">
                <div class="form-group inputDnD">
                <input type="file" data-class-id="{{ $class->id }}" multiple="multiple" class="form-control-file" id="inputFile2" accept="video/mp4,video/x-m4v,video/*"  data-title="">

                <div class="drag-text">
                    <img src="{{ asset('frontend/images/icon-upload.png') }}" alt="icon" /><br>
                    <button type="button" class="btn btn-red">Select Files</button>
                    <br><label for="inputFile2">Drag and drop files to upload</label>
                </div>
            </div>

            </div>
        </div>

        <div id="upload-result-wrapper">
        </div>

        <div class="row btn-wrapper" style="display: none;">
            <div class="col-6">
                <div class="edit-video-wrapper">
                    <input id="upload-video-2" class="form-control-file" type="file" multiple="multiple" accept="video/mp4,video/x-m4v,video/*"  data-title="" data-class-id="{{ $class->id }}">
                    <div class="input-group-append">
                        <label for="upload-video-2" class="btn btn-border-red">Add Video <i class="fa fa-plus"></i></label>
                    </div>
                </div>
            </div>
            <div class="col-6 text-right">
                <button class="btn btn-border-red save-draft">Save as Draft</button>
                <button class="btn btn-red" type="submit">Publish</button>
            </div>
        </div>

        @endif
    </div>
</form>



