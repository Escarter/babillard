<header>
    <nav class="navbar navbar-expand-md navbar-light shadow fixed-top bg-light p-3">
        <div class="container-fluid mx-lg-5 px-lg-5">
            <a class="navbar-brand text-warning " href="#"> <img src="{{asset('img/babillardcm_logo.png')}}" class="m-0 p-0 " style="height:60px; width:auto"  alt="altText"/></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto ml-lg-5 pl-lg-3">
                    <li class="nav-item  active">
                        <a class="nav-link text-warning" href="#"> <i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning " href="#">FAQ</a>
                    </li>

                </ul>
                <div class=" nav-item dropdown mt-2 mr-lg-2 pr-lg-2">

                    <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-language"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#"><i class="fas fa-language"></i> English</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="fas fa-language"></i> French</a>
                    </div>

                </div>
                <div class=" nav-item dropdown mt-2 mr-lg-5 pr-lg-2">

                    <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Username</a>
                        <div class="dropdown-divider"></div>
                        <a href="/pages/evaluer_eseignant.html" class="dropdown-item" href="#"><i class="fas fa-check-square"></i>
                            Evaluer Ensignant</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/pages/login.html"><i class="fas fa-sign-out-alt"></i> Sign
                            Out</a>
                    </div>

                </div>
            </div>
        </div>
    </nav>
</header>
