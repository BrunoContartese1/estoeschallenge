<?php


namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="User",
 *     description="User model",
 *     @OA\Xml(
 *         name="User"
 *     )
 * )
 */
class User
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
     *      description="Nombre del Usuario",
     *      example="Bruno Contartese"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="email",
     *      description="Email del usuario",
     *      example="bruno.a.contartese@gmail.com"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="Author ID",
     *      description="ID del creador del usuario",
     *      format="int64",
     *      example=1
     * )
     *
     * @var \App\Models\User
     */
    public $created_by;

    /**
     * @OA\Property(
     *      title="Editor ID",
     *      description="ID del editor del usuario",
     *      format="int64",
     *      example=1
     * )
     *
     * @var \App\Models\User
     */
    public $updated_by;

    /**
     * @OA\Property(
     *      title="Destroyer ID",
     *      description="ID del destructor del usuario",
     *      format="int64",
     *      example=1
     * )
     *
     * @var \App\Models\User
     */
    public $deleted_by;

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
}
