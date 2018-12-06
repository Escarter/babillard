<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="mtncameroon">
  <!-- Chrome, Firefox OS and Opera -->
  <meta name="theme-color" content="#343a40">
  <!-- Windows Phone -->
  <meta name="msapplication-navbutton-color" content="#343a40">
  <!-- iOS Safari -->
  <meta name="apple-mobile-web-app-status-bar-style" content="#343a40">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/favicon.png') }}">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}"> @yield('title')
  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  <style>
    .card {
        margin: 0 auto !important; /* Added */
        float: none  !important; /* Added */
        margin-bottom: 10px  !important; /* Added */
    }
    body.sticky-footer {
         margin-bottom: 0px !important;
    }
  </style>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

  @yield('content')

  <a class="scroll-to-top rounded" href="#page-top">
         <i class="fa fa-angle-up"></i>
    </a>
  <!-- Scripts -->
  <script src="{{ asset('js/admin.js') }}"></script>
  <script src="{{ asset('js/sumit-form.js') }}"></script>
  <script>
    $(document).ready(function(){

         $('form[data-autosubmit]').autosubmit();

            $(function() {
                var d = new Date();
                $('input[name="daterange"]').daterangepicker({
                    opens: 'left',autoApply: true, startDate: d, endDate:d.setMonth(d.getMonth() - 1)
                    },

                    function(start, end, label){
                    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                    }
                );
            });
      })


      // Redirect back
      $('.redirectBackBtn').on('click', function(e){
        e.preventDefault();
        history.back(-1);
    })
    $('.dataTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });

      toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
      }
      if(sessionStorage.getItem("success") ){
          toastr.success(sessionStorage.getItem("success"),"@lang('Great Job')")
          sessionStorage.clear();
      }else if(sessionStorage.getItem("error")){
          toastr.error(sessionStorage.getItem("error"),"@lang('Ooops something is broken!')")
          sessionStorage.clear();
      }else if(sessionStorage.getItem("warning")){
          toastr.warning(sessionStorage.getItem("error"),"@lang('Ooops something is broken!')")
          sessionStorage.clear();
      }
  </script>

  @yield('script')
</body>

</html>
