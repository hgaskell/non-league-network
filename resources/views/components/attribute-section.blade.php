@props(['player'])

<div class="mt-4 grid grid-cols-2 gap-x-4 gap-y-2">
    <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-l font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">Position - {{ $player->position->name }}</span>
    <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-l font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Region - {{ $player->region->name }}</span>
    <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-l font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">Height - {{ $player->player_height }}</span>
    <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-l font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Foot - {{ $player->player_preferred_foot }}</span>
    <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-l font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Age - {{ \Carbon\Carbon::parse($player->player_dob)->diffInYears(\Carbon\Carbon::now()) }}</span>
</div>