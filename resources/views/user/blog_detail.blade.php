@extends('layouts.home')
@section('title', 'Blog-'.$data->title)

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
                    <h2 class="display-4 border-bottom probootstrap-section-heading">{{ $data->camp->name }}</h2>
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
                                            alt="{{ $data->title }}" class="img-fluid"
                                            style="object-fit:cover; height:500px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="probootstrap-inner probootstrap-animate fadeInLeft probootstrap-animated"
                    data-animate-effect="fadeInLeft">
                    <h2 class="heading mb-4">{{ $data->title }}</h2>
                    <p>{{ $data->post }}</p>
                    <hr>
                    <h4>Detay:</h4>
                    <p>
                        {{$data->detail}}
                    </p>
                    <p>{{ $data->user->name }}</p>
                    <p>{{ $data->created_at }}</p>

                </div>
            </div>
        </div>
    </section>

    <section>

    </section>

    
@endsection
