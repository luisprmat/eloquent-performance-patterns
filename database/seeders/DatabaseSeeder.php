<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Company::factory(1000)->create()->each(fn (Company $company) => $company->users()
            ->createMany(User::factory(50)->make()->map->getAttributes()));
    }
}
