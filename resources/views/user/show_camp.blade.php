@extends('layouts.home')
@section('content')
    <section class="probootstrap-cover overflow-hidden relative"
        style="background-image: url('http://127.0.0.1:8000/user/images/bg_1.jpg');" data-stellar-background-ratio="0.5"
        id="section-user">
        <div class="overlay"></div>
        <div class="row align-items-center text-center">
            <div class="col-md">
                <h2 class="heading mb-2 display-4 font-light probootstrap-animate fadeInUp probootstrap-animated">Kamplarım
                </h2>

            </div>
        </div>


    </section>

    <section class="probootstrap_section">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                        role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                                    rowspan="1" colspan="1" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending" style="width: 57px;">
                                    ID</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                    style="width: auto;">İsim</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                    colspan="1" aria-label="Office: activate to sort column ascending"
                                    style="width: auto;">Ekleyen</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                    colspan="1" aria-label="Age: activate to sort column ascending"
                                    style="width: auto;">İşletme Tipi</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                    colspan="1" aria-label="Start date: activate to sort column ascending"
                                    style="width: auto;">İnternet Adresi</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                    colspan="1" aria-label="Start date: activate to sort column ascending"
                                    style="width: auto;">Telefon</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                    colspan="1" aria-label="Start date: activate to sort column ascending"
                                    style="width: auto;">Durum</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                    colspan="1" aria-label="Start date: activate to sort column ascending"
                                    style="width: auto;">Resim Galerisi</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                    colspan="1" aria-label="Start date: activate to sort column ascending"
                                    style="width: auto;">Kategoriler</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                    colspan="2" aria-label="Start date: activate to sort column ascending"
                                    style="width: auto;">İşlem</th>
                                {{-- <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                style="width: 67px;">Salary</th> --}}
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($datalist as $dl)
                                <tr class="odd">
                                    <td class="sorting_1">{{ $dl->id }}</td>
                                    <td>{{ $dl->name }}</td>
                                    <td>{{ $dl->user_id }}</td>
                                    <td>{{ $dl->operating_type }}</td>
                                    <td>{{ $dl->web_address }}</td>
                                    <td>{{ $dl->camp_phone }}</td>
                                    <td>{{ $dl->status }}</td>
                                    <td><a href="{{ route('admin_image_add', ['camp_id' => $dl->id]) }}"
                                            onclick="return !window.open(this.href, '','top=50 left=50 height=1150 width=750')">
                                            <img src="{{ asset('admin') }}/img/icons/gallery.png"
                                                height="25px"></a>
                                    </td>
                                    <td><a href="{{ route('camp_category', ['id' => $dl->id]) }}"
                                            onclick="return !window.open(this.href, '','top=50 left=50 height=1150 width=750')"><img
                                                src="{{ asset('admin') }}/img/icons/category.png" height="20">
                                        </a>
                                    </td>
                                    <td><a href="{{ route('user_edit_camp', ['id' => $dl->id]) }}"
                                            onclick="return !window.open(this.href, '','top=50 left=50 height=1150 width=750')"><img
                                                src="{{ asset('admin') }}/img/icons/edit.png" height="25">
                                        </a>
                                    </td>
                                    <td><a href="{{ route('admin_delete_camp', ['id' => $dl->id]) }}"
                                            onclick="return confirm('Delete! Are you sure ?')"><img
                                                src="{{ asset('admin') }}/img/icons/delete.png" height="25">
                                        </a></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
        </div>
    </section>
@endsection
