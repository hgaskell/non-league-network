<header class="inset-x-0 top-0 z-50">
    <nav class="flex items-center justify-between p-6 lg:px-8 primary-border-bottom" aria-label="Global">
      <div class="flex lg:flex-1">
        <a href="/" class="-m-1.5 p-1.5">
          <i class="fa-regular fa-futbol text-4xl primary-color"></i>
        </a>
      </div>
      <div class="flex lg:hidden">
        <button type="button" class="toggle-mobile-menu -m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
          <span class="sr-only">Open main menu</span>
          <svg class="h-8 w-8 primary-color" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>
      </div>
      <div class="hidden lg:flex lg:gap-x-12">
        <div class="p-2">
          <a href="/players" class="text-m font-semibold leading-6 primary-color">All Players</a>
        </div>
        <x-region-dropdown></x-region-dropdown>
        <x-position-dropdown></x-position-dropdown>
        <div class="p-2">
          <a href="#" class="text-m font-semibold leading-6 primary-color">About</a>
        </div>
      </div>
      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        @auth
          <x-dropdown>
            <x-slot name="trigger">
              <button class="text-m font-semibold leading-6 primary-color">Hi, {{ ucwords(auth()->user()->name) }}</button>
            </x-slot>
            <x-dropdown-item href="/admin">Admin</x-dropdown-item>
            <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Log out</x-dropdown-item>
            <form id="logout-form" method="POST" action="/logout" class="hidden">
            @csrf
            </form>
          </x-dropdown>
        @else
          <a href="/login" class="mr-2 text-m leading-6 primary-color bg-white border-color-primary rounded-lg px-4 py-2">Sign in</a>
          <a href="/register" class="text-m leading-6 text-white bg-primary-700  rounded-lg px-4 py-2">Sign Up</a>
        @endauth
      </div>
    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div class="hidden mobile-menu" role="dialog" aria-modal="true">
      <!-- Background backdrop, show/hide based on slide-over state. -->
      <div class="fixed inset-0 z-50"></div>
      <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
        <div class="flex items-center justify-between">
          <a href="/" class="-m-1.5 p-1.5">
            <i class="fa-regular fa-futbol text-4xl primary-color"></i>
          </a>
          <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700 toggle-mobile-menu">
            <span class="sr-only">Close menu</span>
            <svg class="h-8 w-8 primary-color" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="mt-6 flow-root">
          <div class="-my-6 divide-y divide-gray-500/10">
            <div class="space-y-2 py-6 primary-color">
              <div class="p-2">
                <a href="/players" class="text-m font-semibold leading-6 primary-color inline-flex">All Players</a>
              </div>
              <x-region-dropdown></x-region-dropdown>
              <x-position-dropdown></x-position-dropdown>
              <div class="p-2">
                <a href="#" class="text-m font-semibold leading-6 primary-color inline-flex">About</a>
              </div>
            </div>

            <div class="flex p-2 flex-col gap-y-2">
              @auth
                  <p class="text-m font-semibold leading-6 primary-color">Hi, {{ ucwords(auth()->user()->name) }}</p>
                  <a class="text-m font-semibold leading-6 primary-color" href="/admin">Admin</a>
                  <a class="text-m font-semibold leading-6 primary-color" href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Log out</a>
                  <form id="logout-form" method="POST" action="/logout" class="hidden">
                  @csrf
                  </form>
              @else
                <a href="/login" class="text-m primary-color pr-4">Sign in</a>
                <a href="/register" class="text-m primary-color ">Sign Up</a>
              @endauth
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>