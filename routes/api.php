<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/service', [App\Http\Controllers\ServiceController::class, 'book']);
Route::post('/login', [App\Http\Controllers\UserController::class, 'login']);
Route::post('/store', [App\Http\Controllers\UserController::class, 'store']);
Route::post('/reserver', [App\Http\Controllers\ReservationController::class, 'reserver']);
Route::middleware('auth:sanctum')->get('/user/revoke', function (Request $request) {
    $user = $request->user();
    $user->tokens()->delete();
    return 'Tokens are deleted';
});