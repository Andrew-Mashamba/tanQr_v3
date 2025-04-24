<?php

namespace App\Http\Livewire\Main\Setting;

use App\Models\approvalModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PasswordPolicy extends Component
{

    public $length;
    public $requireUppercase;
    public $requireNumeric;
    public $requireSpecialCharacter;
    public $limiter;
    public $passwordExpire;
    public $passwordExpire1;



    public function boot(): void
    {
        $passwordPolicy=DB::table('password_policies')->where('id',1)->first();
        $this->length=$passwordPolicy->length;
        $this->requireNumeric=$passwordPolicy->requireNumeric;
        $this->requireUppercase=$passwordPolicy->requireUppercase;
        $this->requireSpecialCharacter=$passwordPolicy->requireSpecialCharacter;
        $this->limiter=$passwordPolicy->limiter;
        $this->passwordExpire=$passwordPolicy->passwordExpire ? True : false;
        $this->passwordExpire1=$passwordPolicy->passwordExpire;



    }


    public function save(){
        if($this->passwordExpire){
            $this->validate(['passwordExpire1'=>'required|numeric|min:1']);

        }
        // send to approval first
        $requestedChanges=[
            'length'=>$this->length,
            'requireUppercase'=>$this->requireUppercase,
            'requireNumeric'=>$this->requireNumeric,
            'requireSpecialCharacter'=>$this->requireSpecialCharacter,
            'limiter'=>$this->limiter,
            'passwordExpire'=> $this->passwordExpire ? $this->passwordExpire1 :null,
        ];
        $requestedChanges=json_encode($requestedChanges);

        approvalModel::Create(
            [
                'institution' => '',
                'process_name' => 'passwordPolicy',
                'process_description' => Auth::user()->name.' has  requested  to  change password policy ',
                'approval_process_description' => $requestedChanges,
                'process_code' => '30',
                'process_id' => 1,
                'process_status' => 'PENDING',
                'approval_status' => 'PENDING',
                'user_id'  => Auth::user()->id,
                'team_id'  => ''
            ]
        );

        session()->flash('message','Awaiting Approval');
    }

    public function render()
    {
        return view('livewire.main.setting.password-policy');
    }
}
