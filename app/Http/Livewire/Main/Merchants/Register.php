<?php

namespace App\Http\Livewire\Main\Merchants;

use App\Models\MccCategory;
use PDF;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use App\Models\Merchant;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot; // reference browsersho


class Register extends Component
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

    public $selectedCategory = null;
    public $selectedSubcategory = null;
    public $subcategories;

    // Define a public property to hold categories
    public $categories = [];

    public function mount(): void
    {
        // Fetch all unique category groups from the database when the component is initialized
        $this->categories = MccCategory::pluck('category_group')->unique()->toArray();
    }


    public function updatedSelectedCategory($category)
    {
        // Fetch subcategories and ensure they are in an array of objects format
        $this->subcategories = MccCategory::where('category_group', $category)
            ->get(['mcc_code', 'category_subgroup']); // Get full collection

        //$this->selectedSubcategory = null; // Reset subcategory when category changes
    }

    public function getCategoriesProperty()
    {
        // Fetch all unique category groups from the database
        return MccCategory::pluck('category_group')->unique()->toArray();
    }


    public function registerMerchant(){

        $validatedData = $this->validate([
        'iso_id' => 'required',
        'UDS_account' => 'required',
        'TZS_account' => 'required',
        'selectedSubcategory' => 'required',
        'merchant_name' => 'required',
        'merchant_city' => 'required',
        'business_name' => 'required',
        ]);

        $this->calculatedValues();

        $Merchant = new Merchant();
        $Merchant->iso_id = $validatedData['iso_id'];
        $Merchant->alias = $this->alias;
        $Merchant->acquirer_id = $this->acquirer_id;
        $Merchant->merchant_id = $this->merchant_id;

        $Merchant->UDS_account = $validatedData['UDS_account'];
        $Merchant->TZS_account = $validatedData['TZS_account'];
        $Merchant->merchant_category_code = $validatedData['selectedSubcategory'];
        $Merchant->merchant_name = strtoupper($validatedData['merchant_name']);

        $Merchant->merchant_city = strtoupper($validatedData['merchant_city']);
        $Merchant->country_code = $this->country_code;
        $Merchant->qr_string = $this->qrCode;
        $Merchant->business_name = strtoupper($validatedData['business_name']);

        $Merchant->status = 'Active';
        $Merchant->save();

        $this->emit('alertAdded', 'Merchant has been saved successfully.');


        $this->iso_id = null;
        $this->alias = null;
        $this->acquirer_id = null;
        $this->merchant_id = null;

        $this->UDS_account = null;
        $this->TZS_account = null;
        $this->selectedSubcategory = null;
        $this->merchant_name = null;

        $this->merchant_city = null;
        $this->country_code = null;
        $this->qr_string = null;
        $this->business_name = null;
        $this->qrCode = null;

        $this->status = null;



    }



    public function calculatedValues(){
        $this->alias = '000000';
        $this->acquirer_id = '104203';
        $mrch = Merchant::orderBy('id', 'desc')->first();
        if($mrch) {
            $lastId = $mrch->id + 1;
        } else {
            $lastId = 1;
        }

        $this->merchant_id = '104'.str_pad($lastId, 5, '0', STR_PAD_LEFT);
        //$this->merchant_id = str_pad($lastId, 6, '0', STR_PAD_LEFT);
        $this->country_code = 'TZ';
        $this->country_currency = '834';
        $this->domain_name = 'tz.go.bot.tips';
        $this->acquirer_id = '00000';

        $this->generateQRCode();
    }

    public function generateQRCode() {



        $FormatIndicator = '000201';
        $QRStaticCode = '010211';
        $DomainName_AcquirerID_MerchantID = '2639'.'0014'.str_pad(substr($this->domain_name, 0, 14), 14).'0105'.str_pad(substr($this->acquirer_id, 0, 5), 5).'0208'.$this->merchant_id;
        $mcc = '5204'.$this->selectedSubcategory;
        $currency = '5303'.$this->country_currency;
        $countryCode = '5802'.$this->country_code;
        $merchantName = '5914'.str_pad(substr(strtoupper($this->business_name), 0, 14), 14);
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

        //$this->generateMerchantImage($this->business_name, $this->merchant_id, $image);

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

    public function generateMerchantImage($imageFromJS)
    {
       $merchantId = $this->merchant_id;

        $img = $imageFromJS;
        $folderPath = "qrimages/"; //path location

        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $uniqid = $merchantId;
        $file = $folderPath . $uniqid . '.'.$image_type;
        file_put_contents($file, $image_base64);



    }



    public function generateMerchantImagex()
    {
        // Output path for the generated PDF
        $outputPath = public_path('pdf/generated.pdf');

        $merchant_name = strtoupper($this->business_name);
        $qrCode = $this->qrCode;
        $merchant_id = $this->merchant_id;

        $pdf = PDF::loadView('templates.merchant', [
            'merchant_name' => $merchant_name,
            'qrCode' => $qrCode,
            'merchant_id' => $merchant_id
        ])->setPaper('letter', 'portrait')
            ->setWarnings(false);

        // Save the generated PDF
        $pdf->save($outputPath);

        // Return a response or redirect as needed
        return response()->download($outputPath, 'generated.pdf');
    }


    public function render()
    {

        return view('livewire.main.merchants.register');
    }
}
