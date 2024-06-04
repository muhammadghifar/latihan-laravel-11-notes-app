<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="py-4 bg-green-400 border border-green-200 text-green-700 rounded-md">
                    {{ session('success') }}
                </div>
            @endif
            
            <a href="{{ route('notes.create') }}">
                + Add notes
            </a>

            @forelse ($notes as $note)
            <div class="my-4 p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="text-gray-900 text-2xl font-bold">
                    {{ $note->title }}
                </h2>
                <p class="text-gray-900">
                    {{ $note->description }}
                </p>
                <p>{{ $note->updated_at->diffForHumans() }}</p>
                <a href="{{ route('notes.show', $note->id) }}" class="text-blue-600 cursor-pointer hover:underline">Lihat Detail</a>
            </div>

            @empty
            <p class="text-center">Notes is empty</p>

            @endforelse

            {{ $notes->links() }}
        </div>
    </div>
</x-app-layout>
