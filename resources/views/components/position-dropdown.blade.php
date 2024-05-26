<div>
    <x-dropdown>
    <x-slot name="trigger">
    <button class="text-m leading-6 primary-color inline-flex">Positions
        <x-svg name="down-arrow"></x-svg>
    </button>
    </x-slot>
    @foreach ($positions as $position)
    <x-dropdown-item href="/players?position={{ $position->slug }}">{{ ucwords($position->name) }}</x-dropdown-item>
    @endforeach
    </x-dropdown>
</div>