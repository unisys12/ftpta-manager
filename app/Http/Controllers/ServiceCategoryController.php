<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use App\Http\Requests\StoreServiceCategoryRequest;
use App\Http\Requests\UpdateServiceCategoryRequest;
use ProtoneMedia\Splade\Facades\Toast;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('service_category.index', ['service_categories' => \App\Tables\ServiceCategories::class]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceCategoryRequest $request)
    {
        $data = $request->validated();

        ServiceCategory::create([$data]);

        Toast::success("{$data['name']} has been added as a new Service Category!")->autoDismiss(5);

        return redirect()->route('service_category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceCategory $serviceCategory)
    {
        return view('service_category.show', ['service_category' => ServiceCategory::find($serviceCategory->id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceCategory $serviceCategory)
    {
        $local = ServiceCategory::find($serviceCategory->id);

        return view('service_category.edit', ['service_category' => ServiceCategory::find($serviceCategory->id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceCategoryRequest  $request
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceCategoryRequest $request, ServiceCategory $serviceCategory)
    {
        $local = ServiceCategory::find($serviceCategory->id);
        $data = $serviceCategory->validated();

        $local->name = $data['name'];
        $local->description = $data['description'];
        $local->backgroundColor = $data['backgroundColor'];
        $local->borderColor = $data['borderColor'];
        $local->textColor = $data['textColor'];

        $local->save();

        Toast::success("{$local->name} has been updated!")->autoDismiss(5);

        return redirect()->route('service_category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceCategory $serviceCategory)
    {
        ServiceCategory::destroy($serviceCategory->id);

        Toast::warning("{$serviceCategory->name} has been removed!")->autoDismiss(5);

        return redirect()->route('service_category.index');
    }
}
