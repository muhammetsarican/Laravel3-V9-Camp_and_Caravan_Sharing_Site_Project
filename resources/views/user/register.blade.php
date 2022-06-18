<?php
$getsetting = \App\Http\Controllers\Admin\SettingController::getsetting();
?>
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

		<title>Places &mdash; Free HTML5 Bootstrap 4 Theme by ProBootstrap.com</title>
		<meta name="description" content="Free Bootstrap 4 Theme by ProBootstrap.com">
		<meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,700" rel="stylesheet">

		<link rel="stylesheet" href="{{asset('user')}}/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="{{asset('user')}}/css/animate.css">
    <link rel="stylesheet" href="{{asset('user')}}/fonts/ionicons/css/ionicons.min.css">
    
    <link rel="stylesheet" href="{{asset('user')}}/css/owl.carousel.min.css">
    
    <link rel="stylesheet" href="{{asset('user')}}/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="{{asset('user')}}/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('user')}}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{asset('user')}}/css/select2.css">
    

    <link rel="stylesheet" href="{{asset('user')}}/css/helpers.css">
    <link rel="stylesheet" href="{{asset('user')}}/css/style.css">

	</head>
	<body>
        <section class="probootstrap_section" id="section-city-guides">
            <div class="container">
              <div class="row text-center mb-5 probootstrap-animate">
                <div class="col-md-12">
                  <h2 class="display-4 probootstrap-section-heading">Kamp & Karavan Kayıt Ol</h2>
                </div>
              </div>
<div class="row">
    <div class="col-md-4 probootstrap-animate fadeInUp probootstrap-animated">
        <div class="row text-center mb-5 probootstrap-animate">
        <div class="col-md-12">
            <h4 class="border-bottom probootstrap-section-heading">Kayıt Sayfası</h4>
          </div>
        </div>
      <div class="row">
        <div class="col-md-12">
                    <h5 class="probootstrap-section-heading">Bizimle İletişime Geçin</h5><br>
          <ul class="probootstrap-contact-details">
            <li>
              <span class="text-uppercase"><span class="ion-paper-airplane"></span> E-Posta</span>
              {{$getsetting->email}}
            </li>
            <li>
                <span class="text-uppercase"><span class="ion-ios-telephone"></span> Telefon</span>
                {{$getsetting->phone}}
              </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-8 probootstrap-animate fadeInUp probootstrap-animated">
      <form action="{{ route('register') }}" method="post" enctype="multipart/form-data" class="probootstrap-form probootstrap-form-box mb60">
        @csrf
        <div class="form-group">
            <label for="fname" class="sr-only sr-only-focusable">Ad</label>
            <input type="text" class="form-control" id="fname" name="name" placeholder="Adınızı Soyadınız">
        </div>
        <div class="form-group">
          <label for="email" class="sr-only sr-only-focusable">E-Posta</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="E-Posta">
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
              <div class="form-group">
                <label for="password" class="sr-only sr-only-focusable">Şifre</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Şifre">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="passwordAgain" class="sr-only sr-only-focusable">Şifre Tekrar</label>
                <input type="password" class="form-control" id="passwordAgain" name="password_confirmation" placeholder="Şifre Tekrar">
              </div>
            </div>
          </div>
        <div class="form-group">
            <a href="#">Zaten bir hesabınız var mı? Oturum Açın</a><br><br>    
          <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Kayıt Ol">
        </div>
      </form>
    </div>
  </div>
            </div>
        </section>
</body>
<script src="{{asset('user')}}/js/jquery.min.js"></script>
    
<script src="{{asset('user')}}/js/popper.min.js"></script>
<script src="{{asset('user')}}/js/bootstrap.min.js"></script>
<script src="{{asset('user')}}/js/owl.carousel.min.js"></script>

<script src="{{asset('user')}}/js/bootstrap-datepicker.js"></script>
<script src="{{asset('user')}}/js/jquery.waypoints.min.js"></script>
<script src="{{asset('user')}}/js/jquery.easing.1.3.js"></script>

<script src="{{asset('user')}}/js/select2.min.js"></script>

<script src="{{asset('user')}}/js/main.js"></script>
</html>