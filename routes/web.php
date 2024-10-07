<?php

use App\Http\Controllers\ExpensesCategoryController;
use App\Http\Controllers\FinancialExpenseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TravelController;
use GuzzleHttp\Middleware;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

// HOME

Route::get('/', [HomeController::class, 'index']);
Route::get('/travels/inspirations', function () {
    return 'Hello this is an inspiration.';
});

// end HOME

// TRAVEL routes

Route::get('/travels', [TravelController::class, 'getUserTravels'])->middleware(['auth', 'verified']);
Route::get('/travels/create', [TravelController::class, 'create'])->middleware(['auth', 'verified']);
Route::post('/travels', [TravelController::class, 'store'])->middleware(['auth', 'verified']);
Route::get('/travels/{travel}/edit', [TravelController::class, 'edit'])->middleware(['auth', 'verified']);
Route::put('/travels/{travel}', [TravelController::class, 'update'])->middleware(['auth', 'verified']);
Route::delete('/travels/{travel}/delete', [TravelController::class, 'destroy'])->middleware(['auth', 'verified']);

// end TRAVEL routes

// USER routes

Route::get('/register', [UserController::class, 'create'])->middleware('guest');
// Email verification
Route::get('/register/verify', function () {
    return view('users.verify-email');
})->middleware('auth')->name('verification.notice');
// Email verification handler 
Route::get('/register/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/')->with('message', 'E-mail has been succesfully verrified.');
})->middleware(['auth', 'signed'])->name('verification.verify');
// Resending verification email
Route::post('/register/verify/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
// Create new user
Route::post('/users', [UserController::class, 'store'])->middleware('guest');
// Logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
// Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
// Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->middleware('guest');
// Password reset link
Route::get('/users/forgot-password', function () {
    return view('users.forgot-password');
})->middleware('guest')->name('password.request');
// Pasword reset form submission
Route::post('/users/forgot-password', [UserController::class, 'requestResetLink'])->middleware('guest')->name('password.email');
// Verify password reset request
Route::get('/users/reset-password/{token}', function (string $token) {
    return view('users.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');
// Reset password
Route::post('/users/reset-password', [UserController::class, 'userResetPassword'])->middleware('guest')->name('password.update');
// Change password of a current user
Route::view('users/change-password', 'users.change-password');
Route::post('users/change-password', [UserController::class, 'userChangePassword']);

// Google User Authentication
Route::get('/users/authenticate/google/redirect', [UserController::class, 'authenticateGoogleRedirect'])->middleware('guest');
Route::get('/users/authenticate/google/callback', [UserController::class, 'authenticateGoogleCallback']);

// end USER routes

// FINANCIAL EXPENSES routes

Route::get('/travels/financial-expenses/categories', [ExpensesCategoryController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/travels/financial-expenses/categories/add', [ExpensesCategoryController::class, 'create'])->middleware(['auth', 'verified']);
Route::post('/travels/financial-expenses/categories/add', [ExpensesCategoryController::class, 'store'])->middleware(['auth', 'verified']);
Route::get('/travels/financial-expenses/categories/{expensesCategory}/edit', [ExpensesCategoryController::class, 'edit'])->middleware(['auth', 'verified']);
Route::put('/travels/financial-expenses/categories/{expensesCategory}', [ExpensesCategoryController::class, 'update'])->middleware(['auth', 'verified']);
Route::delete('/travels/financial-expenses/categories/{expensesCategory}/delete', [ExpensesCategoryController::class, 'destroy'])->middleware(['auth', 'verified']);


Route::get('/travels/{travel}/financial-expenses', [FinancialExpenseController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/travels/{travel}/financial-expenses/add', [FinancialExpenseController::class, 'create'])->middleware(['auth', 'verified']);
Route::post('/travels/{travel}/financial-expenses/add', [FinancialExpenseController::class, 'store'])->middleware(['auth', 'verified']);
Route::get('/travels/{travel}/financial-expenses/edit', [FinancialExpenseController::class, 'edit'])->middleware(['auth', 'verified']);
Route::put('/travels/{travel}/financial-expenses', [FinancialExpenseController::class, 'update'])->middleware(['auth', 'verified']);
Route::delete('/travels/{travel}/financial-expenses/{financialExpense}/delete', [FinancialExpenseController::class, 'destroy'])->middleware(['auth', 'verified']);

// end FINANCIAL EXPENSES routes

// Common Resource Routes:
// index - show all listings
// show - show single listing
// create - show  form to create listing
// store - store new Listingv
// edit - show form to edit listing
// update - update listing
// destroy - destroy listing
