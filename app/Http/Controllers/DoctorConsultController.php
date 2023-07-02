<?php

namespace App\Http\Controllers;

use App\Http\Resource\DoctorPatientResource;
use App\Services\Dto\CreateDoctorConsultDto;
use App\Services\Dto\IndexDoctorConsultsDto;
use App\Http\Request\IndexDoctorConsultRequest;
use App\Http\Request\CreateDoctorConsultRequest;
use App\Services\Action\IndexDoctorConsultAction;
use App\Services\Action\CreateDoctorConsultAction;
use App\Exceptions\FailedSaveDoctorConsultException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DoctorConsultController extends Controller
{
    /**
     * @throws UnknownProperties
     * @throws FailedSaveDoctorConsultException
     */
    public function create(
        CreateDoctorConsultRequest $request,
        CreateDoctorConsultAction $createDoctorConsultAction
    ): DoctorPatientResource {
        $dto = CreateDoctorConsultDto::fromRequest($request);

         return $createDoctorConsultAction->run($dto);
    }

    /**
     * @throws UnknownProperties
     */
    public function index(
        IndexDoctorConsultRequest $request,
        IndexDoctorConsultAction $indexDoctorConsultAction,
    ): AnonymousResourceCollection {
        $dto = IndexDoctorConsultsDto::fromRequest($request);

        return $indexDoctorConsultAction->run($dto);
    }
}
