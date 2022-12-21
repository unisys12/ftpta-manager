<?php

namespace App\Http\Controllers;

use App\Models\Veternarian;
use App\Http\Requests\StoreVeternarianRequest;
use App\Http\Requests\UpdateVeternarianRequest;
use ProtoneMedia\Splade\Facades\Toast;

class VeternarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('veternarian.index', ['veternarians' => \App\Tables\Veternarians::class]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('veternarian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVeternarianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVeternarianRequest $request)
    {
        $data = $request->validated();

        $vet = Veternarian::create([
            'business_name' => $data['business_name'],
            'vet_name' => $data['vet_name'],
            'address' => $data['address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zip' => $data['zip'],
            'phone' => $data['phone'],
            'email' => $data['email'],
        ]);

        Toast::success("{$vet->business_name} was created successfully!");

        return redirect()->route('veternarians.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Veternarian  $veternarian
     * @return \Illuminate\Http\Response
     */
    public function show(Veternarian $veternarian)
    {
        return view('veternarian.show', ['veternarian' => $veternarian]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Veternarian  $veternarian
     * @return \Illuminate\Http\Response
     */
    public function edit(Veternarian $veternarian)
    {
        return view('veternarian.edit', ['veternarian' => $veternarian]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVeternarianRequest  $request
     * @param  \App\Models\Veternarian  $veternarian
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVeternarianRequest $request, Veternarian $veternarian)
    {
        $local = Veternarian::find($veternarian->id);

        $local->business_name = $request->business_name;
        $local->contact_name = $request->contact_name;
        $local->address = $request->address;
        $local->city = $request->city;
        $local->state = $request->state;
        $local->zip = $request->zip;
        $local->phone = $request->phone;
        $local->email = $request->email;

        $local->save();

        Toast::success('Veternarian Profile was updated successfully!');

        return redirect()->route('veternarians.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Veternarian  $veternarian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Veternarian $veternarian)
    {
        Veternarian::destroy($veternarian->id);
        Toast::warning("{$veternarian->business_name} was deleted!")
            ->autoDismiss(5);

        return redirect()->route('veternarians.index');
    }
}
