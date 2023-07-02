<?php

namespace App\Services\Action;

use App\Models\Doctor;
use App\Http\Resource\DoctorResource;
use App\Services\Dto\CreateDoctorDto;
use App\Exceptions\FailedSaveDoctorException;
use App\Repository\Doctor\DoctorRepositoryInterface;

class CreateDoctorAction
{
    public function __construct(protected DoctorRepositoryInterface $repository)
    {
    }

    /**
     * @throws FailedSaveDoctorException
     */
    public function run(CreateDoctorDto $dto): DoctorResource
    {
       $doctor = $this->repository->save(Doctor::staticCreate($dto));

        return new DoctorResource($doctor);
    }
}
