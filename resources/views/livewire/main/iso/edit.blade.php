<div>



    <div class="flex justify-between">
        <p class="ml-2 text-lg text-black font-semibold">Edit ISO {{$this->name}}</p>
        @if($this->name)

        <div class=""  align="right">
            <div wire:loading.remove wire:target="updateISO">
                <button wire:click='updateISO' class="mr-2 inline-block px-6 py-2 border-2 border-gray-800 text-gray-800 font-medium text-xs
        leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out" >
                        UPDATE
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

        <div class="w-full max-w-lg rounded bg-gray-100 mx-auto p-2">
        <div class="w-full max-w-lg rounded bg-white mx-auto p-4">

            <div class="flex flex-wrap -mx-3 ">
                <div class="w-full md:w-1/2 px-3 mb-6 mt-6 md:mb-0">
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
                                    <li wire:click="isoToEdit({{$iso}})" class="px-6 py-2 border-b border-gray-200 w-full cursor-pointer hover:bg-black hover:text-white">{{ $iso->name }}</li>

                                @endforeach

                            </ul>
                        </div>

                    @endif
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 mt-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Business Name
                    </label>
                    <input wire:model="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Business Name">
                    @error('name')
                    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    @enderror
                </div>

            </div>

            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                        TIN Number
                    </label>
                    <input wire:model="tin" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="TIN Number">
                    @error('tin')
                    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                        License Number
                    </label>
                    <input wire:model="license" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="License Number">
                    @error('license')
                    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    @enderror
                </div>

                <div class=" hidden w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        State
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                            <option>New Mexico</option>
                            <option>Missouri</option>
                            <option>Texas</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        </div>

        <div class="h-16"></div>


    </div>
</div>
