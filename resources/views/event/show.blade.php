<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <Link href="{{ route('events.index') }}">{{ __('Events') }}</Link>
        </h2>
        <nav class="flex space-x-4 mt-[0.5px]">
            <Link href="{{ route('events.create') }}">Add Event</Link>
            <Link confirm-button="Edit" href="{{ route('events.edit', $event) }}">Edit</Link>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <pre><code>{{ $event }}</code></pre>
        </div>
    </div>
</x-app-layout>
