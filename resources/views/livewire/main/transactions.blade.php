<div>
    <div class="h-8"></div>



    @if($this->CurrentTabID == 1 )



        <!-- Left: Avatars -->
        <div class="bg-white rounded-2xl shadow-md shadow-gray-200 w-full p-2 flex  gap-2 items-center " >

            <div class="ml-2">
                <label for="category"
                       class="block mb-2 dark:text-gray-400 space-x-2 text-sm font-semibold spacing-sm text-slate-600">
                    Start Date
                </label>


                <div class="relative ">

                    <input wire:model="startDate" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                    rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600
                    dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                </div>
            </div>


            <div class="">
                <label for="category"
                       class="block mb-2 dark:text-gray-400 space-x-2 text-sm font-semibold spacing-sm text-slate-600">
                    End Date
                </label>


                <div class="relative ">

                    <input  wire:model="endDate" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                </div>
            </div>

        </div>




        <div class="bg-gray-100 rounded rounded-lg shadow-sm p-1 m-2">
            <livewire:main.transactions.list-transactions/>
        </div>
    @endif
    @if($this->CurrentTabID == 2 )
        <livewire:main.transactions.reconciliation/>
    @endif

    @if($this->CurrentTabID == 3 )

    @endif


    <x-jet-dialog-modal wire:model="isModalOpen">
        <x-slot name="title">

        </x-slot>

        <x-slot name="content">

            <div class="container mx-auto p-8 bg-white shadow-lg rounded-lg
                        relative" style="width: 794px; height: 922px; max-width: 100%; background-image: url('{{ asset('images/bgx.png') }}'); background-size: cover; background-position: center;">

                <img id="logo" class="rounded-lg absolute top-2 right-2 w-60 mt-4 mr-4" src="{{ asset('images/logoletx.png') }}" alt="Logo Image" />

                <div id="details" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-xl p-4 md:mx-0">



                    <div class="flex justify-center mb-4">
                        <img src="data:image/png;base64, {{ $this->qrCode }}" alt="QR code" style="width: 300px">
                    </div>


                    <div class="w-full flex flex-col space-y-4 py-4 space-y-4">
                                    <span class="w-full  font-bold text-2xl text-center text-[#1F3251]" style="width: 310px">
                                        @foreach(str_split($this->merchant_id) as $digit)
                                            <span class="inline-block pr-2 pl-2 border border-[#1F3251] rounded">
                                                {{ $digit }}
                                            </span>
                                        @endforeach
                                    </span>

                    </div>

                    <div class="h-4 w-full mb-4 justify-center text-center">
                        <span class="font-bold text-2xl text-center text-[#1F3251] mt-4 mb-4 " style="text-align: center">{{$this->merchant_name}}</span>
                    </div>


                </div>
            </div>
        </x-slot>

        <x-slot name="footer">

        </x-slot>
    </x-jet-dialog-modal>


</div>







