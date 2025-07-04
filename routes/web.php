<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    TagController,
    LikeController,
    PostController,
    SessionController,
    Auth\LoginController,
    Auth\RegisterController,
    Auth\ForgotPasswordController,
    Auth\ResetPasswordController
};
use App\Models\Tag;

// this is  Homepage + Posts routes
Route::controller(PostController::class)->group(function () {
    Route::get('/', 'index')->name('posts.index');
    Route::get('/posts/explore-all', 'explore')->name('posts.exploreAll');
    Route::get('/posts/create', 'create')->name('posts.create');
    Route::post('/posts', 'store')->name('posts.store');
    Route::get('/posts/{post}/edit', 'edit')->name('posts.edit');
    Route::put('/posts/{post}', 'update')->name('posts.update');
    Route::delete('/posts/{post}', 'destroy')->name('posts.destroy');
    Route::get('/posts/{post}', 'show')->name('posts.show');


    // Featured Post routes
    Route::get('/featured-post/edit', 'editFeatured')->name('posts.featured.edit');
    Route::put('/featured-post/update', 'updateFeatured')->name('posts.featured.update');
    Route::delete('/featured/delete', 'destroyFeatured')->name('posts.destroyFeatured');

    // Likes routes
    Route::post('/posts/{post}/like', 'like')->name('posts.like');
});


// This is Auth: Login routes 
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login')->name('login.submit');
    Route::post('/logout', 'logout')->name('logout');
});

// This is Auth: Register routes
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register', 'register')->name('register.submit');
});

// This is Auth: Custom Reset Password with OTP routes
Route::controller(ForgotPasswordController::class)->group(function () {
    Route::get('/forgot-password', 'showLinkRequestForm')->name('password.request');
    Route::post('/forgot-password', 'sendOtp')->name('password.otp.send');
    Route::get('/otp-verify', 'showOtpForm')->name('password.otp.verify');
    Route::post('/otp-verify', 'verifyOtp')->name('password.otp.check');
    Route::get('/reset-custom-password', 'showCustomResetForm')->name('password.custom.reset');
    Route::post('/reset-custom-password', 'updatePassword')->name('password.custom.update');
});

// This is Tag Suggestion (for Tagify input) routes
Route::controller(TagController::class)->group(function () {
    Route::get('/tags/suggest', 'suggest')->name('tags.suggest');
});
