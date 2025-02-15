<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EFormConfigurationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'eform_id' => $this->eform_id,
            'primary_color' => $this->primary_color,
            'is_public' => $this->is_public,
            'private' => $this->private,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
