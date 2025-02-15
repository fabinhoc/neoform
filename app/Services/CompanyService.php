<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyService
{
    public function create(array $data): Company
    {
        if (isset($data['logo'])) {
            $uploadPath = 'companies/logo/';
            $path = Storage::put($uploadPath, $data['logo']);
            $data['logo'] = $path;
        }

        return Company::create($data);
    }

    public function update(int $id, array $data): Company
    {
        $company = Company::findOrFail($id);

        if (isset($data['logo'])) {
            Storage::delete($company->logo);

            $uploadPath = 'companies/logo/';
            $path = Storage::put($uploadPath, $data['logo']);
            $data['logo'] = $path;
        }

        return tap($company,
            function ($company) use ($data) {
                $company->update($data);
            }
        );
    }
}
