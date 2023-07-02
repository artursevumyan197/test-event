<?php

namespace App\Exceptions;

class FailedSavePatientException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return self::SERVER_ERROR;
    }

    public function getStatusMessage(): string
    {
        return 'Failed save patient!';
    }
}
