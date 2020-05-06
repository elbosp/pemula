@extends('Dashboard.Dinas.tim')
@section('content-crud')
<a class="btn btn-info" href="{{route('tim.create')}}" role="button">Tambah</a>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Nama Tim</th>
        <th>Ketua Tim</th>
        <th>Anggota Tim</th>
        <th>Anggota Tim</th>
        <th>Anggota Tim</th>
        <th>Anggota Tim</th>
        <th>Anggota Tim</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$tim->nama_tim}}</td>
        <td>{{$ketuaTim->nama_relawan}}</td>
        @foreach($relawan as $relawan)
          @if($ketuaTim->nama_relawan != $relawan->nama_relawan)
            <td>{{$relawan->nama_relawan}}</td>
          @endif
        @endforeach
      </tr>
      <!-- {{$relawan}} -->

    </tbody>
  </table>
  </div>
@endsection
