<html>

<head>
    <title>Düzenle</title>

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
                    <form role="form" action="{{ route('admin_update_review', ['id' => $data->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Id</label>
                                <p class="form-control">{{ $data->id }}</p>
                            </div>
                            <div class="form-group">
                                <label>Ekleyen</label>
                                <p  name="user_id" class="form-control" >{{ $data->user->name }}</p>
                            </div>
                            <div class="form-group">
                                <label>Kamp Adı</label>
                                <p  name="camp_id" class="form-control"
                                    >{{ $data->camp->name }}</p>
                            </div>
                            <div class="form-group">
                                <label>Konu</label>
                                <p  name="subject" class="form-control"
                                    >{{ $data->subject }}</p>
                            </div>
                            <div class="form-group">
                                <label>Yorum</label>
                                <textarea  name="review" class="form-control" >{{ $data->review }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Ekleyen IP'si</label>
                                <p  name="IP" class="form-control" >{{ $data->IP }}</p>
                            </div>
                            <div class="form-group">
                                <label>Yıldız Sayısı</label>
                                <p  name="rate" class="form-control" >{{ $data->rate }}</p>
                            </div>
                            <div class="form-group">
                                <label>Durum</label>
                                <select class="form-control select2" name="status">
                                    <option @if ($data->status=='Aktif') selected="selected" @endif>Aktif</option>
                                    <option @if ($data->status=='Pasif') selected="selected" @endif>Pasif</option>
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
    </div>
</body>

</html>
