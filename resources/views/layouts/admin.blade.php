<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>

    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">

    <meta name="author" content="Kuşbabalı Mahoni">
    <link rel="icon" type="image/png" href="{{ asset('admin') }}/img/icons/xing.png" />


    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin') }}/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('admin._sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                @include('admin._header')
                @section('content')
                    <!--Content-->
                @show
                @include('admin._footer')
            </div>
        </div>
        @section('javascript')
        @include('admin._javascripts')
        @show
    </div>
    <!-- End of Page Wrapper -->
</body>

</html>
