<?php

namespace App\Http\Livewire\Main\Setting;

use App\Models\approvals;
use App\Models\departmentsList;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Roles extends Component
{
    public $selected=1;
    public $department = null;
    public $moduleList;

    public $modules = [];

    public $rules = [
        'modules' => 'required|array',
    ];

    public $messages = [
        'modules.required' => 'Please select at least one module',
    ];

    public $department_name;


    protected $listeners = ['refreshData' => 'refreshData'];

    public function refreshData()
    {
        $this->selected = 1;
        session()->flash('message', 'Your request has been sent for approval');
        session()->flash('alert-class', 'alert-success');
    }



    public function save(): void
    {

        $this->validate();

        $department = new departmentsList;
        $department->department_name = $this->department_name;
        $department->modules = json_encode($this->modules);
        $department->status = 'PENDING';
        if ($department->save()) {

            session()->flash('message', 'Role created');
            session()->flash('alert-class', 'alert-success');


              approvals::Create(

                [
                    'institution' => '',
                    'process_name' => 'addDepartment',
                    'process_description' => Auth::user()->name.' has requested to add a ROLE - '.$this->department_name,
                    'approval_process_description' => '',
                    'process_code' => '30',
                    'process_id' => $department->id,
                    'process_status' => 'PENDING',
                    'approval_status' => 'PENDING',
                    'user_id'  => Auth::user()->id,
                    'team_id'  => ''

                ]
            );


            $this->modules = [];
            $this->department_name = null;



        }



    }

    public function setView($number){
        $this->selected = $number;
    }




    public function render()
    {
        return view('livewire.main.setting.roles');
    }
}
