<div>
    <x-dropdown>
    <x-slot name="trigger">
    <button class="text-m leading-6 primary-color inline-flex">Regions
        <x-svg name="down-arrow"></x-svg>
    </button>
    </x-slot>
    @foreach ($regions as $region)
    <x-dropdown-item href="/players?region={{ $region->slug }}">{{ ucwords($region->name) }}</x-dropdown-item>
    @endforeach
    </x-dropdown>
</div>