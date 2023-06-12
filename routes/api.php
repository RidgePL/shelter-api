<?php

use App\Http\Controllers\Animals\CreateAnimalController;
use App\Http\Controllers\Animals\DeleteAnimalController;
use App\Http\Controllers\Animals\ListAnimalsController;
use App\Http\Controllers\Animals\ListShelterAnimalsController;
use App\Http\Controllers\Animals\ShowAnimalController;
use App\Http\Controllers\Animals\UpdateAnimalController;
use App\Http\Controllers\Employees\CreateEmployeeController;
use App\Http\Controllers\Employees\DeleteEmployeeController;
use App\Http\Controllers\Employees\ListEmployeesController;
use App\Http\Controllers\Employees\ListShelterEmployeesController;
use App\Http\Controllers\Employees\ShowEmployeeController;
use App\Http\Controllers\Employees\UpdateEmployeeController;
use App\Http\Controllers\Shelters\CreateShelterController;
use App\Http\Controllers\Shelters\DeleteShelterController;
use App\Http\Controllers\Shelters\ListSheltersController;
use App\Http\Controllers\Shelters\ShowShelterController;
use App\Http\Controllers\Shelters\UpdateShelterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware('api')->group(function () {
    Route::group(['prefix' => 'shelters', 'as' => 'shelters'], static function () {
        Route::get('/', ListSheltersController::class)->name('.list');
        Route::post('/', CreateShelterController::class)->name('.create');
        Route::delete('/{id}', DeleteShelterController::class)->name('.delete');
        Route::put('/{id}', UpdateShelterController::class)->name('.update');

        Route::group(['prefix' => '{id}'], static function () {
            Route::get('/', ShowShelterController::class)->name('.show');

            Route::group(['prefix' => 'animals', 'as' => '.animals'], static function () {
                Route::get('/', ListShelterAnimalsController::class)->name('.list');
            });

            Route::group(['prefix' => 'employees', 'as' => '.employees'], static function () {
                Route::get('/', ListShelterEmployeesController::class)->name('.list');
            });
        });
    });

    Route::group(['prefix' => 'animals', 'as' => 'animals'], function () {
        Route::get('/', ListAnimalsController::class)->name('.list');
        Route::post('/', CreateAnimalController::class)->name('.create');
        Route::delete('/{id}', DeleteAnimalController::class)->name('.delete');
        Route::put('/{id}', UpdateAnimalController::class)->name('.update');
        Route::get('/{id}', ShowAnimalController::class)->name('.show');
    });

    Route::group(['prefix' => 'employees', 'as' => 'employees'], function () {
        Route::get('/', ListEmployeesController::class)->name('.list');
        Route::post('/', CreateEmployeeController::class)->name('.create');
        Route::delete('/{id}', DeleteEmployeeController::class)->name('.delete');
        Route::put('/{id}', UpdateEmployeeController::class)->name('.update');
        Route::get('/{id}', ShowEmployeeController::class)->name('.show');
    });
});
