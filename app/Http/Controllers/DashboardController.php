<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class DashboardController extends Controller
{
    /**
     * Gathers all events and blocked days and
     * prepares them for display on the Dashboard
     * calendar.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $events = Event::all();
        $reserved = Reserve::all();

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

        foreach ($reserved as $res) {
            array_push(
                $result,
                [
                    'title' => $res->title,
                    'title' => $res->title,
                    'start' => $res->start,
                    'end' => $res->end,
                    'url' => route('reserves.show', $res->id),
                    'editable' => $res->editable,
                    'backgroundColor' => '#991a1a',
                    'borderColor' => '#190404',
                    'textColor' => '#ffffff'
                ]
            );
        }

        return view('dashboard', ['events' => $result]);
    }
}
