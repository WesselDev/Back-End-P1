<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Mijn Restaurant</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-800 font-sans">

    <header class="bg-white shadow sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            {{-- <a href="{{ route('home') }}" class="text-2xl font-bold text-orange-600 flex items-center gap-2"> --}}
                🍽️ <span>Mijn Restaurant</span>
            </a>
            <nav class="space-x-6 text-sm font-medium">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-orange-600 transition">Home</a>
                <a href="{{ route('menu') }}" class="text-gray-700 hover:text-orange-600 transition">Menukaart</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-orange-600 transition">Contact</a>
                @auth
                    <a href="{{ route('dishes.index') }}" class="text-gray-700 hover:text-orange-600 transition">Gerechten
                        beheren</a>
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-orange-600 transition">Dashboard</a>
                    <a href="{{ route('contact.index') }}" class="text-gray-700 hover:text-orange-600">📥
                        Contactberichten</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-red-500 hover:underline">Uitloggen</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-orange-600 transition">Inloggen</a>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-orange-600 transition">Registreren</a>
                @endauth
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-6 py-10">
        @yield('content')
    </main>

    <footer class="text-center text-sm text-gray-500 mt-16 pb-6">
        &copy; {{ date('Y') }} Locked In - Alle rechten voorbehouden.
    </footer>

</body>

</html>