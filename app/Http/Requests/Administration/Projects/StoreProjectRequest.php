<?php

namespace App\Http\Requests\Administration\Projects;

use App\Models\Administration\Project;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * En este caso, los requerimientos de la API no solicitaban que realice autorizaciones,
     * En este punto iría el chequeo de los permisos.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Project::$rules;
    }

    /**
     * Get the validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return Project::$messages;
    }
}
