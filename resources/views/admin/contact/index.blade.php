@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto mt-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">📥 Ingekomen berichten</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        @forelse($messages as $msg)
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition mb-6">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div>
                        <p class="text-sm text-gray-400">{{ $msg->created_at->format('d-m-Y H:i') }}</p>
                        <p class="text-lg font-bold text-gray-800">{{ $msg->name }}</p>
                        <p class="text-sm text-gray-600 mb-2">{{ $msg->email }}</p>
                    </div>

                    <div class="flex gap-4 mt-2 md:mt-0">
                        <a href="{{ route('contact.show', $msg->id) }}"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 text-sm rounded shadow">
                            📄 Bekijk
                        </a>

                        <form action="{{ route('contact.destroy', $msg->id) }}" method="POST"
                            onsubmit="return confirm('Weet je zeker dat je dit bericht wilt verwijderen?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 text-sm rounded shadow">
                                🗑️ Verwijder
                            </button>
                        </form>
                    </div>
                </div>

                <div class="mt-4 border-t pt-4 text-gray-700">
                    {{ Str::limit($msg->message, 200) }}
                </div>
            </div>
        @empty
            <div class="bg-yellow-50 border-l-4 border-yellow-400 text-yellow-800 p-4 rounded">
                Er zijn nog geen berichten binnengekomen.
            </div>
        @endforelse
    </div>
@endsection