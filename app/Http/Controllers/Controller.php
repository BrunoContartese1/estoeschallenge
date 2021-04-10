<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 *      @OA\Info (
 *          title="Estoes Challenge API",
 *          description="Aplicación challenge para puesto de desarrollador backend",
 *          version="1.0.0",
 *          @OA\Contact(
 *              email="bruno.a.contartese@gmail.com"
 *          ),
 *      ),
 *      @OA\Tag(
 *          name="Proyectos",
 *          description="API Endpoints de Proyectos"
 *      )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
