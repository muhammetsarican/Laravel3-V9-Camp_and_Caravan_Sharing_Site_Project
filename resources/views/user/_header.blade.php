<?php
$parentCategories = \App\Http\Controllers\HomeController::categorylist();
// $setting = \App\Http\Controllers\HomeController::getsetting();
?>
<nav class="navbar navbar-expand-lg navbar-dark probootstrap_navbar scrolled awake" id="probootstrap-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">Kamp & Karavan</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#probootstrap-menu"
            aria-controls="probootstrap-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="ion-navicon"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="probootstrap-menu">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a class="nav-link" href="{{ route('user_home') }}">Anasayfa</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('editors') }}">Editörlerimiz</a>
                </li>
                {{-- <li class="nav-item"><a class="nav-link" href="services.html">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="travel.html">Travel With Us</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li> --}}

                <ul class="main-menu navbar-nav ml-auto">
                    <li class="active-menu nav-item">
                        <a href="#" class="nav-link">Kategoriler</a>
                        {{-- {{\App\Http\Controllers\HomeController::get_role(\Illuminate\Support\Facades\Auth::user()->id)}} --}}
                        <ul class="sub-menu">
                            @foreach ($parentCategories as $rs)
                                <li>
                                    <a href="#" class="nav-link">
                                        {{ $rs->title }}
                                    </a>
                                    <ul class="dropdown">
                                        @if (count($rs->children))
                                            @include('user.category_tree', ['children' => $rs->children])
                                        @endif
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>

                @auth
                    <ul class="main-menu">
                        <li class="active-menu nav-item">
                            <a href="#" class="nav-link">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
                            {{-- {{\App\Http\Controllers\HomeController::get_role(\Illuminate\Support\Facades\Auth::user()->id)}} --}}

                            <ul class="sub-menu">
                                @if (\Illuminate\Support\Facades\Auth::user()->roles()->where('name', 'admin')->exists())
                                    <li>
                                        <a href="{{ route('user_camp') }}" class="nav-link">
                                            Kamplarım
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user_add_camp') }}" class="nav-link">
                                            Kamp Ekle
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <a href="{{ route('user_logout') }}" class="nav-link">
                                        Çıkış Yap
                                    </a>
                                </li>
                                {{-- <li><a href="{{route('user_order')}}">Siparişlerim</a></li>
                      <li><a href="{{route('all_logout')}}">Çıkış Yap</a></li> --}}
                            </ul>
                        </li>
                    </ul>

                    {{-- <li class="nav-item"><a class="nav-link" href="{{route('user_login')}}">{{\Illuminate\Support\Facades\Auth::user()->name}}</a></li> --}}
                @endauth
                @guest
                    <ul class="main-menu">
                        <li class="active-menu nav-item">
                            <a href="#" class="nav-link">Hesap</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ route('user_login') }}" class="nav-link">
                                        Oturum Aç
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user_register') }}" class="nav-link">
                                        Kayıt Ol
                                    </a>
                                </li>
                                {{-- <li><a href="{{route('user_order')}}">Siparişlerim</a></li>
                      <li><a href="{{route('all_logout')}}">Çıkış Yap</a></li> --}}
                            </ul>
                        </li>
                    </ul>
                @endguest
                <!-- Search product -->
                <div class="" style="height: 10px , top-padding:0px">
                <form action="{{route('getcamp')}}" method="post" class="nav-link">
                    @csrf
                    <div class="">
                            @livewire('search')
                        </div>
                </form>

                @livewireScripts
                </div>
            </ul>
        </div>
    </div>
</nav>
