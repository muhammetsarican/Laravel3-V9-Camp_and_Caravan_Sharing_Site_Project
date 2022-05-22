@extends('layouts.home')
@section('content')

    <section class="probootstrap_section" id="section-city-guides" style="background-image: url('{{asset('user')}}/images/bg_1.jpg');">
        <div class="container">
            <div class="row text-center mb-10 probootstrap-animate fadeInUp probootstrap-animated">
                <div class="col-md-12">
                    <h2 class="display-4 border-bottom probootstrap-section-heading">Editörlerimiz</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 probootstrap-animate mb-3 fadeInUp probootstrap-animated">
                    <a href="#" class="probootstrap-thumbnail">
                        <img src="{{ asset('user') }}/images/img_1.jpg" alt="Free Template by ProBootstrap.com"
                            class="img-fluid">
                        <div class="probootstrap-text">
                            <h3>Buena</h3>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 probootstrap-animate mb-3 fadeInUp probootstrap-animated">
                    <a href="#" class="probootstrap-thumbnail">
                        <img src="{{ asset('user') }}/images/img_2.jpg" alt="Free Template by ProBootstrap.com"
                            class="img-fluid">
                        <h3>Road</h3>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 probootstrap-animate mb-3 fadeInUp probootstrap-animated">
                    <a href="#" class="probootstrap-thumbnail">
                        <img src="{{ asset('user') }}/images/img_3.jpg" alt="Free Template by ProBootstrap.com"
                            class="img-fluid">
                        <h3>Australia</h3>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 probootstrap-animate mb-3 fadeInUp probootstrap-animated">
                    <a href="#" class="probootstrap-thumbnail">
                        <img src="{{ asset('user') }}/images/img_4.jpg" alt="Free Template by ProBootstrap.com"
                            class="img-fluid">
                        <h3>Japan</h3>
                    </a>
                </div>

            </div>
        </div>
    </section>
@endsection
