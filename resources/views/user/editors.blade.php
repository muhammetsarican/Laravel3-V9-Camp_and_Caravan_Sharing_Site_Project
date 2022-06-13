@extends('layouts.home')
@section('content')
    <section class="probootstrap-cover overflow-hidden relative"
        style="background-image: url('http://127.0.0.1:8000/user/images/bg_1.jpg');" data-stellar-background-ratio="0.5"
        id="section-user">
        <div class="overlay"></div>
        <div class="row align-items-center text-center">
            <div class="col-md">
                <h2 class="heading mb-2 display-4 font-light probootstrap-animate fadeInUp probootstrap-animated">
                    Editörlerimiz
                </h2>

            </div>
        </div>


    </section>

    <section class="probootstrap_section">
        <div class="container">

            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    @foreach ($datalist as $dl)
                        <div class="col-md-4 probootstrap-animate mb-3 fadeInUp probootstrap-animated">
                            <a href="#" class="probootstrap-thumbnail">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($dl->photo) }}" alt=""
                                    class="img-fluid">
                                <div class="probootstrap-text text-center">
                                    <h6>{{ $dl->name }}</h6>

                                    <h6>Katkı Sayısı: {{ $dl->number_of_contributions }}</h6>

                                    <a href="{{ $dl->instagram }}"><img
                                            src="{{ asset('admin') }}/img/icons/instagram.png" height="25">
                                    </a>
                                    <a href="{{ $dl->youtube }}"><img src="{{ asset('admin') }}/img/icons/youtube.png"
                                            height="25">
                                    </a>
                                </div>

                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-2">
                </div>
            </div>
    </section>
@endsection
