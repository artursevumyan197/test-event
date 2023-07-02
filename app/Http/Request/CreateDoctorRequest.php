<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class CreateDoctorRequest extends FormRequest
{
    public const NAME = 'name';
    public const LASTNAME = 'lastname';
    public const MIDDLE_NAME = 'middleName';
    public const TELEPHONE = 'telephone';
    public const EMAIL = 'email';
    public const DATE_OF_BIRTH = 'date_of_birth';
    public const START_TIME = 'start_time';
    public const END_TIME = 'end_time';

    public function rules(): array
    {
        return [
            self::NAME => [
                'required',
                'string'
            ],
            self::LASTNAME => [
                'required',
                'string'
            ],
            self::MIDDLE_NAME => [
                'nullable',
                'string'
            ],
            self::TELEPHONE => [
                'required',
                'string'
            ],
            self::EMAIL => [
                'nullable',
                'string',
                'unique:doctors,email'
            ],
            self::DATE_OF_BIRTH => [
                'nullable',
                'string'
            ],
            self::START_TIME => [
                'required',
                'string'
            ],
            self::END_TIME => [
                'required',
                'string'
            ],
        ];
    }

    public function getName(): string
    {
        return $this->get(self::NAME);
    }

    public function getLastname(): string
    {
        return $this->get(self::LASTNAME);
    }

    public function getMiddleName(): ?string
    {
        return $this->get(self::MIDDLE_NAME);
    }

    public function getTelephone(): string
    {
        return $this->get(self::TELEPHONE);
    }

    public function getEmail(): ?string
    {
        return $this->get(self::EMAIL);
    }

    public function getDateOfBirth(): ?string
    {
        return $this->get(self::DATE_OF_BIRTH);
    }

    public function getStartTime(): string
    {
        return $this->get(self::START_TIME);
    }

    public function getEndTime(): string
    {
        return $this->get(self::END_TIME);
    }
}
