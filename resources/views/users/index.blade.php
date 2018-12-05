@extends('layouts.app')
@section('content')
<div class="container ">
    <div class="mb-0">
        <div class="float-right">
            <a href="#" class="btn shadow btn-dark" data-toggle="modal" data-target="#EvaluerProf">
                <i class="fas fa-plus-circle"></i> Publier Evaluation
            </a>
            <a href="#" class=" btn shadow btn-warning" data-toggle="modal" data-target="#publishAnnouncement">
                <i class="fas fa-plus-circle"></i> Publier Actaulite
            </a>
        </div>
        <div class="float-left">
            <p class="h2 mb-0 pb-0">Quoi de 9 au Babillard?</p>
        </div>
        <div class="clearfix"></div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-xl-3  col-sm-3 mb-3">
            <div class="card shadow text-white bg-facebook o-hidden">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-comment-dots"></i>
                    </div>
                    <div class="mr-5 text-center">
                        <p class="lead">Communiques</p>
                        <h3>10</h3>
                    </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="/admin/users">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3  col-sm-3 mb-3">
            <div class="card shadow text-white bg-info o-hidden">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="mr-5 text-center">
                        <p class="lead">Notes des Services</p>
                        <h3>0</h3>
                    </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="/admin/users">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-3 mb-3">
            <div class="card shadow text-white bg-secondary o-hidden">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="mr-5 text-center">
                        <p class="lead">Emploi du temps</p>
                        <h3>10</h3>
                    </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="/admin/users">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-3 mb-3">
            <div class="card shadow text-white bg-purple o-hidden">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-check-square"></i>
                    </div>
                    <div class="mr-5 text-center">
                        <p class="lead">Resultats</p>
                        <h3>0</h3>
                    </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="/admin/users">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <h1 class="h2 mt-4 pt-5">Participe au sondages?</h1>
    <hr class="mb-4">
    <div class="card-columns">
        <div class="card text">
            <div class="card-body">
                <h5 class="card-title text-center">Que pensez vous de la formation as l'ENSET?</h5>
                <p class="card-text">
                    <form action="">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" value="opt1">
                            <label class="form-check-label" for="exampleCheck1">Inutile</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck2" value="opt1">
                            <label class="form-check-label" for="exampleCheck2">Interessante</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck3" value="opt1">
                            <label class="form-check-label" for="exampleCheck3">Tres Interessante</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck5" value="opt1">
                            <label class="form-check-label" for="exampleCheck5">Bulletin Null</label>
                        </div>
                    </form>
                </p>

                <div class="">
                    <div class="float-left">
                        <p class="card-text "><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                    <div class="float-right">
                            <a href="#" class="btn btn-facebook">voter</a>
                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
        <div class="card text">
            <div class="card-body">
                <h5 class="card-title text-center">Aimez vous avoir plus de blagues?</h5>
                <p class="card-text">
                    <form action="">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" value="opt1">
                            <label class="form-check-label" for="exampleCheck1">Oui</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck2" value="opt1">
                            <label class="form-check-label" for="exampleCheck2">Non</label>
                        </div>
                    </form>
                </p>

                <div class="">
                    <div class="float-left">
                        <p class="card-text "><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                    <div class="float-right">
                            <a href="#" class="btn btn-facebook">voter</a>
                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
        <div class="card text">
            <div class="card-body">
                <h5 class="card-title text-center">Que pensez vous de la formation as l'ENSET?</h5>
                <p class="card-text">
                    <form action="">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" value="opt1">
                            <label class="form-check-label" for="exampleCheck1">Inutile</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck2" value="opt1">
                            <label class="form-check-label" for="exampleCheck2">Interessante</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck3" value="opt1">
                            <label class="form-check-label" for="exampleCheck3">Tres Interessante</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck5" value="opt1">
                            <label class="form-check-label" for="exampleCheck5">Bulletin Null</label>
                        </div>
                    </form>
                </p>

                <div class="">
                    <div class="float-left">
                        <p class="card-text "><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                    <div class="float-right">
                            <a href="#" class="btn btn-facebook">voter</a>
                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
        <div class="card text">
            <div class="card-body">
                <h5 class="card-title text-center">Que doit etre la miss l'ENSET 2018?</h5>
                <p class="card-text">
                    <form action="">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" value="opt1">
                            <label class="form-check-label" for="exampleCheck1">Stephanie</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck2" value="opt1">
                            <label class="form-check-label" for="exampleCheck2">Julie</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck3" value="opt1">
                            <label class="form-check-label" for="exampleCheck3">Elizabeth</label>
                        </div>
                    </form>
                </p>

                <div class="">
                    <div class="float-left">
                        <p class="card-text "><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                    <div class="float-right">
                            <a href="#" class="btn btn-facebook">voter</a>
                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
        <div class="card text">
            <div class="card-body">
                <h5 class="card-title text-center">Que pensez vous de la formation as l'ENSET?</h5>
                <p class="card-text">
                    <form action="">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" value="opt1">
                            <label class="form-check-label" for="exampleCheck1">Inutile</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck2" value="opt1">
                            <label class="form-check-label" for="exampleCheck2">Interessante</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck3" value="opt1">
                            <label class="form-check-label" for="exampleCheck3">Tres Interessante</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck5" value="opt1">
                            <label class="form-check-label" for="exampleCheck5">Bulletin Null</label>
                        </div>
                    </form>
                </p>

                <div class="">
                    <div class="float-left">
                        <p class="card-text "><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                    <div class="float-right">
                            <a href="#" class="btn btn-facebook">voter</a>
                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>

    </div>


    <h1 class="h2 mt-2 pt-3">Quoi de 9 au Campus?</h1>
    <hr class="mb-2">

    <!-- Three columns of text below the carousel -->
    <div class="row mb-2">
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-warning">World</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="#">Featured post</a>
                    </h3>
                    <div class="mb-1 text-muted">Nov 12</div>
                    <p class="card-text mb-auto">This is a wider card with supporting text below as a natural
                        lead-in to additional content.</p>
                    <a href="#">Continue reading</a>
                </div>
                <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb"
                    alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_166a2ed484c%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_166a2ed484c%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.203125%22%20y%3D%22130.7%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                    data-holder-rendered="true">
            </div>
        </div> <!-- End col-md-6 -->
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-warning">World</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="#">Featured post</a>
                    </h3>
                    <div class="mb-1 text-muted">Nov 12</div>
                    <p class="card-text mb-auto">This is a wider card with supporting text below as a
                        natural
                        lead-in to additional content.</p>
                    <a href="#">Continue reading</a>
                </div>
                <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb"
                    alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_166a2ed484c%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_166a2ed484c%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.203125%22%20y%3D%22130.7%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                    data-holder-rendered="true">
            </div>
        </div><!-- End col-md-6 -->
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-warning">World</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="#">Featured post</a>
                    </h3>
                    <div class="mb-1 text-muted">Nov 12</div>
                    <p class="card-text mb-auto">This is a wider card with supporting text below as a
                        natural
                        lead-in to additional content.</p>
                    <a href="#">Continue reading</a>
                </div>
                <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb"
                    alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_166a2ed484c%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_166a2ed484c%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.203125%22%20y%3D%22130.7%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                    data-holder-rendered="true">
            </div>
        </div><!-- End col-md-6 -->
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-warning">World</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="#">Featured post</a>
                    </h3>
                    <div class="mb-1 text-muted">Nov 12</div>
                    <p class="card-text mb-auto">This is a wider card with supporting text below as a
                        natural
                        lead-in to additional content.</p>
                    <a href="#">Continue reading</a>
                </div>
                <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb"
                    alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_166a2ed484c%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_166a2ed484c%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.203125%22%20y%3D%22130.7%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                    data-holder-rendered="true">
            </div>
        </div><!-- End col-md-6 -->

    </div><!-- /.row -->
    <div class="float-right">
        <a href="#" class="btn btn-link">view more</a>
    </div>
    <div class="clearfix"></div>


    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

</div><!-- /.container -->
@endsection
