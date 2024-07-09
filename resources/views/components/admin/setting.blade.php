@props(['heading'])

<section class="py-8 max-w-5xl mx-auto primary-color">
    <h1 class="text-4l font-bold tracking-tight primary-color sm:text-6xl pb-5">{{ $heading }}</h1>
    <div class="flex">
        <aside class="w-48">
            <ul>
                <li>
                    <a href="/admin" class="{{ request()->is('admin') ? 'opacity-100 font-semibold' : 'opacity-70'}}">Dashboard</a>
                </li>
                <li>
                    <a href="/admin/players" class="{{ request()->is('admin/players') ? 'opacity-100 font-semibold' : 'opacity-70'}}">All Players</a>
                </li>
                <li>
                    <a href="/admin/players/create" class="{{ request()->is('admin/players/create') ? 'opacity-100 font-semibold' : 'opacity-70'}}">Create New Player</a>
                </li>
                <li>
                    <a href="/admin/messages" class="{{ request()->is('admin/messages') ? 'opacity-100 font-semibold' : 'opacity-70'}}">Inbox</a>
                </li>
            </ul>
        </aside>
        <main class="flex-1">
            {{ $slot }}
        </main>
    </div>
</section>

