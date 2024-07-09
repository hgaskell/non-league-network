@props(['player'])

<div class="px-6 py-8 background-primary text-color">
  <div class="mx-auto max-w-2xl text-center">
    <h2 class="font-bold tracking-tight text-color sm:text-5xl pb-5 text-center">Contact {{ ucwords($player->player_name) }}</h2>
  </div>
  <form action="/players/{{ $player->slug }}/messages" method="POST" class="max-w-lg mx-auto mt-10">
    @csrf
    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
        <x-form.input name="email" type="email" label="Your Email" />
        <x-form.input name="subject" type="text" label="Subject" />
        <x-form.textarea name="message" type="text" label="Your Message" />
    </div>
    <x-form.button name="Get in touch" />
  </form>
</div>