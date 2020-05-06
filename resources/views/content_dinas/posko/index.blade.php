@extends('Dashboard.Dinas.bencana')
@section('content-crud')
<a class="btn btn-info" href="{{route('posko.create')}}" role="button">Tambah</a>

    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     @include('sweet::alert')
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Nama Posko</th>
        <th>Nama Bencana</th>
        <th>Waktu Bencana</th>
        <th>Alamat Lengkap</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($posko as $posko)
      <tr>
        <td>{{$posko['nama_posko']}}</td>
        <td>{{$posko['nama_bencana']}}</td>
        <td>{{$posko['waktu_bencana']}}</td>
        <td>{{$posko['alamat_lengkap_posko']}}</td>
        <td><a href="{{URL::to('posko/'.$posko['id_posko'].'/edit')}}" class="btn btn-info">Edit</a></td>
        <td>
          <form action="{{URL::to('posko/'.$posko['id_posko'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda yakin?')">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection
