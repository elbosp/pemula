
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Beranda - PEMULA</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="{{asset('vendor/magnific-popup/magnific-popup.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/creative.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

  </head>

  <body id="page-top">
    @include('sweet::alert')
    <!-- Navigation -->

    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">

      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Pemula</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">Tentang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Layanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link "href="{{route('akun.login')}}">Masuk</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>P E M U L A</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5">Sistem Pengelolaan Tim Penanggulangan Krisis Bencana</p>

            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Ingin Lebih tau ? </a>
          </div>
        </div>
      </div>
    </header>

    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">Penjelasan !</h2>
            <hr class="light my-4">
            <p class="text-faded mb-4">Sistem Pengelolaan Tim Penanggulangan Krisis Bencana (PEMULA) yakni suatu sistem perangkat lunak untuk pengelolaan tim kesehatan dalam penanggulangan krisis bencana, pembentukan atau pembagian tim, dan pendataan relawan tenaga kesehatan yang tersedia.</p>
            <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">LAYANAN PEMULA APA AJA SIH?</a>
          </div>
        </div>
      </div>
    </section>

    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Layanan PEMULA</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-book text-primary mb-3 sr-icon-1"></i>
              <h3 class="mb-3">Pendataan</h3>
              <div class="text-left">
              <p class="text-muted mb-0">Pendataan korban bencana alam, dan pendataan Relawan.</p>
            </div>
          </div>
        </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-bullhorn text-primary mb-3 sr-icon-2"></i>
              <h3 class="mb-3">Mobilisasi</h3>
              <div class="text-left">
              <p class="text-muted mb-0">Mobilisasi dan penempatan TIM dan Jenis TIM relawan tiap posko dan penempatan pada lingkungan yang
                rawan bencana!</p>
            </div>
          </div>
        </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-code text-primary mb-3 sr-icon-3"></i>
              <h3 class="mb-3">Up to Date</h3>
              <div class="text-left">
              <p class="text-muted mb-0">Update berita terkini, dari berita bencana, cuaca dan lainya.</p>
            </div>
          </div>
        </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-heart text-primary mb-3 sr-icon-4"></i>
              <h3 class="mb-3">Hubungan Sosial</h3>
              <div class="text-left">
              <p class="text-muted mb-0">Hubungan antara relawan dan dinas kesehatan untuk masyarakat.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="contact">
     <div class="container">
       <div class="col-lg-8 mx-auto text-center">
         <h2 class="section-heading">BananaLatte Team</h2>
         <hr class="my-4">
         <p class="mb-5">Our Team</p>
       </div>
       <div class="row align-items-center">
         <div class="col-lg-6 order-lg-2">
           <div class="p-5">
             <img class="img-fluid rounded-circle" src="img/profilee.jpg" alt="">
           </div>
         </div>
         <div class="col-lg-6 order-lg-1">
           <div class="p-5">
             <h2 class="display-4">Raffi Akhyari</h2>
             <h3 class="display-4">17523207</h3>
           </div>
         </div>
       </div>

       <div class="row align-items-center">
         <div class="col-lg-6">
           <div class="p-5">
             <img class="img-fluid rounded-circle" src="img/profileee.jpeg" alt="">
           </div>
         </div>
         <div class="col-lg-6">
           <div class="p-5">
             <h2 class="display-4">Andri Ruslam</h2>
             <h3 class="display-4">17523221</h3>
           </div>
         </div>
       </div>

       <div class="row align-items-center">
         <div class="col-lg-6 order-lg-2">
           <div class="p-5">
             <img class="img-fluid rounded-circle" src="img/profileeee.jpeg" alt="">
           </div>
         </div>
         <div class="col-lg-6 order-lg-1">
           <div class="p-5">
             <h2 class="display-4">Elbo Shindi</h2>
             <h3 class="display-4">17523083</h3>
           </div>
         </div>
       </div>

     </div>
   </section>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('vendor/scrollreveal/scrollreveal.min.js')}}"></script>
    <script src="{{asset('vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{asset('js/creative.min.js')}}"></script>

  </body>

</html>
