<!DOCTYPE html>
<html lang="en">

<head>
    <!--
    More Templates Visit ==> ProBootstrap.com
    Free Template by ProBootstrap.com under the License Creative Commons 3.0 ==> (probootstrap.com/license)

    IMPORTANT: You can do whatever you want with this template but you need to keep the footer link back to ProBootstrap.com
    -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Düzenle</title>
    <meta name="description" content="Free Bootstrap 4 Theme by ProBootstrap.com">
    <meta name="keywords"
        content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">


    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('user') }}/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('user') }}/css/animate.css">
    <link rel="stylesheet" href="{{ asset('user') }}/fonts/ionicons/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ asset('user') }}/css/owl.carousel.min.css">

    <link rel="stylesheet" href="{{ asset('user') }}/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="{{ asset('user') }}/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('user') }}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{ asset('user') }}/css/select2.css">


    <link rel="stylesheet" href="{{ asset('user') }}/css/helpers.css">
    <link rel="stylesheet" href="{{ asset('user') }}/css/style.css">

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
                    <form role="form" action="{{ route('user_update_camp', ['id' => $data->id]) }}" method="post"
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
                                    <option selected="selected"> {{ $data->status }}</option>
                                    <option>Pasif</option>
                                    <option>Aktif</option>
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
