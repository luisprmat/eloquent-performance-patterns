<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public static function booted()
    {
        static::addGlobalScope(function ($query) {
            if (is_null($query->getQuery()->columns)) {
                $query->select('*');
            }

            $query->selectRaw('ST_AsGeoJSON(geometry) as geometry_as_json');
        });
    }
}
