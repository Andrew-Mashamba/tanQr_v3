<?php

namespace App\Http\Livewire\Main;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Transactions extends Component
{


    public $CurrentTabID;
    public $isModalOpen = false;
    public $merchant_name;
    public $qrCode;
    public $merchant_id;

    public $startDate;
    public $endDate;

    protected $listeners = [
        'CurrentTabbIDSet' => 'IDSet',
        'viewQr' => 'viewQr',
        'downloadQr' => 'generateMerchantImagex'
    ];

    public function boot()
    {
        $this->startDate = date('Y-m-d');
        $this->endDate = date('Y-m-d');
        Session::put('startDate', $this->startDate);
        Session::put('endDate', $this->endDate);

        $this->CurrentTabID = 1;

    }

    public function updatedStartDate()
    {
        Session::put('startDate', $this->startDate);
        $this->emit('dateUpdated');
    }
    public function updatedEndDate()
    {
        Session::put('endDate', $this->endDate);
        $this->emit('dateUpdated');
    }


    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function IDSet()
    {
        $this->CurrentTabID = Session::get('CurrentTabbID');
    }

    public function viewQr($id)
    {

        $merchant = Merchant::where('id', $id)->first();
        $this->merchant_name = $merchant->business_name;
        $this->qrCode = $merchant->qr_string;
        $this->merchant_id = $merchant->merchant_id;

        $this->openModal();
    }


    public function generateMerchantImagex($id)
    {
        //dd($id);
        // Output path for the generated PDF
        $outputPath = public_path('pdf/generatedFile.pdf');

        $merchant = Merchant::where('id', $id)->first();
        $merchant_name = $merchant->business_name;
        $qrCode = $merchant->qr_string;
        $merchant_id = $merchant->merchant_id;

        $pdf = PDF::loadView('templates.merchant', [
            'merchant_name' => $merchant_name,
            'qrCode' => $qrCode,
            'merchant_id' => $merchant_id
        ])->setPaper('letter', 'portrait')
            ->setWarnings(false);

// Save the generated PDF
        $pdf->save($outputPath);
        // Return a response or redirect as needed
        return response()->download($outputPath, 'generatedFile.pdf');
    }





    public function render()
    {
        return view('livewire.main.transactions');
    }
}
