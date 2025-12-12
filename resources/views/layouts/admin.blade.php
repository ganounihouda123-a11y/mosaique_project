<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg min-h-screen">
        <div class="p-6 border-b">
            <h1 class="text-2xl font-bold text-indigo-600">Admin Panel</h1>
        </div>
        <nav class="mt-6">
            <a href="{{ route('admin.dashboard') }}" class="block px-6 py-3 text-gray-700 hover:bg-indigo-100">Dashboard</a>
            <a href="#" class="block px-6 py-3 text-gray-700 hover:bg-indigo-100">Utilisateurs</a>
            <a href="#" class="block px-6 py-3 text-gray-700 hover:bg-indigo-100">Clubs</a>
            <a href="#" class="block px-6 py-3 text-gray-700 hover:bg-indigo-100">Stagiaires</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Navbar -->
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold">@yield('header', 'Dashboard')</h2>
            <div class="flex items-center gap-4">
                <span class="text-gray-700">{{ Auth::user()->name ?? 'Admin' }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Déconnexion</button>
                </form>
            </div>
        </header>

        <!-- Page Content -->
        <main class="p-6">
            @yield('content')
        </main>
    </div>
</body>
</html>
