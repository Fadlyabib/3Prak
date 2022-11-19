<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

# memakai authentication
Route::middleware(['auth:sanctum'])->group(function(){
    # get all resource patients
    # method get
    Route::get('/patients', [PatientsController::class, 'index']);

    # menambahkan resource patients
    # method post
    Route::post('/patients', [PatientsController::class, 'store']);

    # mendapatkan detail resource patients
    # method get
    Route::get('/patients/{id}', [PatientsController::class, 'show']);

    # mengubah resource patients
    # method put
    Route::put('/patients/{id}', [PatientsController::class, 'update']);

    # menghapus resource patients
    # method delete
    Route::delete('/patients/{id}', [PatientsController::class, 'destroy']);

    # Search Resource by name
    # method get 
    Route::get('/patients/search/{name}', [PatientsController::class, 'search']);

    # get positive Resource
    # method get 
    Route::get('/patients/status/positive', [PatientsController::class, 'positive']);

    # get recovered Resource
    # method get 
    Route::get('/patients/status/recovered', [PatientsController::class, 'recovered']);

    # get dead Resource
    # method get 
    Route::get('/patients/status/dead', [PatientsController::class, 'dead']);
});

# membuat route untuk register dan login
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
