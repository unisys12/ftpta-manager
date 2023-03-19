<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use ProtoneMedia\Splade\Facades\Toast;
use App\Http\Requests\StoreReserveRequest;
use App\Http\Requests\UpdateReserveRequest;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reserve.index', ['reserves' => \App\Tables\Reserves::class]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reserve.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReserveRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReserveRequest $request)
    {
        $data = $request->validated();

        Reserve::create([
            "allDay" => $data['allDay'],
            "start" => $data['start'],
            "end" => $data['end'],
            "title" => $data['title'],
            "url" => $data['url'],
            "editable" => $data['editable'] ?? 0
        ]);

        Toast::success("A blocked day for {$data['title']} was added to the schedule.")->autoDismiss(5);

        return redirect()->route('reserves.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function show(Reserve $reserf)
    {
        return view('reserve.show', ['reserf' => $reserf]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserve $reserf)
    {
        return view('reserve.edit', compact('reserf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReserveRequest  $request
     * @param  \App\Models\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReserveRequest $request, Reserve $reserve)
    {
        $local = Reserve::find($reserve->id);

        $local->allDay = $request->allDay;
        $local->start = $request->start;
        $local->end = $request->end;
        $local->title = $request->title;
        $local->url = $request->url;
        $local->editable = $request->editable;

        $local->save();

        Toast::success("A bloked day for {$reserve->title} was updated on the schedule.")->autoDismiss(5);

        return redirect()->route('reserves.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserve $reserve)
    {
        $reserve->destroy($reserve->id);

        return redirect()->route('reserves.index');
    }
}
