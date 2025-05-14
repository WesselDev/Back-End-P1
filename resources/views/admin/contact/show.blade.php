@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded shadow max-w-2xl mx-auto mt-6">
        <h1 class="text-2xl font-bold mb-4">📨 Bericht van {{ $message->name }}</h1>

        <div class="space-y-2 text-sm text-gray-700">
            <p><strong>Naam:</strong> {{ $message->name }}</p>
            <p><strong>Email:</strong>
                <a href="mailto:{{ $message->email }}" class="text-blue-600 hover:underline">
                    {{ $message->email }}
                </a>
            </p>
            <p><strong>Verzonden op:</strong> {{ $message->created_at->format('d-m-Y H:i') }}</p>
        </div>

        <div class="mt-6 bg-gray-100 border border-gray-200 p-4 rounded">
            <p class="whitespace-pre-line text-gray-800">{{ $message->message }}</p>
        </div>

        <div class="mt-6 flex justify-between">
            <a href="{{ route('contact.index') }}" class="text-gray-600 hover:text-orange-600 underline">← Terug naar
                overzicht</a>

            <form action="{{ route('contact.destroy', $message->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:underline">🗑️ Verwijder bericht</button>
            </form>
        </div>
    </div>
@endsection