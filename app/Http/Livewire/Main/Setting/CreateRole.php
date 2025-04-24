<?php

namespace App\Http\Livewire\Main\Setting;

use App\Models\approvals;
use App\Models\departmentsList;
use App\Models\menus;
use App\Models\Permissions;
use App\Models\sub_menus;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateRole extends Component
{

    public $moduleList;
    public $menusArray;
    public $sub_menus;
    public $permissions = [];
    public $role_name;
    public $description;

    protected $rules = [
        'permissions' => 'required|array|min:1',
        'role_name' => 'required|string|max:255',
        'description' => 'required|string|max:255',
    ];

    public function boot(){
        $this->moduleList = Permissions::get();
        $this->Permissions();
    }

    public function Permissions(): void
    {
        $SubMenuData = Permissions::get();
        foreach ($SubMenuData as $permission){
            //dd($permission);
            $this->menusArray[]= $permission->id;

        }


    }

    public function save(){

        $this->validate();

        $Role = new departmentsList;
        $Role->status = 'PENDING';
        $Role->department_name = $this->role_name;
        $Role->permissions = json_encode($this->permissions);
        $Role->description = $this->description;

        if ($Role->save()) {

            session()->flash('message', 'Role created');
            session()->flash('alert-class', 'alert-success');


          approvals::Create(

                [
                    'institution' => '',
                    'process_name' => 'addDepartment',
                    'process_description' =>  auth()->user()->name. ' has requested to add a ROLE - '.$this->role_name,
                    'approval_process_description' => '',
                    'process_code' => '30',
                    'process_id' => $Role->id,
                    'process_status' => 'PENDING',
                    'approval_status' => 'PENDING',
                    'user_id'  => Auth::user()->id,
                    'team_id'  => ''

                ]
            );


            $this->permissions = [];
            $this->role_name = null;
            $this->description = null;


        }

    }


    public function render()
    {
        return view('livewire.main.setting.create-role');
    }
}
