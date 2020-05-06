<!DOCTYPE html>
<html>
<head>
    <title>Profil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat:200,300,400,600,700'>
    ​<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/detail.css')}}">
</head>
<body>
    <div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="img/profilee.jpg">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                            <h3>Raffi Akhyari</h3>
                            <h4>Tranporter/Ulil Albab</h4>
                            <ul class="nav nav-tabs" id="myTab" role="tablist"><li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tentang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                            <p>RELAWAN AKTIF</p>
                            <button type="button" class="btn btn-sm btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
                                <div class="handle"></div>
                            </button>

                            <p>UNDUH DATA</p>

                            <button class="btn"><i class="fa fa-cloud-download"></i></button>
                            <button class="btn"><i class="fa fa-envelope-o"></i> KIRIM PESAN</button>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Nama</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Raffi Akhyari</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Alamat</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Degolan, Sleman</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Keahlian</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Transporter</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Tim</label>
                                    </div>
                                    <div class="col-md-4">
                                        <p>Tim Ulil Albab</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Status</label>
                                    </div>
                                    <div class="col-md-1">
                                        <p>Aktif</p>
                                    </div>
                                </div>

                            <div id="timeline">
                                <div class="dot" id="one">
                                    <span></span>
                                    <date>2005</date>
                                </div>
                              <div class="dot" id="two">
                                    <span></span>
                                    <date>2005</date>
                                </div>
                              <div class="dot" id="three">
                                    <span></span>
                                    <date>2006</date>
                                </div>
                              <div class="dot" id="four">
                                    <span></span>
                                    <date>2006</date>
                                </div>
                                 <div class="dot" id="five">
                                    <span></span>
                                    <date>2007</date>
                                </div>

                            </div>

                            <!-- Modals -->

                            <article class='modal one'>
                              <date>26/06 - 1280</date>
                              <h2>Mendaftar</h2>
                              <p></p>
                            </article>

                            <article class='modal two'>
                              <date>08/09 - 1649</date>
                              <h2>Tervalidasi</h2>
                              <p></p>
                            </article>

                            <article class='modal three'>
                              <date>21/07 - 1831</date>
                              <h2>Aktif</h2>
                              <p></p>
                            </article>

                            <article class='modal four'>
                              <date>03/02 - 1992</date>
                              <h2>Mais pourquoi?</h2>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates magnam excepturi laboriosam minima soluta, quae. Sunt repellat totam non, et sed in veniam fuga odio eius! Nesciunt amet optio recusandae? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum sit dolor sint amet, corporis aperiam nihil, quas, accusantium enim suscipit rem non possimus officiis. Recusandae hic at, fugiat eos eveniet.</p>
                            </article>
                            <article class='modal five '>
                              <date>03/02 - 1992</date>
                              <h2>Mais pourquoi?</h2>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates magnam excepturi laboriosam minima soluta, quae. Sunt repellat totam non, et sed in veniam fuga odio eius! Nesciunt amet optio recusandae? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum sit dolor sint amet, corporis aperiam nihil, quas, accusantium enim suscipit rem non possimus officiis. Recusandae hic at, fugiat eos eveniet.</p>
                            </article>

                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<!-- javascript nya timeline -->

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
<script  src="{{asset('js/detil.js')}}"></script>



</body>
</html>
