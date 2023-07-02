<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Doctor\DoctorRepository;
use App\Repository\Patient\PatientRepository;
use App\Repository\Doctor\DoctorPatientRepository;
use App\Repository\Doctor\DoctorRepositoryInterface;
use App\Repository\Patient\PatientRepositoryInterface;
use App\Repository\Doctor\DoctorPatientRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            DoctorRepositoryInterface::class,
            DoctorRepository::class
        );

        $this->app->bind(
            PatientRepositoryInterface::class,
            PatientRepository::class
        );

        $this->app->bind(
            DoctorPatientRepositoryInterface::class,
            DoctorPatientRepository::class
        );
    }
}
