<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->isOwner()->create(['name' => 'Ted Bossman']);
        User::factory()->create(['name' => 'Sarah Seller']);
        User::factory()->create(['name' => 'Chase Indeals']);

        User::all()->each(fn (User $user) => $user->customers()
            ->createMany(Customer::factory()->count(25)->make()->toArray())
        );
    }
}
