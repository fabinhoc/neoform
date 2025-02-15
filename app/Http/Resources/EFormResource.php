<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EFormResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'request_manager' => new RequestManagerResource($this->whenLoaded('requestManager')),
            'type' => $this->type,
            'status' => $this->status,
            'code' => $this->code,
            'sla' => $this->sla,
        ];
    }
}
