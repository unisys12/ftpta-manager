<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Price Increments') }}
        </h2>
        {{-- <Link href="{{ route('price_increments.create') }}">Add Price Increment</Link> --}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-splade-form action="{{ route('price_increments.update', $price_increment) }}" method="PUT"
                :default="$price_increment" class="max-w-2xl space-y-6">
                <x-splade-input label="Increment Name" name="inc_name" />
                <x-splade-input label="Increment Short Name" name="inc_short_name" />
                <x-splade-submit class="mt-4">Submit</x-splade-submit>
            </x-splade-form>
        </div>
    </div>
</x-app-layout>
