<div class="modal fade" id="massRejectionReminderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content p-1">
            <div class="modal-header">
                <h4 class="modal-title" ><i class="fa fa-bell"></i> @lang('Send Mass Reminder')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form method="POST" action="{{route('mass.rejection.reminder.send')}}" data-autosubmit>
                @csrf
                <div class="form-group">
                    <input type="text" name="reminder_subject" id="" class="form-control" placeholder="@lang('Enter Reminder Title ')">
                </div>
                <div class="form-group">
                    <textarea class="form-control"  name="reminder_body"  placeholder="@lang('Enter Reminder Message')"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">@lang('Close')</button>
                <button  type="submit" class="btn btn-secondary " ><i class="fa fa-paper-plane"></i>  @lang('Send')</button>
            </form>
            </div>
        </div>
    </div>
</div>
