@extends('layouts.home')
@section('content')
    <section class="probootstrap-cover overflow-hidden relative"
        style="background-image: url('http://127.0.0.1:8000/user/images/bg_1.jpg');" data-stellar-background-ratio="0.5"
        id="section-user">
        <div class="overlay"></div>
        <div class="row align-items-center text-center">
            <div class="col-md">
                <h2 class="heading mb-2 display-4 font-light probootstrap-animate fadeInUp probootstrap-animated">İletişim
                    Sayfası
                </h2>
                {{-- <p class="heading mb-5 text-white">""</p> --}}
            </div>
        </div>


    </section>
    <section class="probootstrap_section bg-light" id="section-contact">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        @include('user.message')
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <h2 class="text-center">Bize Ulaşın</h2>
                        <br>
                        <div class="row">
                            <div class="col-md-3 probootstrap-animate fadeInUp probootstrap-animated">
                                <p class="mb-5">Far far away, behind the word mountains, far from the countries
                                    Vokalia and
                                    Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at
                                    the coast of
                                    the Semantics, a large language ocean.</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="probootstrap-contact-details">
                                            <li>
                                                <span class="text-uppercase"><span class="ion-paper-airplane"></span>
                                                    Email</span>
                                                you_mail@gmail.com
                                            </li>
                                            <li>
                                                <span class="text-uppercase"><span class="ion-ios-telephone"></span>
                                                    Phone</span>
                                                +30 976 1382 9921
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="probootstrap-contact-details">
                                            <li>
                                                <span class="text-uppercase"><span class="ion-ios-telephone"></span>
                                                    Fax</span>
                                                +30 976 1382 9922
                                            </li>
                                            <li>
                                                <span class="text-uppercase"><span class="ion-location"></span>
                                                    Address</span>
                                                San Francisco, CA <br>
                                                4th Floor8 Lower <br>
                                                San Francisco street, M1 50F
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 probootstrap-animate fadeInUp probootstrap-animated">
                                <form action="{{ route('contact_store') }}" method="post"
                                    class="probootstrap-form probootstrap-form-box mb60">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fname" class="sr-only sr-only-focusable">İsim</label>
                                                <input type="text" class="form-control" id="fname" name="fname"
                                                    placeholder="İsminiz">
                                            </div>
                                            <div class="form-group">
                                                <label for="lname" class="sr-only sr-only-focusable">Soyisim</label>
                                                <input type="text" class="form-control" id="lname" name="lname"
                                                    placeholder="Soyisminiz">
                                            </div>
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <div class="col-md-12 mb-3 mb-md-0">
                                                <label>İletişim Sebebi</label><br>
                                                <input type="radio" name="contact_reason" value="Öneri">&nbsp;Öneri<br>
                                                <input type="radio" name="contact_reason" value="Şikayet">&nbsp;Şikayet<br>
                                                <input type="radio" name="contact_reason" value="İstek">&nbsp;İstek<br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="sr-only sr-only-focusable">E-Posta</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="E-Posta">
                                    </div>
                                    <div class="form-group">
                                        <label for="message" class="sr-only sr-only-focusable">Mesaj</label>
                                        <textarea cols="30" rows="10" class="form-control" id="message" name="message" placeholder="Mesajınızı Yazınız..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" id="submit" name="submit"
                                            value="Gönder">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
