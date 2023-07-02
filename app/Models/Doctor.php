<?php

namespace App\Models;

use App\Services\Dto\CreateDoctorDto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property string $name
 * @property string $lastname
 * @property string|null$middle_name
 * @property string $telephone
 * @property string|null $email
 * @property string|null $date_of_birth
 * @property string $start_time
 * @property string $end_time
 */

class Doctor extends Model
{
    use HasFactory;

    public static function staticCreate(CreateDoctorDto $dto): self
    {
        $entity = new self();

        $entity->name = $dto->name;
        $entity->lastname = $dto->lastname;
        $entity->middle_name = $dto->middleName;
        $entity->telephone = $dto->telephone;
        $entity->email = $dto->email;
        $entity->date_of_birth = $dto->dateOfBirth;
        $entity->start_time = $dto->startTime;
        $entity->end_time= $dto->endTime;

        return  $entity;
    }

}
