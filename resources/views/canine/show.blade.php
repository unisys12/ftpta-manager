<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Canines') }}
        </h2>
        <nav class="flex space-x-4 mt-[0.5px]">
            <Link href="{{ route('canines.create') }}">Add Canine</Link>
            <Link confirm-button="Edit" href="{{ route('canines.edit', $canine) }}">Edit</Link>
        </nav>
    </x-slot>

    <x-splade-modal>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                {{-- Profile Card --}}
                <div class="flex justify-center">
                    <div class="flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white shadow-lg">
                        <img class=" w-full h-96 md:h-auto object-cover md:w-48 rounded-t-lg md:rounded-none md:rounded-l-lg"
                            src="{{ asset('storage/' . $canine->profile_image) }}"
                            alt="{{ $canine->name }}'s prifile image" />
                        <div class="p-6 flex flex-col justify-start">
                            <h5 class="text-gray-900 text-xl font-medium mb-2">{{ $canine->name }}</h5>
                            <section class="text-gray-700 text-base mb-4">
                                <ul class="space-y-2">
                                    <li>
                                        <span class="font-bold">Breed: </span>{{ $canine->breed->name }}
                                    </li>
                                    <li>
                                        <span class="font-bold">Owner: </span>{{ $canine->user->name }}
                                    </li>
                                    <li>
                                        <span class="font-bold">Date Entered: </span>{{ $canine->created_at }}
                                    </li>
                                    <li>
                                        <span class="font-bold">Veternarian:
                                        </span>{{ $canine->veternarian->business_name }}
                                    </li>
                                </ul>
                            </section>
                            <p class="text-gray-600 text-xs">Last updated
                                {{ $canine->updated_at->diffInDays($canine->created_at) }} days ago
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Profile Card --}}
        </div>
    </x-splade-modal>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-splade-toggle data="owner, documents, breed, veternarian, breeder">
                <ul class="flex flex-wrap border-b border-gray-200">
                    <li @click.prevent="setToggle('owner', true)" @click.prevent="setToggle('documents', false)"
                        @click.prevent="setToggle('breed', false)" @click.prevent="setToggle('veternarian', false)"
                        @click.prevent="setToggle('breeder', false)" class="mr-2">
                        <span
                            class="inline-block text-gray-500 hover:text-gray-600 hover:bg-gray-50 rounded-t-lg py-4 px-4 text-sm font-medium text-center">
                            Owner</span>
                    </li>
                    <li @click.prevent="setToggle('owner', false)" @click.prevent="setToggle('documents', true)"
                        @click.prevent="setToggle('breed', false)" @click.prevent="setToggle('veternarian', false)"
                        @click.prevent="setToggle('breeder', false)" class="mr-2">
                        <span
                            class="inline-block text-gray-500 hover:text-gray-600 hover:bg-gray-50 rounded-t-lg py-4 px-4 text-sm font-medium text-center">
                            Documents</span>
                    </li>
                    <li @click.prevent="setToggle('owner', false)" @click.prevent="setToggle('breed', true)"
                        @click.prevent="setToggle('veternarian', false)" @click.prevent="setToggle('breeder', false)"
                        @click.prevent="setToggle('documents', false)" class="mr-2">
                        <span
                            class="inline-block text-gray-500 hover:text-gray-600 hover:bg-gray-50 rounded-t-lg py-4 px-4 text-sm font-medium text-center">
                            Breed</span>
                    </li>
                    <li @click.prevent="setToggle('owner', false)" @click.prevent="setToggle('veternarian', true)"
                        @click.prevent="setToggle('documents', false)" @click.prevent="setToggle('breed', false)"
                        @click.prevent="setToggle('breeder', false)" class="mr-2">
                        <span
                            class="inline-block text-gray-500 hover:text-gray-600 hover:bg-gray-50 rounded-t-lg py-4 px-4 text-sm font-medium text-center">
                            Veternarian</span>
                    </li>
                    <li @click.prevent="setToggle('owner', false)" @click.prevent="setToggle('breeder', true)"
                        @click.prevent="setToggle('documents', false)" @click.prevent="setToggle('breed', false)"
                        @click.prevent="setToggle('veternarian', false)" class="mr-2">
                        <span
                            class="inline-block text-gray-500 hover:text-gray-600 hover:bg-gray-50 rounded-t-lg py-4 px-4 text-sm font-medium text-center">
                            Breeder</span>
                    </li>
                </ul>
                <x-splade-transition show="owner">
                    <section class="pl-2 md:pl-0" v-show="owner" id="owner">
                        <h3 class="text-1xl font-bold">Owner Information</h3>
                        <div>
                            @if (!$canine->user)
                                <p>No User to display for {{ $canine->name }}</p>
                            @else
                                <p>{{ $canine->user->name }}</p>
                            @endif
                        </div>
                    </section>
                </x-splade-transition>
                <x-splade-transition show="documents">
                    <section class="pl-2 md:pl-0" v-show="documents" id="documents">
                        <h3 class="text-1xl font-bold">Documents</h3>
                        <div>
                            @if (!$canine->documents)
                                <p>No Documents to display for {{ $canine->name }}</p>
                            @else
                                <p>List of documents</p>
                            @endif
                        </div>
                    </section>
                </x-splade-transition>
                <x-splade-transition show="breed">
                    <section class="pl-2 md:pl-0" v-show="breed" id="breed">
                        <h3 class="text-1xl font-bold">Breed</h3>
                        <div>
                            <p>{{ $canine->breed->name }}</p>
                        </div>
                    </section>
                </x-splade-transition>
                <x-splade-transition show="veternarian">
                    <section class="pl-2 md:pl-0" v-show="veternarian" id="veternarians">
                        <h3 class="text-1xl font-bold">Veternarian</h3>
                        <div>
                            @if (!$canine->veternarian)
                                <p>No Vet on record for {{ $canine->name }}</p>
                            @else
                                <p>{{ $canine->veternarian->business_name }}</p>
                            @endif
                        </div>
                    </section>
                </x-splade-transition>
                <x-splade-transition show="breeder">
                    <section class="pl-2 md:pl-0" v-show="breeder" id="breeder">
                        <h3 class="text-1xl font-bold">Breeder</h3>
                        <div>
                            @if (!$canine->documents)
                                <p>No breeder on record for {{ $canine->name }}</p>
                            @else
                                <p>{{ $canine->breeder->business_name }}</p>
                            @endif
                        </div>
                    </section>
                </x-splade-transition>
            </x-splade-toggle>
        </div>
    </div>
</x-app-layout>
