<?php

namespace App\Http\Request;

use App\Policies\DoctorConsultPolicy;
use Illuminate\Foundation\Http\FormRequest;

class CreateDoctorConsultRequest extends FormRequest
{
    public const DOCTOR_ID = 'id';
    public const PATIENT_ID = 'patient_id';
    public const START_TIME = 'start_time';

    public function authorize(): bool
    {
        return DoctorConsultPolicy::check($this->getDoctorId(),$this->getStartTime());
    }

    public function rules(): array
    {
        return [
            self::PATIENT_ID => [
                'required',
                'int'
            ],
            self::START_TIME => [
                'required',
                'string'
            ],
        ];
    }

    public function getDoctorId(): int
    {
        return $this->route(self::DOCTOR_ID);
    }

    public function getPatientId(): int
    {
        return $this->get(self::PATIENT_ID);
    }

    public function getStartTime(): string
    {
        return $this->get(self::START_TIME);
    }
}
