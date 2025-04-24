<?php

namespace App\Http\Livewire\Main\Merchants;


use Livewire\Component;
use App\Models\Merchant;
use App\Models\Search;

class Edit extends Component
{
    public $merchants;
    public $term;
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


    public function updatedTerm($value)
    {

        $this->search();
    }

    public function search()
    {
        $results = Merchant::search($this->term);
        $this->merchants = $results->get();

    }

    public function merchantToEdit($merchant)
    {

        //$this->alias = $merchant['alias'];
        $this->merchant_id = $merchant['id'];
        $this->UDS_account = $merchant['UDS_account'];
        $this->TZS_account = $merchant['TZS_account'];
        $this->merchant_category_code = $merchant['merchant_category_code'];
        //$this->additional_merchant_information = $merchant['additional_merchant_information'];
        //$this->merchant_language_template = $merchant['merchant_language_template'];
        $this->merchant_name = $merchant['merchant_name'];
        $this->merchant_city = $merchant['merchant_city'];
        //$this->postal_code = $merchant['postal_code'];
        //$this->country_code = $merchant['country_code'];

        //$this->qr_string = $merchant['qr_string'];
        $this->iso_id = $merchant['iso_id'];
        $this->business_name = $merchant['business_name'];
        //$this->qrCode = $merchant['qrCode'];
        //$this->domain_name = $merchant['domain_name'];
        //$this->acquirer_id = $merchant['acquirer_id'];
        //$this->country_currency = $merchant['country_currency'];
        
        $this->merchants = null;
    }

    public function updateMerchant()
    {
        //dd($this->merchant_id);

        $merchant = Merchant::where('id',$this->merchant_id)->first();


        $merchant ->UDS_account = $this->UDS_account;
        $merchant ->TZS_account = $this->TZS_account;
        $merchant ->merchant_category_code = $this->merchant_category_code;
        $merchant ->merchant_name = $this->merchant_name;
        $merchant ->merchant_city = $this->merchant_city;

        //$merchant ->qr_string = $validatedData['qr_string'];
        $merchant ->iso_id = $this->iso_id;
        $merchant ->business_name = $this->business_name;


        $merchant->save();

        $this->emit('alertAdded', 'Merchant has been updated successfully.');
        $this->reset([

            'merchant_id',
            'UDS_account',
            'TZS_account',
            'merchant_category_code',


            'merchant_name',
            'merchant_city',


            'iso_id',
            'business_name'

        ]);
    }


    public function render()
    {
        return view('livewire.main.merchants.edit');
    }
}
