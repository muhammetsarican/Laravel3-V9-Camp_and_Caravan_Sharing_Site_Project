@extends('layouts.home')
@section('content')
<section class="probootstrap-cover overflow-hidden relative" style="background-image: url('http://127.0.0.1:8000/user/images/bg_1.jpg');" data-stellar-background-ratio="0.5" id="section-user">
    <div class="overlay"></div>
        <div class="row align-items-center text-center">
          <div class="col-md">
            <h2 class="heading mb-2 display-4 font-light probootstrap-animate fadeInUp probootstrap-animated">Kamp Ekle</h2>

          </div> 
      </div>


</section>

<section class="probootstrap_section">
    <div class="container">
      
      <div class="row">
        <div class="col-md-2 probootstrap-animate fadeInUp probootstrap-animated">
            Resim Ekle
        </div>
        <div class="col-md-10 probootstrap-animate fadeInUp probootstrap-animated">
                    <!-- Main Content -->
        <div id="content">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-12 col-md-10">
                            @include('user.message')
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" action="{{ route('user_store_camp') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kamp İsmi</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <hr>
                                <div class="row form-group">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label>Daha önce bulundunuz mu?</label><br>
                                        <input type="radio" name="have_you_been" value="Evet">&nbsp;Evet<br>
                                        <input type="radio" name="have_you_been" value="Hayır">&nbsp;Hayır
                                    </div>
                                    <div class="col-md-6">
                                        <label>İşletme Tipi</label><br>
                                        <input type="radio" name="operating_type" value="Kamu İşletmesi">&nbsp;Kamu İşletmesi<br>
                                        <input type="radio" name="operating_type" value="Özel İşletme">&nbsp;Özel İşletme
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Kamp hakkında bilgiyi nasıl edindiniz?</label>
                                    <textarea type="text" name="information_from" class="form-control"></textarea>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label class="text-black" for="fname">Kamp Telefonu</label>
                                        <input type="text" id="fname" class="form-control" name="camp_phone">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-black" for="lname">Kamp Telefonu Tekrar</label>
                                        <input type="text" id="lname" class="form-control" name="camp_phone_validation">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Adres</label>
                                    <textarea type="text" name="address" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>İnternet Adresi</label>
                                    <input type="text" name="web_address" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Konum</label>
                                    <textarea type="text" name="location" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Kamp Hakkında</label>
                                    <textarea type="text" name="about_camp" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Resim</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Durum</label>
                                    <select class="form-control select2" name="status" style="width: 100%">
                                        <option selected="selected">Pasif</option>
                                        <option>Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-primary">Ekle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
          <div class="row">
            <div class="col-md-6">
              
            </div>
            <div class="col-md-6">
              
            </div>
          </div>
        </div>
        <div class="col-md-6 probootstrap-animate fadeInUp probootstrap-animated">
          
        </div>
      </div>
    </div>
  </section>







@endsection