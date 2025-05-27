<?php

namespace App\Pagination;

use Illuminate\Pagination\LengthAwarePaginator;

class Paginator extends LengthAwarePaginator
{
    /**
     * The number of links to display on each side of current page link.
     *
     * @var int
     */
    public $onEachSide = 2;
}
