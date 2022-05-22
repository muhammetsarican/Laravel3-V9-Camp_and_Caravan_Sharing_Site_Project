@extends('layouts.admin')
@section('title','Category Add')
@section('content')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Add Category</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a> </li>
                            <li class="breadcrumb-item active">Add Category</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content -->
        <div id="content">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <a href="#" class="btn btn-black--hover btn-info">Add Category</a>
                    </div>
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>
                    </div>
                    <div class="card-body">
                            <form role="form" action="#" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>İsim</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Katkı Sayısı</label>
                                        <input type="text" name="number_of_contributions" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>İnstagram Linki</label>
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
                                    <button type="submit" class="btn btn-primary">Add Category</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



