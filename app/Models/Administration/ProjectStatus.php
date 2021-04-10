<?php

namespace App\Models\Administration;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class ProjectStatus extends Model
{
    use SoftDeletes, Userstamps;

    protected $table = 'project_statuses';

    protected $fillable = [
        'name'
    ];
    public static $rules = [
        'name' => 'required|unique:project_statuses,name',
    ];

    public static $messages = [
        'name.required' => 'Debe ingresar el nombre del estado.',
        'name.unique' => 'El nombre del estado ingresado ya existe en la base de datos.',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
