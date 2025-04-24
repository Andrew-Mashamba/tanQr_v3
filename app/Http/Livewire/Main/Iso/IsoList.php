<?php

namespace App\Http\Livewire\Main\Iso;

use Livewire\Component;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Illuminate\Support\Facades\Session;
use App\Models\Isos;
class IsoList extends LivewireDatatable
{

    public $exportable = true;
    public $searchable="name, tin, license";

    public function builder()
    {
        return Isos::query();

    }
    /**
     * Write code on Method
     *
     * @return array()
     */
    public function columns(): array
    {
        return [

            Column::name('name')
                ->label('ISO NAME'),

            Column::name('tin')
                ->label('ISO TIN'),

            Column::name('license')
                ->label('ISO LICENSE'),

            Column::name('status')
                ->label('STATUS')

        ];
    }


}
