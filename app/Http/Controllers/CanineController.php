<?php

namespace App\Http\Controllers;

use App\Models\Canine;
use App\Http\Requests\StoreCanineRequest;
use App\Http\Requests\UpdateCanineRequest;
use ProtoneMedia\Splade\Facades\Toast;

class CanineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('canine.index', [
            'canines' => \App\Tables\Canines::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('canine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCanineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCanineRequest $request)
    {
        $canine = Canine::create([
            'name' => $request->name,
            'breed_id' => $request->breed_id,
            'user_id' => $request->user_id,
            'veternarian_id' => $request->veternarian_id,
            'profile_image' => $request->profile_image->store('profiles'),
        ]);

        Toast::title("{$canine->name}'s profile was created!")
            ->autoDismiss(5);;

        return redirect()->route('canines.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Canine  $canine
     * @return \Illuminate\Http\Response
     */
    public function show(Canine $canine)
    {
        return view('canine.show', ['canine' => $canine]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Canine  $canine
     * @return \Illuminate\Http\Response
     */
    public function edit(Canine $canine)
    {
        return view('canine.edit', ['canine' => $canine]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCanineRequest  $request
     * @param  \App\Models\Canine  $canine
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCanineRequest $request, Canine $canine)
    {
        $local = Canine::find($canine->id);
        $local->name = $request->name;
        $local->breed_id = $request->breed_id;
        $local->user_id = $request->user_id;
        $local->veternarian_id = $request->veternarian_id;
        $local->profile_image = $request->profile_image->store('profiles');

        $local->save();

        Toast::title("{$local->name}'s profile was updated!")
            ->autoDismiss(5);;

        return redirect()->route('canines.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Canine  $canine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Canine $canine)
    {
        Canine::destroy($canine);

        Toast::warning("{$canine->name} was deleted!")
            ->autoDismiss(5);

        return redirect()->route('canines.index');
    }
}
