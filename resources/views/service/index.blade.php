<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <Link href="{{ route('service.index') }}">{{ __('Services') }}</Link>
        </h2>
        <Link href="{{ route('service.create') }}">Add Service</Link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-splade-table :for="$services">
                @cell('img_path', $service)
                    <span class="flex justify-center">
                        <img src="{{ asset('/storage/' . $service->img_path) }}" alt="service image" class="rounded-full h-10">
                    </span>
                @endcell
                @cell('action', $service)
                    <Link href="{{ route('service.destroy', $service) }}" class="font-bold text-red-500 hover:text-red-600"
                        confirm="You are about to delete {{ $service->name }} from the database!"
                        confirm-text="Are you sure? This cannot be undone!" confirm-button="Yes" cancel-button="No">
                    Delete</Link>
                @endcell
            </x-splade-table>
        </div>
    </div>
</x-app-layout>
