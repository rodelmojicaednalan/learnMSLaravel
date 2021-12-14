@php
    $action = '';

    if (auth()->user()->roles[0]->name === 'school_administrator') :
        $action = url('/school/profile/ajax/update_social_links');
    else :
        $action = url('/' . auth()->user()->roles[0]->name . '/profile/ajax/update_social_links');
    endif;

@endphp

<div class="modal fade" data-keyboard="false" data-backdrop="static" id="edit-social-overlay" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex align-items-center">
                    <a href="javascript:void(0);" class="back update-profile-form-back-btn" data-toggle="modal" data-target="#" data-dismiss="modal"><img src="{{ asset('frontend/images/icon-back.png') }}" alt="icon"></a>
                    <h2 class="modal-title">Edit Social</h2>
                </div>

                <div class="alert alert-success success_message_container" role="alert" style="display:none">
                    <span class="success_message"></span>
                </div>
            </div>
            <div class="modal-body nicescroll">
                <form method="post" id="update-social-media-form" data-action="{{ $action }}" enctype="multipart/form-data">
                            @csrf
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="text" class="form-control" name="facebook" placeholder="Type your facebook link" value="{{ auth()->user()->facebook_link }}" id="facebook">
                    </div>
                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="text" class="form-control" name="twitter" placeholder="Type your twitter link" value="{{ auth()->user()->twitter_link }}" id="twitter">
                    </div>
                    <div class="form-group">
                        <label for="linkedin">Linkedin</label>
                        <input type="text" class="form-control" name="linkedin" placeholder="Type your linkedin link" value="{{ auth()->user()->linkedin_link }}" id="linkedin">
                    </div>
                    <div class="form-group">
                        <label for="behance">Behance</label>
                        <input type="text" class="form-control" name="behance" placeholder="Type your behance link" value="{{ auth()->user()->behance_link }}" id="behance">
                    </div>
                     <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="text" class="form-control" name="instagram" placeholder="Type your instagram link" value="{{ auth()->user()->instagram_link }}" id="instagram">
                    </div>
                    <div class="form-submit text-center">
                        <button type="submit" class="btn btn-red btn-full">Save</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
