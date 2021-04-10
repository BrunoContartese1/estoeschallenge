<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\Projects\StoreProjectRequest;
use App\Http\Requests\Administration\Projects\UpdateProjectRequest;
use Facades\App\Services\Administration\ProjectsService;

class ProjectsController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/administration/projects/{projectName}",
     *      operationId="getProjectsList",
     *      tags={"Proyectos"},
     *      summary="Obtener una lista paginada de proyectos",
     *      description="Obtener una lista paginada de proyectos",
     *      @OA\Response(
     *          response=200,
     *          description="Operación exitosa",
     *          @OA\JsonContent(ref="#/components/schemas/ProjectResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="No autenticado",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="No autorizado"
     *      ),
     *      @OA\Parameter(
     *          name="projectName",
     *          description="Nombre del proyecto a buscar",
     *          required=false,
     *          in="path",
     *          allowEmptyValue=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="pageNumber",
     *          description="Página de resultados requerida",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *)
     */
    public function index($projectName = '')
    {
        return ProjectsService::getPaginatedProjects($projectName);
    }

    /**
     * @OA\Get(
     *      path="/api/administration/projects/{id}/show",
     *      operationId="getProjectById",
     *      tags={"Proyectos"},
     *      summary="Obtener la información de un proyecto",
     *      description="Retorna la información de un proyecto",
     *      @OA\Parameter(
     *          name="id",
     *          description="Id del proyecto",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Project")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="No autenticado",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="No autorizado"
     *      )
     * )
     */
    public function show($id)
    {
        return ProjectsService::getProjectById($id);
    }

    /**
     * @OA\Post(
     *      path="/api/administration/projects",
     *      operationId="storeProject",
     *      tags={"Proyectos"},
     *      summary="Almacenar nuevo proyecto",
     *      description="Retorna OK si la operación fue correcta.",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreProjectRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Operación correcta.",
     *          @OA\JsonContent(ref="#/components/schemas/Project")
     *       ),
     *      @OA\Response(
     *          response=422,
     *          description="No se puede procesar la solicitud, datos de entrada incorrectos."
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="No autenticado",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="No autorizado"
     *      )
     * )
     */
    public function store(StoreProjectRequest $request)
    {
        return ProjectsService::storeProject($request);
    }

    /**
     * @OA\POST(
     *      path="/api/administration/projects/{id}",
     *      operationId="updateProject",
     *      tags={"Proyectos"},
     *      summary="Actualizar un proyecto existente",
     *      description="Retorna Ok si la operación fue correcta",
     *      @OA\Parameter(
     *          name="id",
     *          description="Id del proyecto",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateProjectRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Operación exitosa",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="No autenticado",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="No autorizado"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Proyecto no encontrado"
     *      )
     * )
     */
    public function update(UpdateProjectRequest $request, $id)
    {
        return ProjectsService::updateProject($request, $id);
    }

    /**
     * @OA\Delete (
     *      path="/api/administration/projects/{id}",
     *      operationId="Delete a project",
     *      tags={"Proyectos"},
     *      summary="Eliminar un proyecto",
     *      description="Eliminar un proyecto",
     *      @OA\Parameter(
     *          name="id",
     *          description="Id del proyecto",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Project")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="No autenticado",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="No autorizado"
     *      )
     * )
     */
    public function destroy($id)
    {
        return ProjectsService::destroyProject($id);
    }

    /**
     * @OA\POST (
     *      path="/api/administration/projects/{id}/restore",
     *      operationId="Restore a project",
     *      tags={"Proyectos"},
     *      summary="Restaurar un proyecto",
     *      description="Restaurar un proyecto",
     *      @OA\Parameter(
     *          name="id",
     *          description="Id del proyecto",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Project")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="No autenticado",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="No autorizado"
     *      )
     * )
     */
    public function restore($id)
    {
        return ProjectsService::restoreProject($id);
    }

}
