
    <div>
        <div class="p-2 bg-gray-100 h-full">

            <!-- Welcome banner -->



            <div class="bg-white p-4 sm:p-6 overflow-hidden mb-2 rounded-lg">



                <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">


                @switch($this->tab_id)

                    @case('1')
                        <button wire:click="createNewUser" wire:loading.attr="disabled" class="bg-yellow-400 hover:bg-orange-500 text-white font-bold py-2 px-4 rounded my-3">New User</button>

                    <livewire:main.setting.user-table/>
                    @break
                    @case('2')
                    <livewire:main.setting.roles/>
                    @break

                    @case('3')
                    <livewire:main.setting.profile/>
                    @break
                    @case('4')
                    <livewire:main.setting.password-policy />
                    @break

                @endswitch
            </div>

        </div>


        <!-- Log Out Other Devices Confirmation Modal -->
        <x-jet-dialog-modal wire:model="showCreateNewUser">
            <x-slot name="title">

            </x-slot>

            <x-slot name="content">








                <div>
                    @if (session()->has('message'))

                        @if (session('alert-class') == 'alert-success')
                            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mb-8" role="alert">
                                <div class="flex">
                                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                    <div>
                                        <p class="font-bold">The process is completed</p>
                                        <p class="text-sm">{{ session('message') }} </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif

                    <div class="w-full bg-white  p-4">

                        <div class="w-full">
                            <div class="mb-4">
                                <h5 >
                                    CREATE USER
                                </h5>
                            </div>


                            <div >
                                <div class="mb-4">
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="name" value="{{ __('Name') }}" />
                                        <input id="name" type="text" class="mt-1 block w-full " wire:model="name" autocomplete="name" />
                                        <x-jet-input-error for="name" class="mt-2" />
                                    </div>


                                </div>

                                <div class="mb-4">

                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="email" value="{{ __('E-Mail Address') }}" />
                                        <input id="email" type="email" class="mt-1 block w-full " wire:model="email" required />
                                        <x-jet-input-error for="email" class="mt-2" />
                                    </div>


                                </div>

                                <div class="mb-4">

                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="phone_number" value="{{ __('Phone Number') }}" />
                                        <input id="phone_number" type="phone_number" class="mt-1 block w-full " wire:model="phone_number" required />
                                        <x-jet-input-error for="phone_number" class="mt-2" />
                                    </div>

                                </div>


                                <div class="form-group col-span-6 sm:col-span-4 mb-4">

                                    <x-jet-label for="department" value="{{ __('Select role') }}" />

                                    <select id="department" wire:model="department" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm sm:px-3 sm:text-sm h-10" required>

                                        <option value="" selected> select department</option>

                                        @foreach( DB::table('departments')->where('status',"ACTIVE")->get() as $department)
                                            <option value="{{$department->id}}">{{$department->department_name}}</option>

                                        @endforeach
                                    </select>
                                    @error('department')
                                    <div class="border border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700 mt-1">
                                        <p>Please select a role first.</p>
                                    </div>
                                    @enderror

                                </div>





                            </div>
                        </div>




                    </div>



                </div>



            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('showCreateNewUser')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <div wire:loading.remove>
                    <x-jet-button class="ml-3"
                                  wire:click="createUser"
                                  wire:loading.attr="disabled">
                        {{ __('Create user') }}
                    </x-jet-button>
                </div>
                <div wire:loading>
                    <x-jet-button class="ml-3 "  >
                        <svg aria-hidden="true" role="status" class="inline w-4 h-4 mr-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                        </svg>
                        Please wait...
                    </x-jet-button>
                </div>

            </x-slot>
        </x-jet-dialog-modal>



    </div>



