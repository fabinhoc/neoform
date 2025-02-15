<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEFormConfigurationRequest;
use App\Http\Requests\UpdateEFormConfigurationRequest;
use App\Http\Resources\EFormConfigurationCollection;
use App\Http\Resources\EFormConfigurationResource;
use App\Models\EFormConfiguration;
use App\Services\EFormConfigurationService;
use Illuminate\Http\Request;

class EFormConfigurationController extends Controller
{
    public function __construct(public EFormConfigurationService $service)
    {}

    public function index()
    {
        return new EFormConfigurationCollection(EFormConfiguration::all());
    }

    public function store(StoreEFormConfigurationRequest $request)
    {
        return new EFormConfigurationResource($this->service->create($request->validated()));
    }

    public function update(UpdateEFormConfigurationRequest $request, EFormConfiguration $eFormConfiguration)
    {
        return new EFormConfigurationResource($this->service->update($eFormConfiguration->id, $request->validated()));
    }

    public function show(EFormConfiguration $eFormConfiguration)
    {
        return new EFormConfigurationResource(EFormConfiguration::findOrFail($eFormConfiguration->id));
    }

    public function destroy(EFormConfiguration $eFormConfiguration)
    {
        $eFormConfiguration->delete();

        return response()->noContent();
    }
}
