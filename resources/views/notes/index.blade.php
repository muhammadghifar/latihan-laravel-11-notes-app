<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse ($notes as $note)
                <div class="text-white my-4 p-4 bg-gray-800 border-2 border-gray-200 shadow-lg rounded-lg">
                    <h2 class="text-2xl font-bold">
                        {{ $note->title }}
                    </h2>
                    <p>
                        {{ $note->text }}
                    </p>
                    <span class="text-sm text-gray-400">{{ $note->updated_at->diffForHumans() }}</span>
                </div>

                @empty
                <p class="text-white text-center">Catatan tidak tersedia</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
