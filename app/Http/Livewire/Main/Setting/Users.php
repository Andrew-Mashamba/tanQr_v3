<?php

namespace App\Http\Livewire\Main\Setting;

use App\Models\approvalModel;
use App\Models\User;
use App\Models\UserSubMenu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Users extends Component
{
    public $tab_id=1;
    public $departmentList;
    public $showCreateNewUser;
    public $departmentName;
    public $phone_number;


    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $department;
    public $menusArray;

    protected $listeners=['CurrentTabbIDSet'=>'loadView'];


    public function createNewUser()
    {


        $this->showCreateNewUser = true;
    }


    public function boot(): void
    {

        $this->nodesList = User::get();
        $this->userName = '';
//        $this->user_sub_menus = UserSubMenu::where('menu_id',8)->where('user_id', Auth::user()->id)->get();
        $this->password = "12345";
    }


    public function loadView(){
        $this->tab_id= Session::get('CurrentTabbID');

    }

    public function setView($tab_id){
        $this->tab_id=$tab_id;
    }


    public function createUser(): void
    {


        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone_number' => [
                'required',
                'string',
                'regex:/^(\+255|0)[1-9]\d{8}$/',
                'unique:users,phone_number'
            ]
        ]);


        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->phone_number = $this->phone_number;
        $user->status = 'PENDING';
        $user->department = $this->department;
        $user->password = bcrypt($this->password);
        $user->otp_time = now();
        $user->verification_status = '0';

        if ($user->save()) {


            $update_value = approvalModel::Create(
                [
                    'institution' => '',
                    'process_name' => 'addUser',
                    'process_description' => Auth::user()->name.' has requested to add a User - '.$this->name,
                    'approval_process_description' => '',
                    'process_code' => '30',
                    'process_id' => $user->id,
                    'process_status' => 'PENDING',
                    'approval_status' => 'PENDING',
                    'user_id'  => Auth::user()->id,
                    'team_id'  => ''

                ]
            );

            $this->newuser = $user->id;
            $this->showRoles = true;
            Session::put('newuser', $user->id);



        }

        session()->flash('message', 'User created, awaiting approval');
        session()->flash('alert-class', 'alert-success');
        session()->flash('success', 'User created successfully.');

        $this->name = '';
        $this->email = '';
        $this->phone_number = '';
        $this->department = '';

        //sleep(3);
        $this->closeModal();
        $this->render();



    }





    public function delete(): void
    {
        $user = User::where('id',$this->userSelected)->first();
        $action = '';
        if ($user) {

            if($this->permission == 'BLOCKED'){
                $action = 'blockUser';
            }
            if($this->permission == 'ACTIVE'){
                $action = 'activateUser';
            }
            if($this->permission == 'DELETED'){
                $action = 'deleteUser';
            }

            $update_value = approvalModel::Create(
                [
                    'institution' => '',
                    'process_name' => $action,
                    'process_description' => $this->permission.' user - '.$user->name,
                    'approval_process_description' => '',
                    'process_code' => '29',
                    'process_id' => $this->userSelected,
                    'process_status' => $this->permission,
                    'approval_status' => 'PENDING',
                    'user_id'  => Auth::user()->id,
                    'team_id'  => '',
                    'edit_package'=> null
                ]
            );


            // Delete the record
            //$node->delete();
            // Add your logic here for successful deletion
            Session::flash('message', 'Awaiting approval');
            Session::flash('alert-class', 'alert-success');

            $this->closeModal();
            $this->render();


        } else {
            // Handle case where record was not found
            // Add your logic here
            Session::flash('message', 'Node error');
            Session::flash('alert-class', 'alert-warning');
        }

    }



    public function confirmPassword(): void
    {
        // Check if password matches for logged-in user
        if (Hash::check($this->password, auth()->user()->password)) {
            //dd('password matches');
            $this->delete();
        } else {
            //dd('password does not match');
            Session::flash('message', 'This password does not match our records');
            Session::flash('alert-class', 'alert-warning');
        }
        $this->resetPassword();


    }



    public function render()
    {
        return view('livewire.main.setting.users');
    }
}
