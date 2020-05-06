@extends('Dashboard.Relawan.master-dashboard-relawan')
@section('title')
  <title>Dashboard Relawan-Arahan Dinas</title>
@endsection
@section('content-dashboard')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i>Arahan Dinas</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a>Home</a></li>
          <li><i class="fa fa-laptop"></i>Arahan Dinas</li>
        </ol>
      </div>
    </div>
    @yield('content')
  </section>
</section>
@endsection
