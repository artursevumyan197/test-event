<?php

namespace App\Traits;

use App\Classes\BaseConstants;

trait GetSortTrait
{
    public function transformSortKey(?array $sort): array
    {
        if (!$sort) {
            return [];
        }

        $result = [];
        foreach ($sort['key'] as $key => $field) {
            $result[] = [
                'key' => $sort['value'][$key] ?? BaseConstants::SORT_ASC,
                'value' => $field,
            ];
        }

        return $result;
    }
}
