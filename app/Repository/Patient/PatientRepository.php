<?php

namespace App\Repository\Patient;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Builder;
use App\Exceptions\FailedSavePatientException;

class PatientRepository implements PatientRepositoryInterface
{
    private function query(): Builder
    {
        return Patient::query();
    }

    /**
     * @throws FailedSavePatientException
     */
    public function save(Patient $patient): Patient
    {
        if(!$patient->save()) {
            throw new FailedSavePatientException('Failed save patient !');
        }

        return $patient;
    }
}
