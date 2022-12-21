<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Canines') }}
        </h2>
        <Link href="{{ route('canines.create') }}">Add Canine</Link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-splade-table :for="$canines">
                @cell('profile_image', $canine)
                    @if ($canine->profile_image)
                        <span class="flex justify-center">
                            <img src="{{ asset('/storage/' . $canine->profile_image) }}" alt="profile image"
                                class="rounded-full h-20">
                        </span>
                    @endif
                @endcell
                @cell('action', $canine)
                    <Link href="{{ route('canines.destroy', $canine) }}" class="font-bold text-red-500 hover:text-red-600"
                        confirm="You are about to delete {{ $canine->name }} from the database!"
                        confirm-text="Are you sure? This cannot be undone!" confirm-button="Yes" cancel-button="No">
                    Delete</Link>
                @endcell
            </x-splade-table>
        </div>
    </div>
</x-app-layout>
