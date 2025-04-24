<div class="p-4">
    <!-- Left: Avatars -->

    <div class="w-full bg-gray-100 p-2 rounded-lg">
        <div class="bg-white w-full p-4">

            <div class="w-full flex gap-2">
                <div>
                    <label for="type"
                           class="block mb-2 dark:text-gray-400 space-x-2 text-sm font-semibold spacing-sm text-slate-600">
                        Select item
                    </label>
                    <select wire:model.bounce="type" name="type" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="TRANSACTIONS" selected >TRANSACTIONS</option>
                        <option  value="ISOS">ISOS</option>
                        <option  value="MERCHANTS">MERCHANTS</option>
                        <option value="QR-CODE">QR-CODE </option>


                    </select>
                    @error('result')
                    <div class="border border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700 mt-1">
                        <p>result is mandatory.</p>
                    </div>
                    @enderror
                </div>

                @if($this->type == 'TRANSACTIONS')


                    <div class="ml-2">
                        <label for="category"
                               class="block mb-2 dark:text-gray-400 space-x-2 text-sm font-semibold spacing-sm text-slate-600">
                            Start Date
                        </label>


                        <div class="relative ">

                            <input wire:model="startDate" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                        </div>
                    </div>


                    <div class="">
                        <label for="category"
                               class="block mb-2 dark:text-gray-400 space-x-2 text-sm font-semibold spacing-sm text-slate-600">
                            End Date
                        </label>


                        <div class="relative ">

                            <input wire:model="endDate" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                        </div>
                    </div>



                    <div>
                        <label for="type"
                               class="block mb-2 dark:text-gray-400 space-x-2 text-sm font-semibold spacing-sm text-slate-600">
                            ISOS
                        </label>
                        <select wire:model.bounce="isos" name="type"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            <option   value="All">ALL</option>
                            @foreach(DB::table('isos')->get() as $iso)

                                <option   value="{{$iso->id}}">{{$iso->name}}</option>
                            @endforeach

                        </select>
                        @error('result')
                        <div class="border border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700 mt-1">
                            <p>result is mandatory.</p>
                        </div>
                        @enderror
                    </div>


                @endif
            </div>
            <div class="h-8"></div>
            <div >

                @if($this->type =='TRANSACTIONS')
                    <livewire:main.reports.transaction-report />

                @endif
                @if($this->type=='ISOS')

                    <livewire:main.reports.iso-report />
                @endif

                @if($this->type=='MERCHANTS')
                    <livewire:main.reports.merchants-report />

                @endif
                @if($this->type=='QR-CODE')
                    <livewire:main.reports.transaction-report />
                @endif

            </div>

        </div>



    </div>




</div>
