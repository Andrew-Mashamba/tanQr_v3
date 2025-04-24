<div class="bg-gray-100">


    <div class="p-4">

        <div class="flex w-full ">


            <!-- First section with a single card and 70% width -->
            <div class="w-full p-2">
                <div class="bg-white shadow rounded-lg shadow-gray-200" style="height: 290px">
                    <!-- Content for the card in the first section -->
                    <div class="flex items-end">
                        <div class="p-4 lg:w-7/12">
                            <h5 class="text-xl font-semibold text-lighter-shade">Welcome {{Auth::user()->name}}!</h5>
                            <p class="mb-4">Here is the current status: </p>
                            <p class="mb-4"><span class="font-bold">{{$this->succesifulTransactions}}%</span> Successful Transaction.</p>
                            <p class="mb-4"><span class="font-bold">{{$this->failedTransactions}}%</span> Failed Transactions.</p>
                            <p class="mb-4"><span class="font-bold">{{$this->suspectTransactions }}%</span> Suspect Transactions.</p>


                        </div>
                        <div class="text-center lg:w-5/12 lg:text-left">



                            <div class=" flex w-4/5">
                                <div class="w-full flex">
                                    <div class="w-1/4"></div>
                                    <div class="w-3/4">
                                        <canvas id="myChart"></canvas>
                                    </div>


                                </div>
                                <!-- Add "text-center" class to center the content -->

                            </div>

                        </div>
                    </div>


                </div>
            </div>


        </div>


        <div class="flex w-full mx-auto ">


            <div class="flex w-3/4 p-2">
                <div class="flex w-full bg-white shadow rounded-lg">
                    <canvas id="bar-chart-grouped" width="200" height="65"></canvas>
                </div>
            </div>


            <!-- Second section with four cards in a grid formation and 30% width -->
            <div class="w-1/4 p-2 h-full ">

                <div class="p-4 bg-white rounded-lg shadow h-1/2" >
                    <!-- Content for card 1 in the second section -->
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-lg font-semibold">Active Merchants</h5>
                        <div class="relative inline-block text-left">
                            <button type="button" class="focus:outline-none" id="transactionID">
                                <i class="text-gray-500 bx bx-dots-vertical-rounded"></i>
                            </button>

                        </div>
                    </div>
                    <ul class="p-0 m-0">
                        <li class="flex pb-1 mb-4">
                            <div class="flex-shrink-0 me-3">
                                <svg class="w-6 h-6 shrink-0" viewBox="0 0 24 24">
                                    <circle class="fill-current text-extra-light-shade" cx="18.5" cy="5.5" r="4.5"/>
                                    <circle class="fill-current text-extra-light-shade" cx="5.5" cy="5.5" r="4.5"/>
                                    <circle class="fill-current text-extra-light-shade" cx="18.5" cy="18.5" r="4.5"/>
                                    <circle class="text-red   fill-current text-extra-light-shade" cx="5.5" cy="18.5" r="4.5"/>
                                </svg>
                            </div>
                            <div class="flex-wrap items-center justify-between flex-1 gap-2">
                                <div class="me-2 ml-2">
                                    <h5 class="block mb-1 text-gray-500">Activity Measure</h5>
                                    <h6 class="block mb-1 text-gray-500">Merchants who transacted within 30 days..</h6>
                                </div>
                                <div class="flex items-center gap-1 ml-2">
                                    <h6 class="mb-0 font-semibold">Count - </h6>
                                    <span class="font-semibold text-gray-500">{{\Illuminate\Support\Facades\DB::table('merchants')->count()}}</span>
                                </div>
                            </div>
                        </li>
                        <!-- Rest of the list items -->
                    </ul>
                </div>

                <div class="p-4 mt-4 bg-white rounded-lg shadow h-1/2" >
                    <!-- Content for card 1 in the second section -->
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-lg font-semibold">Reconciliation Summary</h5>
                        <div class="relative inline-block text-left">
                            <button type="button" class="focus:outline-none" id="transactionID">
                                <i class="text-gray-500 bx bx-dots-vertical-rounded"></i>
                            </button>

                        </div>
                    </div>
                    <ul class="p-0 m-0">
                        <li class="flex pb-1 mb-4">
                            <div class="flex-shrink-0 me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                    <path class="fill-current text-extra-light-shade" stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div class="flex-wrap items-center justify-between flex-1 gap-2">
                                <div class="me-2 flex gap-2 ml-2">
                                    <h5 class="block mb-1 text-gray-500">Last session date</h5>
                                    <h6 class="mb-0">{{ date("Y-m-d") }}</h6>
                                </div>
                                <div class="me-2 flex gap-2 ml-2">
                                    <h5 class="block mb-1 text-gray-500">Matching transactions - </h5>
                                    <h6 class="mb-0">0</h6>
                                </div>
                                <div class="me-2 flex gap-2 ml-2">
                                    <h5 class="block mb-1 text-gray-500">Non-Matching Transactions - </h5>
                                    <h6 class="mb-0">{{ \Illuminate\Support\Facades\DB::table('transactions')->count() }}</h6>
                                </div>


                            </div>
                        </li>
                        <!-- Rest of the list items -->
                    </ul>
                </div>

            </div>

        </div>


    </div>

    <div>

    </div>

    @once
        @push('scripts')

            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        @endpush
    @endonce



    @push('scripts')
        <script>
            const originalDoughnutDraw = Chart.controllers.doughnut.prototype.draw;

            Chart.helpers.extend(Chart.controllers.doughnut.prototype, {
                draw: function() {
                    const chart = this.chart;
                    const {
                        width,
                        height,
                        ctx,
                        config
                    } = chart.chart;

                    const {
                        datasets
                    } = config.data;

                    const dataset = datasets[0];
                    const datasetData = dataset.data;
                    const completed = datasetData[0];
                    const text = ``;
                    let x, y, mid;

                    originalDoughnutDraw.apply(this, arguments);

                    const fontSize = (height / 350).toFixed(2);
                    ctx.font = fontSize + "em Lato, sans-serif";
                    ctx.textBaseline = "top";


                    x = Math.round((width - ctx.measureText(text).width) / 2);
                    y = (height / 1.8) - fontSize;
                    ctx.fillStyle = "#000000"
                    ctx.fillText(text, x, y);
                    mid = x + ctx.measureText(text).width / 2;
                }
            });


            var context = document.getElementById('myChart').getContext('2d');
            var percent_value = 3;
            var chart = new Chart(context, {
                type: 'doughnut',
                data: {
                    labels: ['Successful', 'Failed', 'Suspect'],
                    datasets: [{
                        label: 'First dataset',
                        data: [{{$this->succesifulTransactions}}, {{$this->failedTransactions}}, {{$this->suspectTransactions}}],
                        backgroundColor: ['#FCD317', '#191E21', '#ededed']
                    }]
                },
                options: {}
            });




            new Chart(document.getElementById("bar-chart-grouped"), {
                type: 'bar',
                    data : {
                        labels: ["1st", "2nd", "3rd", "4th", "5th", "6th", "7th", "8th", "9th", "10th", "11th", "12th", "13th", "14th", "15th", "16th", "17th", "18th", "19th", "20th", "21st", "22nd", "23rd", "24th", "25th", "26th", "27th", "28th", "29th", "30th"],
                        datasets: [
                            {
                                label: "Successful Transactions",
                                backgroundColor: "#FCD317",
                                data: [150, 200, 250, 300, 350, 400, 450, 500, 450, 600, 650, 100, 750, 800, 850, 500, 950, 1000, 100, 110, 150, 1200, 1250, 1300, 130, 1400, 150, 1500, 1550, 1600]
                            },
                            {
                                label: "Failed Transactions",
                                backgroundColor: "#191E21",
                                data: [900, 600, 700, 400, 90, 600, 110, 1200, 130, 100, 700, 100, 100, 180, 1900, 200, 200, 220, 2300, 2100, 940, 600, 700, 200, 290, 1000, 100, 200, 300, 400]
                            }
                        ]
                    },
                options: {
                    title: {
                        display: true,
                        text: 'Daily Transactions'
                    }
                }
            });

        </script>
    @endpush


</div>



