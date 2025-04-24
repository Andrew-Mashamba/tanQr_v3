<?php

namespace App\Http\Livewire\Main\Reports;

use Livewire\Component;
use App\Models\Isos;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class IsoReport extends LivewireDatatable
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
