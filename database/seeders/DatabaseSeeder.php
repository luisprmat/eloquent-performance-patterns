<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Feature;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = $this->getUsers()->map(fn (array $user) => User::factory()->create($user));

        Feature::factory()->count(60)->create()->each(function (Feature $feature) use ($users) {
            $feature->comments()->createMany(
                Comment::factory()->count(rand(1, 50))->make()->each(function (Comment $comment) use ($users) {
                    $comment->user_id = $users->random()->id;
                })->toArray()
            );
        });
    }

    protected function getUsers()
    {
        return collect([
            ['name' => 'Lacey Kertzmann', 'photo' => 'female-01.jpeg'],
            ['name' => 'Tina Trantow', 'photo' => 'female-02.jpeg'],
            ['name' => 'Vanessa Gerhold', 'photo' => 'female-03.jpeg'],
            ['name' => 'Mina Prohaska', 'photo' => 'female-04.jpeg'],
            ['name' => 'Micah Daugherty', 'photo' => 'female-05.jpeg'],
            ['name' => 'Marianne Kunde', 'photo' => 'female-06.jpeg'],
            ['name' => 'Veronica Johnson', 'photo' => 'female-07.jpeg'],
            ['name' => 'Cecile Volkman', 'photo' => 'female-08.jpeg'],
            ['name' => 'Hannah Feeney', 'photo' => 'female-09.jpeg'],
            ['name' => 'Sandy Ullrich', 'photo' => 'female-10.jpeg'],
            ['name' => 'Christopher Bernier', 'photo' => 'male-01.jpeg'],
            ['name' => 'Angelo Murray', 'photo' => 'male-02.jpeg'],
            ['name' => 'Raleigh Welch', 'photo' => 'male-03.jpeg'],
            ['name' => 'Darby Jenkins', 'photo' => 'male-04.jpeg'],
            ['name' => 'Bart Hirthe', 'photo' => 'male-05.jpeg'],
            ['name' => 'Jarrell Von', 'photo' => 'male-06.jpeg'],
            ['name' => 'Stephon Marvin', 'photo' => 'male-07.jpeg'],
            ['name' => 'Kane Barton', 'photo' => 'male-08.jpeg'],
            ['name' => 'Baron Mayer', 'photo' => 'male-09.jpeg'],
            ['name' => 'John Richards', 'photo' => 'male-10.jpeg'],
        ]);
    }
}
