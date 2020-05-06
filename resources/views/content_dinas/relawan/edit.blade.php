@extends('Dashboard.Dinas.relawan')
@section('content-crud')

<div class="container">
<h2>PERUBAHAN DATA - RELAWAN</h2><br/>
<div class="card">
<div class="card-header"></div>
    <div class="card-body">
      <form method="post" action="{{URL::to('relawan/'.$relawan['id_relawan'])}}">
      @csrf
      <input name="_method" type="hidden" value="PATCH">

      <div class="form-group row">
        <label for="name"  class="col-md-4 col-form-label text-md-right">Nama Relawan</label>
        <div class="col-md-4">
          <input type="text" class="form-control" name="nama_relawan" value="{{$relawan->nama_relawan}}">
        </div>
      </div>

      <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">Email Relawan</label>
              <div class="col-md-4">
            <input type="email" class="form-control" name="email_relawan" value="{{$relawan->email_relawan}}" readonly>
          </div>
      </div>
      <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">Status Relawan</label>
              <div class="col-md-4">
            <input type="text" class="form-control" name="status_relawan" value="{{$relawan->status_relawan}}" readonly>
          </div>
      </div>

      <div class="form-group row">
          <label for="keahlian" class="col-md-4 col-form-label text-md-right">Keahlian</label>
          <div class="col-md-4">
          <select class="form-control" id="keahlian" name="keahlian">
            <option value="{{$relawan->keahlian}}">{{$relawan->keahlian}}</option>
            <option value="">--</option>
            <option value="Dokter">Dokter</option>
            <option value="Sanitarian">Sanitarian</option>
            <option value="Ahli Gizi">Ahli Gizi</option>
            <option value="Umum">Umum</option>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="sel1" class="col-md-4 col-form-label text-md-right">Provinsi</label>
          <div class=" col-md-4">
          <select class="form-control" id="provinsi" name="provinsi" onchange="kabupatenFunct()">
            <option selected value="{{strtoupper($relawan->alamat_provinsi_relawan)}}">{{strtoupper($relawan->alamat_provinsi_relawan)}}</option>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="sel1" class="col-md-4 col-form-label text-md-right">Kabupaten</label>
        <div class=" col-md-4">
          <select class="form-control" id="kabupaten" name="kabupaten" onchange="kecamatanFunct()">
            <option selected value="{{strtoupper($relawan->alamat_kabupaten_relawan)}}">{{strtoupper($relawan->alamat_kabupaten_relawan)}}</option>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="sel1" class="col-md-4 col-form-label text-md-right">Kecamatan</label>
        <div class=" col-md-4">
          <select class="form-control" id="kecamatan" name="kecamatan" onchange="kelurahanFunct()">
            <option selected value="{{strtoupper($relawan->alamat_kecamatan_relawan)}}">{{strtoupper($relawan->alamat_kecamatan_relawan)}}</option>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="sel1" class="col-md-4 col-form-label text-md-right">Kelurahan</label>
        <div class=" col-md-4">
          <select class="form-control" id="kelurahan" name="kelurahan">
            <option selected value="{{strtoupper($relawan->alamat_kelurahan_relawan)}}">{{strtoupper($relawan->alamat_kelurahan_relawan)}}</option>
          </select>
        </div>
      </div>

        <div class="form-group row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:30px">
            <button type="submit" class="btn btn-success" style="left:38px">Update</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>

    <script type="text/javascript" src="{{asset('js/api.js')}}"></script>
@endsection
