<x-layout>
@include ('_header')
    <x-admin.setting heading="Dashboard">
        <p>Active Players: {{ $activePlayersCount }}</p>
        <p>Unread Messages: {{ $unreadMessagesCount }}</p>
    </x-admin.setting>
</x-layout>