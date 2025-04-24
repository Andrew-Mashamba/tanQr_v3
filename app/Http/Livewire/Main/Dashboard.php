<?php

namespace App\Http\Livewire\Main;

use Livewire\Component;
use App\Charts\transactions;
use App\Models\Transaction;

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
