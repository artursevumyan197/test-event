<?php

namespace App\Services\Dto;

use App\Http\Request\CreateDoctorRequest;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CreateDoctorDto extends DataTransferObject
{
    public string $name;
    public string $lastname;
    public ?string $middleName;
    public string $telephone;
    public ?string $email;
    public ?string $dateOfBirth;
    public string $startTime;
    public string $endTime;


    /**
     * @throws UnknownProperties
     */
    public static function fromRequest(CreateDoctorRequest $doctorRequest): self
    {
        return new self(
            name: $doctorRequest->getName(),
            lastname : $doctorRequest->getLastname(),
            middleName :$doctorRequest->getMiddleName(),
            telephone : $doctorRequest->getTelephone(),
            email : $doctorRequest->getEmail(),
            dateOfBirth : $doctorRequest->getDateOfBirth(),
            startTime : $doctorRequest->getStartTime(),
            endTime : $doctorRequest->getEndTime()
        );
    }
}
