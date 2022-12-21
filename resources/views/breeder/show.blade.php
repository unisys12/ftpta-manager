<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Breeders') }}
        </h2>
        <nav class="flex space-x-4 mt-[0.5px]">
            <Link href="{{ route('breeders.create') }}">Add Breeder</Link>
            <Link confirm-button="View" href="{{ route('breeders.show', $breeder) }}">View</Link>
            <Link confirm-button="Edit" href="{{ route('breeders.edit', $breeder) }}">Edit</Link>
        </nav>
    </x-slot>

    <x-splade-modal>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <pre>{{ $breeder }}</pre>
            </div>
        </div>

    </x-splade-modal>
</x-app-layout>
