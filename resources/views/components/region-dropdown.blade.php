<div>
    <x-dropdown>
    <x-slot name="trigger">
    <button class="text-m font-semibold leading-6 primary-color inline-flex">Regions
        <x-svg name="down-arrow"></x-svg>
    </button>
    </x-slot>
    @foreach ($regions as $region)
    <x-dropdown-item class="p-2" href="/players?region={{ $region->slug }}">{{ ucwords($region->name) }}</x-dropdown-item>
    @endforeach
    </x-dropdown>
</div>