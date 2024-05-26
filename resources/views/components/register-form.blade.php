<x-layout>
    <div class="px-6 py-8">
        <div class="max-w-lg mx-auto mt-10">
            <h1 class="text-center font-bold text-xl">Register</h1>
            <form method="POST" action="/register">
            @csrf
                <div class="mb-6">
                    <x-form.input name="name" type="text" label="Name"></x-form.input>
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <x-form.input name="email" type="email" label="Email"></x-form.input>
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                <x-form.input name="password" type="password" label="Password"></x-form.input>
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <x-form.button name="Register" />
            </form>
        </div>
    </div>
</x-layout>