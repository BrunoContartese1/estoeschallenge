<?php


namespace App\Virtual\Requests\Projects;

/**
 * @OA\Schema(
 *      title="Actualizar un proyecto",
 *      description="Update Project request body data",
 *      type="object",
 *      required={ "name", "project_manager_id", "project_status_id", "users" }
 * )
 */

class UpdateProjectRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Nombre del nuevo proyecto",
     *      example="Un nuevo desafío"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="description",
     *      description="Descripción del nuevo proyecto",
     *      example="Esta es una posible descripción"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="Project manager id",
     *      description="ID project manager",
     *      format="int64",
     *      example=1
     * )
     *
     * @var \App\Models\User
     */
    public $project_manager_id;

    /**
     * @OA\Property(
     *      title="Project status id",
     *      description="ID del estado del proyecto",
     *      format="int64",
     *      example=1
     *
     * )
     *
     * @var \App\Models\Administration\ProjectStatus
     */
    public $project_status_id;

    /**
     * @OA\Property(
     *      title="Array of users beloning to the project",
     *      description="Array of users beloning to the project",
     *      example={1,2,3}
     * )
     *
     * @var int[]
     */
    public $users;
}
