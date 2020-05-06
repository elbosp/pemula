@extends('Dashboard.Dinas.tim')
@section('content-crud')
<a class="btn btn-info" href="{{route('tim.create')}}" role="button">Tambah</a>

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
        <th>Nama Tim</th>
        <th>Peran Tim</th>
        <th>Posko</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($tim as $tim)
      <tr>
        <td>{{$tim['nama_tim']}}</td>
        <td>{{$tim['peran_tim']}}</td>
        <td>{{$tim->posko['nama_posko']}}</td>
        <td><a href="{{URL::to('tim/'.$tim['id_tim'])}}" class="btn btn-success">Detail</a></td>
        <!-- <td><a href="{{URL::to('tim/'.$tim['id_tim'].'/anggota')}}" class="btn btn-success">Anggota</a></td> -->
        <td><a href="{{URL::to('tim/'.$tim['id_tim'].'/edit')}}" class="btn btn-info">Edit</a></td>

        <td>
          <form action="{{URL::to('tim/'.$tim['id_tim'])}}" method="post">
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
