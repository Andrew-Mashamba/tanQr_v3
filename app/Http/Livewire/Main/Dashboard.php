<?php

namespace App\Http\Livewire\Main;

use Livewire\Component;
use App\Charts\transactions;
use App\Models\Transaction;
use Illuminate\Support\Facades\Http;

class Dashboard extends Component
{

    public $start_date_input = ''; // Initialize these variables based on your requirements
    public $end_date_input = '';
    public $reconciledTransactions = 40; // Initialize with appropriate data
    public $nonMatchingTransactions = 80;
    public $resolvedTransactions = 10;
    public $channels = []; // Initialize with the list of channels
    public $start_date = '';
    public $end_date = '';
    public $arrayOfDates = [];
    public $totalNodes = 0; // Initialize with the total number of nodes
    public $recon_date = ''; // Initialize with the last session date
    public $transactionSumsString = ''; // Initialize with the transaction sums data
    public $transactionCountsString = ''; // Initialize with the transaction counts data
    public $chart;
    public $labels = [];
    public $dataset = [];
    public $succesifulTransactions;
    public $failedTransactions;

    public $suspectTransactions;

    public function boot(){
        //$this->testApi();
    }


    public function testApi()
    {
        $testTransaction = [
            'merchant_id' => 'MERCHANT123',
            'source_institution_name' => 'Test Bank Ltd',
            'source_institution_rrn' => 'SRC789456',
            'tips_rrn' => 'TIPS987654',
            'client_name' => 'Alice Smith',
            'client_phone_number' => '255712345678',
            'description' => 'Payment for services',
            'amount' => 45000,
            'status' => 'SUCCESSFUL',
            'recon_status' => 'RECONCILED',
            'currency' => 'TZS'
        ];

        $response = $this->processTransaction($testTransaction);
        print_r($response);
    }











    function processTransaction(array $incomingTransaction)
    {
        // Mock Merchant data
        $mockMerchants = [
            'MERCHANT123' => [
                'merchant_id' => 'MERCHANT123',
                'merchant_name' => 'John Doe Store',
                'business_name' => 'Doe Enterprises',
                'TZS_account' => 'TZ1234567890',
                'merchant_city' => 'Dar es Salaam',
                'id' => 101,
                'iso_id' => 202
            ]
        ];

        // Mock ISO data
        $mockIsos = [
            202 => [
                'id' => 202,
                'name' => 'Best ISO Ltd'
            ]
        ];

        $merchantId = $incomingTransaction['merchant_id'];
        $merchantData = $mockMerchants[$merchantId] ?? null;

        if ($merchantData) {
            $isoDetails = $mockIsos[$merchantData['iso_id']] ?? null;

            if (!$isoDetails) {
                return ['error' => 'ISO not found'];
            }

            // Prepare the transaction data with all required fields
            $transactionData = [
                'rrn' => $this->generateSecureReferenceNumber(),
                'iso_name' => $isoDetails['name'],
                'merchant_name' => $merchantData['merchant_name'],
                'business_name' => $merchantData['business_name'],
                'merchant_account' => $merchantData['TZS_account'],
                'merchant_id' => $merchantData['merchant_id'],
                'merchant_location' => $merchantData['merchant_city'],
                'source_institution_name' => $incomingTransaction['source_institution_name'] ?? 'Unknown Source',
                'source_institution_rrn' => $incomingTransaction['source_institution_rrn'] ?? 'SRC123456',
                'tips_rrn' => $incomingTransaction['tips_rrn'] ?? 'TIPS123456',
                'client_name' => $incomingTransaction['client_name'] ?? 'John Client',
                'client_phone_number' => $incomingTransaction['client_phone_number'] ?? '255700000000',
                'description' => $incomingTransaction['description'] ?? 'No description',
                'amount' => $incomingTransaction['amount'] ?? 0,
                'status' => $incomingTransaction['status'] ?? 'PENDING',
                'recon_status' => $incomingTransaction['recon_status'] ?? 'UNRECONCILED',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'iso_id' => $isoDetails['id'],
                'currency' => $incomingTransaction['currency'] ?? 'TZS',
            ];

            Transaction::create($transactionData);
            // Simulate saving to database
            echo "Transaction Saved:\n";
            print_r($transactionData);

            return ['message' => 'Transaction saved successfully'];
        }

        return ['error' => 'Merchant not found'];
    }

    // Helper to simulate secure RRN generation
    function generateSecureReferenceNumber()
    {
        return strtoupper(bin2hex(random_bytes(8)));
    }






















    public function dateRange($start, $end)
    {
        // Handle the date range change logic here
        // Update relevant properties, make API calls, etc.

        $this->start_date_input = $start;
        $this->end_date_input = $end;
    }

    private function getLabels()
    {
        $labels = [];
        for ($i = 0; $i < 12; $i++) {
            $labels[] = now()->subMonths($i)->format('M');
        }
        return $labels;
    }
    private function getRandomData()
    {
        $data = [];
        for ($i = 0; $i < count($this->getLabels()); $i++) {
            $data[] = rand(10, 100);
        }
        return $data;
    }

    public function render()
    {
        $this->arrayOfDates = $this->generateDateArray('2023-10-01', '2023-10-30');
        $chart = new transactions;
        $chart->labels(['One', 'Two', 'Three', 'Four']);
        $chart->dataset('My dataset', 'line', [1, 2, 3, 4]);
        $chart->dataset('My dataset 2', 'line', [4, 3, 2, 1]);

        $this->labels[] = $this->getLabels();

        $this->dataset = [
            [
                'label' => 'Logged In',
                'backgroundColor' => 'rgba(15,64,97,255)',
                'borderColor' => 'rgba(15,64,97,255)',
                'data' => $this->getRandomData(),
            ],
            [
                'label' => 'Logged In',
                'backgroundColor' => 'rgba(15,64,97,255)',
                'borderColor' => 'rgba(15,64,97,255)',
                'data' => $this->getRandomData(),
            ],
            [
                'label' => 'Logged In',
                'backgroundColor' => 'rgba(15,64,97,255)',
                'borderColor' => 'rgba(15,64,97,255)',
                'data' => $this->getRandomData(),
            ],
        ];

        $this->succesifulTransactions =  \App\Models\Transaction::where('status', 'Successful')->count();
        $this->failedTransactions =  \App\Models\Transaction::where('status', 'Failed')->count();
        $this->suspectTransactions =  \App\Models\Transaction::where('status', 'Suspect')->count();


        return view('livewire.main.dashboard', ['chart' => $chart]);
    }

    private function generateDateArray($end): array
    {
        $dates = [];
        $current_date = '2023-10-01';

        while (strtotime($current_date) <= strtotime($end)) {
            $dates[] = $current_date;
            $current_date = date('Y-m-d', strtotime($current_date . ' + 1 day'));
        }

        return $dates;
    }

}
