
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="{{asset('js/register.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{asset('css/register.css')}}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="icon" href="{{asset('img/Favicon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Register page</title>
</head>
<body>

<section>
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
    <a class="navbar-brand" href="{{route('home')}}">PEMULA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    </div>
  </nav>
</section>

<main class="my-form">
  <div class="cotainer" style="">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Register</div>
          <div class="card-body">
            <form name="my-form" onsubmit="return validform()" action="{{route('akun.simpan')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group row">
                <label for="nama_relawan" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>
                <div class="col-md-6">
                  <input type="text" id="nama_relawan" class="form-control" name="nama_relawan"  placeholder="Nama lengkap anda" required>
                </div>
              </div>
              <div class="form-group row">
                  <label for="email_relawan" class="col-md-4 col-form-label text-md-right">Alamat Email</label>
                  <div class="col-md-6">
                      <input type="email" id="email_relawan" class="form-control" name="email_relawan" placeholder="Alamat email anda" required>
                  </div>
              </div>
              <div class="form-group row">
                <label for="keahlian" class="col-md-4 col-form-label text-md-right">Keahlian</label>
                <div class=" col-md-6">
                  <select class="form-control" id="keahlian" name="keahlian">
                    <option value="" disabled selected>Pilih Keahlian</option>
                    <option value="Dokter">Dokter</option>
                    <option value="Sanitarian">Sanitarian</option>
                    <option value="Ahli Gizi">Ahli Gizi</option>
                    <option value="Apoteker">Apoteker</option>
                    <option value="Umum">Umum</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="sel1" class="col-md-4 col-form-label text-md-right">Provinsi</label>
                <div class=" col-md-6">
                  <select class="form-control" id="provinsi" name="provinsi" onchange="kabupatenFunct()">
                    <option value="" selected disabled>Pillih Provinsi</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="sel1" class="col-md-4 col-form-label text-md-right">Kabupaten</label>
                <div class="col-md-6">
                  <select class="form-control" id="kabupaten" name="kabupaten" onchange="kecamatanFunct()">
                    <option value='' disabled selected>Pilih Kabupaten</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="sel1" class="col-md-4 col-form-label text-md-right">Kecamatan</label>
                <div class="col-md-6">
                  <select class="form-control" id="kecamatan" name="kecamatan" onchange="kelurahanFunct()">
                    <option value="" disabled selected>Pilih Kecamatan</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="sel1" class="col-md-4 col-form-label text-md-right">Kelurahan</label>
                <div class="col-md-6">
                  <select class="form-control" id="kelurahan"  name="kelurahan">
                    <option value="" disabled selected>Pilih Kelurahan</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                <div class="col-md-6">
                    <input type="Password" id="password" name="password" class="form-control">
                </div>
              </div>
              <div class="form-group row">

                  <label for="image" class="col-md-4 col-form-label text-md-right">Upload Berkas</label>
                  <div class="col-md-6">

                <div class="col-md-6">
                  <!-- <label for="image">Foto terbaru Anda</label> -->

                  <input type="file" class="form-control-file" id="image" name="image">
                </div>
              </div>
                  </div>


                  <div class="form-group row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4" style="margin-top:30px">
                      <button type="reset"  class ="btn btn-danger" style="left:38px">Reset</button>
                      <button type="submit" class="btn btn-success" style="left:38px">Submit</button>
                    </div>
                  </div>


          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</main>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{asset('js/api.js')}}"></script>
<script type="text/javascript" src="{{asset('js/register.js')}}"></script>

</body>
</html>
