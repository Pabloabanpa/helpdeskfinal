@extends('layouts.template_admin')

<!--  Conteido Para Pruebas-->
@section('contenido_prueba')
<div  id="Solicitudes_atendidas">

</div>
@endsection


 <!-- Navbar  -->
 @section('navbar')
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-absolute">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <div class="navbar-toggle">
          <button type="button" class="navbar-toggler">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
          </button>
        </div>
        <a class="navbar-brand" >Dashboard Soporte Técnico</a>
      </div>
    </div>
  </nav>
 @endsection

<!-- Navbar Conteido -->
 @section('navbar_contenido')
 <body class="">
    <div class="wrapper ">
      <div class="sidebar" data-color="orange">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
      -->
      <div class="logo">
        <a class="simple-text logo-normal" style="font-size: 32px; font-weight: bold;">
          Help Desk
        </a>
      </div>

        <div class="sidebar-wrapper" id="sidebar-wrapper">
          <ul class="nav">

            <li>
              <a href="#" id="cargarSolicitudes">
                <i class="now-ui-icons files_single-copy-04"></i>
                <p>Ver Solicitudes Asignadas</p>
              </a>
            </li>
            <li>
                <a href="#" id="cargarAtenciones">
                  <i class="now-ui-icons education_paper"></i>
                  <p>Registrar Atenciones</p>
                </a>
              </li>

          </ul>
        </div>
      </div>
      <div class="main-panel" id="main-panel">
 @endsection
     <!--  Conteido -->
     @section('contenido')
     <div id="contenido">
    </div>
     @endsection

 <!-- Head Conteido -->
 @section('head')
 <head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title> Help Desk    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="{{asset('https://fonts.googleapis.com/css?family=Montserrat:400,700,200')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('https://use.fontawesome.com/releases/v5.7.1/css/all.css')}}" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/now-ui-dashboard.css?v=1.5.0')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('assets/demo/demo.css')}}" rel="stylesheet" />
  </head>
 @endsection



  <!-- Scripts -->
  @section('scripts')

  <!--   Core JS Files   -->
  <script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!--  Google Maps Plugin    -->
  <script src="{{asset('https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE')}}"></script>
  <!-- Chart JS -->
  <script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{asset('assets/js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('assets/js/now-ui-dashboard.min.js?v=1.5.0')}}" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{asset('assets/demo/demo.js')}}"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();
    });
  </script>
  @endsection



  @section('scripts_redirect')

<!--Script para mostrar solicitude.index en el div  -->
<script>
    $(document).ready(function(){
      $('#cargarSolicitudes').on('click', function(e) {
        e.preventDefault();
        $.ajax({
          url: "{{ route('solicitude.index_tecnico') }}",
          method: 'GET',
          success: function(data) {
            $('#Solicitudes_atendidas').html(data);
          },
          error: function() {
            alert('Error al cargar el contenido de la solicitud.');
          }
        });
      });
    });
  </script>
<!--Script para mostrar atencione.index en el div  -->
<script>

    $(document).ready(function(){
      $('#cargarAtenciones').on('click', function(e) {
        e.preventDefault();
        $.ajax({
          url: "{{ route('atencione.index') }}",
          method: 'GET',
          success: function(data) {
            $('#contenido').html(data);
          },
          error: function() {
            alert('Error al cargar el contenido de la atencion.');
          }
        });
      });
    });
  </script>


@endsection
