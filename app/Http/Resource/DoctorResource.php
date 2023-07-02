<?php

namespace App\Http\Resource;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property string $lastname
 * @property string|null $middle_name
 * @property string $telephone
 * @property string|null $email
 * @property string|null $date_of_birth
 * @property string $start_time
 * @property string $end_time
 */
class DoctorResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'lastname' => $this->resource->lastname,
            'middle_name' => $this->resource->middle_name,
            'telephone' => $this->resource->telephone,
            'email' => $this->resource->email,
            'date_of_birth' => $this->resource->date_of_birth,
            'start_work_time' => $this->resource->start_time,
            'end_work_time' => $this->resource->end_time
        ];
    }
}
