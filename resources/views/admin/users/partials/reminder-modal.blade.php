<div class="modal fade" id="ReminderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content p-1">
            <div class="modal-header">
                <h4 class="modal-title" ><i class="fa fa-bell"></i> @lang('Send Reminder')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form method="POST" action="{{route('reminder.send')}}" data-autosubmit >
                    @include('admin.users.partials._reminder_form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">@lang('Close')</button>
                <button  type="submit" class="btn btn-secondary " ><i class="fa fa-message"></i> @lang('Send')</button>
            </form>
            </div>
        </div>
    </div>
</div>