@props(['player'])

<div class="mt-4 flex flex-col	">
    <span class="inline-flex items-center rounded-md bg-primary-700 px-2 py-1 text-l font-medium text-color opacity-95 mb-1 ring-1 ring-inset ring-gray-500/10"><i class="fa-solid fa-money-bill pr-3"></i>{{ $player->position->name }}</span>
    <span class="inline-flex items-center rounded-md bg-primary-700 px-2 py-1 text-l font-medium text-color opacity-95 mb-1 ring-1 ring-inset ring-red-600/10"><i class="fa-solid fa-location-dot pr-3"></i>{{ $player->region->name }}</span>
    <span class="inline-flex items-center rounded-md bg-primary-700 px-2 py-1 text-l font-medium text-color opacity-95 mb-1 ring-1 ring-inset ring-yellow-600/20"><i class="fa-solid fa-ruler-vertical pr-3"></i>{{ $player->player_height }}cm</span>
    <span class="inline-flex items-center rounded-md bg-primary-700 px-2 py-1 text-l font-medium text-color opacity-95 mb-1 ring-1 ring-inset ring-green-600/20"><i class="fa-solid fa-socks pr-3"></i>{{ $player->player_preferred_foot }}</span>
    <span class="inline-flex items-center rounded-md bg-primary-700 px-2 py-1 text-l font-medium text-color opacity-95 mb-1 ring-1 ring-inset ring-green-600/20"><i class="fa-solid fa-calendar-days pr-3"></i>{{ \Carbon\Carbon::parse($player->player_dob)->diffInYears(\Carbon\Carbon::now()) }} years</span>
</div>