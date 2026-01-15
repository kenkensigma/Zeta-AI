<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;    
use App\Http\Controllers\Auth\OtpAuthController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Models\Client;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('homepage');
});

/*
|--------------------------------------------------------------------------
| AUTH - REGISTER (OTP + GOOGLE)
|--------------------------------------------------------------------------
*/
Route::prefix('auth/register')->group(function () {

    // EMAIL
    Route::post('/email/request-otp', [OtpAuthController::class, 'registerEmailRequest']);
    Route::post('/email/verify-otp', [OtpAuthController::class, 'registerEmailVerify']);

    // PHONE
    Route::post('/phone/request-otp', [OtpAuthController::class, 'registerPhoneRequest']);
    Route::post('/phone/verify-otp', [OtpAuthController::class, 'registerPhoneVerify']);

    // GOOGLE
    Route::get('/google', [GoogleAuthController::class, 'registerRedirect']);
});

/*
|--------------------------------------------------------------------------
| AUTH - LOGIN (OTP + GOOGLE)
|--------------------------------------------------------------------------
*/
Route::prefix('auth/login')->group(function () {

    // EMAIL
    Route::post('/email/request-otp', [OtpAuthController::class, 'loginEmailRequest']);
    Route::post('/email/verify-otp', [OtpAuthController::class, 'loginEmailVerify']);

    // PHONE
    Route::post('/phone/request-otp', [OtpAuthController::class, 'loginPhoneRequest']);
    Route::post('/phone/verify-otp', [OtpAuthController::class, 'loginPhoneVerify']);

    // GOOGLE
    Route::get('/google', [GoogleAuthController::class, 'loginRedirect']);
});

/*
|--------------------------------------------------------------------------
| GOOGLE CALLBACK (SATU, JANGAN NGERANGKAP)
|--------------------------------------------------------------------------
*/
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);

Route::middleware('auth')->group(function () {
    Route::get('/auth/profile/status', [ProfileController::class, 'status']);
    Route::post('/auth/profile/complete', [ProfileController::class, 'complete']);
    Route::post('/auth/profile/skip', [ProfileController::class, 'skip']);
    // Tambahkan route logout
    Route::post('/logout', function (Illuminate\Http\Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    })->name('logout');
});

Route::middleware('auth')->get(
    '/auth/username/check',
    [ProfileController::class, 'checkUsername']
);
