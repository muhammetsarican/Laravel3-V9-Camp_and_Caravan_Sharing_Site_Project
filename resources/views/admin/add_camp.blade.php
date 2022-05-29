@extends('layouts.admin')
@section('title', 'Category Add')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h2 class="mb-2 text-gray-800">Kamp Ekle</h2>
            </div>

            <div class="col-sm-12 col-md-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin_category') }}">Kamplar</a> </li>
                    <li class="breadcrumb-item active">Kamp Ekle</li>
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
                        <form role="form" action="{{ route('admin_create_camp') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>İsim</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                                <hr>
                                <div class="row form-group">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label>Daha önce bulundunuz mu?</label><br>
                                        <input type="radio" name="have_you_been">&nbsp;Evet<br>
                                        <input type="radio" name="have_you_been">&nbsp;Hayır
                                    </div>
                                    <div class="col-md-6">
                                        <label>İşletme Tipi</label><br>
                                        <input type="radio" name="operating_type">&nbsp;Kamu İşletmesi<br>
                                        <input type="radio" name="operating_type">&nbsp;Özel İşletme
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Kamp hakkında bilgiyi nasıl edindiniz?</label>
                                    <textarea type="text" name="information_from" class="form-control"></textarea>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label class="text-black" for="fname">Kamp Telefonu</label>
                                        <input type="text" id="fname" class="form-control" name="camp_phone">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-black" for="lname">Kamp Telefonu Tekrar</label>
                                        <input type="text" id="lname" class="form-control" name="camp_phone_validation">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Adres</label>
                                    <textarea type="text" name="address" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>İnternet Adresi</label>
                                    <input type="text" name="web_address" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Konum</label>
                                    <textarea type="text" name="location" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Kamp Hakkında</label>
                                    <textarea type="text" name="about_camp" class="form-control"></textarea>
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
    </div>
@endsection
