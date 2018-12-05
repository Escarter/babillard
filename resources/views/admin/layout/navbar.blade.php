<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top  bd-navbar " id="mainNav">
    <a class="navbar-brand text-warning  " href="/admin"> <i class="fa fa-user fa-2x"></i> <span class="ml-lg-1"> My Profile Admin</span></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav pt-2 " id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link text-warning" href="/admin">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text text-warning">Dashboard</span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Department Management">
            <a class="nav-link nav-link-collapse collapsed text-warning" data-toggle="collapse" href="#collapseDepartmentManagement" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text text-warning"> Platform Management </span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseDepartmentManagement">
                <li>
                    <a href="/admin/departments" class="text-warning">
                        <i class="fa fa-fw  fa-th"></i>
                        Departments
                    </a>
                </li>
                <li>
                    <a class="text-warning" href="/admin/rejection-reasons">
                        <i class="fa fa-fw fa-remove"></i>
                        @lang('Rejection-Reasons')
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Users Management">
            <a class="nav-link nav-link-collapse collapsed text-warning" data-toggle="collapse" href="#collapseUsersManagement" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-users text-warning"></i>
            <span class="nav-link-text text-warning"> Users Management </span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseUsersManagement">
                <li>
                    <a href="/admin/users" class="text-warning">
                        <i class="fa fa-fw fa-users"></i>
                        All Users
                    </a>
                </li>
                <li>
                    <a href="/admin/users/image-uploaded" class="text-warning">
                        <i class="fa fa-fw fa-image"></i>
                        Image Uploaded
                    </a>
                </li>
                <li>
                    <a href="/admin/users/image-not-uploaded" class="text-warning">
                        <i class="fa fa-fw fa-remove"></i>
                        Image Not Uploaded
                    </a>
                </li>
                <li>
                    <a href="/admin/users/image-pending" class="text-warning">
                        <i class="fa fa-fw fa-calendar"></i>
                        Image Pending
                    </a>
                </li>
                <li>
                    <a href="/admin/users/image-approved" class="text-warning">
                        <i class="fa fa-fw fa-thumbs-up"></i>
                        Image Approved
                    </a>
                </li>
                <li>
                    <a href="/admin/users/image-rejected" class="text-warning">
                        <i class="fa fa-fw fa-thumbs-down"></i>
                        Image  Rejected
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reminder Management">
            <a class="nav-link nav-link-collapse collapsed text-warning" data-toggle="collapse" href="#collapseReminderManagement" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-bell text-warning"></i>
            <span class="nav-link-text text-warning"> Reminder Management </span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseReminderManagement">
                <li>
                    <a href="/admin/users/reminder" class="text-warning">
                        <i class="fa fa-fw fa-bell"></i>
                            Reminder
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Zipped Images Management">
            <a class="nav-link nav-link-collapse collapsed text-warning" data-toggle="collapse" href="#collapsezippedImagesManagement" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file-archive-o text-warning"></i>
            <span class="nav-link-text text-warning"> Zipped Img Management </span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapsezippedImagesManagement">
                <li>
                    <a href="/admin/zipped-imgs" class="text-warning">
                        <i class="fa fa-fw fa-file-archive-o"></i>
                            Zipped Images
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Audit Management">
            <a class="nav-link nav-link-collapse collapsed text-warning" data-toggle="collapse" href="#collapseAuditManagement" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file-code-o text-warning"></i>
            <span class="nav-link-text text-warning"> Audit Trails Management </span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseAuditManagement">
                <li>
                    <a href="/admin/audit" class="text-warning">
                        <i class="fa fa-fw fa-file-code-o"></i>
                            User Audit
                    </a>
                </li>
            </ul>
        </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
            <a class="nav-link " id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
            </a>
        </li>
        </ul>
        <ul class="navbar-nav ml-auto mr-lg-5" >
        <hr class=" hidden-md" >
        <ul class="navbar-nav ml-lg-auto mr-lg-3">
            <li class="nav-item dropdown  ">
                <a class="nav-link dropdown-toggle  text-warning" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="fa  fa-language"></i>
                </a>
                <div class="dropdown-menu " aria-labelledby="alertsDropdown">
                    <a class="dropdown-item" href="/lang/en">
                        <i class="fa fa-language "></i> @lang('English')
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/lang/fr">
                        <i class="fa fa-language"></i> @lang('French')
                    </a>
                </div>
            </li>
        </ul>
        <li class="nav-item dropdown mr-lg-5">
            <a class="nav-link dropdown-toggle  text-warning" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="fa  fa-user"></i>
            <span class="indicator text-warning d-none d-lg-block">
                {{--  <i class="fa fa-fw fa-circle"></i>  --}}
            </span>
            </a>
            <div class="dropdown-menu mr-lg-5" aria-labelledby="alertsDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fa fa-user "></i> {{Auth::user()->first_name}}
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/employee/dashboard">
                    <i class="fa fa-th "></i> Employee Portal
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/logout">
                    <i class="fa fa-sign-out"></i> Logout
                </a>
            </div>
        </li>
        <li class="nav-item dropdown mr-lg-2 ml-0"></li>
        </ul>
        <ul class="navbar-nav  mr-lg-5 ml-0" ></ul>
    </div>
</nav>
