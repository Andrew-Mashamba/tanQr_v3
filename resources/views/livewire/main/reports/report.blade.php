<div>
    <div class="bg-gray-100">



        <div class="p-4">

            <!-- Welcome banner -->
            <div class="relative rounded-lg bg-white p-4 sm:p-6 overflow-hidden mb-2 rounded-2xl shadow-md shadow-gray-200" style="height: 116px;">

                <!-- Content -->
                <div class="">
                    <div class="flex items-center mb-2 space-x-2 text-sm font-semibold spacing-sm text-slate-600 h-auto">

                        <div>
                            REPORTS GENERATOR
                        </div>

                    </div>



                </div>




            </div>



            <!-- Dashboard actions -->
            <div class="flex w-full mb-4 gap-2">



                <!-- Left: Avatars -->
                <div class="bg-white rounded-lg rounded-2xl shadow-md shadow-gray-200 w-full p-2 flex  gap-2 items-center " style="height: 100px">

                    <div class="ml-2">
                        <label for="category"
                               class="block mb-2 dark:text-gray-400 space-x-2 text-sm font-semibold spacing-sm text-slate-600">
                            Start Date
                        </label>


                        <div class="relative ">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input datepicker datepicker-autohide wire:model="startDate" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                        </div>
                    </div>


                    <div class="">
                        <label for="category"
                               class="block mb-2 dark:text-gray-400 space-x-2 text-sm font-semibold spacing-sm text-slate-600">
                            End Date
                        </label>


                        <div class="relative ">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input datepicker datepicker-autohide wire:model="endDate" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                        </div>
                    </div>


                    <div>
                        <label for="type"
                               class="block mb-2 dark:text-gray-400 space-x-2 text-sm font-semibold spacing-sm text-slate-600">
                            select item
                        </label>
                        <select wire:model.bounce="type" name="type" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            <option  selected value="ISOS">ISOS</option>
                            <option  value="MERCHANTS">MERCHANTS</option>
                            <option value="QR-CODE">QR-CODE </option>
                            <option value="TRANSACTIONS">TRANSACTIONS</option>

                        </select>
                        @error('result')
                        <div class="border border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700 mt-1">
                            <p>result is mandatory.</p>
                        </div>
                        @enderror
                    </div>

                    @if($this->type == 'MERCHANTS' or $this->type == 'QR-CODE' or $this->type == 'ISOS')



                        @elseif($this->type == 'TRANSACTIONS')



                    <div>
                        <label for="type"
                               class="block mb-2 dark:text-gray-400 space-x-2 text-sm font-semibold spacing-sm text-slate-600">
                            ISOS
                        </label>
                        <select wire:model.bounce="isos" name="type"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            <option  selected value=" "> select ...</option>
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

                    <div>
                        <label for="type"
                               class="block mb-2 dark:text-gray-400 space-x-2 text-sm font-semibold spacing-sm text-slate-600">
                            MERCHANT
                        </label>
                        <select wire:model.bounce="merchant" name="type"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            <option  selected value=""> </option>
                            @foreach(DB::table('merchant_category_codes')->get() as $merchant)
                            <option   value="{{$merchant->code}}">{{$merchant->description}}</option>
                            @endforeach

                        </select>
                        @error('result')
                        <div class="border border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700 mt-1">
                            <p>result is mandatory.</p>
                        </div>
                        @enderror
                    </div>
                    @endif




                    <script>
                        flatpickr('[datepicker]', {
                            dateFormat: "Y-m-d",
                            autoHide: true,
                            allowInput: true,
                            minDate: "2000-01-01",
                            maxDate: new Date().fp_incr(14)
                        });
                    </script>


                </div>



            </div>


            <div class="bg-white  p-4 sm:p-6 overflow-hidden mb-2 rounded-lg shadow-md shadow-gray-200">

                <div class="w-full border-b border-gray-200 dark:border-gray-700">

                </div>





                <div >

                                    @if($this->tab_id==1)
                                            full report
                                      @endif

                                        @if($this->tab_id==2)
                                     <livewire:main.reports.iso-report />
                                        @endif
                                        @if($this->tab_id==3)
                                      <livewire:main.reports.merchants-report />
                                        @endif

                                        @if($this->tab_id==4)
                                        <livewire:main.reports.transaction-report />
                                        @endif
                                        @if($this->tab_id==5)
                                        <livewire:main.reports.audit-report />
                                        @endif





{{--                                        @if($this->tab_id==2)--}}
                                            <livewire:main.reports.iso-report />

                                            <livewire:main.reports.merchants-report />

                                            <livewire:main.reports.transaction-report />

                                            <livewire:main.reports.audit-report />


                </div>



            </div>


        </div>









    </div>

</div>
