<?php

namespace App\Http\Request;

class IndexDoctorConsultRequest extends ListRequest
{
    public const DOCTOR_FIO = 'doctorFio';
    public const PATIENT_FIO = 'patientFio';

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            self::DOCTOR_FIO=> [
                'nullable',
                'string'
            ],
            self::PATIENT_FIO => [
                'nullable',
                'string'
            ]
        ];
    }

    public function getDoctorFio(): ?string
    {
        return $this->get(self::DOCTOR_FIO);
    }

    public function getPatientFio(): ?string
    {
        return $this->get(self::PATIENT_FIO);
    }
}
