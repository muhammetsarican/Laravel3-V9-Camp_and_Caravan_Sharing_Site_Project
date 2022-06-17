<?php
$parentCategories = \App\Http\Controllers\HomeController::categorylist();
// $setting = \App\Http\Controllers\HomeController::getsetting();
?>
@extends('layouts.home')
@section('content')
    <section class="probootstrap-cover overflow-hidden relative"
        style="background-image: url('{{ asset('user') }}/images/bg_1.jpg');" data-stellar-background-ratio="0.5"
        id="section-user">
        <div class="overlay"></div>
        <!-- <div class="container">
                                                                    <div class="row align-items-center">
                                                                      <div class="col-md">
                                                                        <h2 class="heading mb-2 display-4 font-light probootstrap-animate">Explore The World With Ease</h2>
                                                                        <p class="lead mb-5 probootstrap-animate">
                                                                          

                                                                        </p>
                                                                          <a href="onepage.html" role="button" class="btn btn-primary p-3 mr-3 pl-5 pr-5 text-uppercase d-lg-inline d-md-inline d-sm-block d-block mb-3">See OnePage Verion</a>
                                                                        </p>
                                                                      </div>
                                                                      <div class="col-md probootstrap-animate">
                                                                        <form action="#" class="probootstrap-form">
                                                                          <div class="form-group">
                                                                            <div class="row mb-3">
                                                                              <div class="col-md">
                                                                                <div class="form-group">
                                                                                  <label for="id_label_single">From</label>

                                                                                  <label for="id_label_single" style="width: 100%;">
                                                                                    <select class="js-example-basic-single js-states form-control" id="id_label_single" style="width: 100%;">
                                                                                      <option value="Australia">Australia</option>
                                                                                      <option value="Japan">Japan</option>
                                                                                      <option value="United States">United States</option>
                                                                                      <option value="Brazil">Brazil</option>
                                                                                      <option value="China">China</option>
                                                                                      <option value="Israel">Israel</option>
                                                                                      <option value="Philippines">Philippines</option>
                                                                                      <option value="Malaysia">Malaysia</option>
                                                                                      <option value="Canada">Canada</option>
                                                                                      <option value="Chile">Chile</option>
                                                                                      <option value="Chile">Zimbabwe</option>
                                                                                    </select>
                                                                                  </label>


                                                                                </div>
                                                                              </div>
                                                                              <div class="col-md">
                                                                                <div class="form-group">
                                                                                  <label for="id_label_single2">To</label>
                                                                                  <div class="probootstrap_select-wrap">
                                                                                    <label for="id_label_single2" style="width: 100%;">
                                                                                    <select class="js-example-basic-single js-states form-control" id="id_label_single2" style="width: 100%;">
                                                                                      <option value="Australia">Australia</option>
                                                                                      <option value="Japan">Japan</option>
                                                                                      <option value="United States">United States</option>
                                                                                      <option value="Brazil">Brazil</option>
                                                                                      <option value="China">China</option>
                                                                                      <option value="Israel">Israel</option>
                                                                                      <option value="Philippines">Philippines</option>
                                                                                      <option value="Malaysia">Malaysia</option>
                                                                                      <option value="Canada">Canada</option>
                                                                                      <option value="Chile">Chile</option>
                                                                                      <option value="Chile">Zimbabwe</option>
                                                                                    </select>
                                                                                  </label>
                                                                                  </div>
                                                                                </div>
                                                                              </div>
                                                                            </div>-->
        <!-- END row -->
        <!--<div class="row mb-5">
                                                                              <div class="col-md">
                                                                                <div class="form-group">
                                                                                  <label for="probootstrap-date-departure">Departure</label>
                                                                                  <div class="probootstrap-date-wrap">
                                                                                    <span class="icon ion-calendar"></span>
                                                                                    <input type="text" id="probootstrap-date-departure" class="form-control" placeholder="">
                                                                                  </div>
                                                                                </div>
                                                                              </div>
                                                                              <div class="col-md">
                                                                                <div class="form-group">
                                                                                  <label for="probootstrap-date-arrival">Arrival</label>
                                                                                  <div class="probootstrap-date-wrap">
                                                                                    <span class="icon ion-calendar"></span>
                                                                                    <input type="text" id="probootstrap-date-arrival" class="form-control" placeholder="">
                                                                                  </div>
                                                                                </div>
                                                                              </div>
                                                                            </div>-->
        <!-- END row -->
        <!--<div class="row">
                                                                              <div class="col-md">
                                                                                <label for="round" class="mr-5"><input type="radio" id="round" name="direction">  Round</label>
                                                                                <label for="oneway"><input type="radio" id="oneway" name="direction">  Oneway</label>
                                                                              </div>
                                                                              <div class="col-md">
                                                                                <input type="submit" value="Submit" class="btn btn-primary btn-block">
                                                                              </div>
                                                                            </div>
                                                                          </div>
                                                                        </form>
                                                                      </div>
                                                                    </div>
                                                                  </div> -->

    </section>
    <!-- END section -->


    <!-- <section class="probootstrap_section" id="section-feature-testimonial">
                                                                  <div class="container">
                                                                    <div class="row justify-content-center mb-5">
                                                                      <div class="col-md-12 text-center mb-5 probootstrap-animate">
                                                                        <h2 class="display-4 border-bottom probootstrap-section-heading">Why we Love Places</h2>
                                                                        <blockquote class="">
                                                                          <p class="lead mb-4"><em>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</em></p>
                                                                          <p class="probootstrap-author">
                                                                            <a href="https://probootstrap.com/" target="_blank">
                                                                              <img src="{{ asset('user') }}/  images/person_1.jpg" alt="Free Template by ProBootstrap.com" class="rounded-circle">
                                                                              <span class="probootstrap-name">James Smith</span>
                                                                              <span class="probootstrap-title">Chief Executive Officer</span>
                                                                            </a>
                                                                          </p>
                                                                        </blockquote>

                                                                      </div>
                                                                    </div>
                                                                    
                                                                  </div>
                                                                </section> -->
    <!-- END section -->


    <section class="probootstrap_section" id="section-city-guides">
        <div class="container">
            <div class="row text-center mb-5 probootstrap-animate">
                <div class="col-md-12">
                    <h2 class="display-4 border-bottom probootstrap-section-heading">Karavan & Kamp</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <h3>Filtreler</h3>
                    <form role="form" action="{{ route('filter_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label>Bölge</label>
                                <select class="form-control select2" name="filter_0" style="width: 100%">
                                    <option value="0" selected="selected">Seçiniz...</option>
                                    <?php
                                    $bölge = \App\Http\Controllers\HomeController::get_parent('Bölge');
                                    ?>
                                    @foreach ($bölge as $rs)
                                        <option value="{{ $rs->id }}">
                                            {{ $rs->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Şehir</label>
                                <select class="form-control select2" name="filter_1" style="width: 100%">
                                    <option value="0" selected="selected">Seçiniz...</option>
                                    <?php
                                    $sehir = \App\Http\Controllers\HomeController::get_city('Şehir');
                                    ?>
                                    @for ($i = 0; $i < count($sehir, 1) / 2 - 1; $i++)
                                        <option value="{{ $sehir['city_id'][$i] }}">
                                            {{ $sehir['city_title'][$i] }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kamp Tipi</label>
                                <select class="form-control select2" name="filter_2" style="width: 100%">
                                    <option value="0" selected="selected">Seçiniz...</option>
                                    <?php
                                    $kamp_tipi = \App\Http\Controllers\HomeController::get_parent('Kamp Tipi');
                                    ?>
                                    @foreach ($kamp_tipi as $rs)
                                        <option value="{{ $rs->id }}">
                                            {{ $rs->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Konaklama İmkanı</label>
                                <select class="form-control select2" name="filter_3" style="width: 100%">
                                    <option value="0" selected="selected">Seçiniz...</option>
                                    <?php
                                    $konaklama_imkani = \App\Http\Controllers\HomeController::get_parent('Konaklama İmkanı');
                                    ?>
                                    @foreach ($konaklama_imkani as $rs)
                                        <option value="{{ $rs->id }}">
                                            {{ $rs->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Minimum Konaklama Süresi</label>
                                <select class="form-control select2" name="filter_4" style="width: 100%">
                                    <option value="0" selected="selected">Seçiniz...</option>
                                    <?php
                                    $min_konaklama_suresi = \App\Http\Controllers\HomeController::get_parent('Minimum Konaklama Süresi');
                                    ?>
                                    @foreach ($min_konaklama_suresi as $rs)
                                        <option value="{{ $rs->id }}">
                                            {{ $rs->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Konum</label>
                                <select class="form-control select2" name="filter_5" style="width: 100%">
                                    <option value="0" selected="selected">Seçiniz...</option>
                                    <?php
                                    $konum = \App\Http\Controllers\HomeController::get_parent('Konum');
                                    ?>
                                    @foreach ($konum as $rs)
                                        <option value="{{ $rs->id }}">
                                            {{ $rs->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Plaj Tipi</label>
                                <select class="form-control select2" name="filter_6" style="width: 100%">
                                    <option value="0" selected="selected">Seçiniz...</option>
                                    <?php
                                    $plaj_tipi = \App\Http\Controllers\HomeController::get_parent('Plaj Tipi');
                                    ?>
                                    @foreach ($plaj_tipi as $rs)
                                        <option value="{{ $rs->id }}">
                                            {{ $rs->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-primary">Filtrele</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-9 row">
                    <div class="col-md-12">
                        <div class="probootstrap-animate">
                            <div class="owl-carousel js-owl-carousel-3">
                                @foreach ($blog as $bl)
                                    <div>
                                        <div
                                            class="media probootstrap-media d-block align-items-stretch probootstrap-animate">
                                            <a href="
                                                        {{-- {{ route('camp_detail', ['id' => $bl->id]) }} --}}
                                                        ">

                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($bl->image) }}"
                                                    alt="{{ $bl->title }}" class="img-fluid"
                                                    style="object-fit:cover; height:500px">

                                                <div class="media-body">
                                                    <h5 class="mb-3">{{ $bl->camp->name }}: {{ $bl->title }}
                                                    </h5>
                                                    <p>{{ $bl->post }} </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @foreach ($datalist as $dl)
                        <div class="col-lg-3 col-md-6 probootstrap-animate mb-3">
                            <a href="{{ route('camp_detail', ['id' => $dl->id]) }}" class="probootstrap-thumbnail">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($dl->image) }}"
                                    alt="{{ $dl->name }}" class="img-fluid"
                                    style="height: 200px; object-fit:cover">
                                <div class="probootstrap-text">
                                    <h3>{{ $dl->name }}</h3>
                                </div>
                            </a>
                        </div>
                    @endforeach



                </div>
            </div>
        </div>
    </section>

    <section class="probootstrap_section">
        <div class="container">
            <div class="row text-center mb-5 probootstrap-animate">
                <div class="col-md-12">
                    <h2 class="display-4 border-bottom probootstrap-section-heading">Bizimle Kampa Gelin</h2>
                </div>
            </div>
            <div class="row probootstrap-animate">
                <div class="col-md-12">
                    <div class="owl-carousel js-owl-carousel">
                        <a class="probootstrap-slide" href="#">
                            <span class="flaticon-teatro-de-la-caridad"></span>
                            <em>Teatro de la Caridad</em>
                        </a>
                        <a class="probootstrap-slide" href="#">
                            <span class="flaticon-royal-museum-of-the-armed-forces"></span>
                            <em>Royal Museum of the Armed Forces</em>
                        </a>
                        <a class="probootstrap-slide" href="#">
                            <span class="flaticon-parthenon"></span>
                            <em>Parthenon</em>
                        </a>
                        <a class="probootstrap-slide" href="#">
                            <span class="flaticon-marina-bay-sands"></span>
                            <em>Marina Bay Sands</em>
                        </a>
                        <a class="probootstrap-slide" href="#">
                            <span class="flaticon-samarra-minaret"></span>
                            <em>Samarra Minaret</em>
                        </a>
                        <a class="probootstrap-slide" href="#">
                            <span class="flaticon-chiang-kai-shek-memorial"></span>
                            <em>Chiang Kai Shek Memorial</em>
                        </a>
                        <a class="probootstrap-slide" href="#">
                            <span class="flaticon-heuvelse-kerk-tilburg"></span>
                            <em>Heuvelse Kerk Tilburg</em>
                        </a>
                        <a class="probootstrap-slide" href="#">
                            <span class="flaticon-cathedral-of-cordoba"></span>
                            <em>Cathedral of Cordoba</em>
                        </a>
                        <a class="probootstrap-slide" href="#">
                            <span class="flaticon-london-bridge"></span>
                            <em>London Bridge</em>
                        </a>
                        <a class="probootstrap-slide" href="#">
                            <span class="flaticon-taj-mahal"></span>
                            <em>Taj Mahal</em>
                        </a>
                        <a class="probootstrap-slide" href="#">
                            <span class="flaticon-leaning-tower-of-pisa"></span>
                            <em>Leaning Tower of Pisa</em>
                        </a>
                        <a class="probootstrap-slide" href="#">
                            <span class="flaticon-burj-al-arab"></span>
                            <em>Burj al Arab</em>
                        </a>
                        <a class="probootstrap-slide" href="#">
                            <span class="flaticon-gate-of-india"></span>
                            <em>Gate of India</em>
                        </a>
                        <a class="probootstrap-slide" href="#">
                            <span class="flaticon-osaka-castle"></span>
                            <em>Osaka Castle</em>
                        </a>
                        <a class="probootstrap-slide" href="#">
                            <span class="flaticon-statue-of-liberty"></span>
                            <em>Statue of Liberty</em>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="probootstrap_section" id="section-feature-testimonial">
        <div class="container">
            <div class="row text-center mb-5 probootstrap-animate">
                <div class="col-md-12">
                    <h2 class="display-4 border-bottom probootstrap-section-heading">Yorumlar</h2>
                </div>
            </div>
            <div class="row justify-content-center mb-5">
                @foreach ($review as $rw)
                    <div class="col-md-4 text-center mb-5 probootstrap-animate">
                        <h4 class="border-bottom probootstrap-section-heading">{{ $rw->subject }}</h4>
                        <blockquote class="">
                            <p class="lead mb-4"><em>{{ $rw->review }}</em></p>
                            <p class="probootstrap-author">
                                <a href="https://probootstrap.com/" target="_blank">
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($rw->user->profile_photo_path) }}"
                                        alt="" class="rounded-circle">
                                    <span class="probootstrap-name">{{ $rw->user->name }}</span>
                                    <span class="probootstrap-title">{{ $rw->camp->name }}</span>
                                </a>
                            </p>
                        </blockquote>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- END section -->
@endsection
