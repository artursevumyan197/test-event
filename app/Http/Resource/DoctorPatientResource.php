<?php

namespace App\Http\Resource;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property int $doctor_id
 * @property int $patient_id
 * @property string $start_time
 * @property string $end_time
 */
class DoctorPatientResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'consultation_id' => $this->resource->id,
            'doctor' => new DoctorResource($this->whenLoaded('doctor')),
            'patient' => new PatientResource($this->whenLoaded('patient')),
            'start_consultation_time' => $this->resource->start_time,
            'end_consultation_time' => $this->resource->end_time
        ];
    }
}
