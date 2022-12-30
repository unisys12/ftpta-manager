<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $events = Event::all();

        $result = [];

        foreach ($events as $event) {
            array_push(
                $result,
                [
                    'title' => $event->title,
                    'start' => $event->start,
                    'end' => $event->end,
                    'url' => route('events.show', $event->id),
                    'editable' => $event->editable,
                    'overlap' => $event->overlap,
                    'backgroundColor' => $event->service->service_category->backgroundColor,
                    'borderColor' => $event->service->service_category->borderColor,
                    'textColor' => $event->service->service_category->textColor
                ]
            );
        }

        return view('dashboard', ['events' => $result]);
    }
}
