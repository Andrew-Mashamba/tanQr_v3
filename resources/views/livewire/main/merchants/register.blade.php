<div class="p-4 bg-white">

    <div class="flex justify-between">
        <p class="ml-2 text-lg text-black font-semibold">Register a new Merchant</p>

        <div class="mb-2 flex"  align="right ">
            <div wire:loading.remove wire:target="registerMerchant">
                <button wire:click='registerMerchant' class="mr-2 inline-block px-6 py-2 border-2 border-gray-800 text-gray-800 font-medium text-xs
        leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out" >
                    SAVE
                </button>
            </div>

            <div wire:loading wire:target="registerMerchant">
                <button type="button" class="flex items-center mr-2 inline-block px-6 py-2 border-2 border-gray-800 text-gray-800 font-medium text-xs
        leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out" disabled>

                    <svg xmlns="http://www.w3.org/2000/svg" class="animate-spin  h-6 w-6 mr-3 stroke-white" fill="white" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>

                    Saving...
                </button>
            </div>



            @if($this->merchant_category_code)

            <div wire:loading.remove wire:target="generateMerchantImagex">
                <button wire:click='generateMerchantImagex' class="mr-2 inline-block px-6 py-2 border-2 border-gray-800 text-gray-800 font-medium text-xs
                        leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out" >
                    DOWNLOAD IMAGE
                </button>
            </div>
                <div wire:loading wire:target="generateMerchantImagex" >
                    <div class="ml-4 flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="animate-spin  h-5 w-5 mr-2 " fill="gray" viewBox="0 0 24 24" stroke="gray" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />

                        </svg>

                        <p class="font-semibold text-gray-500">Please wait...</p>
                    </div>


                </div>
            @endif


        </div>
    </div>








    <div class="w-full flex bg-gray-100 rounded-lg p-2 gap-2">


        <div class="w-1/2 rounded-lg bg-white p-4">

            <div class="w-full  mt-4">
                <div class="h-4 " ></div>
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 " for="grid-state">
                    Select ISO
                </label>
                <div class="relative">
                    <select wire:model.bounce="iso_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option>Select</option>
                        @foreach(App\Models\Isos::get() as $iso)
                            <option value="{{$iso->id}}">{{$iso->name}}</option>
                        @endforeach

                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
                @error('iso_id')
                <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                @enderror
            </div>


            <div class="flex flex-wrap ">
                <div class="w-full  mt-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                        Business Name
                    </label>
                    <input wire:model="business_name" class="uppercase appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200
                    rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="Business Name">
                    @error('business_name')
                    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    @enderror
                </div>
                <div class="w-full  mt-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                        Merchant Name
                    </label>
                    <input wire:model="merchant_name" class="uppercase appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4
                    leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="Merchant Name">
                    @error('merchant_name')
                    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    @enderror
                </div>
                <div class="w-full  mt-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                        Merchant City
                    </label>
                    <input wire:model="merchant_city" class="uppercase appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4
                    leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="Merchant City">
                    @error('merchant_city')
                    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    @enderror
                </div>

                <div class="w-full  mt-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                        TZS Account Number
                    </label>
                    <input wire:model="TZS_account" class="uppercase appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4
                    leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="TZS Account Number">
                    @error('TZS_account')
                    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    @enderror
                </div>
                <div class="w-full  mt-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                        USD Account Number
                    </label>
                    <input wire:model="UDS_account" class="uppercase appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight
                     focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="USD Account Number">
                    @error('UDS_account')
                    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    @enderror
                </div>

                <div class="w-full mt-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        Select Merchant Category Code
                    </label>


                    <div class="w-full p-4 bg-gray-50 shadow-sm rounded-lg mt-2">
                        <!-- Category Dropdown -->
                        <div class="mb-4">
                            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                            <select
                                id="category"
                                wire:model="selectedCategory"
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8
                                rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            >
                                <option value="">Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category }}">{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Subcategory Dropdown -->
                        <div class="mb-4">
                            <label for="subcategory" class="block text-sm font-medium text-gray-700">
                                Subcategory
                            </label>
                            <select
                                id="subcategoryc"
                                wire:model="selectedSubcategory"
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8
    rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                {{-- Use empty() instead of isEmpty() --}}
                            >
                                <option value="">Select a subcategory</option>
                                @if (!empty($subcategories))
                                    @foreach($subcategories as $subcategory)
                                        <option value="{{ $subcategory->mcc_code }}">{{ $subcategory->category_subgroup }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <!-- Display Selected Values -->
                        @if($selectedCategory && $selectedSubcategory)
                            <div class="mt-4 p-4 bg-gray-50 rounded-md">
                                <p class="text-sm text-gray-600">
                                    <span class="font-medium">Selected Category:</span> {{ $selectedCategory }}
                                </p>
                                <p class="text-sm text-gray-600">
                                    <span class="font-medium">Selected Subcategory:</span> {{ $selectedSubcategory }}
                                </p>
                            </div>
                        @endif
                    </div>


                    @error('merchant_category_code')
                    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    @enderror
                </div>



            </div>




        </div>

        <div class="w-1/2 rounded-lg bg-white p-4">




            @if($this->selectedSubcategory)
                @php
                    $this->calculatedValues();
                @endphp
            @endif
            @if($this->qrCode)


                        <div class="container mx-auto p-8 bg-white shadow-lg rounded-lg
                        relative" style="width: 794px; height: 922px; max-width: 100%; background-image: url('{{ asset('images/finx.png') }}'); background-size: cover; background-position: center;">

                            <img id="logo" class="rounded-lg absolute top-2 right-2 w-60 mt-4 mr-4" src="{{ asset('images/logoletx.png') }}" alt="Logo Image" />

                            <div id="details" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-xl p-4 md:mx-0" style="height: 480px">

                            <div class="h-4"></div>

                                <div class="flex justify-center mb-2">
                                    <img src="data:image/png;base64, {{ $this->qrCode }}" alt="QR code" style="width: 300px">
                                </div>

                                <div class="flex flex-col space-y-4 py-4 space-y-4">
                                    <span class="font-bold text-2xl text-center text-[#1F3251]">
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


            @endif

        </div>



    </div>


</div>



