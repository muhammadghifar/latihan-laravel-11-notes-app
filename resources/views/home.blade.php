<x-base>
    <x-slot name="name">
        {{ $name }}
    </x-slot>

    <x-slot name="content">
        <h1>Hello {{ $name }}!</h1>

        @if ($name == 'John')
            <h3>
                Admin
            </h3>
        @else
            <h3>
                User
            </h3>
        @endif
    </x-slot>
</x-base>
