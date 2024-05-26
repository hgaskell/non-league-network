@props(['name','type','label'])

<div class="sm:col-span-2">
    <x-form.label name="{{ $name }}" label="{{ $label }}" />
    <div class="mt-2.5">
        <input class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            {{ $attributes(['value' => old($name)]) }}
        >
        <x-form.error name="{{ $name }}" />
    </div>
</div>

 