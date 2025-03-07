<?php
use Illuminate\Support\Facades\Route;
use App\Http\Services\TrackerServices;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterationController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\AddCredentialsController;
use App\Http\Controllers\EmailVerificationController;

// Home Page View Route
Route::view('/','welcome')
        ->name('home');

// Authentication Routes
Route::view('/login', 'login')
        ->name('login');
Route::post("/signin", [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

// Registration Routes
Route::get('/register/{id}', function (string $id) {
    if ($id === "1") {
        session()->put('goto', 'college-credentials');
    }
    return view('signup');
})->name('register');
Route::post("/register", [RegisterationController::class, 'register']);


// Password Reset Routes
Route::view('/forgot-password', 'auth.forgot_password')
    ->middleware('guest')->name('password.request');

Route::post('/resetpassword', [PasswordResetController::class, 'forgotPassword'])
    ->middleware('guest')
    ->name('forgot-password');

Route::get('/reset-password/{token}', [PasswordResetController::class, 'resetPasswordView'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])
    ->middleware('guest')
    ->name('password.update');

// Email Verification Routes
Route::view('/email/verify', 'auth.verify-email')
        ->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'handleEmailVerification'])
        ->middleware('signed')
        ->name('verification.verify');

Route::post('/email/verification-notification',[EmailVerificationController::class, 'emailVerificationResend'])
        ->middleware(['auth','throttle:6,1'])
        ->name('verification.resend');

// Add College Credentials Routes
Route::view('/college-credentials', 'college_credentials')
    ->middleware(['auth', 'verified'])
    ->name('college-credentials');

Route::post('/add-credentials', [AddCredentialsController::class, 'addCredentials'])
        ->middleware(['auth', 'verified'])
        ->name('add-credentials');

Route::get('/test', [TrackerServices::class, "addNewCourses"]);