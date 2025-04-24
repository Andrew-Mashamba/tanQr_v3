<?php

namespace App\Http\Livewire\Main\Qr;

use Livewire\Component;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use App\Models\Merchant;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ListQrs extends LivewireDatatable
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

            Column::name('status')
                ->label('STATUS'),

            Column::callback(['id'], function ($id) {
                return view('livewire.main.qr.table-action', ['id' => $id, 'move' => false]);
            })->unsortable()->label('Action'),

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

    public function download($id)
    {
        $this->emit('downloadQr', $id);
    }



    public function calculatedValues($id){
        $this->alias = '000000';
        $this->acquirer_id = '000000';
        $lastId = Merchant::orderBy('id', 'desc')->first()->id;
        $this->merchant_id = str_pad($lastId, 8, '0', STR_PAD_LEFT);
        //$this->merchant_id = str_pad($lastId, 6, '0', STR_PAD_LEFT);
        $this->country_code = 'TZ';
        $this->country_currency = '834';
        $this->domain_name = 'tz.go.bot.tips';
        $this->acquirer_id = '00000';

        $this->generateQRCode($id);
    }

    public function generateQRCode($id) {



        $FormatIndicator = '000201';
        $QRStaticCode = '010211';
        $DomainName_AcquirerID_MerchantID = '2639'.'0014'.str_pad(substr($this->domain_name, 0, 14), 14).'0105'.str_pad(substr($this->acquirer_id, 0, 5), 5).'0208'.$this->merchant_id;
        $mcc = '5204'.$this->merchant_category_code;
        $currency = '5303'.$this->country_currency;
        $countryCode = '5802'.$this->country_code;
        $merchantName = '5914'.str_pad(substr(strtoupper($this->merchant_name), 0, 14), 14);
        $city = '6006'.str_pad(substr($this->merchant_city, 0, 6), 6);
        $postcode = '610500000';
        //Skip
        $storeLabel = '00000000';
        //Skip
        $terminalLabel = '00000';
        $storeLabel_terminalLabel = '6221'.'0308'.str_pad(substr($storeLabel, 0, 8), 8).'0705'.str_pad(substr($terminalLabel, 0, 5), 5);
        $qrSrting = $FormatIndicator.$QRStaticCode.$DomainName_AcquirerID_MerchantID.$mcc.$currency.$countryCode.$merchantName.$city.$postcode.$storeLabel_terminalLabel;
        $cyclicRedundancy = '6304'.$this->getCyclicRedundancyCheckValue($qrSrting);
        $qrSrting = $qrSrting.$cyclicRedundancy;

        //dd($qrSrting);

        $image = QrCode::format('png')
            ->size(500)
            ->errorCorrection('H')
            ->generate($qrSrting);

        $this->qrCode = base64_encode($image);

        Merchant::updateOrCreate(
            ['id' => $id],
            [
                'qr_string' => $this->qrCode
            ]
        );

    }




    public function getCyclicRedundancyCheckValue($qrString): string
    {
        $checksum = 0;

        for ($i = 0; $i < strlen($qrString); $i++) {
            $checksum ^= ord($qrString[$i]);
        }

        $checksum = dechex($checksum);
        return str_pad($checksum, 4, '0', STR_PAD_LEFT);
    }



}
