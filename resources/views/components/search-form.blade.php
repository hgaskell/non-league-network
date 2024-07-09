<form method="GET" action="/players" class="w-full">
    <div class="pb-5 justify-evenly flex hero-banner-search">

    
        <select name="region" id="" class="w-32 block p-1 ps-5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 ring-primary-500 border-primary-500">
            <option value="">All Regions</option>
            @foreach ($regions as $region)
                <option value="{{$region->slug}}">{{$region->name}}</option>
            @endforeach
        </select>
        <select name="position" id="" class="w-32 block p-1 ps-5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 ring-primary-500 border-primary-500">
            <option value="">All Postions</option>
            @foreach ($positions as $position)
                <option value="{{$position->slug}}">{{$position->name}}</option>
            @endforeach
        </select>
    </div>
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="search" name="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 ring-primary-500 border-primary-500" />
        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-primary-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
    </div>
</form>