<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Resources\CompanyCollection;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct(public CompanyService $service)
    {
    }

    public function index()
    {
        return new CompanyCollection(
            Company::all()
        );
    }

    public function show(Company $company)
    {
        return new CompanyResource(Company::find($company->id));
    }

    public function store(StoreCompanyRequest $request)
    {
        return new CompanyResource($this->service->create($request->validated()));
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        return new CompanyResource($this->service->update($company->id, $request->validated()));
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return response()->noContent();
    }
}
