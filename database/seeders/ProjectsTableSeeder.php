<?php

namespace Database\Seeders;

use App\Models\Administration\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::beginTransaction();
            $project = Project::create([
                'name' => 'Estoes Challenge',
                'description' => 'API de proyectos para puesto de backend de la empresa Estoes.',
                'project_manager_id' => 1,
                'project_status_id' => 1
            ]);

            $project->users()->sync([1,2,3,4,5]);
            DB::commit();
        } catch (\Exception $e) {
            Log::info("Ha ocurrido un error ( ProjectsTableSeeder ): {$e->getMessage()}. Código: {$e->getCode()}");
        }


    }
}
