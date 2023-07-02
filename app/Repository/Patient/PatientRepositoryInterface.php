<?php

namespace App\Repository\Patient;

use App\Models\Patient;

interface PatientRepositoryInterface
{
    public function save(Patient $patient): Patient;
}
