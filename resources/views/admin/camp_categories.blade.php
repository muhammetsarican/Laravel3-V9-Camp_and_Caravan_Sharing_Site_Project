<html>

<head>
    <title>Kamp Kategorisi Ekle</title>
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
                    <form role="form" action="{{ route('camp_category_add', ['id' => $data->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input class="form-control" type="hidden" value="{{ $data->id }}" name="camp_id">
                        <div class="form-group">
                            <label>İsim</label>
                            <p class="form-control">{{ $data->name }}</p>
                        </div>
                        {{-- <div class="row form-group">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label>Daha önce bulundunuz mu?</label><br>
                                <input type="radio" name="have_you_been" value="Evet">&nbsp;Evet<br>
                                <input type="radio" name="have_you_been" value="Hayır">&nbsp;Hayır
                            </div>
                            <div class="col-md-6">
                                <label>İşletme Tipi</label><br>
                                <input type="radio" name="operating_type" value="Kamu İşletmesi">&nbsp;Kamu İşletmesi<br>
                                <input type="radio" name="operating_type" value="Özel İşletme">&nbsp;Özel İşletme
                            </div>
                        </div> --}}
                        <div class="row form-group">
                            <div class="col-md-12">

                                <label>Kategoriler</label>
                            </div>
                            @foreach ($data->camp_category as $row)
                                <div class="col-md-2">
                                    <p class="form-control">
                                        {{ $row->category->title }} ;
                                        <a href="{{ route('camp_category_delete', ['id' => $row->id]) }}">
                                            <img src="{{ asset('admin') }}/img/icons/delete.png" height="25px">
                                        </a>
                                    </p>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <div class="card-body">
                            <h3>Kategori Ekle</h3><hr>
                            {{-- <select class="form-control select2" name="category_id" style="width: 100%">
                                @foreach ($category as $rs)
                                    <option value="{{ $rs->id }}">
                                        {{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs, $rs->title) }}
                                    </option>
                                @endforeach
                            </select> --}}
                            

                            <div class="form-group">
                                <label>Bölge</label>
                                <select class="form-control select2" name="category_id_0" style="width: 100%">
                                    <option value="0" selected="selected">Seçiniz...</option>
                                    <?php
                                    $bölge = \App\Http\Controllers\HomeController::get_parent('Bölge');
                                    ?>
                                    @foreach ($bölge as $rs)
                                        <option value="{{ $rs->id }}">
                                            {{ $rs->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Şehir</label>
                                <select class="form-control select2" name="category_id_1" style="width: 100%">
                                    <option value="0" selected="selected">Seçiniz...</option>
                                    <?php
                                    $sehir = \App\Http\Controllers\HomeController::get_city('Şehir');
                                    ?>
                                    @for ($i = 0; $i < count($sehir, 1) / 2 - 1; $i++)
                                        <option value="{{ $sehir['city_id'][$i] }}">
                                            {{ $sehir['city_title'][$i] }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kamp Tipi</label>
                                <select class="form-control select2" name="category_id_2" style="width: 100%">
                                    <option value="0" selected="selected">Seçiniz...</option>
                                    <?php
                                    $kamp_tipi = \App\Http\Controllers\HomeController::get_parent('Kamp Tipi');
                                    ?>
                                    @foreach ($kamp_tipi as $rs)
                                        <option value="{{ $rs->id }}">
                                            {{ $rs->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Konaklama İmkanı</label>
                                <select class="form-control select2" name="category_id_3" style="width: 100%">
                                    <option value="0" selected="selected">Seçiniz...</option>
                                    <?php
                                    $konaklama_imkani = \App\Http\Controllers\HomeController::get_parent('Konaklama İmkanı');
                                    ?>
                                    @foreach ($konaklama_imkani as $rs)
                                        <option value="{{ $rs->id }}">
                                            {{ $rs->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Minimum Konaklama Süresi</label>
                                <select class="form-control select2" name="category_id_4" style="width: 100%">
                                    <option value="0" selected="selected">Seçiniz...</option>
                                    <?php
                                    $min_konaklama_suresi = \App\Http\Controllers\HomeController::get_parent('Minimum Konaklama Süresi');
                                    ?>
                                    @foreach ($min_konaklama_suresi as $rs)
                                        <option value="{{ $rs->id }}">
                                            {{ $rs->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Konum</label>
                                <select class="form-control select2" name="category_id_5" style="width: 100%">
                                    <option value="0" selected="selected">Seçiniz...</option>
                                    <?php
                                    $konum = \App\Http\Controllers\HomeController::get_parent('Konum');
                                    ?>
                                    @foreach ($konum as $rs)
                                        <option value="{{ $rs->id }}">
                                            {{ $rs->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Plaj Tipi</label>
                                <select class="form-control select2" name="category_id_6" style="width: 100%">
                                    <option value="0" selected="selected">Seçiniz...</option>
                                    <?php
                                    $plaj_tipi = \App\Http\Controllers\HomeController::get_parent('Plaj Tipi');
                                    ?>
                                    @foreach ($plaj_tipi as $rs)
                                        <option value="{{ $rs->id }}">
                                            {{ $rs->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Ekle</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
