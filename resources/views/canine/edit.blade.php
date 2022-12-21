<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Canines') }}
        </h2>
        <Link href="{{ route('canines.create') }}">Add Canine</Link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-splade-form action="{{ route('canines.update', $canine) }}" method="PUT" :default="$canine"
                class="max-w-2xl space-y-6">
                <x-splade-input name="name" label="Name" />
                <x-splade-file name="profile_image" filepond preview label="Profile Image" />
                <x-splade-input name="remote_url" label="Remote URL" />
                <button @click.prevent="form.$addFile('avatar', form.remote_url)"
                    class="border px-2 py-2 rounded mt-2 bg-indigo-300 hover:bg-indigo-400 transition-colors duration-300 ease-in-out">
                    Add from Remote URL
                </button>
                <x-splade-select class="py-4" name="breed_id" :options="App\Models\Breed::pluck('name', 'id')" label="Breed" />
                <x-splade-select class="py-4" name="user_id" :options="App\Models\User::pluck('name', 'id')" label="Client" />
                <x-splade-select class="py-4" name="veternarian_id" :options="App\Models\Veternarian::pluck('business_name', 'id')" label="Veternarian" />
                <x-splade-submit class="mt-4">Update</x-splade-submit>
            </x-splade-form>
        </div>
    </div>
</x-app-layout>
