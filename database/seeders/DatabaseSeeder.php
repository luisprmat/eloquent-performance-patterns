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
        Company::factory(10000)->create()->each(fn (Company $company) => $company->users()
            ->createMany(User::factory(10)->make()->map->getAttributes()));

        $user = User::find(10000);
        $user->update([
            'first_name' => 'Bill',
            'last_name' => 'Gates',
            'email' => 'bill.gates@microsoft.com',
        ]);
        $user->company()->update([
            'name' => 'Microsoft Corporation',
        ]);

        $user = User::find(20000);
        $user->update([
            'first_name' => 'Tim',
            'last_name' => 'O\'Reilly',
            'email' => 'tim@oreilly.com',
        ]);
        $user->company()->update([
            'name' => 'O\'Reilly Media Inc.',
        ]);
    }
}
