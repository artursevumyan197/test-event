<?php

namespace App\Models;

use App\Services\Dto\CreatePatientDto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property string $name
 * @property string $lastname
 * @property string|null$middle_name
 * @property string $snils
 * @property string|null $location
 * @property string|null $date_of_birth
 */
class Patient extends Model
{
    use HasFactory;

    public static function staticCreate(CreatePatientDto $dto): self
    {
        $entity = new self();

        $entity->name = $dto->name;
        $entity->lastname = $dto->lastname;
        $entity->middle_name = $dto->middleName;
        $entity->snils = $dto->snils;
        $entity->location = $dto->location;
        $entity->date_of_birth = $dto->dateOfBirth;

        return  $entity;
    }
}
