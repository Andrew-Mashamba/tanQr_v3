<?php

namespace App\Http\Livewire\Main;

use Livewire\Component;
use Session;
class Merchants extends Component
{
    public $CurrentTabID;

    protected $listeners = [
        'CurrentTabbIDSet' => 'IDSet'
    ];

    public function boot(){
        $this->CurrentTabID = 1;
    }

    public function IDSet()
    {
        $this->CurrentTabID = Session::get('CurrentTabbID');
    }

    public function render()
    {
        return view('livewire.main.merchants');
    }
}
