<x-layout>

@include ('_header')

<div class="relative bg-cover bg-no-repeat bg-[url('{{ asset('storage/images/hero-banner.jpg')}}')]" >
  <div class="relative bg-cover bg-no-repeat hero-banner"> 
  <div class="absolute inset-0  opacity-50"></div>
    <div class="relative h-full	 isolate px-6 lg:px-8">
      <div class="mx-auto h-full flex items-center max-w-2xl py-32">
        <div class="text-center">
          <h1 class="sm:text-6xl font-bold mb-6 tracking-tight text-color text-4xl pb-5 tracking-widest">NonLeagueNetwork</h1>
          <div class=" sm:mb-8 sm:flex sm:justify-center">
            <x-search-form></x-search-form>
          </div>
          <p class="mt-6 text-lg leading-8 text-color">Discover the rising stars of grassroots football. Connect with talented non-league players and uncover new opportunities for your team today!</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="bg-white">
  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-16 lg:max-w-7xl lg:px-8">
    <h2 class="sm:text-6xl font-bold tracking-tight primary-color text-4xl pb-5">Recent Signings</h2>
    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
    @foreach ($players as $player)
      <x-player-card :player="$player" />
    @endforeach
    </div>
  </div>
</div>

@guest
<x-register-form />
@endguest



</x-layout> 