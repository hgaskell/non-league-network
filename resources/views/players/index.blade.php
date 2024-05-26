<x-layout>

  @include ('_header')

<div class="bg-white">
  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
    <p class="mt-2 text-lg leading-8 text-gray-600">
      <a href="{{ url()->previous() }}">Back</a>
      <a href="/players?region={{ isset($currentRegion) ? $currentRegion->slug : ''}}">{{ isset($currentRegion) ? ' / ' . ucwords($currentRegion->name) : ''}}</a>
      <a href="/players?position={{ isset($currentPosition) ? $currentPosition->slug : ''}}">{{ isset($currentPosition) ? ' / ' . ucwords($currentPosition->name) : ''}}</a>
      <a>{{ isset($currentPosition) ||  isset($currentRegion) ? '' : ' / All Players'}}</a>
    </p>
    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
    @foreach ($players as $player)
      <x-player-card :player="$player" />
    @endforeach
    </div>
    {{ $players->links() }}


  </div>
</div>

</x-layout>