<div class="overflow-y-hidden  overflow-x-auto lg-no-scrollbar bg-transparent m-0 p-0">
    <div role="tablist" class="flex items-center rounded-full bg-white h-[40px] min-w-max mb-2">
        @if (count($tabs) > 0)
            @foreach ($tabs as $tab)  
            <button data-target="{{ $tab['target'] }}"
                role="tab"
                class="@isset($tab['title']) tooltip tooltip-right @endisset flex-none flex items-center gap-2 justify-center tab-button {{ $tab['active'] ? 'bg-blue-500 text-white' : 'text-blue-500' }} !rounded-full min-w-[180px] hover:bg-blue-500 hover:bg-opacity-5 transition-all lg:!min-w-[157px] !px-4 !h-[40px] font-bold"
                aria-label="{{ $tab['title'] }}">
                @isset($tab['icon'])
                    <i class="{{ $tab['icon'] }}"></i>
                @endisset {{ $tab['title'] }}
            </button>
            <a href="{{ route('products.index') }}">
                <button data-target="{{ $tab['target'] }}"
                role="tab"
                class="@isset($tab['title']) tooltip tooltip-right @endisset flex-none flex items-center gap-2 justify-center tab-button {{ $tab['active'] ? 'bg-blue-500 text-white' : 'text-blue-500' }} !rounded-full min-w-[180px] hover:bg-blue-500 hover:bg-opacity-5 transition-all lg:!min-w-[157px] !px-4 !h-[40px] font-bold"
                aria-label="{{ $tab['title'] }}">
                @isset($tab['icon'])
                    <i class="{{ $tab['icon'] }}"></i>
                @endisset 
                Home
            </button>
            </a>
            
            @endforeach
        @endif
    </div>
</div>
