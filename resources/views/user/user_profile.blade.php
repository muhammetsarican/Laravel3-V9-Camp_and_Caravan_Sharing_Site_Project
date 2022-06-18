@extends('layouts.home')
@section('content')
    <section class="probootstrap-cover overflow-hidden relative"
        style="background-image: url('http://127.0.0.1:8000/user/images/bg_1.jpg');" data-stellar-background-ratio="0.5"
        id="section-user">
        <div class="overlay"></div>
        <div class="row align-items-center text-center">
            <div class="col-md">
                <h2 class="heading mb-2 display-4 font-light probootstrap-animate fadeInUp probootstrap-animated">
                    Profilim
                </h2>

            </div>
        </div>


    </section>

    <section class="probootstrap_section">
        <div class="container">

            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-10">
                    @include('profile.show')
                </div>
                <div class="col-md-1">
                </div>
            </div>
    </section>
@endsection
