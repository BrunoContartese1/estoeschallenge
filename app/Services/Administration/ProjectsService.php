<?php
namespace App\Services\Administration;


use App\Models\Administration\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProjectsService
{
    public function getPaginatedProjects($projectName)
    {
        try {
            if (strcmp($projectName, '') == 0) {
                return Project::withTrashed()
                    ->with('projectManager', 'status', 'users', 'destroyer', 'creator', 'editor')
                    ->paginate(5);
            }

            return Project::withTrashed()
                ->findByName($projectName)
                ->with('projectManager', 'status', 'users', 'destroyer', 'creator', 'editor')
                ->paginate(5);
        } catch (\Exception $e) {
            Log::info("Ha ocurrido una excepción ( ProjectsService.getPaginatedProjects ): {$e->getMessage()}. Código: {$e->getCode()}");
            throw $e;
        }
    }

    public function getProjectById($id)
    {
        try {
            $project = Project::withTrashed()
                ->with('projectManager', 'status', 'users', 'destroyer', 'creator', 'editor')
                ->findOrFail($id);
            if($project === null) {
                return response()->json('Not found', 404);
            }
            return $project;
        } catch (\Exception $e) {
            Log::info("Ha ocurrido una excepción ( ProjectsService.getProjectById ): {$e->getMessage()}. Código: {$e->getCode()}");
            throw $e;
        }
    }

    public function storeProject($request)
    {
        try {
            DB::beginTransaction();
            $project = Project::create([
                            'name' => $request->name,
                            'description' => $request->description,
                            'project_manager_id' => $request->project_manager_id,
                            'project_status_id' => $request->project_status_id
                        ]);
            $project->users()->sync($request->users);
            DB::commit();
            return $project;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info("Ha ocurrido una excepción ( ProjectsService.storeProject ): {$e->getMessage()}. Código: {$e->getCode()}");
            throw $e;
        }
    }

    public function updateProject($request, $id)
    {
        try {
            $project = Project::withTrashed()->findOrFail($id);
            DB::beginTransaction();
            $project->update([
                'name' => $request->name,
                'description' => $request->description,
                'project_manager_id' => $request->project_manager_id,
                'project_status_id' => $request->project_status_id
            ]);
            $project->users()->sync($request->users);
            DB::commit();
            return $project;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info("Ha ocurrido una excepción ( ProjectsService.updateProject ): {$e->getMessage()}. Código: {$e->getCode()}");
            throw $e;
        }
    }

    public function destroyProject($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
    }

    public function restoreProject($id)
    {
        $project = Project::withTrashed()->findOrFail($id);
        $project->restore();
    }
}
