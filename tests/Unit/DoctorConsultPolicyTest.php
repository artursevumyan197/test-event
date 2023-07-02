<?php

namespace Tests\Unit;

use App\Models\Doctor;
use App\Models\DoctorPatient;
use PHPUnit\Framework\TestCase;
use App\Policies\DoctorConsultPolicy;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repository\Doctor\DoctorRepositoryInterface;
use App\Repository\Doctor\DoctorPatientRepositoryInterface;

class DoctorConsultPolicyTest extends TestCase
{
    use WithFaker;

    private int $id = 1;
    private DoctorConsultPolicy $consultPolicy;

    public function setUp(): void
    {
        $this->consultPolicy = resolve(DoctorConsultPolicy::class);
        parent::setUp();
    }

    public function testCheckReturnsFalseOnWeekendStartDate()
    {
        $startDate = '2023-07-02';

        $result = $this->consultPolicy->check($this->id, $startDate);

        $this->assertFalse($result);
    }

    public function testCheckReturnsFalseWhenDoctorTimeIsInvalid()
    {
        $startDate = '2023-07-05';

        $doctorRepository = $this->createMock(DoctorRepositoryInterface::class);
        $doctor = new Doctor();
        $doctor->start_time = '09:00:00';
        $doctor->end_time = '18:00:00';
        $doctorRepository->method('findById')->willReturn($doctor);
        app()->instance(DoctorRepositoryInterface::class, $doctorRepository);

        $doctorPatientRepository = $this->createMock(DoctorPatientRepositoryInterface::class);
        $doctorPatientRepository->method('checkFreeConsultTime')
            ->willReturnOnConsecutiveCalls(true, true, true,  null);

        app()->instance(DoctorPatientRepositoryInterface::class, $doctorPatientRepository);

        $result = $this->consultPolicy->check($this->id, $startDate);

        $this->assertFalse($result);
    }



    public function testCheckReturnsFalseWhenDoctorConsultExists()
    {
        $startDate = '2023-02-01';

        $doctorRepository = $this->createMock(DoctorRepositoryInterface::class);
        $doctor = (new Doctor());
        $doctorRepository->method('findById')->willReturn($doctor);
        app()->instance(DoctorRepositoryInterface::class, $doctorRepository);

        $doctorPatientRepository = $this->createMock(DoctorPatientRepositoryInterface::class);
        $doctorPatientRepository->method('checkFreeConsultTime')->willReturn((new DoctorPatient()));
        app()->instance(DoctorPatientRepositoryInterface::class, $doctorPatientRepository);

        $result = $this->consultPolicy->check($this->id, $startDate);

        $this->assertFalse($result);
    }

    public function testCheckReturnsTrueWhenAllConditionsPass()
    {
        $startDate = '2023-07-03';

        $doctorRepository = $this->createMock(DoctorRepositoryInterface::class);
        $doctor = (new Doctor());
        $doctorRepository->method('findById')->willReturn($doctor);
        app()->instance(DoctorRepositoryInterface::class, $doctorRepository);

        $doctorPatientRepository = $this->createMock(DoctorPatientRepositoryInterface::class);
        $doctorPatientRepository->method('checkFreeConsultTime')->willReturn(null);
        app()->instance(DoctorPatientRepositoryInterface::class, $doctorPatientRepository);

        $result = $this->consultPolicy->check($this->id, $startDate);

        $this->assertTrue($result);
    }
}
