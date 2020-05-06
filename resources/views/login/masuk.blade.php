<!DOCTYPE html>
<html lang="en">
<head>
	<title>Masuk - PEMULA</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="{{asset('images/icons/favicon.ico')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/animsition/css/animsition.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/daterangepicker/daterangepicker.cs')}}s">
	<link rel="stylesheet" type="text/css" href="{{asset('css/mutil.css')}}">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('css/masuk.css')}}"></head>
<body style="background-color: #666666;">
		@include('sweet::alert')
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="{{route('akun.login.submit')}}">
          @csrf
					<span class="login100-form-title p-b-43">
						Masuk - PEMULA
					</span>


					<div class="wrap-input100 validate-input" data-validate = "Email is required">
						<input class="input100" type="email" name="email_pengguna" id="inputEmail">
              @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
          		@endif
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" id="inputPassword">

            <span class="focus-input100"></span>
						<span class="label-input100">Kata Sandi</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="btn btn-primary login100-form-btn">
							Masuk
						</button>
					</div>

          <div class="container-login100-form-btn">
						<a class="btn btn-success login100-form-btn" href="{{route('akun.regis')}}" >
							Daftar
						</a>
					</div>


				</form>

				<div class="login100-more" style="background-image: url({{asset('img/bg5.jpg')}});">
         <p>PEMULA</p>
         <h4>Sistem Pengelolaan dan Penanggulangan Bencana</h4>
				</div>
			</div>
		</div>
	</div>

	<script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('vendor/animsition/js/animsition.min.js')}}"></script>
	<script src="{{asset('vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
	<script src="{{asset('vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
	<script src="{{asset('vendor/countdowntime/countdowntime.js')}}"></script>
	<script src="{{asset('js/masuk.js')}}"></script>

</body>
</html>
