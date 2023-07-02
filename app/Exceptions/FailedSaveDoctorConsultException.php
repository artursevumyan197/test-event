<?php

namespace App\Exceptions;

class FailedSaveDoctorConsultException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return self::SERVER_ERROR;
    }

    public function getStatusMessage(): string
    {
        return 'Failed save consultation at doctor!';
    }
}
