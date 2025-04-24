<?php

namespace App\Http\Livewire\Main\Reports;

use Livewire\Component;
use Mediconesystems\LivewireDatatables\Column;
use App\Models\Merchant;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class MerchantsReport extends LivewireDatatable
{

    public $exportable = true;
    public $searchable="
        alias,
        domain_name,
        acquirer_id,
        merchant_id,
        UDS_account,
        TZS_account,
        merchant_category_code,
        additional_merchant_information,
        merchant_language_template,
        merchant_name,
        merchant_city,
        postal_code,
        country_code
        ";

    public function builder()
    {
        return Merchant::query();

    }
    /**
     * Write code on Method
     *
     * @return array()
     */
    public function columns(): array
    {
        return [

            Column::name('merchant_name')
                ->label('NAME'),

            Column::name('merchant_city')
                ->label('CITY'),

            Column::name('merchant_id')
                ->label('CODE'),

            Column::name('TZS_account')
                ->label('ACCOUNT NO'),

            Column::name('merchant_category_code')
                ->label('MCC'),

            Column::name('alias')
                ->label('ALIAS ID'),

            Column::name('status')
                ->label('STATUS')

        ];
    }

}
