const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js(['resources/libs/jquery/dist/jquery.min.js',
        'resources/libs/popper/popper.min.js',
        'resources/libs/bootstrap/dist/js/bootstrap.min.js'
    ], 'public/js/app.js')
   .sass('resources/sass/app.scss', 'public/css')
   .styles([
        // "resources/libs/admin/bootstrap/css/custom-bootstrap.min.css",
        "resources/libs/admin/datatables/datatables.css",
        "resources/libs/admin/font-awesome/css/font-awesome.css",
        "resources/libs/admin/toastr/build/toastr.min.css",
        "resources/libs/admin/dist/css/sb-admin.css",
        "resources/libs/admin/bootstrap-datepicker/css/bootstrap-datepicker3.standalone.min.css",
        "resources/libs/admin/bootstrap-datepicker/css/daterangepicker.css",
    ], "public/css/admin.css")
    .scripts([
        "resources/libs/admin/jquery/jquery.min.js",
        "resources/libs/admin/bootstrap/js/bootstrap.bundle.min.js",
        "resources/libs/admin/bootstrap-datepicker/js/bootstrap-datepicker.min.js",
        "resources/libs/admin/bootstrap-datepicker/js/moment.min.js",
        "resources/libs/admin/bootstrap-datepicker/js/daterangepicker.min.js",
        "resources/libs/admin/jquery-easing/jquery.easing.min.js",
        "resources/libs/admin/datatables/datatables.js",
        "resources/libs/admin/toastr/build/toastr.min.js",
        "resources/libs/admin/sweetalert/dist/sweetalert.min.js",
        "resources/libs/admin/chart.js/Chart.js",
        "resources/libs/admin/dist/js/sb-admin.js",
  ],
  "public/js/admin.js");
