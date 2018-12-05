<!--Department Table Card-->
<div class="card mb-3">
    <div class="card-header">
        <h5 class="float-left">
            <i class="fa fa-table"></i> {{$department->name}} - Staff
        </h5>
       
        <div class="float-right">
             <a href="/admin/departments" class="btn btn-secondary  "><i class="fa fa-arrow-circle-left"></i> Back to Departments</a href="/admin/departments">
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="card-body">
        @if ($department->users->count()>0)
        <div class="table-responsive">
            <table width="100%" class="table table-bordered table-hover dataTables">
                <thead class="thead-light">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Sex</th>
                        <th>Department</th>
                        <th>created Date</th>
                    </tr>
                </thead>
                <tbody>
                    @if($department->users()->count() >0)
                        @foreach ($department->users as $user )
                        <tr >
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->gender}}</td>
                            <td >
                                @if($user->department->count()>0)
                                <span style="background-color:{{$user->department->color}};" class="color-circle pr-2"></span> {{$user->department->name}}
                                @else
                                    Belongs to no department
                                @endif
                            </td>
                            <td>{{$user->created_at->diffForHumans()}}</td>

                        </tr>
                        @endforeach
                    @else
                        <tr>
                            No user
                        </tr>
                    @endif    
                </tbody>
            </table>
        </div>
        @else
            <h4>Information </h4> 
            <p>No User onboarded  yet</p>
            <br>
        @endif
    </div>
    <div class="card-footer small text-muted">{{$department->users()->count()}} users</div>
</div>              