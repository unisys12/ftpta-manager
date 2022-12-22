<?php

namespace App\Http\Controllers;

use App\Models\PriceIncrement;
use ProtoneMedia\Splade\Facades\Toast;
use App\Http\Requests\StorePriceIncrementRequest;
use App\Http\Requests\UpdatePriceIncrementRequest;

class PriceIncrementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('price_increments.index', ['price_increments' => \App\Tables\PriceIncrements::class]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('price_increments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePriceIncrementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePriceIncrementRequest $request)
    {

        PriceIncrement::create([
            'inc_name' => $request->inc_name,
            'inc_short_name' => $request->inc_short_name
        ]);

        Toast::success("{$request->inc_name} was added as a new Price Increment!");

        return redirect()->route('price_increments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PriceIncrement  $priceIncrement
     * @return \Illuminate\Http\Response
     */
    public function show(PriceIncrement $priceIncrement)
    {
        return view('price_increments.show', ['price_increment' => PriceIncrement::find($priceIncrement->id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PriceIncrement  $priceIncrement
     * @return \Illuminate\Http\Response
     */
    public function edit(PriceIncrement $priceIncrement)
    {
        return view('price_increments.edit', ['price_increment' => PriceIncrement::find($priceIncrement->id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePriceIncrementRequest  $request
     * @param  \App\Models\PriceIncrement  $priceIncrement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePriceIncrementRequest $request, PriceIncrement $priceIncrement)
    {
        $local = PriceIncrement::find($priceIncrement->id);

        $data = $request->validated();

        $local->inc_name = $data['inc_name'];
        $local->inc_short_name = $data['inc_short_name'];

        $local->save();

        Toast::success("{$request->inc_name} was updated!")->autoDismiss(5);

        return redirect()->route('price_increments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PriceIncrement  $priceIncrement
     * @return \Illuminate\Http\Response
     */
    public function destroy(PriceIncrement $priceIncrement)
    {
        PriceIncrement::destroy($priceIncrement->id);

        Toast::warning("{$priceIncrement->inc_name} was updated!");

        return redirect()->route('price_increments.index');
    }
}
