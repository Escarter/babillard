<div class="modal fade" id="createSchoolModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content p-1">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1"><i class="fa fa-plus"></i> {{ __('Create New School') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form id="depart-form" method="POST" action="/admin/schools" data-autosubmit>
                    @include('admin.ecole.partials._form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal"> {{ __('Close') }}</button>
                <button id="depart-form-submit-btn" type="submit" class="btn btn-secondary"><i class="fa fa-plus"></i> {{ __('Create') }} </button>
            </form>
            </div>
        </div>
    </div>
</div>


