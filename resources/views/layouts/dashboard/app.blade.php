<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">

    <title>IT-JobVinder</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
    @trixassets
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
  




    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/noty/noty.css')}}">
    <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js')}}"></script>
    
    <style>
      label {
        font-weight: bold;
      }
    </style>

    @stack('styles')
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    @include('layouts.dashboard._header')
    <!-- Sidebar menu-->
    @include('layouts.dashboard._aside')
    <main class="app-content">
      <!-- <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div> -->
      @include('dashboard.partials._sessions')
      @yield('content')

      
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('dashboard_files/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('dashboard_files/js/popper.min.js')}}"></script>
    <script src="{{ asset('dashboard_files/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('dashboard_files/plugins/select2/select2.min.js')}}"></script>

    <script src="{{ asset('dashboard_files/js/main.js')}}"></script>
    <script src="{{ asset('dashboard_files/js/custom/movie.js')}}"></script>


    <script src="https://cdn.tiny.cloud/1/g8fwlobi2i4dkh20e4xxo6wfsb6yniyyllhnzeor6ucj13bj/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
    tinymce.init({
      selector: '#textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
    });
  </script>
    <script>
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content');
        }
      });

      $(document).ready(function () {
          $(document).on('click', '.delete', function (e) {
            e.preventDefault();

            var that = $(this);
            var n = new Noty({
              text: "Confirm deleting record",
              killer: true,
              buttons: [
                Noty.button('yes', 'btn btn-success mr-2', function() {
                    that.closest('form').submit()
                }),
                Noty.button('no', 'btn btn-danger', function() {
                    n.close()
                }),
              ]
            });
            n.show();
          });

          $('.select2').select2({
            width: '100%'
          });
      });
    </script>
  </body>
</html>