<?php

namespace App\Models\Administration;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Project extends Model
{
    use SoftDeletes, Userstamps;

    protected $table = 'projects';

    protected $fillable = [
        'name',
        'description',
        'project_manager_id',
        'project_status_id',
    ];

    public static $rules = [
        'name' => 'required|unique:projects,name',
        'project_manager_id' => 'required|exists:users,id',
        'project_status_id' => 'required|exists:project_statuses,id'
    ];

    public static $messages = [
      'name.required' => 'Debe ingresar el nombre del proyecto.',
      'name.unique' => 'El nombre del proyecto ingresado ya existe en la base de datos.',
      'project_manager_id.required' => 'Debe seleccionar el project manager.',
      'project_manager_id.exists' => 'El project manager seleccionado no es válido o no existe en la base de datos.',
      'project_status_id.required' => 'Debe seleccionar el estado del proyecto.',
      'project_status_id.exists' => 'El estado seleccionado no es válido o no existe en la base de datos.',
    ];

    public function projectManager()
    {
        return $this->belongsTo(User::class, 'project_manager_id');
    }

    public function status()
    {
        return $this->belongsTo(ProjectStatus::class, 'project_status_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'projects_users')->withTimestamps();
    }

    public function scopeFindByName($query, $name)
    {
        return $query->where('name', 'LIKE', "%{$name}%");
    }
}
