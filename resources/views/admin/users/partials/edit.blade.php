<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content p-1">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1"><i class="fa fa-user-plus"></i> Update  User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form id="depart-form" method="POST" action="/admin/user/update" enctype="multipart/form-data" >
                    @include('admin.users.partials._form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button id="subBtn" type="submit" class="btn btn-secondary" ><i class="fa fa-user-plus"></i> Update </button>
            </form>
            </div>
        </div>
    </div>
</div>

