<x-layout>
@include ('_header')
    <x-admin.setting :heading="$message->subject . ' from ' . $message->email">
        <x-panel>
            <h4 class="font-semibold mb-4">{{$message->player->player_name}}</h4>
            <p>{{$message->body}}</p>
        </x-panel>
        <div class="flex">
            <a href="/admin/messages" class="mr-3 mt-3 bg-transparent hover:bg-blue-500 text-blue-700 text-base hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Go Back</a>
            <form method="POST" action="/admin/messages/{{ $message->id }}">
                @csrf
                @method('DELETE')
                <button class="mt-3 bg-transparent hover:bg-red-500 text-red-700 text-base	hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">Delete</button>
            </form>
        </div>
    </x-admin.setting>
</x-layout>