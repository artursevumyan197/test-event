<?php

namespace App\Services\Dto;

use App\Http\Request\CreateDoctorConsultRequest;
use Carbon\Carbon;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CreateDoctorConsultDto extends DataTransferObject
{
    public int $doctor_id;
    public int $patient_id;
    public string $start_time;
    public string $end_time;
    /**
     * @throws UnknownProperties
     */
    public static function fromRequest(CreateDoctorConsultRequest $request): self
    {
        $start_time = Carbon::parse($request->getStartTime());
        $end_time = $start_time->copy()->addMinutes(30);

        return new self(
                doctor_id : $request->getDoctorId(),
                patient_id : $request->getPatientId(),
                start_time : $request->getStartTime(),
                end_time : $end_time
        );
    }
}
