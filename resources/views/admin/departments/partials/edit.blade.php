<div class="modal fade" id="editDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content p-1">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1"><i class="fa fa-pencil"></i> Edit Department</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form id="update-depart-form" method="POST" action="/admin/department/update" data-autosubmit>
                    @include('admin.departments.partials._form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button id="edit-depart-btn" type="submit" class="btn btn-secondary" ><i class="fa fa-pencil"></i> Update </button>
            </form>
            </div>
        </div>
    </div>
</div>
    
            