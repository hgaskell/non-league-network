@props(['trigger'])

<div x-data="{ show: false }" @click.away="show = false" class="relative p-2">
    <div @click="show = ! show">
        {{ $trigger }}
    </div>
    <div x-show="show" class="absolute z-50 bg-white primary-color mt-6-5 w-full h-screen md:h-auto" style="display:none">
        {{ $slot }}
    </div>
</div>