<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-white my-4 p-4 bg-gray-800 border-2 border-gray-200 shadow-lg rounded-lg">
                {{-- @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach --}}

                <form action="{{ route('notes.store') }}" method="post">
                    @csrf
                    <x-text-input type="text" name="title" field="title" placeholder="Judul" class="w-full" :value="@old('title')" />
                    <x-textarea name="text" rows="10" field="text" placeholder="Isi catatanmu disini..." class="w-full mt-4" :value="@old('text')"></x-textarea>
                    <x-primary-button class="mt-4">Simpan Catatan</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
