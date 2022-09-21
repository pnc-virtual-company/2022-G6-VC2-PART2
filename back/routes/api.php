<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AlumniSkillsController;
use App\Http\Controllers\AlumniStudyBackgroundController;
use App\Http\Controllers\WorkExperienceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\EroController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\StudyBackgroundController;

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
// ==================Log In=============================
Route::post('/loginUser',[AuthenticationController::class,'userLogin']);
Route::apiResource('/user',UserController::class);
Route::group(['middleware' => ['auth:sanctum']], function () {
    //================== user api ======================
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
//==================Ero==================//
Route::apiResource('/ero',EroController::class);
// =================Send Email When User Create Account===============
Route::post('/smsMail',[MailController::class,'smsMail']);
// ==============Forget Password =================
Route::post('/forgot',[AuthenticationController::class, 'forgotPassword']); 
Route::post('/resetForgot',[AuthenticationController::class, 'resetForgotPassword']);
Route::post('/verifyCode', [AuthenticationController::class, 'getVerifyCode']); 
//================== work experience api ===============
Route::apiResource('/alumniWork',WorkExperienceController::class);

//===================skilll alumni api =================
Route::apiResource('/skill',SkillController::class);

// ==================company profile=====================
Route::put('/companyProfile/{id}',[WorkExperienceController::class, 'uploadCompanyProfile']);

//================== study background api ===============
Route::apiResource('/studyBackground',StudyBackgroundController::class);
//================== upload profile api ===============
Route::post('/studyBackground/{id}',[StudyBackgroundController::class, 'uploadLogo']);
Route::apiResource('alumniSkill', AlumniSkillsController::class);
Route::apiResource('alumniWork', WorkExperienceController::class);
Route::apiResource('alumniStudyBackground', AlumniStudyBackgroundController::class);