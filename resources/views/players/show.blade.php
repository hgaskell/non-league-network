<x-layout>

  @include ('_header')
<div class="bg-white">
  <div class="pt-6">
    <!-- Product info -->
    <div class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
      <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
      <p class="mt-2 text-lg leading-8 text-gray-600">
        <a href="{{ url()->previous() }}">Back / </a>
        <a href="/players?region={{ $player->region->slug }}">{{ ucwords($player->region->name) }} / </a>
        <a href="/players?position={{ $player->position->slug }}">{{ ucwords($player->position->name) }}</a>
      </p>
        <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">{{ ucwords($player->player_name) }}</h1>
      </div>

      <!-- RIGHTSIDE -->
      <div class="mt-4 lg:row-span-3 lg:mt-0">
        <div class="aspect-h-5 aspect-w-4 lg:aspect-h-4 lg:aspect-w-3 sm:overflow-hidden sm:rounded-lg">
            <img src="{{ asset('storage/' . $player->player_image) }}" alt="Player Image" class="h-full w-full object-cover object-center">
        </div>
      </div>

      <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
        <!-- Description and details -->
        <div>
          <h3 class="sr-only">Bio</h3>
          <div class="space-y-6">
            <p class="text-base text-gray-900">{{ $player->player_bio }}</p>
          </div>
        </div>
        <div class="mt-10">
          <h3 class="text-sm font-medium text-gray-900">Details</h3>
            <x-attribute-section :player="$player" />
        </div>
      </div>
    </div>
  </div>
</div>

<x-player-contact :player="$player" />
</x-layout>