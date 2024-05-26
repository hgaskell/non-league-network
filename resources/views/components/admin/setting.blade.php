@props(['heading']);

<section class="py-8 max-w-5xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2">{{ $heading }}</h1>
    <div class="flex">
        <aside class="w-48">
            <h4 class="font-semibold mb-4">Admin</h4>
            <ul>
                <li>
                    <a href="/admin" class="{{ request()->is('admin') ? 'text-blue-500' : ''}}">Dashboard</a>
                </li>
                <li>
                    <a href="/admin/players" class="{{ request()->is('admin/players') ? 'text-blue-500' : ''}}">All Players</a>
                </li>
                <li>
                    <a href="/admin/players/create" class="{{ request()->is('admin/players/create') ? 'text-blue-500' : ''}}">Create New Player</a>
                </li>
                <li>
                    <a href="/admin/messages" class="{{ request()->is('admin/messages') ? 'text-blue-500' : ''}}">Inbox</a>
                </li>
            </ul>
        </aside>
        <main class="flex-1">
            {{ $slot }}
        </main>
    </div>
</section>

