@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">
            {{ isset($dish) ? 'Gerecht bewerken' : 'Nieuw gerecht toevoegen' }}
        </h1>

        <form action="{{ isset($dish) ? route('dishes.update', $dish) : route('dishes.store') }}" method="POST"
            enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md space-y-4">

            @csrf
            @if(isset($dish))
                @method('PUT')
            @endif

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Naam</label>
                <input name="name" value="{{ old('name', $dish->name ?? '') }}" placeholder="Naam gerecht"
                    class="w-full border border-gray-300 p-3 rounded" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Omschrijving</label>
                <textarea name="description" placeholder="Omschrijving" class="w-full border border-gray-300 p-3 rounded"
                    required>{{ old('description', $dish->description ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Prijs (€)</label>
                <input type="number" name="price" step="0.01" value="{{ old('price', $dish->price ?? '') }}"
                    placeholder="Prijs" class="w-full border border-gray-300 p-3 rounded" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Afbeelding (optioneel)</label>
                <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 p-3 rounded">
            </div>

            @if(isset($dish) && $dish->image)
                <div class="mt-2">
                    <p class="text-sm text-gray-600 mb-1">Huidige afbeelding:</p>
                    <img src="{{ asset('storage/' . $dish->image) }}" alt="Afbeelding" class="w-32 h-32 object-cover rounded">
                </div>
            @endif

            <div>
                <button class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg shadow">
                    {{ isset($dish) ? 'Bijwerken' : 'Toevoegen' }}
                </button>
            </div>
        </form>
    </div>
@endsection