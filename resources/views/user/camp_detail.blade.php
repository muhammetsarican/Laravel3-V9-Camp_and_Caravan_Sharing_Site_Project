<?php
$count_review = \App\Http\Controllers\HomeController::getcountreview($data->id);
?>
@extends('layouts.home')
@section('content')
    <section class="probootstrap-cover overflow-hidden relative"
        style="background-image: url('{{ asset('user') }}/images/bg_1.jpg');" data-stellar-background-ratio="0.5"
        id="section-user">
        <div class="overlay"></div>
    </section>



    <section class="probootstrap_section">
        <div class="container">
            <div class="row text-center mb-5 probootstrap-animate fadeInUp probootstrap-animated">
                <div class="col-md-12">
                    <h2 class="display-4 border-bottom probootstrap-section-heading">{{ $data->name }}</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="probootstrap-section-half d-md-flex">
        <div class="row">
            <div class="col-md-8">
                <div class="container">
                    <div class="row probootstrap-animate">
                        <div class="col-md-12">
                            <div class="owl-carousel js-owl-carousel-3">
                                <div>
                                    <div
                                        class="media probootstrap-media d-block align-items-stretch md-12 probootstrap-animate">
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($data->image) }}"
                                            alt="{{ $data->name }}" class="img-fluid"
                                            style="object-fit:cover; height:500px">
                                    </div>
                                </div>
                                @foreach ($image as $dl)
                                    <div>
                                        <div
                                            class="media probootstrap-media d-block align-items-stretch md-12 probootstrap-animate">
                                            <img src="{{ \Illuminate\Support\Facades\Storage::url($dl->image) }}"
                                                alt="{{ $dl->title }}" class="img-fluid"
                                                style="object-fit:cover; height:500px">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="probootstrap-inner probootstrap-animate fadeInLeft probootstrap-animated"
                    data-animate-effect="fadeInLeft">
                    <h2 class="heading mb-4">{{ $data->name }}</h2>
                    <p>{{ $data->about_camp }}</p>
                    <hr>
                    <h4>Kategoriler:</h4>
                    <p>
                        @foreach ($data->camp_category as $camp_cat)
                            *{{ $camp_cat->category->title }}&nbsp;
                        @endforeach.
                    </p>
                </div>
            </div>
        </div>

    </section>
    <a class="btn btn-danger text-white">Eğer işletme size aitse düzeltme talebinde bulunun</a>
    <section>
    </section>
    @if ($data->video_url != null)
        <section>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="border-bottom probootstrap-section-heading">Video</h1>
                </div>
                <div class="col-md-12 text-center">
                    <iframe width="914" height="514" src="https://www.youtube.com/embed{{ $data->video_url }}"
                        title="{{ $data->title }}" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </section>
    @endif


    <section class="probootstrap_section" id="section-contact">
        <div class="container">
            <div class="row text-center mb-5 probootstrap-animate fadeInUp probootstrap-animated">
                <div class="col-md-12">
                    <h2 class="display-4 probootstrap-section-heading">Değerlendirmeler</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 probootstrap-animate fadeInUp probootstrap-animated" style="max-height: 100px">
                    Aktif Yorum Sayısı: {{ $count_review }}
                    <div class="row probootstrap-form probootstrap-form-box mb60">
                        @if ($review == '[]')
                            Henüz yorum yapılmamış...
                        @endif
                        @foreach ($review as $rew)
                            {{-- {{$rew->user->name}} --}}
                            <div class="row bg-light"
                                style="  margin: 5px;
                                   border-radius:10px;
                            border-style:dotted;
                            border-width: 1px">
                                <div class="col-md-6 ">
                                    <p class="text-left text-danger">{{ $rew->subject }}</p>
                                </div>
                                <div class="col-md-6">
                                    @if ($rew->rate)
                                        <div class="rating">
                                            @for ($i = 0; $i < $rew->rate; $i++)
                                                <input type="radio" value="{{ $i }}" id="{{ $i }}"
                                                    checked>
                                                <label for="{{ $i }}">☆</label>
                                            @endfor
                                        </div>
                                    @endif
                                </div>
                                {{-- @foreach ($countrew as $avg) --}}
                                {{-- {{$avg}} --}}
                                {{-- @endforeach --}}

                                <div class="col-md-12 ">
                                    <p class="text-black font-italic" style="height: auto">“{{ $rew->review }}”
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <label class="text-secondary ">{{ $rew->user->name }}</label>
                                </div>
                                <div class="col-md-6 ">
                                    <p class="text-right text-secondary font-italic" style="font-size: 12px">
                                        {{ $rew->created_at }}
                                    </p>
                                </div>

                                <hr>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-md-6 probootstrap-animate fadeInUp probootstrap-animated">
                    @livewire('review', ['id' => $data->id])
                </div>
            </div>
        </div>
    </section>
    <!-- END section -->

    <!-- END section -->
@endsection
