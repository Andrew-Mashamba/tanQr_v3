<div>
    <div class="h-8"></div>



    @if($this->CurrentTabID == 1 )
        <div class="bg-gray-100 rounded rounded-lg shadow-sm p-1 m-2">
            <livewire:main.merchants.merchant-list/>
        </div>
    @endif
    @if($this->CurrentTabID == 2 )
        <livewire:main.merchants.register/>
    @endif

    @if($this->CurrentTabID == 3 )
        <livewire:main.merchants.edit/>
    @endif
    @if($this->CurrentTabID == 4 )
        <livewire:main.merchants.block/>
    @endif


</div>







