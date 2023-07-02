<?php

namespace App\Http\Controllers;

use App\Services\Dto\CreatePatientDto;
use App\Http\Resource\PatientResource;
use App\Http\Request\CreatePatientRequest;
use App\Exceptions\FailedSavePatientException;
use App\Services\Action\CreatePatientAction;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PatientController extends Controller
{
    /**
     * @throws UnknownProperties|FailedSavePatientException
     */
    public function create(
        CreatePatientRequest $request,
        CreatePatientAction $createPatientAction
    ): PatientResource {
        $dto = CreatePatientDto::fromRequest($request);

        return $createPatientAction->run($dto);
    }

}
