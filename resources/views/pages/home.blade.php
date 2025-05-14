@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-10 text-center">
        <h1 class="text-4xl font-extrabold text-orange-600 mb-4">Welkom bij ons restaurant</h1>
        <p class="text-gray-600 text-lg mb-2">Proef de smaken van de wereld bij onze vier unieke keukens!</p>
        <p class="text-gray-500">Kies uit Thais, Italiaans, Japans of klassiek Nederlands en bestel eenvoudig via onze
            menukaart.</p>

        <a href="{{ route('menu') }}"
            class="mt-6 inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-3 rounded-lg shadow transition">
            Bekijk menukaart
        </a>
    </div>
@endsection