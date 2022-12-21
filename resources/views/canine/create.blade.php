<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Canines') }}
        </h2>
        <nav class="flex">
            <Link href="{{ route('canines.create') }}">Add Canine</Link>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-splade-form action="{{ route('canines.store') }}" method="POST" class="max-w-2xl space-y-6">
                <x-splade-input name="name" label="Name" />
                <x-splade-file name="profile_image" filepond preview accept="image/jpg" label="Profile Image" />
                <x-splade-select class="py-4" name="breed_id" :options="App\Models\Breed::pluck('name', 'id')" label="Breed" choices />
                <x-splade-select class="py-4" name="user_id" :options="App\Models\User::pluck('name', 'id')" label="Client" />
                <x-splade-submit class="mt-4">Submit</x-splade-submit>
            </x-splade-form>
        </div>
    </div>
</x-app-layout>
