<?php

use App\Http\Controllers\EstudanteController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("estudantes",[EstudanteController::class,"index"])->name("listagem");
Route::post("cadastramento",[EstudanteController::class,"store"])->name("cadastrar");
Route::put("editar_estudante/{item}",[EstudanteController::class,"update"])->name("edita");
Route::delete("delecao/{item}",[EstudanteController::class,"destroy"])->name("delecao");