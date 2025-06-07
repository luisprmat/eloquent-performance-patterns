<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $stores = array_map('str_getcsv', file(__DIR__.'/stores.csv'));

        collect($stores)->each(fn ($store) => Store::create([
            'address' => $store[0],
            'city' => $store[1],
            'state' => $store[2],
            'postal' => $store[3],
            'location' => DB::raw('ST_SRID(Point('.$store[4].', '.$store[5].'), 4326)'),
        ]));
    }
}
