<?php

namespace App\Http\Livewire\Main;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Reports extends Component
{
    public $type = 'TRANSACTIONS';
    public $startDate;
    public $endDate;
    public $isos;

    public function boot()
    {
        $this->startDate = date('Y-m-d');
        $this->endDate = date('Y-m-d');
        Session::put('startDate', $this->startDate);
        Session::put('endDate', $this->endDate);

    }


    public function updatedStartDate()
    {
        Session::put('startDate', $this->startDate);
        $this->emit('dateUpdated');
    }
    public function updatedEndDate()
    {
        Session::put('endDate', $this->endDate);
        $this->emit('dateUpdated');
    }

    public function updatedIsos()
    {
        $this->emit('isoUpdated');
        Session::put('isos', $this->isos);
        $this->emit('dateUpdated');
    }



    public function render()
    {
        return view('livewire.main.reports');
    }
}
