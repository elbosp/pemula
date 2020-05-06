@extends('Dashboard.Dinas.bencana')
@section('content-crud')
    <div class="container">
      <h2>PERUBAHAN - POSKO</h2><br  />
        <form method="post" action="{{URL::to('posko/'.$posko['id_posko'])}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="form-group row">
            <label for="name"class="col-md-4 col-form-label text-md-right">Nama Posko</label>
            <div class="col-md-4">
            <input type="text" class="form-control" name="nama_posko" value="{{$posko->nama_posko}}">
          </div>
        </div>
        <div class="form-group row">
              <label for="email"class="col-md-4 col-form-label text-md-right">Nama Bencana</label>
              <div class="col-md-4">
              <input type="text" class="form-control" name="nama_bencana" value="{{$posko->nama_bencana}}">
            </div>
          </div>
        <div class="form-group row">
              <label for="email"class="col-md-4 col-form-label text-md-right">Nama Bencana</label>
              <div class="col-md-4">
              <input type="date" class="form-control" name="waktu_bencana" value="{{$posko->waktu_bencana}}">
            </div>
          </div>
          <div class="form-group row">
            <label for="sel1"class="col-md-4 col-form-label text-md-right">Provinsi</label>
            <div class="col-md-4">
              <select class="form-control" id="provinsi" name="provinsi" onchange="kabupatenFunct()">
                <option selected value="{{strtoupper($posko->alamat_provinsi_posko)}}">{{strtoupper($posko->alamat_provinsi_posko)}}</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="sel1"class="col-md-4 col-form-label text-md-right">Kabupaten</label>
            <div class="col-md-4">
              <select class="form-control" id="kabupaten" name="kabupaten" onchange="kecamatanFunct()">
                <option selected value="{{strtoupper($posko->alamat_kabupaten_posko)}}">{{strtoupper($posko->alamat_kabupaten_posko)}}</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="sel1"class="col-md-4 col-form-label text-md-right">Kecamatan</label>
            <div class="col-md-4">
              <select class="form-control" id="kecamatan" name="kecamatan" onchange="kelurahanFunct()">
                <option selected value="{{strtoupper($posko->alamat_kecamatan_posko)}}">{{strtoupper($posko->alamat_kecamatan_posko)}}</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
              <label for="sel1"class="col-md-4 col-form-label text-md-right">Kelurahan</label>
              <div class="col-md-4">
              <select class="form-control" id="kelurahan" name="kelurahan">
                <option selected value="{{strtoupper($posko->alamat_kelurahan_posko)}}">{{strtoupper($posko->alamat_kelurahan_posko)}}</option>
              </select>
            </div>
          </div>

        <div class="form-group row">
          <div class="col-md-4">
          <div class="form-group col-md-4" style="margin-top:30px">
            <button type="submit" class="btn btn-success" style="margin-left:365px">Update</button>
          </div>
        </div>

      </form>
    </div>
    <script type="text/javascript" src="{{asset('js/api.js')}}"></script>
@endsection
