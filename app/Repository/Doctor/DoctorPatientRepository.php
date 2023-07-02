<?php

namespace App\Repository\Doctor;

use App\Models\DoctorPatient;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Database\Eloquent\Builder;
use App\Services\Dto\IndexDoctorConsultsDto;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Exceptions\FailedSaveDoctorConsultException;

class DoctorPatientRepository implements DoctorPatientRepositoryInterface
{
    private function query(): Builder
    {
        return DoctorPatient::query();
    }

    /**
     * @throws FailedSaveDoctorConsultException
     */
    public function save(DoctorPatient $consult): DoctorPatient
    {
        if (!$consult->save()) {
            throw new FailedSaveDoctorConsultException('Failed save consultation at doctor!');
        }

        return $consult;
    }

    public function checkFreeConsultTime(int $id, string $startTime)
    {
        return  $this->query()
            ->where('doctor_id',$id)
            ->where('start_time', '<=', $startTime)
            ->where('end_time', '>=', $startTime)
            ->first();
    }

    public function index(IndexDoctorConsultsDto $dto): LengthAwarePaginator
    {
        $query = $this->query();

        $query->join('patients', function (JoinClause $joinClause) {
           $joinClause->on('patients.id', '=', 'doctor_patients.patient_id');
        });

        $query->join('doctors', function (JoinClause $joinClause) {
            $joinClause->on('doctors.id', '=', 'doctor_patients.doctor_id');
        });

        $query->when(isset($dto->doctorFio), function (Builder $query) use ($dto) {
            $query->where(
                DB::raw("CONCAT(doctors.lastname, ' ', doctors.name, ' ', doctors.middle_name)"),
                'LIKE',
                "%".$dto->doctorFio."%"
            );
        });

        $query->when(isset($dto->patientFio), function (Builder $query) use ($dto) {
            $query->where(
                DB::raw("CONCAT(patients.lastname, ' ', patients.name, ' ', patients.middle_name)"),
                'LIKE',
                "%".$dto->patientFio."%"
            );
        });

        $query->with(['doctor', 'patient']);

        return $query->paginate(
            $dto->pagination->perPage,
            ['*'],
            'page',
            $dto->pagination->page,
        );
    }
}
