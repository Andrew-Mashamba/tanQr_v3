<div>
    <style>

        .accentColor {
            color: #ffff00;
        }

        .yellow-border-div {
            border-left: 4px solid #ffff00; /* #ffff00 is the hex code for yellow */
        }
    </style>
    <div class="grid grid-cols-8 grid-rows-1" >


        <!-- sidebar 2 #1a202c-->
        <div class="row-span-1 col-span-1 bg-slate-50 border-r flex flex-col">


            <div class="flex h-16 border-b w-full shadow-sm pt-6 pb-6" style="background-color: #1a1e21">

                <div id="vcenter" class="my-auto">
                    <p class="text-sm font-bold ml-3 text-white">{{ Auth::user()->currentTeam->name }}</p>
                    <p class="text-sm font-semibold ml-3 text-white">{{ Auth::user()->currentTeam->region }}</p>
                </div>


            </div>


            <div class="h-full">

                <div wire:click="menuItemClicked(1)"
                     class="border-t-black  border-b-black   @if( $tab_id == 1 ) yellow-border-div bg-white @else border-l-transparent @endif
                        px-5 py-4   flex items-center   cursor-pointer border-l-4  hover:bg-slate-100">

                    <div class="">
                        <p  class="text-md font-semibold text-slate-600 m-0 p-0">Dashboard
                        </p>
                        <p class="text-xs text-slate-400 -mt-0.5 font-semibold" >Monthly Summary</p>
                    </div>
                </div>


                <div wire:click="menuItemClicked(2)"
                     class="@if( $tab_id == 2 ) yellow-border-div border-t border-b  bg-white @else border-l-transparent @endif
                        px-5 py-4   flex items-center cursor-pointer border-l-4 hover:bg-slate-100">
                    <div class="">
                        <p  class="text-md font-semibold text-slate-600 m-0 p-0">ISOs
                        </p>
                        <p class="text-xs text-slate-400 -mt-0.5 font-semibold" >ISO Management</p>
                    </div>
                </div>

                <div wire:click="menuItemClicked(3)"
                     class="@if( $tab_id == 3 ) yellow-border-div  border-t border-b  bg-white @else border-l-transparent @endif
                        px-5 py-4   flex items-center cursor-pointer border-l-4 hover:bg-slate-100">
                    <div class="">
                        <p  class="text-md font-semibold text-slate-600 m-0 p-0">Merchants
                        </p>
                        <p class="text-xs text-slate-400 -mt-0.5 font-semibold" >Merchants Management</p>
                    </div>
                </div>

                <div wire:click="menuItemClicked(4)"
                     class="@if( $tab_id == 4 ) yellow-border-div  border-t border-b  bg-white @else border-l-transparent @endif
                        px-5 py-4   flex items-center cursor-pointer border-l-4 hover:bg-slate-100">
                    <div class="">
                        <p  class="text-md font-semibold text-slate-600 m-0 p-0">QR Codes
                        </p>
                        <p class="text-xs text-slate-400 -mt-0.5 font-semibold" >QR Codes Management</p>
                    </div>
                </div>

                <div wire:click="menuItemClicked(5)"
                     class="@if( $tab_id == 5 ) yellow-border-div  border-t border-b  bg-white @else border-l-transparent @endif
                        px-5 py-4   flex items-center   cursor-pointer border-l-4  hover:bg-slate-100">

                    <div class="">
                        <p  class="text-md font-semibold text-slate-600 m-0 p-0">Transactions
                        </p>
                        <p class="text-xs text-slate-400 -mt-0.5 font-semibold" >Transactions Analysis</p>
                    </div>
                </div>


                <div wire:click="menuItemClicked(10)"
                     class="@if( $tab_id == 10 ) yellow-border-div  border-t border-b  bg-white @else border-l-transparent @endif
                        px-5 py-4   flex items-center cursor-pointer border-l-4 hover:bg-slate-100">
                    <div class="">
                        <p  class="text-md font-semibold text-slate-600 m-0 p-0">Reports
                        </p>
                        <p class="text-xs text-slate-400 -mt-0.5 font-semibold" >Reports Management</p>
                    </div>
                </div>

                <div wire:click="menuItemClicked(7)"
                     class="@if( $tab_id == 7 ) yellow-border-div  border-t border-b  bg-white @else border-l-transparent @endif
                        px-5 py-4   flex items-center cursor-pointer border-l-4 hover:bg-slate-100">
                    <div class="">
                        <p  class="text-md font-semibold text-slate-600 m-0 p-0">Approvals
                        </p>
                        <p class="text-xs text-slate-400 -mt-0.5 font-semibold" >Approvals Management</p>
                    </div>
                </div>

                <div wire:click="menuItemClicked(8)"
                     class="@if( $tab_id == 8 ) yellow-border-div  border-t border-b  bg-white @else border-l-transparent @endif
                        px-5 py-4   flex items-center cursor-pointer border-l-4 hover:bg-slate-100">
                    <div class="">
                        <p  class="text-md font-semibold text-slate-600 m-0 p-0">Users
                        </p>
                        <p class="text-xs text-slate-400 -mt-0.5 font-semibold" >System Users Management</p>
                    </div>
                </div>



            </div>



        </div>

        <div class="row-span-1 col-span-7 flex flex-col bg-white" >

            <div class="flex h-16 border-b w-full shadow-sm " style="background-color: #1a1e21">

                <nav class="w-full px-4 py-4 flex justify-between">

                    <div>

                        <div wire:loading wire:target="menuItemClicked" >
                            <div class="ml-4 flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="animate-spin  h-5 w-5 mr-2 stroke-white" fill="white" viewBox="0 0 24 24" stroke="white" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />

                                </svg>

                                <p class="font-semibold text-white">Please wait...</p>
                            </div>


                        </div>

                        <div wire:loading wire:target="setTabID" >
                            <div class="ml-4 flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="animate-spin  h-5 w-5 mr-2 stroke-white" fill="white" viewBox="0 0 24 24" stroke="white" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />

                                </svg>

                                <p class="font-semibold text-white">Please wait...</p>
                            </div>


                        </div>

                        <div  wire:loading.remove wire:target="setTabID">

                        <div  wire:loading.remove wire:target="menuItemClicked">

                            <div class="flex">
                                <a class="text-3xl font-bold leading-none" href="#">
                                    @if($this->tab_id == 1 )
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                        </svg>
                                    @endif

                                    @if($this->tab_id == 2 )
                                        <svg class="w-6 h-6" fill="white" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"></path>
                                        </svg>
                                    @endif

                                    @if($this->tab_id == 3 )
                                        <svg class="w-6 h-6" fill="white"  stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                                        </svg>
                                    @endif
                                    @if($this->tab_id == 4 )
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-6 h-6">
                                            <path d="M6 3a3 3 0 00-3 3v1.5a.75.75 0 001.5 0V6A1.5 1.5 0 016 4.5h1.5a.75.75 0 000-1.5H6zM16.5 3a.75.75 0 000 1.5H18A1.5 1.5 0 0119.5 6v1.5a.75.75 0 001.5 0V6a3 3 0 00-3-3h-1.5zM12 8.25a3.75 3.75 0 100 7.5 3.75 3.75 0 000-7.5zM4.5 16.5a.75.75 0 00-1.5 0V18a3 3 0 003 3h1.5a.75.75 0 000-1.5H6A1.5 1.5 0 014.5 18v-1.5zM21 16.5a.75.75 0 00-1.5 0V18a1.5 1.5 0 01-1.5 1.5h-1.5a.75.75 0 000 1.5H18a3 3 0 003-3v-1.5z" />
                                        </svg>

                                    @endif

                                    @if($this->tab_id == 5 )
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-6 h-6">
                                            <path fill-rule="evenodd" d="M2.625 6.75a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875 0A.75.75 0 018.25 6h12a.75.75 0 010 1.5h-12a.75.75 0 01-.75-.75zM2.625 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zM7.5 12a.75.75 0 01.75-.75h12a.75.75 0 010 1.5h-12A.75.75 0 017.5 12zm-4.875 5.25a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875 0a.75.75 0 01.75-.75h12a.75.75 0 010 1.5h-12a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                                        </svg>

                                    @endif

                                    @if($this->tab_id == 10 )
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-6 h-6">
                                            <path d="M5.625 3.75a2.625 2.625 0 100 5.25h12.75a2.625 2.625 0 000-5.25H5.625zM3.75 11.25a.75.75 0 000 1.5h16.5a.75.75 0 000-1.5H3.75zM3 15.75a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75zM3.75 18.75a.75.75 0 000 1.5h16.5a.75.75 0 000-1.5H3.75z" />
                                        </svg>

                                    @endif
                                    @if($this->tab_id == 7 )
                                        <svg class="w-6 h-6" fill="white" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    @endif

                                    @if($this->tab_id == 8 )
                                        <svg class="w-6 h-6" fill="white"  stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    @endif


                                </a>
                                <p class="ml-4 text-lg text-white font-bold  font-semibold">{{$this->title}}</p>

                            </div>



                        </div>

                        </div>

                    </div>



                    <ul class="flex items-center space-x-6">
                        @if($this->tab_id == 1 )
                            <li><a class="text-sm text-gray-400 hover:text-gray-500" href="#">Yearly</a></li>
                            <li class="text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                </svg>

                            </li>
                            <li><a class="text-sm text-gray-400 hover:text-gray-500" href="#">Monthly</a></li>
                            <li class="text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                </svg>

                            </li>
                            <li><a class="text-sm text-gray-400 hover:text-gray-500" href="#">Weekly</a></li>

                        @endif

                        @if($this->tab_id == 2 )

                            <li>
                                <div>
                                    <a wire:click="setTabID(1)" class="text-sm @if(Session::get('CurrentTabbID') == 1 )
                                 text-white font-bold  @else text-gray-400  @endif hover:text-gray-500"
                                       href="#{{Session::get('CurrentMenu')}}#List">List</a>
                                </div>

                            </li>
                            <li class="text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                </svg>

                            </li>
                            <li>
                                <div>
                                <a wire:click="setTabID(2)" class="text-sm @if(Session::get('CurrentTabbID') == 2 )
                                text-white font-bold  @else text-gray-400  @endif hover:text-gray-500"
                                   href="#{{Session::get('CurrentMenu')}}#Register">Register</a>
                                </div>
                            </li>
                            <li class="text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                </svg>

                            </li>
                            <li>
                                <div>
                                <a wire:click="setTabID(3)" class="text-sm @if(Session::get('CurrentTabbID') == 3 )
                                text-white font-bold  @else text-gray-400  @endif hover:text-gray-500" href="#{{Session::get('CurrentMenu')}}#Edit"
                                >Edit</a>
                                </div>
                            </li>
                            <li class="text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                </svg>

                            </li>
                            <li>
                                <div>
                                <a wire:click="setTabID(4)" class="text-sm @if(Session::get('CurrentTabbID') == 4 )
                                text-white font-bold  @else text-gray-400  @endif hover:text-gray-500" href="#{{Session::get('CurrentMenu')}}#Block/Delete">Block/UnBlock</a>
                                </div>
                            </li>
                        @endif

                        @if($this->tab_id == 3 )

                                <li>
                                    <div>
                                        <a wire:click="setTabID(1)" class="text-sm @if(Session::get('CurrentTabbID') == 1 )
                                 text-white font-bold  @else text-gray-400  @endif hover:text-gray-500"
                                           href="#{{Session::get('CurrentMenu')}}#List">List</a>
                                    </div>

                                </li>
                                <li class="text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                    </svg>

                                </li>
                                <li>
                                    <div>
                                        <a wire:click="setTabID(2)" class="text-sm @if(Session::get('CurrentTabbID') == 2 )
                                text-white font-bold  @else text-gray-400  @endif hover:text-gray-500"
                                           href="#{{Session::get('CurrentMenu')}}#Register">Register</a>
                                    </div>
                                </li>
                                <li class="text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                    </svg>

                                </li>
                                <li>
                                    <div>
                                        <a wire:click="setTabID(3)" class="text-sm @if(Session::get('CurrentTabbID') == 3 )
                                text-white font-bold  @else text-gray-400  @endif hover:text-gray-500" href="#{{Session::get('CurrentMenu')}}#Edit"
                                        >Edit</a>
                                    </div>
                                </li>
                                <li class="text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                    </svg>

                                </li>
                                <li>
                                    <div>
                                        <a wire:click="setTabID(4)" class="text-sm @if(Session::get('CurrentTabbID') == 4 )
                                text-white font-bold  @else text-gray-400  @endif hover:text-gray-500" href="#{{Session::get('CurrentMenu')}}#Block/Delete">Block/UnBlock</a>
                                    </div>
                                </li>
                        @endif
                        @if($this->tab_id == 4 )


                        @endif

                        @if($this->tab_id == 5 )

                            <li><a class="text-sm text-gray-400 hover:text-gray-500" href="#">List</a></li>
                            <li class="text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                </svg>

                            </li>
                            <li><a class="text-sm text-gray-400 hover:text-gray-500" href="#">Reconciliation</a></li>

                        @endif


                        @if($this->tab_id == 10 )


                        @endif

                        @if($this->tab_id == 7 )

                        @endif

                        @if($this->tab_id == 8 )
                                <li>
                                    <div>
                                        <a wire:click="setTabID(1)" class="text-sm @if(Session::get('CurrentTabbID') == 1 )
                                                text-white font-bold  @else text-gray-400  @endif hover:text-gray-500"
                                           href="#{{Session::get('CurrentMenu')}}#List">Users</a>
                                    </div>

                                </li>
                                <li class="text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                    </svg>

                                </li>


                                <li>
                                    <div>
                                        <a wire:click="setTabID(2)" class="text-sm @if(Session::get('CurrentTabbID') == 2 )
                                                text-white font-bold  @else text-gray-400  @endif hover:text-gray-500" href="#{{Session::get('CurrentMenu')}}#Edit"
                                        >Roles</a>
                                    </div>
                                </li>
                                <li class="text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                    </svg>

                                </li>
                                <li>
                                    <div>
                                        <a wire:click="setTabID(3)" class="text-sm @if(Session::get('CurrentTabbID') == 3 )
                                                text-white font-bold  @else text-gray-400  @endif hover:text-gray-500" href="#{{Session::get('CurrentMenu')}}#Block/Delete">Profile</a>
                                    </div>
                                </li>


                                <li class="text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                    </svg>

                                </li>
                                <li>
                                    <div>
                                        <a wire:click="setTabID(4)" class="text-sm @if(Session::get('CurrentTabbID') == 4 )
                                                text-white font-bold  @else text-gray-400  @endif hover:text-gray-500"
                                           href="#{{Session::get('CurrentMenu')}}#Register">

                                            Password Policy</a>
                                    </div>
                                </li>

                        @endif

                    </ul>

                </nav>

            </div>

            @if (session()->has('message'))

                @if (session('alert-class') == 'alert-success')
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
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

            <div class="" >

                       @if($this->tab_id == 1 )
                           <livewire:main.dashboard>
                        @endif

                        @if($this->tab_id == 2 )
                            <livewire:main.i-s-o/>
                        @endif

                        @if($this->tab_id == 3 )
                            <livewire:main.merchants/>
                        @endif
                        @if($this->tab_id == 4 )
                            <livewire:main.q-r/>
                        @endif

                        @if($this->tab_id == 5 )
                            <livewire:main.transactions/>
                        @endif

                        @if($this->tab_id == 10 )
                           <livewire:main.reports/>
                        @endif

                        @if($this->tab_id == 7 )

                            <livewire:main.approval.approval-list />

                        @endif

                        @if($this->tab_id == 8 )

                            <livewire:main.setting.users/>
                            @endif


            </div>


        </div>


    </div>

</div>
