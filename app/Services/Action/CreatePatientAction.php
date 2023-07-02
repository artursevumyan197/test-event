<?php

namespace App\Services\Action;

use App\Models\Patient;
use App\Services\Dto\CreatePatientDto;
use App\Http\Resource\PatientResource;
use App\Exceptions\FailedSavePatientException;
use App\Repository\Patient\PatientRepositoryInterface;

class CreatePatientAction
{
    public function __construct(protected PatientRepositoryInterface $repository)
    {
    }


    public function run(CreatePatientDto $dto): PatientResource
    {
        $patient = $this->repository->save(Patient::staticCreate($dto));

        return new PatientResource($patient);

    }
}
