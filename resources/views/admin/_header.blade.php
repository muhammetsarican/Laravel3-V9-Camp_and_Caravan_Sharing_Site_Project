<?php
$message = \App\Http\Controllers\Admin\HomeController::getmessage();
$count = \App\Http\Controllers\Admin\HomeController::getcountmessage();
?>

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-danger badge-counter">{{ $count }}</span>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Mesaj Merkezi
                </h6>
                @foreach ($message as $msg)
                    @if ($msg->status != 'Read')
                        <a class="dropdown-item d-flex align-items-center"
                            href="
                            {{ route('admin_edit_message', ['id' => $msg->id]) }}
                            "
                            onclick="return !window.open(this.href, '','top=50 left=50 height=1150 width=750')">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="{{ asset('admin') }}/img/icons/email.png"
                                    alt="..." style="object-fit:cover">
                                <div class="status-indicator bg-success"></div>
                            </div>

                            <div class="font-weight-bold">
                                <div class="text-truncate text-black-opacity-05">{{ $msg->message }}</div>
                                <div class="small text-gray-700">{{ $msg->name }}</div>
                            </div>
                        </a>
                    @endif
                @endforeach
                @if ($count == 0)
                    <div class="font-weight-bold dropdown-item d-flex align-items-center">
                        <br>
                        <div class="text-truncate text-black-opacity-05">Mesajın yok.</div>
                        <br>
                    </div>
                @endif
                <div class="small text-gray-700">
                    <a class="dropdown-item text-center small text-gray-500"
                        href="
                    {{ route('admin_message') }}
                    ">Daha Fazla Mesaj
                        Oku</a>
                </div>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span
                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                <img class="img-profile rounded-circle" src="{{ asset('admin') }}/img/undraw_profile.svg">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('admin_setting') }}">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Ayarlar
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('admin_logout') }}" data-toggle="modal"
                    data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Çıkış Yap
                </a>
            </div>
        </li>

    </ul>

</nav>
