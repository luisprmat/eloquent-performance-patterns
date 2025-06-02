<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Company::factory()->count(10000)->create()->each(fn (Company $company) => $company->users()
            ->createMany(User::factory()->count(5)->make()->map->getAttributes())
        );
    }
}
