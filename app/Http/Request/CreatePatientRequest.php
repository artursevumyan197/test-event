<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class CreatePatientRequest extends FormRequest
{
    public const NAME = 'name';
    public const LASTNAME = 'lastname';
    public const MIDDLE_NAME = 'middleName';
    public const SNILS = 'snils';
    public const LOCATION = 'location';
    public const DATE_OF_BIRTH = 'date_of_birth';

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
            self::SNILS => [
                'required',
                'string',
                'unique:patients,snils'
            ],
            self::LOCATION => [
                'nullable',
                'string'
            ],
            self::DATE_OF_BIRTH => [
                'nullable',
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

    public function getSnils(): string
    {
        return $this->get(self::SNILS);
    }

    public function getLocation(): ?string
    {
        return $this->get(self::LOCATION);
    }

    public function getDateOfBirth(): ?string
    {
        return $this->get(self::DATE_OF_BIRTH);
    }
}
