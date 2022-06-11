@if(session()->has('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
@endif
@include('user.message')
<form wire:submit.prevent="store">
    @csrf
    <div class="row form-group">
        <div class="col-md-4 mb-3 mb-md-0">
            <label class="text-black" for="cleaning_rate">Temizlik</label>
            <div class="rating col-md-12">

                <input type="radio" wire:model="cleaning_rate" value="5" id="cleaning_rate_5">
                <label for="cleaning_rate_5">☆</label>
                <input type="radio" wire:model="cleaning_rate" value="4" id="cleaning_rate_4">
                <label for="cleaning_rate_4">☆</label>
                <input type="radio" wire:model="cleaning_rate" value="3" id="cleaning_rate_3">
                <label for="cleaning_rate_3">☆</label>
                <input type="radio" wire:model="cleaning_rate" value="2" id="cleaning_rate_2">
                <label for="cleaning_rate_2">☆</label>
                <input type="radio" wire:model="cleaning_rate" value="1" id="cleaning_rate_1">
                <label for="cleaning_rate_1">☆</label>
            </div>
            @error('cleaning_rate')<span class="text-danger">{{$message}}</span>@enderror
        </div>
        <div class="col-md-4 mb-3 mb-md-0">
            <label class="text-black" for="service_rate">Hizmet Kalitesi</label>
            <div class="rating col-md-12">

                <input type="radio" wire:model="service_rate" value="5" id="service_rate_5">
                <label for="service_rate_5">☆</label>
                <input type="radio" wire:model="service_rate" value="4" id="service_rate_4">
                <label for="service_rate_4">☆</label>
                <input type="radio" wire:model="service_rate" value="3" id="service_rate_3">
                <label for="service_rate_3">☆</label>
                <input type="radio" wire:model="service_rate" value="2" id="service_rate_2">
                <label for="service_rate_2">☆</label>
                <input type="radio" wire:model="service_rate" value="1" id="service_rate_1">
                <label for="service_rate_1">☆</label>
            </div>
            @error('service_rate')<span class="text-danger">{{$message}}</span>@enderror
        </div>
        <div class="col-md-4 mb-3 mb-md-0">
            <label class="text-black" for="price_performance_rate">Fiyat&Performans</label>
            <div class="rating col-md-12">

                <input type="radio" wire:model="price_performance_rate" value="5" id="price_performance_rate_5">
                <label for="price_performance_rate_5">☆</label>
                <input type="radio" wire:model="price_performance_rate" value="4" id="price_performance_rate_4">
                <label for="price_performance_rate_4">☆</label>
                <input type="radio" wire:model="price_performance_rate" value="3" id="price_performance_rate_3">
                <label for="price_performance_rate_3">☆</label>
                <input type="radio" wire:model="price_performance_rate" value="2" id="price_performance_rate_2">
                <label for="price_performance_rate_2">☆</label>
                <input type="radio" wire:model="price_performance_rate" value="1" id="price_performance_rate_1">
                <label for="price_performance_rate_1">☆</label>
            </div>
            @error('price_performance_rate')<span class="text-danger">{{$message}}</span>@enderror
        </div>
        <div class="col-md-6">
            <label class="text-black" for="subject">Subject</label>
            <input type="subject" id="subject" class="form-control" wire:model="subject">
            @error('subject')<span class="text-danger">{{$message}}</span>@enderror
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-12">
            <label class="text-black" for="review">Review</label>
            <textarea wire:model="review" id="review" cols="30" rows="7" class="form-control"
                      placeholder="Write your notes or questions here..."></textarea>
            @error('review')<span class="text-danger">{{$message}}</span>@enderror
        </div>
    </div>
    @auth
        <div class="row form-group">
            <div class="col-md-12">
                <input type="submit" value="Send Review" class="btn btn-primary text-white">
            </div>
        </div>
    @else
        <a href="{{route('user_login')}}" class="btn btn-danger">Please Login Before Submit.</a>
    @endauth
</form>

@livewireScripts
