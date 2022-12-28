<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <Link href="{{ route('events.index') }}">{{ __('Events') }}</Link>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-splade-form action="{{ route('events.update', $event) }}" method="PUT" :default="$event"
                class="max-w-2xl space-y-6">
                <x-splade-checkbox name="allDay" label="All Day Event" />
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
                <x-splade-select name="service_id" label="Service" :options="$services" />
                <div class="flex justify-between">
                    <section>
                        <x-splade-select label="Canine" name="canine_id" :options="$canines" />
                        <span class="text-sm font-thin">If there is a canine related to this event, select them from the
                            list.</span>
                    </section>
                    <section>
                        <x-splade-select label="User" name="user_id" :options="$users" />
                        <span class="text-sm font-thin">If there is a user related to this event, select them from the
                            list.</span>
                    </section>
                </div>
                <x-splade-submit class="mt-4">Submit</x-splade-submit>
            </x-splade-form>
        </div>
    </div>
</x-app-layout>
