@props(['name','label'])

<label for="{{ $name }}" class="block text-sm font-semibold leading-6 text-color">{{ ucwords($label) }}</label>