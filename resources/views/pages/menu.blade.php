@extends('layouts.app')

@section('content')
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold text-orange-600 mb-3">Onze Menukaart</h1>
        <p class="text-gray-600">Ontdek al onze heerlijke gerechten en specialiteiten!</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($dishes as $dish)
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
                <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}" class="w-full h-40 object-cover">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $dish->name }}</h2>
                <p class="text-gray-600 text-sm mb-4">{{ $dish->description }}</p>
                <div class="text-right font-bold text-orange-600 text-lg">
                    €{{ number_format($dish->price, 2, ',', '.') }}
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-500">
                Geen gerechten gevonden.
            </div>
        @endforelse
    </div>
@endsection