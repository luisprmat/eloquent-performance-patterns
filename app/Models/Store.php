<?php

namespace App\Models;

use Illuminate\Database\Query\Builder as QBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function scopeSelectDistanceTo(Builder $query, array $coordinates): void
    {
        if (is_null($query->getQuery()->columns)) {
            $query->select('*');
        }

        /** @var QBuilder $query */
        $query->selectRaw('ST_Distance(
            ST_SRID(Point(longitude, latitude), 4326),
            ST_SRID(Point(?, ?), 4326)
        ) as distance', $coordinates);
    }
}
