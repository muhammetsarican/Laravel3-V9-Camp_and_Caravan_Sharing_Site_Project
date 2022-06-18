<div style="padding-top: 0px">
    <input style="padding-top: 0px" wire:model="search" name="search" type="text" class="form-control" list="mylist" placeholder="Kamplarda Ara..."/>
    @if(!empty($query))
        <datalist id="mylist">
            @foreach($datalist as $rs)
                <option value="{{$rs->name}}"></option>
            @endforeach
        </datalist>
    @endif
    {{-- The best athlete wants his opponent at his best. --}}
</div>
{{-- <div>
    <input wire:model="search" name="search" type="text" class="mtext-107 cl2 size-114 plh2 p-r-15" list="mylist" placeholder="Ürünlerde Ara..."/>

    @if(!empty($query))
        <datalist id="mylist">
            @foreach($datalist as $rs)
                <option value="{{$rs->name}}">{{$rs->category->title}}</option>
            @endforeach
        </datalist>
    @endif
    {{-- The best athlete wants his opponent at his best. --}}
{{-- </div> --}}
