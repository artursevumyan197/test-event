<?php

namespace App\Services\Dto;

use App\Http\Request\CreatePatientRequest;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CreatePatientDto extends DataTransferObject
{
    public string $name;
    public string $lastname;
    public ?string $middleName;
    public string $snils;
    public ?string $location;
    public ?string $dateOfBirth;

    /**
     * @throws UnknownProperties
     */
    public static function fromRequest(CreatePatientRequest $patientRequest): self
    {
        return new self(
            name: $patientRequest->getName(),
            lastname : $patientRequest->getLastname(),
            middle_name :$patientRequest->getMiddleName(),
            snils : $patientRequest->getSnils(),
            location : $patientRequest->getLocation(),
            date_of_birth :$patientRequest->getDateOfBirth()
        );
    }
}
