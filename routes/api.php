<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/


Route::group(['prefix' => 'administration'], function () {
    /*
     * Project Module Routes
    */
    /*
     * En este punto hubiese utilizado un Route::resource,
     * pero en los requerimientos del proyecto pedía que para EDITAR un proyecto debía esperar una petición de tipo POST y no PUT.
     * Route::resource('projects', 'App\Http\Controllers\Administration\ProjectsController')->except('create', 'edit');
     */
    Route::get('projects/{projectName?}', 'App\Http\Controllers\Administration\ProjectsController@index');
    Route::get('getAllProjects', 'App\Http\Controllers\Administration\ProjectsController@index');
    Route::post('projects', 'App\Http\Controllers\Administration\ProjectsController@store');
    Route::get('projects/{project}/show', 'App\Http\Controllers\Administration\ProjectsController@show');
    Route::delete('projects/{project}', 'App\Http\Controllers\Administration\ProjectsController@destroy');
    Route::post('projects/{project}', 'App\Http\Controllers\Administration\ProjectsController@update');
    Route::post('projects/{project}/restore', 'App\Http\Controllers\Administration\ProjectsController@restore');

    /*
     * Users Module Routes
    */
    Route::get('users', 'App\Http\Controllers\Administration\UsersController@index');

    /*
     * Project statuses Module Routes
    */
    Route::get('projectStatuses', 'App\Http\Controllers\Administration\ProjectStatusesController@index');
});


