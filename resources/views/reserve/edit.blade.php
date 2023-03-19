<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blocked Days') }}
        </h2>
        <Link href="{{ route('reserves.create') }}">Add Blocked Day</Link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-splade-form action="{{ route('reserves.update', $reserf) }}" method="PUT" :default="$reserf"
                class="max-w-2xl space-y-6">
                <x-splade-checkbox name="allDay" label="Block off entire day?" />
                <section class="flex justify-between">
                    <x-splade-input name="start" label="Start Date & Time" date time />
                    <x-splade-input name="end" label="End Date & Time" date time />
                </section>
                <section>
                    <x-splade-input name="title" label="Title" />
                    <span class="text-sm font-thin">This title will be displayed on the calendar of the event.</span>
                </section>
                <section>
                    <x-splade-input name="url" label="URL" />
                    <span class="text-sm font-thin">A URL that will be
                        visited when this event is clicked by the user.</span>
                </section>
                <div class="flex justify-between">
                    <section>
                        <x-splade-checkbox name="editable" label="Editable" />
                        <span class="text-sm font-thin">Can this event be edited later?</span>
                    </section>
                    <section>
                        <x-splade-checkbox name="overlap" label="Overlap" />
                        <span class="text-sm font-thin">Can this event overlap with another event?</span>
                    </section>
                </div>
                <x-splade-submit class="mt-4">Submit</x-splade-submit>
            </x-splade-form>
        </div>
    </div>
</x-app-layout>
