<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <Link href="{{ route('service.index') }}">{{ __('Services') }}</Link>
        </h2>
        <Link href="{{ route('service.create') }}">Add Service</Link>
        <Link href="{{ route('service.edit', $service) }}">Edit Service</Link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{ $service }}
        </div>
    </div>
</x-app-layout>
