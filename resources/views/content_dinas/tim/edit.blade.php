@extends('Dashboard.Dinas.tim')
@section('content-crud')
    <div class="container">
      <h2>PERUBAHAN - TIM</h2><br  />
      <form method="post" action="{{URL::to('tim/'.$tim['id_tim'])}}">
      @csrf
      <input name="_method" type="hidden" value="PATCH">

      <div class="form-group row">
         <label for="name"class="col-md-4 col-form-label text-md-right">Nama Tim</label>
          <div class="col-md-4">

          <input type="text" class="form-control" name="nama_tim" value="{{$tim->nama_tim}}">
        </div>
      </div>

      <div class="form-group row">
        <label for="email"class="col-md-4 col-form-label text-md-right">Peran Tim</label>
            <div class="col-md-4">
              <select class="form-control" id="peran_tim" name="peran_tim">
                <option value="{{$tim->peran_tim}}" selected>{{$tim->peran_tim}}</option>
                <option value="Tim Reaksi Cepat">Tim Reaksi Cepat</option>
                <option value="Tim Penilaian Cepat">Tim Penilaian Cepat</option>
                <option value="Tim Tenaga Kesehatan">Tim Tenaga Kesehatan</option>
              </select>
          </div>
        </div>

        <!-- <div class="form-group row">
          <label for="email"class="col-md-4 col-form-label text-md-right">Anggota Tim</label>
              <div class="col-md-4">

              <input type="text" class="form-control" name="anggota_tim" value="{{$tim->anggota_tim}}">
            </div>
        </div> -->

        <div class="form-group row">
          <label for="email"class="col-md-4 col-form-label text-md-right">Posko </label>
          <div class="col-md-4">
            <!-- {{$tim->posko['id_posko']}} -->
            <select class="form-control" id="posko" name="posko">
              <option value="{{$tim->posko['id_posko']}}" selected>{{$tim->posko['nama_posko']}}</option>
              @foreach($posko as $posko)
              <option value="{{$posko->id_posko}}">{{$posko->nama_posko}}</option>
              @endforeach
            </select>
          </div>
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
@endsection
