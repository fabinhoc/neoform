<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEFormRequest;
use App\Http\Requests\UpdateEFormRequest;
use App\Http\Resources\EFormCollection;
use App\Http\Resources\EFormResource;
use App\Models\EForm;
use App\Services\EFormService;

class EFormController extends Controller
{
    public function __construct(public EFormService $service)
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new EFormCollection(EForm::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEFormRequest $request)
    {
        return new EFormResource($this->service->create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(EForm $e_form)
    {
        return new EFormResource(EForm::findOrFail($e_form->id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEFormRequest $request, EForm $e_form)
    {
        return new EFormResource($this->service->update($e_form->id, $request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EForm $eform)
    {
        $eform->delete();

        return response()->noContent();
    }
}
