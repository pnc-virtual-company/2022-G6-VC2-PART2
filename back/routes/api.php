<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\WorkExperienceController;
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
//================== user api ======================
Route::apiResource('/user',UserController::class);

//================== alumni api ======================
Route::apiResource('/alumni',AlumniController::class);

//================== upload profile api ===============
Route::put('/profile/{id}',[AlumniController::class, 'uploadProfile']);

//================== work experience api ===============
Route::apiResource('/alumniWork',WorkExperienceController::class);

Route::put('/updateAlumniWork/{id}',[WorkExperienceController::class, 'updateAlumniWork']);

Route::delete('/deleteAlumniWork/{id}',[WorkExperienceController::class,'destroyAlumniWork']);



