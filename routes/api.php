<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::prefix('users')->controller(UserController::class)->group(function () {
    Route::get("/", "index");
    Route::get("/{id}", "show");
    Route::post("/", "store");
    Route::put("/{id}", "update");
    Route::delete("/{id}", "destroy");
});


Route::middleware('auth:sanctum')->controller(AuthController::class)->group(function () {
    Route::post("/me", "me");
    Route::post("/logout", "logout");
});
