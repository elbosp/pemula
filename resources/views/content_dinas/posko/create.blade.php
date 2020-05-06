@extends('Dashboard.Dinas.bencana')
@section('content-crud')
    <div class="container">
      <h2>PENAMBAHAN - POSKO</h2><br/>
      <form method="post" action="{{route('posko.store')}}">
        @csrf

<div class="card">
  <div class="card-header"></div>
  <div class="card-body">
        <div class="form-group row">
            <label for="nama_posko" class="col-md-4 col-form-label text-md-right">Nama Posko</label>
            <div class="col-md-4">
            <input type="text" class="form-control" name="nama_posko" placeholder="Nama Posko">
          </div>
        </div>

        <div class="form-group row">
            <label for="nama_bencana" class="col-md-4 col-form-label text-md-right">Nama Bencana</label>
            <div class="col-md-4">
            <input type="text" class="form-control" name="nama_bencana" placeholder="Nama Bencana">
          </div>
        </div>

        <div class="form-group row">
            <label for="waktu_bencana" class="col-md-4 col-form-label text-md-right">Waktu Bencana</label>
            <div class="col-md-4">
            <input type="date" class="form-control" name="waktu_bencana" placeholder="Waktu Bencana">
          </div>
        </div>

        <div class="form-group row">
          <label for="sel1" class="col-md-4 col-form-label text-md-right">Provinsi</label>
          <div class="col-md-4">
          <select class="form-control" id="provinsi" name="provinsi" onchange="kabupatenFunct()">
            <option value="" selected disabled>Pilih Provinsi</option>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="sel1" class="col-md-4 col-form-label text-md-right">Kabupaten</label>
              <div class=" col-md-4">
            <select class="form-control" id="kabupaten" name="kabupaten" onchange="kecamatanFunct()">
              <option value="" selected disabled>Pilih Kabupaten</option>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="sel1" class="col-md-4 col-form-label text-md-right">Kecamatan</label>
          <div class=" col-md-4">
            <select class="form-control" id="kecamatan" name="kecamatan" onchange="kelurahanFunct()">
              <option value="" selected disabled>Pilih Kecamatan</option>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="sel1" class="col-md-4 col-form-label text-md-right">Kelurahan</label>
          <div class=" col-md-4">
            <select class="form-control" id="kelurahan" name="kelurahan">
              <option value="" selected disabled>Pilih Kelurahan</option>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-4">
          <div class="form-group col-md-4" style="margin-top:30px">
            <button type="submit" class="btn btn-success" style="margin-left:365px;">Submit</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>

    <script type="text/javascript" src="{{asset('js/api.js')}}"></script>
@endsection
