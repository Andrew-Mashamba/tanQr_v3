<?php

namespace App\Http\Livewire\Main\Transactions;

use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

use App\Models\Transaction;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ListTransactions extends LivewireDatatable
{

    public $alias;
    public $merchant_id;
    public $UDS_account;
    public $TZS_account;
    public $merchant_category_code;
    public $additional_merchant_information;
    public $merchant_language_template;
    public $merchant_name;
    public $merchant_city;
    public $postal_code;
    public $country_code;

    public $qr_string;
    public $iso_id;
    public $business_name;
    public $qrCode;
    public $domain_name = '4tz.go.bot.tips';
    public $acquirer_id = '00000';
    public $country_currency;
    public $status;
    public $merchant;


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

        return $query->orderBy('id', 'DESC');


    }
    /**
     * Write code on Method
     *
     * @return array()
     */
    public function columns(): array
    {
        return [
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


    public function reject($id)
    {
        //Merchant::where('id', $id)->update(['qr_status' => 'blocked']);
        $merchant = Merchant::where('id', $id)->first();

        if ($merchant) {
            //dd($merchant->qr_status );
            $newStatus = 'active';
            if($merchant->qr_status == 'blocked'){
                $newStatus = 'active';
            }else if($merchant->qr_status == 'active'){
                $newStatus = 'blocked';
            }

            Merchant::where('id', $id)->update(['qr_status' => $newStatus]);
        }

    }
    public function regenerate($id)
    {
        $this->calculatedValues($id);
        session()->flash('message', 'Merchant Moved Successfully.');
    }
    public function view($id)
    {
        $this->emit('viewQr', $id);
    }
}
