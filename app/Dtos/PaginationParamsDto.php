<?php

namespace App\Dtos;

class PaginationParamsDto
{
    public function __construct(
        public int $perPage,
        public int $page
    ) {
    }
}
