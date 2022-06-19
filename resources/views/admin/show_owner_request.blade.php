@extends('layouts.admin')
@section('title', 'Talepler')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h2 class="mb-2 text-gray-800">Talepler</h2>
            </div>

            <div class="col-sm-12 col-md-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item "><a href="{{ route('admin_home') }}">Anasayfa</a></li>
                    <li class="breadcrumb-item active">Talepler </li>
                </ol>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">



            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-2">
                            </div>
                            <div class="col-sm-12 col-md-10">
                                @include('user.message')
                            </div>
                        </div>
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
                                                style="width: auto;">Adı</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: auto;">Kamp Adı</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: auto;">E-Posta</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: auto;">Durum</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: auto;">İşlem</th>
                                            {{-- <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 67px;">Salary</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($datalist as $dl)
                                            <tr class="odd">
                                                <td>{{ $dl->id }}</td>
                                                <td>{{ $dl->name }}</td>
                                                <td>{{ $dl->camp->name }}</td>
                                                <td>{{ $dl->mail }}</td>
                                                <td>{{ $dl->status }}</td>
                                                <td><a href="{{ route('admin_edit_request', ['id' => $dl->id]) }}"
                                                        onclick="return !window.open(this.href, '','top=50 left=50 height=1150 width=750')"><img
                                                            src="{{ asset('admin') }}/img/icons/edit.png" height="25">
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
