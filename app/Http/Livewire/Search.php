<?php

namespace App\Http\Livewire;

use App\Models\Camp;
use Livewire\Component;

class Search extends Component
{
    public $search='';
    public function render()
    {
        $datalist=Camp::where('name', 'like', '%'.$this->search.'%')->get();
        return view('livewire.search',['datalist'=>$datalist,'query'=>$this->search]);
    }
}
