<?php
$setting = \App\Http\Controllers\Admin\SettingController::getsetting();
?>
@extends('layouts.home')
@section('title', 'Talep Oluştur')

@section('content')
    <section class="probootstrap-cover overflow-hidden relative"
        style="background-image: url('http://127.0.0.1:8000/user/images/bg_1.jpg');" data-stellar-background-ratio="0.5"
        id="section-user">
        <div class="overlay"></div>
        <div class="row align-items-center text-center">
            <div class="col-md">
                <h2 class="heading mb-2 display-4 font-light probootstrap-animate fadeInUp probootstrap-animated">Talep
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
                        <h2 class="text-center">Düzeltme Talebi Oluşturun</h2>
                        <br>
                        <div class="row">
                            <div class="col-md-3 probootstrap-animate fadeInUp probootstrap-animated">
                                <h4 class="mb-5">İrtibat Adreslerimiz:</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="probootstrap-contact-details">
                                            <li>
                                                <span class="text-uppercase"><span class="ion-paper-airplane"></span>
                                                    Email</span>
                                                {{ $setting->email }}
                                            </li>
                                            <li>
                                                <span class="text-uppercase"><span class="ion-ios-telephone"></span>
                                                    Phone</span>
                                                {{ $setting->phone }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="probootstrap-contact-details">
                                            <li>
                                                <span class="text-uppercase"><span class="ion-ios-telephone"></span>
                                                    Fax</span>
                                                {{ $setting->fax }}
                                            </li>
                                            <li>
                                                <span class="text-uppercase"><span class="ion-location"></span>
                                                    Address</span>
                                                {{ $setting->address }} <br>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 probootstrap-animate fadeInUp probootstrap-animated">
                                <form action="{{ route('owner_store') }}" method="post"
                                    class="probootstrap-form probootstrap-form-box mb60">
                                    @csrf
                                    <input type="hidden" name="camp_id" value="{{ $data->id }}">
                                    <div class="form-group">
                                        <label class="">Kamp İsmi</label>
                                        <p class="form-control">{{ $data->name }}</p>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fname" class="sr-only sr-only-focusable">İsim</label>
                                                <input type="text" class="form-control" id="fname" name="fname"
                                                    placeholder="İsminiz">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lname" class="sr-only sr-only-focusable">Soyisim</label>
                                                <input type="text" class="form-control" id="lname" name="lname"
                                                    placeholder="Soyisminiz">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="sr-only sr-only-focusable">E-Posta</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="E-Posta">
                                    </div>
                                    <div class="form-group">
                                        <label for="request" class="sr-only sr-only-focusable">Talep</label>
                                        <textarea cols="30" rows="10" class="form-control" id="request" name="request"
                                            placeholder="Düzeltilmesini Talep Ettiğiniz Kısmı Yazınız..."></textarea>
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
