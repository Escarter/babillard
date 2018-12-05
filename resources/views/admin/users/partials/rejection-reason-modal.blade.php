<div class="modal fade" id="rejectionReasonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content p-1">
            <div class="modal-header">
                <h4 class="modal-title" ><i class="fa fa-remove"></i> @lang('Enter Rejection Reason')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form id="reject-form" method="POST" action="{{route('user-image.reject')}}" >
                    @include('admin.users.partials._rejection_form')

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">@lang('Close')</button>
                <!-- <button  type="submit" class="btn btn-secondary " id="confirm_rejection" ><i class="fa fa-remove"></i> @lang('Confirm') </button> -->
                <button  type="submit" class="btn btn-secondary "  ><i class="fa fa-remove"></i> @lang('Confirm') </button>
            </form>
            </div>
        </div>
    </div>
</div>
