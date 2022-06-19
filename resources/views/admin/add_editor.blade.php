@extends('layouts.admin')
@section('title','Editör Ekle')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">
        <div class="col-sm-12 col-md-6">
            <h2 class="mb-2 text-gray-800">Editör Ekle</h2>
        </div>

        <div class="col-sm-12 col-md-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin_editor') }}">Editörler</a> </li>
                <li class="breadcrumb-item active">Editör Ekle</li>
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
                            <form role="form" action="{{route('admin_create_editor')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Fotoğraf</label>
                                        <input type="file" name="photo" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>İsim</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Katkı Sayısı</label>
                                        <input type="number" name="number_of_contributions" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Instagram Linki</label>
                                        <input type="text" name="instagram" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Youtube Linki</label>
                                        <input type="text" name="youtube" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Biyografi</label>
                                        <input type="text" name="biography" class="form-control">
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



