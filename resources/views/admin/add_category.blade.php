@extends('layouts.admin')
@section('title','Category Add')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">
        <div class="col-sm-12 col-md-6">
            <h2 class="mb-2 text-gray-800">Kategori Ekle</h2>
        </div>

        <div class="col-sm-12 col-md-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin_category') }}">Kategoriler</a> </li>
                <li class="breadcrumb-item active">Kategori Ekle</li>
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
                            <form role="form" action="{{route('admin_create_category')}}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Parent</label>
                                        <select class="form-control select2" name="parent_id" style="width: 100%">
                                            <option value="0"selected="selected">Ana Kategori</option>
                                            @foreach($datalist as $rs)
                                            <option value="{{$rs->id}}">
                                                {{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title)}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Başlık</label>
                                        <input type="text" name="title" class="form-control">
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
    </div>
@endsection



