<?php

namespace App\Http\Livewire\Main\Iso;

use Livewire\Component;
use App\Models\Isos;
class Register extends Component
{
    public $name;
    public $tin;
    public $license;
    public function registerISO(){
        //dd('hapa');
        $validatedData = $this->validate([
            'name' => 'required',
            'tin' => 'required',
            'license' => 'required'
        ]);

        $iso = new Isos();
        $iso->name = $validatedData['name'];
        $iso->tin = $validatedData['tin'];
        $iso->license = $validatedData['license'];
        $iso->status = 'Active';
        $iso->save();

        $this->emit('alertAdded', 'ISO has been saved successfully.');
        $this->reset(['name', 'tin', 'license']);

    }
    public function render()
    {
        return view('livewire.main.iso.register');
    }
}
