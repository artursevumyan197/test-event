<?php

namespace App\Http\Resource;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property string $lastname
 * @property string|null$middle_name
 * @property string $snils
 * @property string|null $location
 * @property string|null $date_of_birth
 */

class PatientResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'lastname' => $this->resource->lastname,
            'middle_name' => $this->resource->middle_name,
            'snils' => $this->resource->snils,
            'location' => $this->resource->location,
            'date_of_birth' => $this->resource->date_of_birth
        ];
    }
}
