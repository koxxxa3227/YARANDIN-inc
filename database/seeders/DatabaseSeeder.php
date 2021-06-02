<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectTask;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(UsersTableSeeder::class);
        Project::factory(2)->create();
        ProjectTask::factory(4)->create();
    }
}
