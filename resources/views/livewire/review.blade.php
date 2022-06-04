@if(session()->has('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
@endif
@include('user.message')
<form wire:submit.prevent="store">
    @csrf
    <div class="row form-group">
        <div class="col-md-6 mb-3 mb-md-0">
            <label class="text-black" for="review">Your Rating</label>
            <div class="rating col-md-6">

                <input type="radio" wire:model="rate" value="5" id="5">
                <label for="5">☆</label>
                <input type="radio" wire:model="rate" value="4" id="4">
                <label for="4">☆</label>
                <input type="radio" wire:model="rate" value="3" id="3">
                <label for="3">☆</label>
                <input type="radio" wire:model="rate" value="2" id="2">
                <label for="2">☆</label>
                <input type="radio" wire:model="rate" value="1" id="1">
                <label for="1">☆</label>
            </div>
            @error('rate')<span class="text-danger">{{$message}}</span>@enderror
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
