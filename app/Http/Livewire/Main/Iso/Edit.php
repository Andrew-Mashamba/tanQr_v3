<?php

namespace App\Http\Livewire\Main\Iso;

use Livewire\Component;
use App\Models\Isos;
use App\Models\Search;
class Edit extends Component
{
    public $name;
    public $tin;
    public $license;
    public $isos;
    public $term;
    public $isoid;


    public function updatedTerm($value)
    {
        $this->search();
    }

    public function search()
    {
        $results = Isos::search($this->term);
        $this->isos = $results->get();
    }

    public function isoToEdit($iso){
        $this->isoid = $iso['id'];
        $this->name = $iso['name'];
        $this->tin = $iso['tin'];
        $this->license = $iso['license'];
        $this->isos = null;
    }

        public function updateISO(){
            $validatedData = $this->validate([
                'name' => 'required',
                'tin' => 'required',
                'license' => 'required'
            ]);

        $iso = Isos::find($this->isoid);
        $iso->name = $validatedData['name'];
        $iso->tin = $validatedData['tin'];
        $iso->license = $validatedData['license'];
        $iso->save();

        $this->emit('alertAdded', 'ISO has been updated successfully.');
        $this->reset(['name', 'tin', 'license','term']);
    }



    public function render()
    {
        return view('livewire.main.iso.edit');
    }
}
