<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequestManagerRequest;
use App\Http\Requests\UpdateRequestManagerRequest;
use App\Http\Resources\RequestManagerCollection;
use App\Http\Resources\RequestManagerResource;
use App\Models\RequestManager;
use App\Services\RequestManagerService;
use Illuminate\Http\Request;

class RequestManagerController extends Controller
{
    public function __construct(public RequestManagerService $service)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new RequestManagerCollection(
            RequestManager::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequestManagerRequest $request)
    {
        return new RequestManagerResource($this->service->create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(RequestManager $requestManager)
    {
        return new RequestManagerResource(RequestManager::findOrFail($requestManager->id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequestManagerRequest $request, RequestManager $requestManager)
    {
        return new RequestManagerResource($this->service->update($requestManager->id, $request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequestManager $requestManager)
    {
        $requestManager->delete();

        return response()->noContent();
    }
}
