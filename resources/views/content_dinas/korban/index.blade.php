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
        <th>ID</th>
        <th>Status Korban</th>
        <th>Nama Korban</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($korban as $korban)
      <tr>
        <td>{{$korban['id_korban']}}</td>
        <td>{{$korban['status_korban']}}</td>
        <td>{{$korban['nama_korban']}}</td>

        <td><a href="{{URL::to('korban/' . $korban['id_korban'] . '/edit')}}" class="btn btn-warning">Edit</a></td>
        <!--URL::to digunakan untuk mengarahkan ke url yang berada di dalamnya. URL tersebut didefinisikan di routes/web.php  -->
        <td>
          <form action="{{URL::to('korban/' . $korban['id_korban'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda yakin?')">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>
