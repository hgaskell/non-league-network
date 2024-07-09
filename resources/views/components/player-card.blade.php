@props(['player'])

<a href="/players/{{ $player->slug }}" class="group">
    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
        <img src="{{ asset('storage/' . $player->player_image) }}" alt="{{ $player->player_name}} Profile Image" class="h-full w-full object-cover object-center group-hover:opacity-75">
    </div>
    <h3 class="mt-4 text-m font-semibold primary-color">{{ $player->player_name}}</h3>
    <x-attribute-section :player="$player" />
</a>