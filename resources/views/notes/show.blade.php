<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="py-4 bg-green-200 border border-green-200 text-green-600 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-between">
                <h1 class="font-bold text-2xl">Detail Notes</h1>

                <div>
                    <x-primary-button onclick="window.location='{{ route('notes.edit', $note) }}'">Edit Note</x-primary-button>

                    <form action="{{ route('notes.destroy', $note) }}" method="post">
                        @method('delete')
                        @csrf
                        <x-danger-button onclick="return confirm('Are you sure you wish to delete this note?')">Delete Note</x-danger-button>
                    </form>
                </div>
            </div>

            <div class="my-4 p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="text-gray-900 text-2xl font-bold">
                    {{ $note->title }}
                </h2>
                <p class="text-gray-900 pt-4">
                    {{ $note->description }}
                </p>
                <p class="pt-4">Created At: {{ $note->created_at->diffForHumans() }}</p>
                <p>Updated At: {{ $note->updated_at->diffForHumans() }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
