<?php
$parentCategories = \App\Http\Controllers\HomeController::categorylist();
$setting = \App\Http\Controllers\Admin\SettingController::getsetting();
?>
@extends('layouts.home')
@section('title', $setting->title)

@section('description')
    {{ $setting->description }}
@endsection


@section('keywords', $setting->keywords)

@section('content')
    <section class="probootstrap-cover overflow-hidden relative"
        style="background-image: url('{{ asset('user') }}/images/bg_1.jpg');min-height:1000px"
        data-stellar-background-ratio="0.5" id="section-user">
        <div class="overlay"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md">
                    <h2 class="heading mb-2 display-4 font-light probootstrap-animate">{{ $setting->title }}'a
                        Hoşgeldiniz...
                    </h2>
                    <div class="" style="min-height: 25px; max-width: 300px;">
                        <form action="{{ route('getcamp') }}" method="post">
                            @csrf
                            <div class="">
                                @livewire('search')
                            </div>
                        </form>

                        @livewireScripts
                    </div>
                    <p class="lead mb-5 probootstrap-animate">

                    </p>

                    </p>
                </div>
                {{-- <div class="col-md probootstrap-animate">

                </div> --}}
            </div>
        </div>

    </section>
    <!-- END section -->


    <section class="probootstrap_section" id="section-city-guides">
        <div class="container">
            {{-- <div class="row text-center mb-5 probootstrap-animate">
                <div class="col-md-12">
                    <h2 class="display-4 border-bottom probootstrap-section-heading">Kamp & Karavan</h2>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-md-3">
                    <h3>Filtreler</h3>
                    <form role="form" action="{{ route('filter_store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            {{-- <div class="form-group">
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
                            </div> --}}
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
                    <div class="col-md-12 text-center mb-5 probootstrap-animate fadeInUp probootstrap-animated">
                            <h2 class="display-4 border-bottom probootstrap-section-heading">Bölgeler</h2>
                    </div>
                    <?php
                    $i = 0;
                    ?>
                    @foreach ($datalist as $dl)
                        <?php
                        $i += 1;
                        ?>
                        <div class="col-lg-3 probootstrap-animate mb-3">
                            <a href="{{ route('camp_detail', ['id' => $dl->id]) }}" class="probootstrap-thumbnail">
                                <img src="{{ asset('user') }}/images/camp_{{ $i }}.jpg"
                                    alt="{{ $dl->title }}" class="img-fluid" style="height: 200px; object-fit:cover">
                                <div class="probootstrap-text">
                                    <h5 class="category-info-title text-center">
                                        {{ $dl->title }} </h5>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <div class="col-lg-3 probootstrap-animate mb-3">
                        <a href="{{ route('camp_detail', ['id' => $dl->id]) }}" class="probootstrap-thumbnail">
                            <img src="{{ asset('user') }}/images/camp_8.jpg" alt="Tümü" class="img-fluid"
                                style="height: 200px; object-fit:cover">
                            <div class="probootstrap-text">
                                <h5 class="category-info-title text-center">
                                    Tümü </h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="probootstrap_section">
        <div class="container">
            <div class="row text-center mb-5 probootstrap-animate fadeInUp probootstrap-animated">
                <div class="col-md-12">
                    <h2 class="display-4 border-bottom probootstrap-section-heading">Son Blog Yazıları</h2>
                </div>
            </div>

            <div class="row probootstrap-animate fadeInUp probootstrap-animated">
                <div class="col-md-12">
                    <div class="owl-carousel js-owl-carousel-2 owl-loaded owl-drag">

                        @foreach ($blog as $bl)
                            <div>
                                <div class="media probootstrap-media d-block align-items-stretch probootstrap-animate">
                                    <a href="{{ route('user_show_blog', ['id' => $bl->id]) }}">

                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($bl->image) }}"
                                            alt="{{ $bl->title }}" class="img-fluid"
                                            style="object-fit:cover; height:500px; width:100%">

                                        <div class="media-body">
                                            <h5 class="mb-3">Blog-{{ $bl->camp->name }}: {{ $bl->title }}
                                            </h5>
                                            <p
                                                style="overflow: hidden;
                                        text-overflow: ellipsis;
                                        display: -webkit-box;
                                        -webkit-line-clamp: 1;
                                        -webkit-box-orient: vertical; color:rgb(6, 73, 0)">
                                                {{ $bl->post }} </p>
                                            <p><a href="{{ route('user_show_blog', ['id' => $bl->id]) }}">Devamını
                                                    Oku</a></p>

                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="probootstrap_section">
        <div class="col-md-12">
            <div class="probootstrap-animate">
                <div class="owl-carousel js-owl-carousel-2">
                    @foreach ($blog as $bl)
                        <div>
                            <div class="media probootstrap-media d-block align-items-stretch probootstrap-animate">
                                <a href="{{ route('user_show_blog', ['id' => $bl->id]) }}">

                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($bl->image) }}"
                                        alt="{{ $bl->title }}" class="img-fluid"
                                        style="object-fit:cover; height:500px; width:100%">

                                    <div class="media-body">
                                        <h5 class="mb-3">Blog-{{ $bl->camp->name }}: {{ $bl->title }}
                                        </h5>
                                        <p
                                            style="overflow: hidden;
                                        text-overflow: ellipsis;
                                        display: -webkit-box;
                                        -webkit-line-clamp: 1;
                                        -webkit-box-orient: vertical; color:rgb(6, 73, 0)">
                                            {{ $bl->post }} </p>
                                        <p><a href="{{ route('user_show_blog', ['id' => $bl->id]) }}">Devamını
                                                Oku</a></p>

                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
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
                    <div class="col-md-3 text-center mb-5 probootstrap-animate">
                        <blockquote class="">
                            <p class="probootstrap-author">
                                <a href="https://probootstrap.com/" target="_blank">
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($rw->user->profile_photo_path) }}"
                                        alt="" class="rounded-circle">
                                    <span class="probootstrap-name">{{ $rw->user->name }}</span>
                                </a>
                            </p>
                        </blockquote>
                        <h4 class="border-bottom probootstrap-section-heading">{{ $rw->subject }}</h4>
                        <blockquote class="">
                            <p class="lead mb-4"><em>{{ $rw->review }}</em></p>
                            <span class="probootstrap-title">{{ $rw->camp->name }}</span>

                        </blockquote>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- END section -->
@endsection
<div style='position: fixed; bottom: 3%; right: 1%;'>
    <table>
        <tr>
            <td>
                <a href="{{ route('contact') }}">
                    <img alt="Mesaj Atabilirsiniz" style='background:transparent;border:none;max-height: 65px'
                        title='Bize Ulaşın' src="{{ asset('admin') }}/img/icons/contact.png" />
                </a>
            </td>
        </tr>
    </table>
</div>
