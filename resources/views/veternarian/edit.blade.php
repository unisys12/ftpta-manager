<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Veternarians') }}
        </h2>
        <nav class="flex space-x-2">
            <Link href="{{ route('veternarians.create') }}">Add Veternarian</Link>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-splade-form action="{{ route('veternarians.update', $veternarian) }}" method="PUT" :default="$veternarian"
                class="max-w-2xl space-y-6">
                <x-splade-input name="business_name" label="Business Name" />
                <x-splade-input name="vet_name" label="Primary Vets Name" />
                <x-splade-input name="address" label="Address" />
                <x-splade-input name="city" label="City" />
                <x-splade-input name="state" label="State" />
                <x-splade-input name="zip" label="Zipcode" />
                <x-splade-input name="phone" label="Business Phone" />
                <x-splade-input name="email" label="Business Email" />
                <x-splade-submit class="mt-4">Submit</x-splade-submit>
            </x-splade-form>
        </div>
    </div>
</x-app-layout>
