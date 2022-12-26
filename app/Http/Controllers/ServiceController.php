<?php

namespace App\Http\Controllers;

use App\Models\Service;
use ProtoneMedia\Splade\Facades\Toast;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use ProtoneMedia\Splade\FileUploads\ExistingFile;
use ProtoneMedia\Splade\FileUploads\HandleSpladeFileUploads;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('service.index', ['services' => \App\Tables\Services::class]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        $data = $request->validated();

        Service::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'service_category_id' => $data['service_category_id'],
            'price' => $data['price'],
            'price_increment_id' => $data['price_increment_id'],
            'img_path' => $data['img_path']->store('service')
        ]);

        Toast::success("{$data['name']} was added as a new service!")->autoDismiss(5);

        return redirect()->route('service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('service.show', ['service' => Service::find($service->id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $img_path = ExistingFile::fromDisk('public')->get($service->img_path);
        return view('service.edit', ['service' => Service::find($service->id), 'img_path' => $img_path]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $data = $request->validated();
        $local = Service::find($service->id);
        $img = HandleSpladeFileUploads::forRequest($request);

        dd($img);

        $local->name = $data['name'];
        $local->description = $data['description'];
        $local->service_category_id = $data['service_category_id'];
        $local->price = $data['price'];
        $local->price_increment_id = $data['price_increment_id'];
        // $local->img_path = $request->;

        $local->save();

        Toast::success("Service was successfully updated")->autoDismiss(5);

        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        Service::destroy($service->id);

        Toast::warning("{$service->name} was deleted from the database!")->autoDismiss(5);

        return redirect()->route('service.index');
    }
}
