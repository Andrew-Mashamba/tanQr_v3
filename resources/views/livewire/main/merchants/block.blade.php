<div>



    <div class="flex justify-between">
        <p class="ml-2 text-lg text-black font-semibold">Block/UnBlock ISO {{$this->name}}</p>
        @if($this->name)

            <div class=""  align="right">
                <div wire:loading.remove wire:target="updateISO">
                    <button wire:click='updateISO' class="mr-2 inline-block px-6 py-2 border-2 border-gray-800 text-gray-800 font-medium text-xs
        leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out" >
                        PROCEED
                    </button>
                </div>

                <div wire:loading wire:target="updateISO">
                    <button type="button" class="flex items-center mr-2 inline-block px-6 py-2 border-2 border-gray-800 text-gray-800 font-medium text-xs
        leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out" disabled>

                        <svg xmlns="http://www.w3.org/2000/svg" class="animate-spin  h-6 w-6 mr-3 stroke-white" fill="white" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>

                        Saving...
                    </button>
                </div>


            </div>
        @endif
    </div>


    <div class="bg-white">

        <div class="w-full max-w-lg rounded-lg bg-gray-100 mx-auto p-2">
            <div class="w-full max-w-lg rounded bg-white mx-auto">
                <div class="flex flex-wrap -mx-3 p-6">
                    <div class="w-full md:w-1/2 mb-6 mt-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Search ISO
                        </label>
                        <input wire:model.debounce="term" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3
                    px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="By Name, By TIN, By License">
                        @error('term')
                        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                        @enderror
                      
                        @if($this->isos)
                            <div class="flex justify-center mb-2">
                                <div wire:loading wire:target="term" >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="animate-spin  h-6 w-6 stroke-white-800" fill="white" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />

                                    </svg>
                                </div>
                            </div>
                            <div class="flex justify-center">

                                <ul class="bg-white rounded-lg  w-96 text-gray-900">
                                    @foreach($this->isos as $iso)
                                        <li class="flex justify-between px-6 py-2 border-b border-gray-200 w-full ">
                                            <div>
                                                {{ $iso->business_name }}
                                            </div>


                                            <div class=""  align="right">

                                                <button @if($iso->status == 'Active') wire:click='isoToBlockUnBlock({{$iso}},1)' @else wire:click='isoToBlockUnBlock({{$iso}},2)' @endif  class="mr-2 inline-block px-6 py-2 border-2 border-gray-800 text-gray-800 font-medium text-xs
        leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out" >
                                                    @if($iso->status == 'Active') BLOCK @else UNBLOCK @endif
                                                </button>

                                            </div>


                                        </li>

                                    @endforeach

                                </ul>
                            </div>

                        @endif
                    </div>

                    <div class="w-full md:w-1/2 mb-6 mt-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Business Name
                        </label>
                        <input wire:model="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Business Name" disabled>
                        @error('name')
                        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                        @enderror
                        @if($this->Action)
                            <label class="block uppercase tracking-wide text-red-500 text-xs font-bold mb-2" for="grid-first-name">
                                Action : {{$this->Action}}
                            </label>
                        @endif

                    </div>



                </div>

            </div>
        </div>

    </div>



</div>
