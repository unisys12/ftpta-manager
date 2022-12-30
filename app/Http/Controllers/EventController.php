<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Canine;
use App\Models\Service;
use App\Models\ServiceCategory;
use ProtoneMedia\Splade\Facades\Toast;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('event.index', ['events' => \App\Tables\Events::class]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create', [
            'services' => Service::pluck('name', 'id'),
            'canines' => Canine::pluck('name', 'id'),
            'users' => User::pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        $data = $request->validated();

        Event::create([
            "allDay" => $data['allDay'],
            "start" => $data['start'],
            "end" => $data['end'],
            "title" => $data['title'],
            "url" => $data['url'],
            "editable" => $data['editable'],
            "overlap" => $data['overlap'],
            'service_id' => $data['service_id'],
            "canine_id" => $data['canine_id'],
            "user_id" => $data['user_id'],
        ]);

        Toast::success("The event for {$data['title']} was added to the schedule.")->autoDismiss(5);

        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('event.show', ['event' => Event::find($event->id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('event.edit', [
            'event' => Event::find($event->id),
            'service' => Service::pluck('name', 'id'),
            'canines' => Canine::pluck('name', 'id'),
            'users' => User::pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $local = Event::find($event->id);

        $local->allDay = $request->allDay;
        $local->start = $request->start;
        $local->end = $request->end;
        $local->title = $request->title;
        $local->url = $request->url;
        $local->editable = $request->editable;
        $local->overlap = $request->overlap;
        $local->service_id = $request->service_id;
        $local->canine_id = $request->canine_id;
        $local->user_id = $request->user_id;

        $local->save();

        Toast::success("{$local->title} was updated on the schedule")->autoDismiss(5);

        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        Event::destroy(Event::find($event->id));

        Toast::warning("{$event->title} has been deleted from the schedule.");

        return redirect()->route('events.index');
    }
}
