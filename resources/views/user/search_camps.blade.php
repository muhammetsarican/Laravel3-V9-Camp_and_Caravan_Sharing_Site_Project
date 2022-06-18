@extends('layouts.home')
@section('content')
    <section class="probootstrap-cover overflow-hidden relative"
        style="background-image: url('http://127.0.0.1:8000/user/images/bg_1.jpg');" data-stellar-background-ratio="0.5"
        id="section-user">
        <div class="overlay"></div>
        <div class="row align-items-center text-center">
            <div class="col-md">
                <h2 class="heading mb-2 font-light probootstrap-animate fadeInUp probootstrap-animated">Hakkında Bulundu:
                </h2>
                <h3 class="heading mb-5 text-white">" {{ $search }}&nbsp;"</h3>
            </div>
        </div>


    </section>

    <section class="probootstrap_section">
        <div class="container">

            <div class="row">
                    @if ($datalist == '[]')
                        <div class="col-6 col-sm-6 col-md-6 mb-4 mb-lg-0 col-lg-3">
                            Aranan " {{ $search }}&nbsp;" için gösterilecek bir şey yok.
                        </div>
                    @else
                    @foreach ($datalist as $dl)
                        <div class="col-lg-3 col-md-6 probootstrap-animate mb-3">
                            <a href="{{ route('camp_detail', ['id' => $dl->id]) }}" class="probootstrap-thumbnail">
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
    </section>
@endsection
