<?php

namespace App\Http\Controllers;

use App\Models\Breeder;
use ProtoneMedia\Splade\Facades\Toast;
use App\Http\Requests\StoreBreederRequest;
use App\Http\Requests\UpdateBreederRequest;

class BreederController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('breeder.index', ['breeders' => \App\Tables\Breeders::class]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('breeder.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBreederRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBreederRequest $request)
    {
        $data = $request->validated();

        $vet = Breeder::create([
            'business_name' => $data['business_name'],
            'contact_name' => $data['contact_name'],
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
     * @param  \App\Models\Breeder  $breeder
     * @return \Illuminate\Http\Response
     */
    public function show(Breeder $breeder)
    {
        return view('breeder.show', ['breeder' => $breeder]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Breeder  $breeder
     * @return \Illuminate\Http\Response
     */
    public function edit(Breeder $breeder)
    {
        return view('breeder.edit', ['breeder' => $breeder]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBreederRequest  $request
     * @param  \App\Models\Breeder  $breeder
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBreederRequest $request, Breeder $breeder)
    {
        $local = Breeder::find($breeder->id);

        $local->business_name = $request->business_name;
        $local->contact_name = $request->contact_name;
        $local->address = $request->address;
        $local->city = $request->city;
        $local->state = $request->state;
        $local->zip = $request->zip;
        $local->phone = $request->phone;
        $local->email = $request->email;

        $local->save();

        Toast::success('Breeder Profile was updated successfully!');

        return redirect()->route('breeders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Breeder  $breeder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Breeder $breeder)
    {
        Breeder::destroy($breeder->id);

        Toast::warning("Breeder {$breeder->name} was removed!")->autoDismiss(5);

        return redirect()->route('breeders.index');
    }
}
