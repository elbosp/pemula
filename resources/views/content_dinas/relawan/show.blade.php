@extends('Dashboard.Dinas.relawan')
@section('content-crud')

    <div class="container emp-profile">
            <form method="get" action="{{URL::to('relawan/'.$relawan['id_relawan'].'/verif')}}">
                <div class="row">
                    <div class="col-md-4">
                        <!-- <div class="profile-img"> -->
                            <img src="{{asset('img/gunung.jpg')}}" height="240px" width="300px">
                        <!-- </div> -->
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                            <h3>{{$relawan->nama_relawan}}</h3>
                            <h4>{{$relawan->keahlian}}
                            @if($relawan->tim_id!=null)
                                {$relawan->tim_id}}</h4>
                            @else
                                /Belum terdaftar ke tim</h4>
                            @endif
                            <ul class="nav nav-tabs" id="myTab" role="tablist"><li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Tentang</a>
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


                            <p>DETAIL RELAWAN</p>

                            <button class="btnD"><i class="fa fa-cloud-download"></i></button>
                            <button class="btnD"><i class="fa fa-envelope-o"></i> KIRIM PESAN</button>

                            <p></p>
                            @if($relawan->status_relawan=="Verifikasi")
                              <button class="btnD"><i class=""></i>Selesai</button>
                            @else
                              <button class="btnD"><i class=""></i>Verifikasi</button>
                            @endif
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
                                        <p>{{$relawan->nama_relawan}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Alamat</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$relawan->alamat_lengkap_relawan}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Keahlian</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$relawan->keahlian}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Tim</label>
                                    </div>
                                    <div class="col-md-4">
                                        @if($relawan->tim_id!=null)
                                            <p>{{$relawan->tim_id}}</p>
                                        @else
                                            <p>Belum Ada Tim</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Status</label>
                                    </div>
                                    <div class="col-md-1">
                                        <p>{{$relawan->status_relawan}}</p>
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
@endsection
