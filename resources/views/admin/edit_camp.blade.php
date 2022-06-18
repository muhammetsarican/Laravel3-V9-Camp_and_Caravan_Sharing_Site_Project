<html>

<head>
    <link rel="shortcut icon" href="{{ asset('admin/icons/user.png') }}" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="{{ asset('admin') }}/stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin') }}/css/sb-admin-2.min.css" rel="stylesheet">
    <!--Scripts-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
</head>

<body>
    <!-- Main Content -->
    <div id="content">
        <div class="card">
            <div class="card-header">
                <div class="col-sm-12 col-md-6">
                    <h2 class="mb-2 text-gray-800">Düzenle</h2>
                </div>
                <div class="card-body">
                    @include('user.message')
                    <form role="form" action="{{ route('admin_update_camp', ['id' => $data->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Id</label>
                                <p class="form-control">{{ $data->id }}</p>
                            </div>
                            <div class="form-group">
                                <label>İsim</label>
                                <input type="text" name="name" class="form-control" value="{{ $data->name }}">
                            </div>
                            <hr>
                            <div class="row form-group">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label>Daha önce bulundunuz mu?</label><br>
                                    <input type="radio" name="have_you_been"
                                        @if ($data->have_you_been == 'Evet') checked @endif value="Evet">&nbsp;Evet<br>
                                    <input type="radio" name="have_you_been"
                                        @if ($data->have_you_been == 'Hayır') checked @endif value="Hayır">&nbsp;Hayır
                                </div>
                                <div class="col-md-6">
                                    <label>İşletme Tipi</label><br>
                                    <input type="radio" name="operating_type"
                                        @if ($data->operating_type == 'Kamu İşletmesi') checked @endif
                                        value="Kamu İşletmesi">&nbsp;Kamu
                                    İşletmesi<br>
                                    <input type="radio" name="operating_type"
                                        @if ($data->operating_type == 'Özel İşletme') checked @endif value="Özel İşletme">&nbsp;Özel
                                    İşletme
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Kamp hakkında bilgiyi nasıl edindiniz?</label>
                                <textarea type="text" name="information_from" class="form-control"> {{ $data->information_from }}</textarea>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label class="text-black" for="fname">Kamp Telefonu</label>
                                    <input type="text" id="fname" class="form-control" name="camp_phone"
                                        value="{{ $data->camp_phone }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="text-black" for="lname">Kamp Telefonu Tekrar</label>
                                    <input type="text" id="lname" class="form-control" name="camp_phone_validation"
                                        value="{{ $data->camp_phone }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Adres</label>
                                <textarea type="text" name="address" class="form-control">{{ $data->address }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>İnternet Adresi</label>
                                <input type="text" name="web_address" class="form-control"
                                    value="{{ $data->web_address }}">
                            </div>
                            <div class="form-group">
                                <label>Konum</label>
                                <textarea type="text" name="location" class="form-control">{{ $data->location }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Kamp Hakkında</label>
                                <textarea type="text" name="about_camp" class="form-control">{{ $data->about_camp }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Resim</label>
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($data->image) }}" height="50"
                                    alt="">
                                <input type="file" name="image" class="form-control">
                            </div>                                                  
                            <div class="form-group">
                                <label>Youtube Video Url</label>
                                <input type="text" name="video_url" class="form-control" placeholder="https://youtu.be/" value="https://youtu.be{{ $data->video_url }}">
                            </div>
                            <div class="form-group">
                                <label>Yorumunuz</label>
                                <textarea type="text" name="user_review" class="form-control">{{ $data->user_review }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Durum</label>
                                <select class="form-control select2" name="status" style="width: 100%">
                                    <option @if($data->status=='Pasif')selected="selected"@endif>Pasif</option>
                                    <option @if($data->status=='Aktif')selected="selected"@endif>Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Güncelle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
