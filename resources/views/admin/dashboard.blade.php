<x-layout>
@include('_header')
    <x-admin.setting heading="Admin">
        <!-- <p>Active Players: {{ $activePlayersCount }} / {{ $totalPlayersCount }}</p>
        <p>Unread Messages: {{ $unreadMessagesCount }} / {{ $totalMessagesCount }}</p> -->
        <!-- Chart Container -->
        <div class="flex space-x-4">
            <div class="w-1/2 h-80">
                <!-- Storing data in data attributes -->
                <canvas id="playersChart" data-active="{{ $activePlayersCount }}" data-total="{{ $totalPlayersCount }}"></canvas>
            </div>
            <div class="w-1/2 h-80">
                <canvas id="messagesChart" data-unread="{{ $unreadMessagesCount }}" data-total="{{ $totalMessagesCount }}"></canvas>
            </div>
        </div>
    </x-admin.setting>
</x-layout>
