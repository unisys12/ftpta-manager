<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <Link href="{{ route('service.index') }}">{{ __('Services') }}</Link>
        </h2>
        <nav class="flex space-x-4">
            <Link href="{{ route('service.create') }}">Add Service</Link>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-splade-form action="{{ route('service.update', $service) }}" :default="$service" method="PUT"
                class="max-w-2xl space-y-6">
                <x-splade-file name="img_path" filepond preview accept="image/*" label="Service Image" />
                <x-splade-input name="name" label="Name" />
                <x-splade-input name="description" label="Description" />
                <x-splade-select class="py-4" name="service_category_id" :options="App\Models\ServiceCategory::pluck('name', 'id')" label="Service Category"
                    choices />
                <x-splade-input name="price" label="Price" type="number" min="0" />
                <x-splade-select class="py-4" name="price_increment_id" :options="App\Models\PriceIncrement::pluck('inc_name', 'id')" label="Rate/Increment" />
                <x-splade-submit class="mt-4">Update</x-splade-submit>
            </x-splade-form>
        </div>
    </div>
</x-app-layout>
