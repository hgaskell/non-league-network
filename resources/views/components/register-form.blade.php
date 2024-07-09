
    <div class="px-6 py-8 background-primary text-color">
        <div class="max-w-lg mx-auto mt-10">
            <h2 class="font-bold tracking-tight text-color sm:text-5xl pb-5 text-center">Join The Team</h2>
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
                <x-form.button name="Sign Up" />
            </form>
        </div>
    </div> 
