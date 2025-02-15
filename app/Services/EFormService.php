<?php

namespace App\Services;

use App\Helpers\CodeGenerator;
use App\Models\EForm;
use App\Models\RequestManager;

class EFormService
{
    public function create(array $data): EForm
    {
        $requestManager = RequestManager::findOrFail($data['request_manager_id']);

        $totalEforms = $requestManager->eforms()->count();
        $name = $requestManager->name;

        $data['code'] = CodeGenerator::generateEformCode($name, $totalEforms);

        return EForm::create($data);
    }

    public function update(int $id, array $data): EForm
    {
        $eform = EForm::findOrFail($id);

        return tap($eform,
            function ($eform) use ($data) {
                $eform->update($data);
            }
        );
    }
}
