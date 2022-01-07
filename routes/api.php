<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/service', [App\Http\Controllers\ServiceControlleur::class, 'book']);
Route::get('/show/{id}', [App\Http\Controllers\ServiceControlleur::class, 'show']);
Route::post('/login', [App\Http\Controllers\UserController::class, 'login']);
Route::post('/store', [App\Http\Controllers\UserController::class, 'store']);
Route::get('/showall', [App\Http\Controllers\ServiceControlleur::class, 'showall']);
Route::middleware('auth:sanctum')->post('/store', [ App\Http\Controllers\UserController::class,"store"]);
Route::middleware('auth:sanctum')->put('/update', [ App\Http\Controllers\UserController::class,"update"]);
Route::middleware('auth:sanctum')->post('/reserver', [App\Http\Controllers\ReservationController::class, 'reserver']);
Route::middleware('auth:sanctum')->post('/wash', [App\Http\Controllers\WashingController::class, 'wash']);
Route::get('/showen/{id}', [App\Http\Controllers\ReservationController::class, 'showen']);
Route::middleware('auth:sanctum')->get('/user/revoke', function (Request $request) {
    $user = $request->user();
    $user->tokens()->delete();
    return 'Tokens are deleted';
});