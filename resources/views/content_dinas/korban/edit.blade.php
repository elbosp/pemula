<!-- edit.blade.php -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CRUD TESTING - KORBAN </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
      <h2>Edit A Form</h2><br  />
      <form method="post" action="{{URL::to('korban/'.$korban['id_korban'])}}">
      @csrf
      <input name="_method" type="hidden" value="PATCH">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
          <label for="name">Nama Korban: </label>
          <input type="text" class="form-control" name="nama_korban" value="{{$korban->nama_korban}}">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="email">Status Korban: </label>
            <input type="text" class="form-control" name="status_korban" value="{{$korban->status_korban}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
