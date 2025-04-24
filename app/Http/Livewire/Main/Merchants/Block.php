<?php

namespace App\Http\Livewire\Main\Merchants;

use Livewire\Component;
use App\Models\Merchant;
use App\Models\Search;

class Block extends Component
{

    public $name;
    public $tin;
    public $license;
    public $isos;
    public $term;
    public $isoid;
    public $Status;
    public $Action;



    public function updatedTerm($value)
    {
        $this->search();
    }

    public function search()
    {
        $results = Merchant::search($this->term);
        $this->isos = $results->get();
    }

    public function isoToBlockUnBlock($iso,$num){
        //dd($num);
        $this->isoid = $iso['id'];
        $this->name = $iso['name'];
        if($num == 1){
            $this->Status = 'blocked';
            $this->Action = 'Block';
        }else{
            $this->Status = 'active';
            $this->Action = 'Activate';
        }
        //$this->isos = null;
        $this->reset(['isos', 'term']);
    }

    public function updateISO(){

        $iso = Merchant::find($this->isoid);
        $iso->status = $this->Status;
        $iso->save();

        $this->emit('alertAdded', $this->Action . ' - process is successfully.');
        $this->reset(['name', 'isoid', 'Status', 'Action','isos']);
    }

    
    public function render()
    {
        return view('livewire.main.merchants.block');
    }
}
