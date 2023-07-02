<?php

namespace App\Http\Controllers;

use App\Http\Request\CreateDoctorRequest;
use App\Http\Resource\DoctorResource;
use App\Services\Action\CreateDoctorAction;
use App\Services\Dto\CreateDoctorDto;
use Exception;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class DoctorController extends Controller
{
    /**
     * @throws UnknownProperties
     * @throws Exception
     */
    public function create(
        CreateDoctorRequest $request,
        CreateDoctorAction $createDoctorAction
    ): DoctorResource {

        $dto = CreateDoctorDto::fromRequest($request);

        return $createDoctorAction->run($dto);
    }
}

