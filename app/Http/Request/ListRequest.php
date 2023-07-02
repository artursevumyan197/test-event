<?php

namespace App\Http\Request;

use App\Classes\BaseConstants;
use App\Traits\GetSortTrait;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ListRequest extends FormRequest
{
    use GetSortTrait;

    const PER_PAGE_DEFAULT = 10;

    const PER_PAGE = 'perPage';
    const PAGE = 'page';
    const Q = 'q';
    const SORTS = 'sort';
    const SORTS_KEY = 'sort.key.*';
    const SORTS_VALUE = 'sort.value.*';

    public function rules(): array
    {
        return [
            self::PER_PAGE => [
                'integer',
                'max:100',
                'min:10',
            ],
            self::PAGE => [
                'integer',
                'nullable'
            ],
            self::Q => [
                'string',
                'nullable'
            ],
            self::SORTS => [
                'array',
                'nullable',
            ],
            self::SORTS_KEY => [
                'string',
                'nullable',
            ],
            self::SORTS_VALUE => [
                'string',
                'nullable',
                Rule::in([
                    BaseConstants::SORT_ASC,
                    BaseConstants::SORT_DESC
                ]),
            ],
        ];
    }

    public function getPage(): int
    {
        return $this->get(self::PAGE) ?? 1;
    }

    public function getPerPage(): int
    {
        return $this->get(self::PER_PAGE) ?? self::PER_PAGE_DEFAULT;
    }

    public function getQ(): ?string
    {
        return $this->get(self::Q);
    }

    public function getSort(): ?array
    {
        $sort = $this->get(self::SORTS);

        return $this->transformSortKey($sort);
    }
}
