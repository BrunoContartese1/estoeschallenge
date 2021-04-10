<?php


namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Project",
 *     description="Project model",
 *     @OA\Xml(
 *         name="Project"
 *     )
 * )
 */

class Project
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *      title="Name",
     *      description="Nombre del proyecto",
     *      example="Un lindo proyecto"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="Description",
     *      description="Descripción del proyecto",
     *      example="Esta es una posible descripción del proyecto"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Fecha de creación",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Fecha de actualización",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @OA\Property(
     *     title="Deleted at",
     *     description="Fecha de eliminación",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $deleted_at;

    /**
     * @OA\Property(
     *      title="Author ID",
     *      description="ID del creador del proyecto",
     *      format="int64",
     *      example=1
     * )
     *
     * @var \App\Virtual\Models\User
     */
    public $created_by;

    /**
     * @OA\Property(
     *      title="Editor ID",
     *      description="ID del editor del proyecto",
     *      format="int64",
     *      example=1
     * )
     *
     * @var \App\Virtual\Models\User
     */
    public $updated_by;

    /**
     * @OA\Property(
     *      title="Destroyer ID",
     *      description="ID del destructor del proyecto",
     *      format="int64",
     *      example=1
     * )
     *
     * @var \App\Virtual\Models\User
     */
    public $deleted_by;

    /**
     * @OA\Property(
     *      title="Project manager id",
     *      description="ID project manager",
     *      format="int64",
     *      example=1
     * )
     *
     * @var \App\Virtual\Models\User
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
     * @var \App\Virtual\Models\ProjectStatus
     */
    public $project_status_id;

    /**
     * @OA\Property(
     *      title="Array of users beloning to the project",
     *      description="Array of users beloning to the project",
     * )
     *
     * @var \App\Virtual\Models\User[]
     */
    public $users;
}
