<div>
    <div class="h-8"></div>



    @if($this->CurrentTabID == 1 )
        <div class="bg-gray-100 rounded rounded-lg shadow-sm p-1 m-2">
            <livewire:main.qr.list-qrs/>
        </div>
    @endif
    @if($this->CurrentTabID == 2 )
        <livewire:main.qr.regerate/>
    @endif

    @if($this->CurrentTabID == 3 )
        <livewire:main.gr.view/>
    @endif


    <x-jet-dialog-modal wire:model="isModalOpen">
        <x-slot name="title">

        </x-slot>

        <x-slot name="content">

            <div class="container mx-auto p-8 bg-white shadow-lg rounded-lg
                        relative" style="width: 794px; height: 922px; max-width: 100%; background-image: url('{{ asset('images/finx.png') }}'); background-size: cover; background-position: center;">

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







