@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-center">Contact</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="text" name="name" placeholder="Naam" required class="w-full border p-2 rounded">
            <input type="email" name="email" placeholder="E-mailadres" required class="w-full border p-2 rounded">
            <textarea name="message" placeholder="Je bericht" required class="w-full border p-2 rounded"></textarea>
            <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded">Verstuur</button>
        </form>
    </div>
@endsection