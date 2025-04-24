<?php

namespace App\Http\Livewire\Main\Setting;

use App\Models\User;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class UserTable extends LivewireDatatable
{
    public $exportable=true;


    public function builder()
    {
        return User::query();

    }

    public function columns(): array
    {
        return [

            Column::name('name')
                ->label('NAME')->searchable()->sortable(),

            Column::name('email')
                ->label('CITY')->searchable(),

            Column::name('id')
                ->label('id')->searchable()->sortable()
        ];
    }


}
