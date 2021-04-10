<?php

namespace Database\Seeders;

use App\Models\Administration\ProjectStatus;
use Illuminate\Database\Seeder;

class ProjectStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectStatus::create([
           'name' => 'Enabled'
        ]);

        ProjectStatus::create([
            'name' => 'Disabled'
        ]);
    }
}
