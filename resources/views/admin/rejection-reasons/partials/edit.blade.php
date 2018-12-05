<div class="modal fade" id="editRejectionReasonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content p-1">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1"><i class="fa fa-remove"></i> @lang('Update Rejection Reason')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form  method="POST" action="/admin/rejection-reason/update" data-autosubmit>
                    @include('admin.rejection-reasons.partials._form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">@lang('Close')</button>
                <button id="depart-form-submit-btn" type="submit" class="btn btn-secondary" ><i class="fa fa-remove"></i> @lang('Update') </button>
            </form>
            </div>
        </div>
    </div>
</div>
