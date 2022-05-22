@extends('layouts.admin')
@section('title','Kategoriler')

@section('description')
@endsection

@section('keywords')
@section('header')
    <header class="header-v4">
        @include('admin._header')
    </header>
@endsection
@section('content')
    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="{{route('admin_home')}}" class="stext-109 cl8 hov-cl1 trans-04">
                Anasayfa
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
				Kategoriler
			</span>
        </div>
    </div>


    <!-- Shoping Cart -->
    <section>
        <h4 class="mtext-105 cl2 txt-center p-b-30">
            Kategoriler
        </h4>


        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-12 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <a href="{{route('admin_category_add')}}" class=" bg8 bor13 size-150 hov-btn3">Kategori Ekle</a>
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart table-bordered">
                                <tr class="table_head">
                                    <th class="column-1">Id</th>
                                    <th class="column-1">Kategori</th>
                                    <th class="column-1">Başlık</th>
                                    <th class="column-1">Durum</th>
                                    <th class="column-1">Düzenle</th>
                                    <th class="column-1">Sil</th>
                                </tr>
                                @foreach($datalist as $dl)
                                <tr style="height: 55px">
                                    <td class="column-1">{{$dl->id}}</td>
                                    @if ($dl->parent_id==0)
                                    <td class="column-1">Ana Kategori</td>
                                    @endif
                                    @if ($dl->parent_id!=0)
                                        {{-- <td class="column-1">{{\App\Http\Controllers\Admin\CategoryController::getParentsTree($dl,$dl->title)}}</td> --}}
                                    @endif
                                    <td class="column-1">{{$dl->title}}</td>
                                    <td class="column-1">{{$dl->status}}</td>
                                    <td class="column-1"><a href="{{route('admin_category_edit',['id'=>$dl->id])}}"><img src="{{asset('assets')}}/images/icons/edit.png"> </a></td>
                                    <td class="column-1"><a href="{{route('admin_category_delete',['id'=>$dl->id])}}" onclick="return confirm('Delete! Are you sure ?')"><img src="{{asset('assets')}}/images/icons/delete.png"> </a></td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
