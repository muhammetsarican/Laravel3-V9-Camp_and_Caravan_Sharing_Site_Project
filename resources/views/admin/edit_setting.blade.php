@extends('layouts.admin')
@section('title', 'Ayarlar')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h2 class="mb-2 text-gray-800">Ayarlar</h2>
            </div>

            <div class="col-sm-12 col-md-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin_setting') }}">Ayarlar</a> </li>
                </ol>
            </div>
        </div>
        <!-- Main Content -->
        <div id="content">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            @include('user.message')
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" action="{{ route('admin_update_setting') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">


                                <div class="card shadow mb-4">
                                    <!-- Card Header - Accordion -->
                                    <a href="#generalinformation" class="d-block card-header py-3"
                                        data-toggle="collapse" role="button" aria-expanded="false"
                                        aria-controls="generalinformation">
                                        <h6 class="m-0 font-weight-bold text-primary">Genel</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapse" id="generalinformation" style="">
                                        <div class="card-body">
                                            <input type="hidden" name="id" value="{{ $data->id }}"
                                                class="form-control">
                                            <div class="form-group">
                                                <label>Başlık</label>
                                                <input type="text" name="title" value="{{ $data->title }}"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Anahtar Kelimeler</label>
                                                <input type="text" name="keywords" value="{{ $data->keywords }}"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Tanım</label>
                                                <input type="text" name="description" value="{{ $data->description }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Accordion -->
                                    <a href="#socialmedia" class="d-block card-header py-3 collapsed" data-toggle="collapse"
                                        role="button" aria-expanded="false" aria-controls="socialmedia">
                                        <h6 class="m-0 font-weight-bold text-primary">Sosyal Medya</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapse" id="socialmedia" style="">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Youtube</label>
                                                <input type="text" name="youtube" value="{{ $data->youtube }}"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Instagram</label>
                                                <input type="text" name="instagram" value="{{ $data->instagram }}"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <input type="text" name="facebook" value="{{ $data->facebook }}"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Twitter</label>
                                                <input type="text" name="twitter" value="{{ $data->twitter }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Accordion -->
                                    <a href="#contacted" class="d-block card-header py-3 collapsed" data-toggle="collapse"
                                        role="button" aria-expanded="false" aria-controls="contact">
                                        <h6 class="m-0 font-weight-bold text-primary">İletişim</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapse" id="contacted" style="">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Kuruluş</label>
                                                <input type="text" name="company" value="{{ $data->company }}"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Adres</label>
                                                <input type="text" name="address" value="{{ $data->address }}"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Telefon</label>
                                                <input type="text" name="phone" value="{{ $data->phone }}"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Fax</label>
                                                <input type="text" name="fax" value="{{ $data->fax }}"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>E-Posta</label>
                                                <input type="text" name="email" value="{{ $data->email }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Accordion -->
                                    <a href="#SmTp" class="d-block card-header py-3 collapsed" data-toggle="collapse"
                                        role="button" aria-expanded="false" aria-controls="SmTp">
                                        <h6 class="m-0 font-weight-bold text-primary">SmTp</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapse" id="SmTp" style="">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Smtp Server</label>
                                                <input type="text" name="smtpserver"
                                                    value="{{ $data->smtpserver }}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Smtp E-Posta</label>
                                                <input type="text" name="smtpemail" value="{{ $data->smtpemail }}"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Smtp Şifre</label>
                                                <input type="password" name="smtppassword"
                                                    value="{{ $data->smtppassword }}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Smtp Port</label>
                                                <input type="number" name="smtpport" value="{{ $data->smtpport }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow mb-4">
                                    <!-- Card Header - Accordion -->
                                    <a href="#collapseCardExample" class="d-block card-header py-3 collapsed"
                                        data-toggle="collapse" role="button" aria-expanded="false"
                                        aria-controls="collapseCardExample">
                                        <h6 class="m-0 font-weight-bold text-primary">Enformasyon</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapse" id="collapseCardExample" style="">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Hakkımızda</label>
                                                <textarea id="aboutus" name="aboutus" class="form-control">{{ $data->aboutus }}</textarea>
                                                <label>İrtibat</label>
                                                <textarea id="contact" name="contact" class="form-control">{{ $data->contact }}</textarea>
                                                <label>Referanslar</label>
                                                <textarea id="references" name="references" class="form-control">{{ $data->references }}</textarea>
                                                <script>
                                                    $(document).ready(function() {
                                                        $('#aboutus').summernote();
                                                        $('#contact').summernote();
                                                        $('#references').summernote();
                                                    });
                                                </script>
                                            </div>
                                            <div class="form-group">
                                                <label>Durum</label>
                                                <select class="form-control select2" name="status" style="width: 100%">
                                                    <option @if($data->status=='True')selected="selected"@endif>True</option>
                                                    <option @if($data->status=='False')selected="selected"@endif>False</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Ayarları Güncelle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
@section('javascript')
@endsection