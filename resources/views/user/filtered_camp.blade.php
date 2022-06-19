@extends('layouts.home')
@section('title', 'Kamplar')

@section('content')
    <section class="probootstrap-cover overflow-hidden relative"
        style="background-image: url('http://127.0.0.1:8000/user/images/bg_1.jpg');" data-stellar-background-ratio="0.5"
        id="section-user">
        <div class="overlay"></div>
        <div class="row align-items-center text-center">
            <div class="col-md">
                <h2 class="heading mb-2 display-4 font-light probootstrap-animate fadeInUp probootstrap-animated">Kamp
                    Sayfası
                </h2>
                {{-- <p class="heading mb-5 text-white">""</p> --}}
            </div>
        </div>


    </section>

    <section class="probootstrap_section">
        <div class="container">
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
                <div class="col-md-9">
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label>Filtreler</label>
                        </div>
                        @foreach ($data as $row)
                            <div class="col-md-3">
                                <p class="form-control">
                                    {{ $row->category->title }} ;
                                    <a href="
                                        {{ route('filter_destroy', ['id' => $row->id]) }}
                                        " class="text-right">
                                        <img src="{{ asset('admin') }}/img/icons/delete.png" height="25px">
                                    </a>
                                </p>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Sonuçlar</label>
                        </div>
                        @if ($datalist == '[]')
                            <div class="col-6 col-sm-6 col-md-6 mb-4 mb-lg-0 col-lg-3">
                                Nothing to Show for "".
                            </div>
                        @else
                            @foreach ($datalist as $dl)
                                <div class="col-lg-3 col-md-6 probootstrap-animate mb-3">
                                    <a href="{{ route('camp_detail', ['id' => $dl->id]) }}"
                                        class="probootstrap-thumbnail">
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($dl->image) }}"
                                            alt="{{ $dl->name }}" class="img-fluid"
                                            style="height: 300px; object-fit:cover">
                                        <div class="probootstrap-text">
                                            <h3>{{ $dl->name }}</h3>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
