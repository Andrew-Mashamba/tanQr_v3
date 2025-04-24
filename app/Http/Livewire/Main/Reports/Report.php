<?php

namespace App\Http\Livewire\Main\Reports;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Report extends Component
{

    public $typex='TRANSACTIONS';


    protected $listeners=['CurrentTabbIDSet'=>'loadView'];

    public function mount(){
        $this->typex = 'TRANSACTIONS';
    }

    public function loadView(){
        $this->tab_id= Session::get('CurrentTabbID');

    }

    public function render()
    {
        return view('livewire.main.reports.report');
    }
}
