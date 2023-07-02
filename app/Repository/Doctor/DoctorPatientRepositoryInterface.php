<?php

namespace App\Repository\Doctor;

use App\Models\DoctorPatient;
use App\Services\Dto\IndexDoctorConsultsDto;
use Illuminate\Pagination\LengthAwarePaginator;

interface DoctorPatientRepositoryInterface
{
    public function index(IndexDoctorConsultsDto $dto): LengthAwarePaginator;

    public function checkFreeConsultTime(int $id, string $startTime);

    public function save(DoctorPatient $consult): DoctorPatient;
}
