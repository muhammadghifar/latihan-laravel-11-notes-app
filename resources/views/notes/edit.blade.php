<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-4 p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('notes.update', $note) }}" method="post">
                    @method('put')
                    @csrf
                    <input type="text" name="title" placeholder="Title" class="w-full" value="{{@old('title', $note->title)}}">
                    @error('title')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror

                    <textarea name="description" rows="10" placeholder="Type your description..." class="w-full mt-4">{{@old('description', $note->description)}}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror

                    <x-primary-button class="mt-4">Save Notes</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
