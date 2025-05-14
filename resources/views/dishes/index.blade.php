@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">🍽️ Gerechten beheren</h1>
        <a href="{{ route('dishes.create') }}"
            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow">
            + Nieuw gerecht
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($dishes->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($dishes as $dish)
                <div class="bg-white p-4 rounded shadow hover:shadow-md transition">
                    @if($dish->image)
                        <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}"
                            class="w-full h-40 object-cover rounded mb-4">
                    @endif

                    <h2 class="text-xl font-semibold mb-2 text-gray-800">{{ $dish->name }}</h2>
                    <p class="text-sm text-gray-600 mb-2">{{ $dish->description }}</p>
                    <p class="font-bold text-orange-600 mb-4">€{{ number_format($dish->price, 2, ',', '.') }}</p>

                    <div class="flex justify-between items-center text-sm">
                        <a href="{{ route('dishes.edit', $dish) }}" class="text-blue-600 hover:underline">✏️ Bewerken</a>

                        <form method="POST" action="{{ route('dishes.destroy', $dish) }}"
                            onsubmit="return confirm('Weet je zeker dat je dit gerecht wilt verwijderen?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">🗑️ Verwijder</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500">Er zijn nog geen gerechten toegevoegd.</p>
    @endif
@endsection