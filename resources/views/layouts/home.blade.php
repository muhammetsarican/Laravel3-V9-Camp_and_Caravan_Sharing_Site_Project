<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{ asset('user') }}/images/icons/xing.png" />

    <title>@yield('title')</title>

    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">

    <meta name="author" content="Kuşbabalı Mahoni">

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
    @include('user._header')
    @section('content')
        <!--Content-->
    @show
    @include('user._footer')
</body>

</html>
