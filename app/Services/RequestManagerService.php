<?php

namespace App\Services;

use App\Models\RequestManager;

class RequestManagerService
{
    public function create(array $data): RequestManager
    {
        return RequestManager::create($data);
    }

    public function update(int $id, array $data): RequestManager
    {
        $requestManager = RequestManager::findOrFail($id);

        return tap($requestManager,
            function ($requestManager) use ($data) {
                $requestManager->update($data);
            }
        );
    }
}
