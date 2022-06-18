@extends('layouts.home')
@section('content')
    <section class="probootstrap-cover overflow-hidden relative"
        style="background-image: url('http://127.0.0.1:8000/user/images/bg_1.jpg');" data-stellar-background-ratio="0.5"
        id="section-user">
        <div class="overlay"></div>
        <div class="row align-items-center text-center">
            <div class="col-md">
                <h2 class="heading mb-2 display-4 font-light probootstrap-animate fadeInUp probootstrap-animated">
                    Blog Sayfası
                </h2>

            </div>
        </div>


    </section>

    <section class="probootstrap_section">
        <div class="container">

            <div class="row">
                @foreach ($datalist as $dl)
                    <div class="media probootstrap-media d-flex align-items-stretch mb-4 probootstrap-animate fadeInUp probootstrap-animated">
                        <div class="probootstrap-media-image"
                            style="background-image: url({{ \Illuminate\Support\Facades\Storage::url($dl->image) }})">
                        </div>
                        <div class="media-body">
                            <span class="text-uppercase text-right">{{ $dl->camp->name }}</span>
                            <h5 class="mb-3">{{ $dl->title }}</h5>
                            <p style="overflow: hidden;
                                text-overflow: ellipsis;
                                display: -webkit-box;
                                -webkit-line-clamp: 2;
                                -webkit-box-orient: vertical">{{ $dl->post }} </p>
                            <p><a href="{{route('user_show_blog',['id'=>$dl->id])}}">Devamını Oku</a></p>
                            <p>{{ $dl->created_at }}</p>

                        </div>
                    </div>
                @endforeach
            </div>
    </section>
@endsection
