<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">

  @yield('title')

  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/bootstrap-theme.css')}}" rel="stylesheet">
  <link href="{{asset('css/elegant-icons-style.css')}}" rel="stylesheet" />
  <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet" type="text/css" media="screen" />
  <link href="{{asset('css/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet">
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet" />
  <link href="{{asset('css/jquery-ui-1.10.4.min.css')}}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

</head>

<body>
  <!-- container section start -->
  <section id="container" class="">
    @include('Dashboard.inc.navbar')

    @include('Dashboard.inc.sidebar_relawan')

    @yield('content-dashboard')
  </section>
    <!-- javascripts -->
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/jquery-ui-1.10.4.min.js')}}"></script>
    <script src="{{asset('js/jquery-1.8.3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/js/jquery-ui-1.9.2.custom.min.js')}}"></script>
    <!-- bootstrap -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- nice scroll -->
    <script src="{{asset('js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/owl.carousel.js')}}"></script>
      <!-- custom select -->
      <script src="{{asset('js/jquery.customSelect.min.js')}}"></script>
      <script src="{{asset('assets/chart-master/Chart.js')}}"></script>

      <!--custome script for all page-->
      <script src="{{asset('js/scripts.js')}}"></script>
      <!-- custom script for this page-->

      <script src="{{asset('js/jquery.placeholder.min.js')}}"></script>
      <script src="{{asset('js/jquery.slimscroll.min.js')}}"></script>

</body>

</html>
