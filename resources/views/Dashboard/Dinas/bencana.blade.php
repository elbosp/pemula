@extends('Dashboard.Dinas.master-dashboard')
@section('title')
<title>Dashboard Dinas Kesehatan-Kelola Bencana</title>
@endsection
@section('content-dashboard')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Kelola Bencana</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
          <li><i class="fa fa-laptop"></i>Kelola Bencana</li>
        </ol>
      </div>
    </div>
    @yield('content-crud')
  </section>
</section>
@endsection
