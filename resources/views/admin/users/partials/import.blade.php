<div class="modal fade" id="importUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content p-1">
            <div class="modal-header">
                <h4 class="modal-title" ><i class="fa fa-file-excel-o"></i> Import New Users</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form method="POST" action="/admin/users/import" enctype="multipart/form-data">
                    @include('admin.users.partials._import_form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button  type="submit" class="btn btn-secondary" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing"><i class="fa fa-file-excel-o"></i> Import </button>
            </form>
            </div>
        </div>
    </div>
</div>
    
            