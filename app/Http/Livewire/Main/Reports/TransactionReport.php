<?php

namespace App\Http\Livewire\Main\Reports;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

use App\Models\Transaction;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TransactionReport extends LivewireDatatable
{

    public $exportable = true;

    public $searchable = "
        rrn,
        iso_name,
        iso_id,
        merchant_name,
        business_name,
        merchant_account,
        merchant_id,
        merchant_location,
        merchant_system_id,
        source_institution_name,
        source_institution_id,
        source_institution_rrn,
        tips_rrn,
        client_name,
        client_phone_number,
        description,
        amount,
        status,
        recon_status,
    ";

    protected $listeners = ['dateUpdated', 'refresh'];

    public function dateUpdated()
    {
        // Your method logic here
    }

    public function builder()
    {
        $startDate = Session::get('startDate');
        $endDate = Session::get('endDate');

        //dd($startDate);

// Start building your query
        $query = Transaction::query();

// Add filters based on the session values
        // Add filters based on the session values
        if ($startDate) {
            $query->where('created_at', '>=', $startDate.' 00:00:00');
        }

        if ($endDate) {
            $query->where('created_at', '<=', $endDate.' 23:59:59');
        }

        if(Session::get('isos') != 'All')
        {
            $query->where('iso_id', Session::get('isos'));
        }



        return $query;


    }
    /**
     * Write code on Method
     *
     * @return array()
     */
    public function columns(): array
    {
        return [
            Column::name('created_at')
                ->label('Date'),
            Column::name('rrn')
                ->label('RRN'),

            Column::name('iso_name')
                ->label('ISO Name'),
            Column::name('merchant_name')
                ->label('Merchant Name'),

            Column::name('business_name')
                ->label('Business Name'),

            Column::name('merchant_account')
                ->label('Merchant Account'),

            Column::name('merchant_id')
                ->label('Merchant ID'),

            Column::name('merchant_location')
                ->label('Merchant Location'),
            Column::name('source_institution_name')
                ->label('Source Institution Name'),
            Column::name('source_institution_rrn')
                ->label('Source Institution RRN'),

            Column::name('tips_rrn')
                ->label('TIPS RRN'),

            Column::name('client_name')
                ->label('Client Name'),

            Column::name('client_phone_number')
                ->label('Client Phone Number'),

            Column::name('description')
                ->label('Description'),

            Column::name('amount')
                ->label('Amount'),

            Column::name('status')
                ->label('Status'),

            Column::name('recon_status')
                ->label('Reconciliation Status'),

        ];
    }



}
