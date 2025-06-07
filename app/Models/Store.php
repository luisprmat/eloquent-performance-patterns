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

        if (config('database.default') === 'mysql') {
            /** @var QBuilder $query */
            $query->selectRaw('ST_Distance(
                location,
                ST_SRID(Point(?, ?), 4326)
            ) as distance', $coordinates);
        }

        if (config('database.default') === 'sqlite') {
            throw new \Exception('This lesson does not support SQLite.');
        }

        if (config('database.default') === 'pgsql') {
            $query->selectRaw('ST_Distance(
                location,
                ST_MakePoint(?, ?)::geography
            ) as distance', $coordinates);
        }
    }

    public function scopeWithinDistanceTo(Builder $query, array $coordinates, int $distance): void
    {
        if (config('database.default') === 'mysql') {
            /** @var QBuilder $query */
            $query->whereRaw('ST_Distance(
                location,
                ST_SRID(Point(?, ?), 4326)
            ) <= ?', [...$coordinates, $distance]);
        }

        if (config('database.default') === 'sqlite') {
            throw new \Exception('This lesson does not support SQLite.');
        }

        if (config('database.default') === 'pgsql') {
            $query->whereRaw('ST_DWithin(
                location,
                ST_MakePoint(?, ?)::geography,
                ?
            )', [...$coordinates, $distance]);
        }
    }
}
