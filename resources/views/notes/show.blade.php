<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-white my-4 p-4 bg-gray-800 border-2 border-gray-200 shadow-lg rounded-lg">
                <h2 class="text-4xl font-bold">
                    {{ $note->title }}
                </h2>
                <p class="my-4">
                    {{ $note->text }}
                </p>
                <p class="text-xs text-gray-400">Created: {{ $note->created_at->diffForHumans() }}</p>
                <p class="text-xs text-gray-400">Updated: {{ $note->updated_at->diffForHumans() }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
