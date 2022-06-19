<?php
$setting = \App\Http\Controllers\Admin\SettingController::getsetting();
?>
@extends('layouts.admin')
@section('title', 'Admin-'.$setting->title)

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Panel</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$new_category}}</div>
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Yeni Kategori</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$new_user}}</div>
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Yeni Kullanıcı</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$new_camp}}</div>
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Yeni Kamp</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$new_review}}</div>
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                    Yeni Yorum</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Toplam Veri Sayısı: {{ $max }}</h6>
                    </div>
                    <div class="card-body">
                        <h4 class="small font-weight-bold">Kategoriler <span class="float-right">{{ $category }}</span>
                        </h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-dark" role="progressbar"
                                style="width: {{ number_format(($category / $max) * 100) }}%"
                                aria-valuenow="{{ number_format(($category / $max) * 100) }}" aria-valuemin="0"
                                aria-valuemax="100">{{ number_format(($category / $max) * 100, 2) }}%</div>
                        </div>
                        <h4 class="small font-weight-bold">Kamplar <span class="float-right">{{ $camp }}</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar" role="progressbar"
                                style="width: {{ number_format(($camp / $max) * 100) }}%"
                                aria-valuenow="{{ number_format(($camp / $max) * 100) }}" aria-valuemin="0"
                                aria-valuemax="100">
                                {{ number_format(($camp / $max) * 100, 2) }}%</div>
                        </div>
                        <h4 class="small font-weight-bold">Kullanıcılar <span class="float-right">{{ $user }}</span>
                        </h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-info" role="progressbar"
                                style="width: {{ number_format(($user / $max) * 100) }}%"
                                aria-valuenow="{{ number_format(($user / $max) * 100) }}" aria-valuemin="0"
                                aria-valuemax="100">{{ number_format(($user / $max) * 100, 2) }}%</div>
                        </div>
                        <h4 class="small font-weight-bold">Yorumlar <span class="float-right">{{ $review }}</span>
                        </h4>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar"
                                style="width: {{ number_format(($review / $max) * 100) }}%"
                                aria-valuenow="{{ number_format(($review / $max) * 100) }}" aria-valuemin="0"
                                aria-valuemax="100">{{ number_format(($review / $max) * 100, 2) }}%</div>
                        </div>
                    </div>
                </div>



            </div>



        </div>
    </div>

    </div>
@endsection
