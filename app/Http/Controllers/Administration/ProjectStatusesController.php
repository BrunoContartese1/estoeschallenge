<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Facades\App\Services\Administration\ProjectStatusesService;
use Illuminate\Http\Request;

class ProjectStatusesController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/administration/projectStatuses",
     *     summary="Devuelve una lista de todos los posibles estados de los proyectos.",
     *     description="Devuelve una lista de todos los posibles estados de los proyectos.",
     *     tags={"Estados de proyectos"},
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
        return ProjectStatusesService::getAllProjectStatuses();
    }
}
