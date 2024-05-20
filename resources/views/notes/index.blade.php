<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a 
                href="{{ route('notes.create') }}"
                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
            >
                + Buat Catatan
            </a>

            @forelse ($notes as $note)
                <div class="text-white my-4 p-4 bg-gray-800 border-2 border-gray-200 shadow-lg rounded-lg">
                    <h2 class="text-2xl font-bold">
                        {{ $note->title }}
                    </h2>
                    <p>
                        {{ Str::limit($note->text, 150) }}
                    </p>
                    <span class="text-sm text-gray-400">{{ $note->updated_at->diffForHumans() }}</span>
                </div>

            @empty
                <p class="text-white text-center">Catatan tidak tersedia</p>
            @endforelse

            {{ $notes->links() }}
        </div>
    </div>
</x-app-layout>
