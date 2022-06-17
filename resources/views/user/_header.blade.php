<?php
$parentCategories = \App\Http\Controllers\HomeController::categorylist();
// $setting = \App\Http\Controllers\HomeController::getsetting();
?>
<nav class="navbar navbar-expand-lg navbar-dark probootstrap_navbar scrolled awake" id="probootstrap-navbar">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="#"
                    onclick="doGTranslate('tr|en');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;"
                    title="English" class="nturl"><img src="http://www.websanati.com/images/english.png"
                        height="18" width="22" alt="english" /></a>
                {{-- <a href="#"
    onclick="doGTranslate('tr|de');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;"
    title="Deutsch" class="nturl"><img src="http://www.websanati.com/images/german.png"
        height="18" width="22" alt="german" /></a>
<a href="#"
    onclick="doGTranslate('tr|ar');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;"
    title="Arabic" class="nturl selected"><img src="http://www.websanati.com/images/arabic.png"
        height="18" width="22" alt="arabic" /></a> --}}
                <a href="#"
                    onclick="doGTranslate('tr|tr');jQuery('div.switcher div.selected a').html(jQuery(this).html());return false;"
                    title="Türkçe" class="nturl selected"><img src="http://www.websanati.com/images/turkish.png"
                        height="18" width="22" alt="turkish" /></a>

            </div>
            <script>
                var tarih = new Date();
                var yil = tarih.getFullYear();
                var ay = tarih.getMonth();
                var gun = tarih.getDay();
                document.write(gun + "/" + ay + "/" + yil + "<br>");
            </script>
        </div>


        <a class="navbar-brand" href="{{ route('user_home') }}">Kamp & Karavan</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#probootstrap-menu"
            aria-controls="probootstrap-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="ion-navicon"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="probootstrap-menu">
            <div class="" style="height: 10px; width: 150px">
                <form action="{{ route('getcamp') }}" method="post">
                    @csrf
                    <div class="">
                        @livewire('search')
                    </div>
                </form>

                @livewireScripts
            </div>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a class="nav-link" href="{{ route('user_home') }}">Anasayfa</a>
                </li>

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
                                    <ul class="sub-menu">
                                        @if (count($rs->children))
                                            @include('user.category_tree', ['children' => $rs->children])
                                        @endif
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>

                <li class="nav-item"><a class="nav-link" href="{{ route('editors') }}">Editörlerimiz</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">Blog</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Bize Ulaşın</a>
                </li>
                {{-- <li class="nav-item"><a class="nav-link" href="services.html">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="travel.html">Travel With Us</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li> --}}


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
            </ul>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- weather widget start --><a target="_blank" href="https://bookeder.com/weather/istanbul-18319"><img
                    src="https://w.bookcdn.com/weather/picture/21_18319_1_21_34495e_250_2c3e50_ffffff_ffffff_1_2071c9_ffffff_0_6.png?scode=2&domid=&anc_id=98568"
                    alt="booked.net" /></a><!-- weather widget end -->
        </div>
    </div>

</nav>


<script type="text/javascript">
    jQuery('.switcher .selected').click(function() {
        if (!(jQuery('.switcher .option').is(':visible'))) {
            jQuery('.switcher .option').stop(true, true).delay(100).slideDown(500);
            jQuery('.switcher .selected a').toggleClass('open')
        }
    });
    jQuery('.switcher .option').bind('mousewheel', function(e) {
        var options = jQuery('.switcher .option');
        if (options.is(':visible')) options.scrollTop(options.scrollTop() - e.originalEvent.wheelDelta);
        return false;
    });
    jQuery('body').not('.switcher').mousedown(function(e) {
        if (jQuery('.switcher .option').is(':visible') && e.target != jQuery('.switcher .option').get(0)) {
            jQuery('.switcher .option').stop(true, true).delay(100).slideUp(500);
            jQuery('.switcher .selected a').toggleClass('open')
        }
    });
</script>

<li style="display:none" id="google_translate_element2"></li>
<script type="text/javascript">
    function googleTranslateElementInit2() {
        new google.translate.TranslateElement({
            pageLanguage: 'tr',
            autoDisplay: false
        }, 'google_translate_element2');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2">
</script>


<script type="text/javascript">
    function GTranslateGetCurrentLang() {
        var keyValue = document.cookie.match('(^|;) ?googtrans=([^;]*)(;|$)');
        return keyValue ? keyValue[2].split('/')[2] : null;
    }

    function GTranslateFireEvent(element, event) {
        try {
            if (document.createEventObject) {
                var evt = document.createEventObject();
                element.fireEvent('on' + event, evt)
            } else {
                var evt = document.createEvent('HTMLEvents');
                evt.initEvent(event, true, true);
                element.dispatchEvent(evt)
            }
        } catch (e) {}
    }

    function doGTranslate(lang_pair) {
        if (lang_pair.value) lang_pair = lang_pair.value;
        if (lang_pair == '') return;
        var lang = lang_pair.split('|')[1];
        if (GTranslateGetCurrentLang() == null && lang == lang_pair.split('|')[0]) return;
        var teCombo;
        var sel = document.getElementsByTagName('select');
        for (var i = 0; i < sel.length; i++)
            if (sel[i].className == 'goog-te-combo') teCombo = sel[i];
        if (document.getElementById('google_translate_element2') == null || document.getElementById(
                'google_translate_element2').innerHTML.length == 0 || teCombo.length == 0 || teCombo.innerHTML.length ==
            0) {
            setTimeout(function() {
                doGTranslate(lang_pair)
            }, 500)
        } else {
            teCombo.value = lang;
            GTranslateFireEvent(teCombo, 'change');
            GTranslateFireEvent(teCombo, 'change')
        }
    }
    if (GTranslateGetCurrentLang() != null) jQuery(document).ready(function() {
        jQuery('div.switcher div.selected a').html(jQuery('div.switcher div.option').find('img[alt="' +
            GTranslateGetCurrentLang() + '"]').parent().html());
    });
</script>

<!--Weather Widget-->
<script type="text/javascript">
    var css_file = document.createElement("link");
    var widgetUrl = location.href;
    css_file.setAttribute("rel", "stylesheet");
    css_file.setAttribute("type", "text/css");
    css_file.setAttribute("href", 'https://s.bookcdn.com/css/w/bw-160-36.css?v=0.0.1');
    document.getElementsByTagName("head")[0].appendChild(css_file);

    function setWidgetData_56993(data) {
        if (typeof(data) != 'undefined' && data.results.length > 0) {
            for (var i = 0; i < data.results.length; ++i) {
                var objMainBlock = document.getElementById('m-booked-small-t3-56993');
                if (objMainBlock !== null) {
                    var copyBlock = document.getElementById('m-bookew-weather-copy-' + data.results[i].widget_type);
                    objMainBlock.innerHTML = data.results[i].html_code;
                    if (copyBlock !== null) objMainBlock.appendChild(copyBlock);
                }
            }
        } else {
            alert('data=undefined||data.results is empty');
        }
    }
    var widgetSrc =
        "https://widgets.booked.net/weather/info?action=get_weather_info;ver=7;cityID=18319;type=13;scode=2;ltid=3457;domid=;anc_id=89756;countday=undefined;cmetric=1;wlangID=21;color=fff5d9;wwidth=158;header_color=fff5d9;text_color=333333;link_color=08488D;border_form=3;footer_color=fff5d9;footer_text_color=333333;transparent=1;v=0.0.1";
    widgetSrc += ';ref=' + widgetUrl;
    widgetSrc += ';rand_id=56993';
    var weatherBookedScript = document.createElement("script");
    weatherBookedScript.setAttribute("type", "text/javascript");
    weatherBookedScript.src = widgetSrc;
    document.body.appendChild(weatherBookedScript)
</script><!-- weather widget end -->
