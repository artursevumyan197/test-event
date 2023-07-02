<?php

namespace App\Repository\Doctor;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Builder;
use App\Exceptions\FailedSaveDoctorException;

class DoctorRepository implements DoctorRepositoryInterface
{
    private function query(): Builder
    {
        return Doctor::query();
    }

    /**
     * @throws FailedSaveDoctorException
     */
    public function save(Doctor $doctor): Doctor
    {
        if(!$doctor->save()) {

            throw new FailedSaveDoctorException('Failed save doctor !');
        }

        return $doctor;
    }
    public function findById(int $id)
    {
        return $this->query()
            ->where('id',$id)
            ->first();
    }
}

