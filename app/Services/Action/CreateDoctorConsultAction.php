<?php

namespace App\Services\Action;

use App\Http\Resource\DoctorPatientResource;
use App\Models\DoctorPatient;
use App\Repository\Doctor\DoctorPatientRepositoryInterface;
use App\Services\Dto\CreateDoctorConsultDto;

class CreateDoctorConsultAction
{
    public function __construct (protected DoctorPatientRepositoryInterface $doctorPatientRepository)
    {
    }

    public function run(CreateDoctorConsultDto $dto): DoctorPatientResource
    {
        $consult = $this->doctorPatientRepository->save(DoctorPatient::staticCreate($dto));

        return new DoctorPatientResource($consult);
    }
}
