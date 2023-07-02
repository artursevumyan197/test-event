<?php

namespace App\Models;

use App\Services\Dto\CreateDoctorConsultDto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $doctor_id
 * @property int $patient_id
 * @property string $start_time
 * @property string $end_time
 */

class DoctorPatient extends Model
{
    use SoftDeletes;

    public static function staticCreate(CreateDoctorConsultDto $dto): self
    {
        $entity = new self();

        $entity->doctor_id = $dto->doctor_id;
        $entity->patient_id = $dto->patient_id;
        $entity->start_time = $dto->start_time;
        $entity->end_time = $dto->end_time;

        return  $entity;
    }

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
