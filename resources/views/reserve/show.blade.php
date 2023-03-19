<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blocked Days') }}
        </h2>
        <Link href="{{ route('reserves.create') }}">Add Blocked Day</Link>
        <Link href="{{ route('reserves.edit', $reserf) }}">Edit Blocked Day</Link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{ $reserf }}
        </div>
    </div>
</x-app-layout>
