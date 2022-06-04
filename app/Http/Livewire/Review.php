<?php

namespace App\Http\Livewire;

use App\Models\Camp;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use test\Mockery\MockClassWithIterableReturnTypeTest;


class Review extends Component
{
    public $record, $subject, $review, $camp_id, $rate;
    public function mount($id)
    {
        $this->record=Camp::findOrFail($id);
        $this->camp_id=$this->record->id;
    }

    public function render()
    {
        return view('livewire.review');
    }
    public function resetInput()
    {
        $this->subject=null;
        $this->IP=null;
        $this->review=null;
        $this->camp_id=null;
        $this->rate=null;
    }
    public function store()
    {
        $this->validate([
            'subject'=>'required|min:5',
            'review'=>'required|min:10',
            'rate'=>'required',
        ]);

        \App\Models\Review::create([
            'camp_id'=>$this->camp_id,
            'user_id'=>Auth::id(),
            'IP'=>$_SERVER['REMOTE_ADDR'],
            'rate'=>$this->rate,
            'subject'=>$this->subject,
            'review'=>$this->review,
        ]);
        session()->flash('message', 'Review Send Successfully');
        $this->resetInput();
    }
}
