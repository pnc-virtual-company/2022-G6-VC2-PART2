<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlumniController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// User
Route::get('/user',[UserController::class,'index']);
Route::post('/register',[UserController::class,'register']);

// Alumni
Route::get('/alumni',[AlumniController::class,'index']);
Route::post('/addAlumni',[AlumniController::class,'store']);