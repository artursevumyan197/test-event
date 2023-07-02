<?php

namespace App\Policies;

use Carbon\Carbon;
use App\Repository\Doctor\DoctorRepositoryInterface;
use App\Repository\Doctor\DoctorPatientRepositoryInterface;

class DoctorConsultPolicy
{
    public static function check(int $id , string $startDate): bool
    {
        if (Carbon::parse($startDate)->isWeekend()) {
            return false;
        }

        /**
         * @var DoctorRepositoryInterface $doctorRepository
         */
        $doctorRepository = resolve(DoctorRepositoryInterface::class);
        $doctor = $doctorRepository->findById($id);

        if ($doctor->start_time >= $startDate &&
            $doctor->end_time <= Carbon::parse($startDate)->copy()->addMinutes(30)) {
            return false;
        }

        /**
         * @var DoctorPatientRepositoryInterface $doctorPatientRepository
         */
        $doctorPatientRepository = resolve(DoctorPatientRepositoryInterface::class);
        $doctorConsult = $doctorPatientRepository->checkFreeConsultTime($id,$startDate);

        if (!is_null($doctorConsult)) {
            return false;
        }

        return true;
    }
}
