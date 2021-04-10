<?php


namespace App\Services\Administration;


use App\Models\Administration\ProjectStatus;

class ProjectStatusesService
{
    public function getAllProjectStatuses()
    {
        return ProjectStatus::all();
    }
}
