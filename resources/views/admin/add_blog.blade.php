@extends('layouts.admin')
@section('title', 'Blog Ekle')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h2 class="mb-2 text-gray-800">Blog Ekle</h2>
            </div>

            <div class="col-sm-12 col-md-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin_blog') }}">Bloglar</a> </li>
                    <li class="breadcrumb-item active">Blog Ekle</li>
                </ol>
            </div>
        </div>
        <!-- Main Content -->
        <div id="content">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-12 col-md-10">
                            @include('user.message')
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" action="{{ route('admin_store_blog') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kamp</label>
                                    <select class="form-control select2" name="camp_id" style="width: 100%">
                                        <option value="0" selected="selected">Seçiniz...</option>
                                        @foreach ($datalist as $rs)
                                            <option value="{{ $rs->id }}">
                                                {{ $rs->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Başlık</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Blog Yazısı</label>
                                    <textarea type="text" name="post" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Anahtar Kelimeler</label>
                                    <input type="text" name="keywords" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Tanım</label>
                                    <input type="text" name="description" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Detay</label>
                                    <textarea type="text" name="detail" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Resim</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Durum</label>
                                    <select class="form-control select2" name="status" style="width: 100%">
                                        <option selected="selected">Pasif</option>
                                        <option>Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Ekle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
