<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HierarchyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Prefix: api/auth
Route::prefix('auth')->group(function () {

    // POST: /api/auth/login
    Route::post('login', [AuthController::class, 'login']);

    // POST: /api/auth/register
    Route::post('register', [AuthController::class, 'register']);
});

// Prefix: /api/hierarchy
Route::prefix('hierarchy')->group(function () {

    // POST: /api/hierarchy/save
    Route::post('save', [HierarchyController::class, 'save']);
})->middleware('auth');
