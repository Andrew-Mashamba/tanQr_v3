<?php

namespace App\Http\Livewire\Main;


use Livewire\Component;
use Session;
class Home extends Component
{


    public $tab_id = '1';
    public $title = 'Dashboard';

    protected $listeners = ['alertAdded'];

    public function alertAdded($alert)
    {
        //dd($alert);
        session()->flash('message', $alert);
        session()->flash('alert-class', 'alert-success');


    }

    public function resetAlert(){
        session()->flash('message', null);
    }

    public function boot(){
        Session::put('CurrentMenu','Dashboard');
        Session::put('CurrentTabbID',1);
    }

    public function setTabID($id){

        //dd($id);

        Session::put('CurrentTabbID',$id);
        $this->emit('CurrentTabbIDSet');
    }

    public function menuItemClicked($tabId)
    {
        $this->tab_id = $tabId;


        Session::put('CurrentTabbID',$this->tab_id);

        if ($tabId == '1') {
            $this->title = 'Dashboard';
            Session::put('CurrentMenu','Dashboard');

        }
        if ($tabId == '2') {
            $this->title = 'ISO Management';
            Session::put('CurrentMenu','ISO');
        }
        if ($tabId == '3') {
            $this->title = 'Merchants Management';
            Session::put('CurrentMenu','Merchants');
        }
        if ($tabId == '4') {
            $this->title = 'QR Codes Management';
            Session::put('CurrentMenu','QR');
        }
        if ($tabId == '5') {
            $this->title = 'Transactions';
            Session::put('CurrentMenu','Transactions');
        }
        if ($tabId == '10') {

            $this->title = 'Reports';
            Session::put('CurrentMenu','Reports');
        }
        if ($tabId == '7') {
            $this->title = 'Approvals';
            Session::put('CurrentMenu','Approvals');
        }
        if ($tabId == '8') {
            $this->title = 'Users';
            Session::put('CurrentMenu','Users');
        }
    }

    public function render()
    {
        return view('livewire.main.home');
    }
}
