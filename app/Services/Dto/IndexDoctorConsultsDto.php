<?php

namespace App\Services\Dto;

use App\Dtos\PaginationParamsDto;
use App\Http\Request\IndexDoctorConsultRequest;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class IndexDoctorConsultsDto extends DataTransferObject
{
    public ?string $q;
    public PaginationParamsDto $pagination;
    public ?array $sorts;
    public ?string $doctorFio;
    public ?string $patientFio;
    /**
     * @throws UnknownProperties
     */
    public static function fromRequest(IndexDoctorConsultRequest $request): self
    {
        return new self(
            q : $request->getQ(),
            sorts : $request->getSort(),
            doctorFio : str_replace('-', ' ', $request->getDoctorFio()),
            patientFio : str_replace('-', ' ', $request->getPatientFio()),
            pagination : new PaginationParamsDto(
                $request->getPerPage(),
                $request->getPage()
          )
       );
    }
}

