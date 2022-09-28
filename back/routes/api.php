<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AlumniSkillsController;
use App\Http\Controllers\WorkExperienceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EroController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\StudyBackgroundController;
use App\Http\Controllers\UplaodImageController;

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

// ==================Log In=============================
Route::post('/loginUser',[AuthenticationController::class,'userLogin']);

// user crud route
Route::apiResource('user', UserController::class);

// =================Send Email When User Create Account===============
Route::post('/smsMail',[MailController::class,'smsMail']);

// ==============Forget Password =================
Route::post('/forgot',[AuthenticationController::class, 'forgotPassword']); 
Route::post('/resetForgot',[AuthenticationController::class, 'resetForgotPassword']);
Route::post('/verifyCode', [AuthenticationController::class, 'getVerifyCode']); 

// route need to login 
Route::group(['middleware' => ['auth:sanctum']], function () {
    //================== update user status ======================
    Route::patch('/user/status/{id}',[UserController::class, 'updateStatus']);
    //================== alumni api ======================
    Route::apiResource('/alumni',AlumniController::class);
    //================== upload profile api ===============
    Route::put('/profile/{id}',[AlumniController::class, 'uploadProfile']);

    //================== work experience api ===============
    Route::apiResource('/alumniWork',WorkExperienceController::class);
    //===================skilll alumni api =================
    Route::apiResource('/skill',SkillController::class);
    // ==================Log out============================
    Route::post('/logout',[UserController::class,'logout']);
    //==================Ero==================//
    Route::apiResource('/ero',EroController::class);
    
    // ==================company profile=====================
    Route::put('/companyProfile/{id}',[WorkExperienceController::class, 'uploadCompanyProfile']);
    
    //================== study background route ===============
    Route::apiResource('/studyBackground',StudyBackgroundController::class);
    // study background route
    Route::post('/studyBackground/{id}',[StudyBackgroundController::class, 'uploadLogo']);
    // alumni skill route
    Route::apiResource('alumniSkill', AlumniSkillsController::class);
    // work experience route
    Route::apiResource('alumniWork', WorkExperienceController::class);
    // upload profile
    Route::post('profile', [UplaodImageController::class, 'uploadProfile']);
    // company route
    Route::apiResource('company', CompanyController::class);
    // school route
    Route::apiResource('school', SchoolController::class);
});

// ==============Reset Password Alumini ===================
Route::post('/resetPaswordAlumni/{id}', [AlumniController::class, 'checkPasswordAlumni']);
Route::put('/resetPaswordAlumni/{id}', [AlumniController::class, 'updatePasswordAlumni']);
