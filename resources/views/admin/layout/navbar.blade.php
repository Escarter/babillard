<!-- Navigation-->
<nav class="navbar navbar-expand-lg bg-white fixed-top shadow  bd-navbar " id="mainNav">
    <a class="navbar-brand text-primary  " href="/admin"> <img src="{{asset('img/babillardcm_logo.png')}}" class="m-0 p-0 " style="height:60px; width:auto"  alt="altText"/></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav pt-5 " id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link text-primary" href="/admin">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text text-primary">Dashboard</span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Department Management">
            <a class="nav-link nav-link-collapse collapsed text-primary" data-toggle="collapse" href="#collapseDepartmentManagement" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text text-primary"> Platform Management </span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseDepartmentManagement">
                <li>
                    <a href="/admin/schools" class="text-primary">
                        <i class="fa fa-fw  fa-th"></i>
                        Ecoles
                    </a>
                </li>
                <li>
                    <a href="/admin/facultes" class="text-primary">
                        <i class="fa fa-fw  fa-th"></i>
                        Facultes
                    </a>
                </li>
                <li>
                    <a href="/admin/departments" class="text-primary">
                        <i class="fa fa-fw  fa-th"></i>
                        Departments
                    </a>
                </li>
                <li>
                    <a href="/admin/niveaux" class="text-primary">
                        <i class="fa fa-fw  fa-th"></i>
                        Niveau
                    </a>
                </li>
                <li>
                    <a href="/admin/filieres" class="text-primary">
                        <i class="fa fa-fw  fa-th"></i>
                        Filieres
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Publication Management">
            <a class="nav-link nav-link-collapse collapsed text-primary" data-toggle="collapse" href="#collapsePublicationManagement" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-bullhorn text-primary"></i>
            <span class="nav-link-text text-primary"> Publications Management </span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapsePublicationManagement">
                <li>
                    <a href="/admin/publications" class="text-primary">
                        <i class="fa fa-fw fa-bullhorn"></i>
                        Publications
                    </a>
                </li>
            </ul>
        </li>
        </ul>
        <ul class="navbar-nav ml-auto mr-lg-5" >
        <hr class=" hidden-md" >
        <ul class="navbar-nav ml-lg-auto mr-lg-3">
            <li class="nav-item dropdown  ">
                <a class="nav-link dropdown-toggle  text-secondary" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true"
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
            <a class="nav-link dropdown-toggle  text-secondary" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="fa  fa-user"></i>
            <span class="indicator text-primary d-none d-lg-block">
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
