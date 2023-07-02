<?php

namespace App\Repository\Doctor;

use App\Models\Doctor;

interface DoctorRepositoryInterface
{
    public function findById(int $id);

    public function save(Doctor $doctor): Doctor;
}
