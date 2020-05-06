@extends('Dashboard.Dinas.tim')
@section('content-crud')
    @include('footer')
    <div class="container">
      <h2>MOBILISASI - TIM</h2><br/>
      <form method="post" action="{{route('tim.store')}}" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
            <label for="nama_tim" class="col-md-4 col-form-label text-md-right">Nama Tim:</label>
            <div class="col-md-4">
            <input type="text" class="form-control" name="nama_tim">
          </div>
        </div>

        <div class="form-group row">
            <label for="peran_tim" class="col-md-4 col-form-label text-md-right">Peran Tim</label>
            <div class="col-md-4">
            <select class="form-control" id="peran_tim" name="peran_tim">
              <option value="" disabled selected>-Pilih Peran Tim-</option>
              <option value="Tim Reaksi Cepat">Tim Reaksi Cepat</option>
              <option value="Tim Penilaian Cepat">Tim Penilaian Cepat</option>
              <option value="Tim Tenaga Kesehatan">Tim Tenaga Kesehatan</option>
            </select>
          </div>
        </div>

        <div class="form-group row">
            <label for="posko" class="col-md-4 col-form-label text-md-right">Posko</label>
            <div class="col-md-4">
            <select class="form-control" id="posko" name="posko">
              <option value="" disabled selected>-Pilih Posko-</option>
              @foreach($posko as $posko)
              <option value="{{$posko->id_posko}}">{{$posko->nama_posko}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-group row">
            <label for="ketua_tim" class="col-md-4 col-form-label text-md-right">Ketua Tim</label>
            <div class="col-md-4">
            <div id="container">
              <select class="form-control" name="ketua_tim" onchange="anggota()" id="ketua_tim">
                <option value="" disabled selected>-Pilih Ketua-</option>
                @foreach($relawan as $relawans)
                  <option value="{{$relawans->id_relawan}}">{{$relawans->nama_relawan}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div id="anggota_baru" >
            <label for="angota_tim"class="col-md-4 col-form-label text-md-right">Anggota Tim</label>
            <div class="col-md-4">
            <select class="form-control" name="anggota_tim[]" onchange="menambah()">
              <option value="0" disabled selected>-Pilih Anggota-</option>
            </select>
          </div>
          <button type="button" name="tambah" id="tambah" onclick="duplikat()" class="btn btn-info" style="margin-top:0px;">Tambah</button>
        </div>
      </div>
        <div class="form-group row">
          <div class="col-md-4">
          <div class="form-group col-md-4" style="margin-top:30px">
            <button type="submit" class="btn btn-success" style="margin-left:370px">Submit</button>
          </div>
        </div>
      </div>

      </form>
    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript">

      var index = 0;
      var data = window.rel;
      var tempoSel = [0];
      var limit = 0;
      var getData = document.getElementsByName('anggota_tim[]');
      function anggota() {
        index = 0;
        var valueId = document.getElementById('ketua_tim').value;
        getData[index].innerHTML = "<option value='"+0+"' disabled selected>-Pilih Anggota-</option>";
        for (i in data) {
          if(data[i].id_relawan!=valueId) {
            var html = "<option value='"+data[i].id_relawan+"'>"+data[i].nama_relawan+"</option>";
            getData[index].innerHTML+=html;
          }
        }
        tempoSel[index] = valueId;
        index = index+1;
      }

      function menambah() {
        var valueId = getData[limit].value;
        tempoSel[limit+1] =valueId;
      }

      function duplikat() {
        var require = getData[limit].value;
        if (limit<4 && require!=0) {
          limit = limit+1;
          var syntax = "<div class='baru'><select class='form-control' name='anggota_tim[]' onchange='menambah()'><option value='"+0+"' disabled selected>-Pilih Anggota-</option></select><button class='btn btn-danger remove' type='button'>Hapus</button><div>";
          $('#anggota_baru').append(syntax);
          var batasan = tempoSel.length;
          // getData[limit].innerHTML = "<option value='"+0+"' disabled selected>-Pilih Anggota-</option>";
          for (i in data) {
            var par = 0;
            for (var j=0; j<batasan; j++) {
              if(data[i].id_relawan==tempoSel[j]) {
                par = par+1;
              }
            }
            if(par==0) {
              var html = "<option value='"+data[i].id_relawan+"'>"+data[i].nama_relawan+"</option>";
              getData[limit].innerHTML+=html;
            }
          }
        } else if (require==0) {
          alert('anda harus mengisi anggota sebelumnya');
        } else {
          alert('Hanya bisa membentuk lima anggota saja');
        }
      }
      $(document).on('click', '.remove', function() {
        $(this).closest('div').remove();
        tempoSel[limit+1] = 0;
        limit = limit-1;
      });
    </script>
@endsection
