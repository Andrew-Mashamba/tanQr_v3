<?php

namespace App\Http\Livewire\Main\Approval;

use App\Models\User;
use App\Models\approvalModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class Approvals extends LivewireDatatable
{

    public function builder(): \Illuminate\Database\Eloquent\Builder
    {
        return approvalModel::query(); // You can modify the ordering as per your requirement
    }

    public function columns(): array
    {
        return [

            Column::name('created_at')
                ->label('Date Created')->defaultSort(),

            Column::name('process_name')
                ->label('Action Name'),

            Column::name('process_description')
                ->label('Details'),

            Column::callback(['user_id'], function ($id) {
                if($id){

                    return User::find($id)->name;

                }else{
                    return '';
                }

            })->unsortable()->label('Initiator'),

            Column::callback(['approver_id'], function ($id) {
                $user = User::find($id);
                if($user){
                    return $user->name;
                } else {
                    return 'Pending';
                }
            })->unsortable()->label('Approver'),



            Column::callback(['process_id'], function ($process_id) {

                $editPackage = \App\Models\approvalModel::where('process_id',$process_id)->value('edit_package');
                $processName = approvalModel::where('process_id',$process_id)->value('process_name');
                if($editPackage){
                    return view('livewire.approvals.changes-list', ['process_id' => $process_id, 'process_name' => $processName, 'edit_package' =>$editPackage]);
                }

                return null;
            })->unsortable()->label('Edit Changes'),


            Column::callback(['approval_status'], function ($status) {

                return view('livewire.main.approval.status', ['status' => $status, 'move' => false]);
            })->label('Approval Status'),


            Column::callback(['id'], function ($id) {
                if(approvalModel::find($id)->approval_status =='PENDING'){
                    $html='<div>
    <div class="flex gap-4">


        <button wire:click="approve('.$id.')" type="button" class="hoverable text-white bg-gray-100 hover:bg-blue-100 hover:text-blue focus:ring-4 focus:outline-none focus:ring-blue-100 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center mr-2 dark:bg-blue-200 dark:hover:bg-blue-200 dark:focus:ring-blue-200">

            <svg xmlns="http://www.w3.org/2000/svg" fill="blue" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>


        </button>

        <button wire:click="reject('.$id.')" type="button" class="hoverable text-white bg-gray-100 hover:bg-red-200 hover:text-red focus:ring-4 focus:outline-none focus:ring-red-100 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-200 dark:focus:ring-red-200">

            <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>


        </button>

    </div>
</div>';
                    return $html;
                }
                return null;
            })->unsortable()->label('Decision'),
        ];
    }





    public function approve($id){

        $approval = approvalModel::find($id);

        /////////////////////////PASSWORD//////////////////

        if($approval->process_name =='passwordPolicy'){
            $this->approvePasswordPolicy($approval->process_id,$id);
        }



    }


    public function reject($id){
        $approval = approvalModel::find($id);
        ////////////////////PASSWORD POLICY///////////////

        if($approval->process_name =='passwordPolicy'){
            $this->rejectPasswordPolicy($approval->process_id,$id);
        }

    }







    ///////////////////////PASSWORD POLICY//////////////////////
    public function approvePasswordPolicy($process_id,$approvalsId){

        $value= \App\Models\approvalModel::where('id',$approvalsId)->value('approval_process_description');
        $values=json_decode($value);

        DB::table('password_policies')->where('id',$process_id)->update([
            'length'=>$values->length,
            'requireUppercase'=>$values->requireUppercase,
            'requireNumeric'=>$values->requireNumeric,
            'requireSpecialCharacter'=>$values->requireSpecialCharacter,
            'limiter'=>$values->limiter,
            'passwordExpire'=>$values->passwordExpire,
        ]);


        approvalModel::where('id', $approvalsId)->update([
            'approver_id' => Auth::user()->id,
            'process_status' => 'APPROVED',
            'approval_status' => 'APPROVED',
            'approval_process_description' => 'Approved  change  of password policy',
        ]);
    }


    ///////////////////////  PASSWORD POLICY///////////
    public function rejectPasswordPolicy($process_id,$approvalsId): void
    {

        \App\Models\approvalModel::where('id', $approvalsId)->update([
            'approver_id' => Auth::user()->id,
            'process_status' => 'REJECTED',
            'approval_status' => 'REJECTED',
            'approval_process_description' => 'Rejected the  change of  password policy',
        ]);

    }



}


