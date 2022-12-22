<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Price Increments') }}
        </h2>
        <Link href="{{ route('price_increments.create') }}">Add Price Increment</Link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-splade-table :for="$price_increments">
                @cell('action', $price_increment)
                    <Link href="{{ route('price_increments.destroy', $price_increment) }}"
                        class="font-bold text-red-500 hover:text-red-600"
                        confirm="You are about to delete {{ $price_increment->name }} from the database!"
                        confirm-text="Are you sure? This cannot be undone!" confirm-button="Yes" cancel-button="No">
                    Delete</Link>
                @endcell
            </x-splade-table>
        </div>
    </div>
</x-app-layout>
