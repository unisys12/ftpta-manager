<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <Link href="{{ route('service_category.index') }}">{{ __('Service Categories') }}</Link>
        </h2>
        <Link href="{{ route('service_category.create') }}">Add Service Category</Link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-splade-table :for="$service_categories">
                @cell('action', $service_category)
                    <Link href="{{ route('service_category.destroy', $service_category) }}"
                        class="font-bold text-red-500 hover:text-red-600"
                        confirm="You are about to delete {{ $service_category->name }} from the database!"
                        confirm-text="Are you sure? This cannot be undone!" confirm-button="Yes" cancel-button="No">
                    Delete</Link>
                @endcell
            </x-splade-table>
        </div>
    </div>
</x-app-layout>
