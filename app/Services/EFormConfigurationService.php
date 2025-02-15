<?php

namespace App\Services;

use App\Models\EFormConfiguration;

class EFormConfigurationService
{
    public function create(array $data): EFormConfiguration
    {
        $data['primary_color'] = $data['primary_color'] ?? '#41A5BB';

        return EFormConfiguration::create($data);
    }

    public function update(string $id, array $data): EFormConfiguration
    {
        $data['primary_color'] = $data['primary_color'] ?? '#41A5BB';

        $eformConfiguration = EFormConfiguration::findOrFail($id);

        return tap($eformConfiguration,
            function ($eformConfiguration) use ($data) {
                $eformConfiguration->update($data);
            }
        );
    }
}
