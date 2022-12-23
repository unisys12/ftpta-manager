<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <Link href="{{ route('service_category.index') }}">{{ __('Service Categories') }}</Link>
        </h2>
        <Link href="{{ route('service_category.create') }}">Add Service Category</Link>
        <Link href="{{ route('service_category.edit', $service_category) }}">Edit Service Category</Link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{ $service_category }}
        </div>
    </div>
</x-app-layout>
