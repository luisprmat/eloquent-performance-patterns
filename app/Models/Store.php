<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QBuilder;

class Store extends Model
{
    public function scopeSelectDistanceTo(Builder $query, array $coordinates): void
    {
        if (is_null($query->getQuery()->columns)) {
            $query->select('*');
        }

        /** @var QBuilder $query */
        $query->selectRaw('ST_Distance(
            location,
            ST_SRID(Point(?, ?), 4326)
        ) as distance', $coordinates);
    }

    public function scopeWithinDistanceTo(Builder $query, array $coordinates, int $distance): void
    {
        /** @var QBuilder $query */
        $query->whereRaw('ST_Distance(
            location,
            ST_SRID(Point(?, ?), 4326)
        ) <= ?', [...$coordinates, $distance]);
    }

    public function scopeOrderByDistanceTo(Builder $query, array $coordinates, string $direction = 'asc'): void
    {
        $direction = strtolower($direction) === 'asc' ? 'asc' : 'desc';

        /** @var QBuilder $query */
        $query->orderByRaw('ST_Distance(
            location,
            ST_SRID(Point(?, ?), 4326)
        ) '.$direction, $coordinates);
    }
}
