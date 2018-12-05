<div class="modal fade" id="approvalFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content p-1">
            <div class="modal-header">
                <h4 class="modal-title" ><i class="fa fa-remove"></i> @lang('Confirm Approval')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form method="POST" action="{{route('user-image.approve')}}" >
                     @csrf
                    <p class="text-center lead">Your actions can not be reverted!</p>
                    <input type="hidden" name="id" value="">
    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">@lang('Close')</button>
                <button  type="submit" class="btn btn-danger " ><i class="fa fa-remove"></i> @lang('Confirm')</button>
            </form>
            </div>
        </div>
    </div>
</div>