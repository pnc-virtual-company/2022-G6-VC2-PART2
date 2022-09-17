<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\WorkExperienceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\EroController;
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

Route::group(['middleware' => ['auth:sanctum']], function () {
    //================== user api ======================
    Route::apiResource('/user',UserController::class);

    //================== alumni api ======================
    Route::apiResource('/alumni',AlumniController::class);

    //================== upload profile api ===============
    Route::put('/profile/{id}',[AlumniController::class, 'uploadProfile']);

    //================== work experience api ===============
    Route::apiResource('/alumniWork',WorkExperienceController::class);
    //===================skilll alumni api =================
    Route::apiResource('/alumniSkill',SkillController::class);
    // ==================Log out============================
    Route::post('/logout',[UserController::class,'logout']);
});
// ==================Log In=============================
Route::post('/loginUser',[AuthenticationController::class,'userLogin']);
<<<<<<< HEAD

// =================Send Email When User Create Account===============
Route::get('/smsMail',[UserController::class,'smsMail']);

=======
<<<<<<< HEAD
// ==================Log out============================
Route::post('/logout',[UserController::class,'logout']);
//==================Ero==================//
Route::apiResource('/eros',EroController::class);
=======

>>>>>>> b26617003554cca9699b2b4e255db88a342f6e79
>>>>>>> d46d63c315f990b7a973fc1f5ecf366b1bee5cb1




