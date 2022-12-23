<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <Link href="{{ route('service_category.index') }}">{{ __('Service Categories') }}</Link>
        </h2>
        <Link href="{{ route('service_category.create') }}">Add Service Category</Link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-splade-form action="{{ route('service_category.store') }}" method="PUT" class="max-w-2xl space-y-6"
                :default="$service_category">
                <x-splade-input label="Category Name" name="name" />
                <x-splade-input label="Category Description" name="description" />
                <h2>Event Settings</h2>
                <x-splade-input label="Default Event Background Color" name="backgroundColor" type="color" />
                <x-splade-input label="Default Event Border Color" name="borderColor" type="color" />
                <x-splade-input label="Default Event Text Color" name="textColor" type="color" />
                <x-splade-submit class="mt-4">Submit</x-splade-submit>
            </x-splade-form>
        </div>
    </div>
</x-app-layout>
