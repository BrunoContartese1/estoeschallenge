<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Facades\App\Services\Administration\UsersService;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/administration/users",
     *     summary="Devuelve una lista de todos los usuarios.",
     *     description="Devuelve una lista de todos los usuarios.",
     *     tags={"Usuarios"},
     *     @OA\Response(
     *         response=200,
     *         description="Operación exitosa."
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="No autenticado",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="No tiene permisos para realziar la acción"
     *      ),
     *     @OA\Response(
     *         response="default",
     *         description="Operación fallida."
     *     ),
     *     @OA\MediaType(
     *         mediaType="application/json"
     *     )
     * )
     */
    public function index()
    {
        return UsersService::getAllUsers();
    }
}
