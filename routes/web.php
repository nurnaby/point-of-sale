<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.auth.login-page');
});
Route::get('/registation', function () {
    return view('pages.auth.registation-page');
});
Route::get('/reset', function () {
    return view('pages.auth.reset-pass-page');
});
Route::get('/sendotp', function () {
    return view('pages.auth.sendOTP-page');
});
Route::get('/verifyotp', function () {
    return view('pages.auth.verifyOTP-page');
});

// Web API Routes
Route::post('/user-registration',[UserController::class,'UserRegistration']);
Route::post('/user-login',[UserController::class,'UserLogin']);
Route::post('/send-otp',[UserController::class,'SendOTPcode']);
Route::post('/verify-otp',[UserController::class,'VerifyOTP']);


Route::post('/reset-password',[UserController::class,'ResetPassword'])->middleware([TokenVerificationMiddleware::class]);