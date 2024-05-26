@props(['player'])

<div class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
  <div class="mx-auto max-w-2xl text-center">
    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Contact sales</h2>
    <p class="mt-2 text-lg leading-8 text-gray-600">Aute magna irure deserunt veniam aliqua magna enim voluptate.</p>
  </div>
  <form action="/players/{{ $player->slug }}/messages" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
    @csrf
    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
        <x-form.input name="email" type="email" label="Your Email" />
        <x-form.input name="subject" type="text" label="Subject" />
        <x-form.textarea name="message" type="text" label="Your Message" />
    </div>
    <x-form.button name="Get in touch" />
  </form>
</div>