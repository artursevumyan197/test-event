<?php

namespace App\Services\Action;

use App\Http\Resource\DoctorPatientResource;
use App\Services\Dto\IndexDoctorConsultsDto;
use App\Repository\Doctor\DoctorPatientRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexDoctorConsultAction
{
   public function __construct(protected DoctorPatientRepositoryInterface $doctorPatientRepository)
   {
   }

   public function run(IndexDoctorConsultsDto $dto): AnonymousResourceCollection
   {
        $doctorConsults = $this->doctorPatientRepository->index($dto);

        return DoctorPatientResource::collection($doctorConsults);
    }
}
