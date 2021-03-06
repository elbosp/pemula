<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
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
        <th>Username</th>
        <th>Evaluasi</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($pengguna as $pengguna)
      <tr>
        <td>{{$pengguna['username']}}</td>
        <td>{{$pengguna['evaluasi_kerja']}}</td>

        <td><a href="{{action('PenggunaController@edit', $pengguna['$id_pengguna'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('PenggunaController@destroy', $pengguna['$id_pengguna'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>
