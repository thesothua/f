<?php

use App\Http\Controllers\Api\V1\AttachmentController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\BlogController;
use App\Http\Controllers\Api\V1\ContactController;
use App\Http\Controllers\Api\V1\GalleryController;
use App\Http\Controllers\Api\V1\PlanController;
use App\Http\Controllers\Api\V1\RoleController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\VolunteerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public Auth routes
Route::post("/login", [AuthController::class, "login"]);

// Roles routes
Route::get("/roles", [RoleController::class, "index"]);

// Attachments routes
Route::prefix('attachments')->controller(AttachmentController::class)->group(function () {
    Route::get("/", "index");
    Route::get("/{id}", "show");
    Route::post("/", "store");
    Route::delete("/{id}", "destroy");
});

// Blogs routes
Route::prefix('blogs')->controller(BlogController::class)->group(function () {
    Route::get("/", "index");
    Route::get("/{id}", "show");
    Route::post("/", "store");
    Route::put("/{id}", "update");
    Route::delete("/{id}", "destroy");
});

// Contacts routes
Route::prefix('contacts')->controller(ContactController::class)->group(function () {
    Route::get("/", "index");
    Route::get("/{id}", "show");
    Route::post("/", "store");
    Route::put("/{id}", "update");
    Route::delete("/{id}", "destroy");
});

// Galleries / Media routes
Route::prefix('galleries')->controller(GalleryController::class)->group(function () {
    Route::get("/", "index");
    Route::get("/{id}", "show");
    Route::post("/", "store");
    Route::put("/{id}", "update");
    Route::delete("/{id}", "destroy");
});

Route::prefix('media')->controller(GalleryController::class)->group(function () {
    Route::get("/", "index");
    Route::get("/{id}", "show");
    Route::post("/", "store");
    Route::put("/{id}", "update");
    Route::delete("/{id}", "destroy");
});

// Plans routes
Route::prefix('plans')->controller(PlanController::class)->group(function () {
    Route::get("/", "index");
    Route::get("/{id}", "show");
    Route::post("/", "store");
    Route::put("/{id}", "update");
    Route::delete("/{id}", "destroy");
});

// Users routes
Route::prefix('users')->controller(UserController::class)->group(function () {
    Route::get("/", "index");
    Route::get("/{id}", "show");
    Route::post("/", "store");
    Route::put("/{id}", "update");
    Route::delete("/{id}", "destroy");
});

// Volunteers routes
Route::prefix('volunteers')->controller(VolunteerController::class)->group(function () {
    Route::get("/", "index");
    Route::get("/{id}", "show");
    Route::post("/", "store");
    Route::put("/{id}", "update");
    Route::delete("/{id}", "destroy");
});

// Authenticated Auth routes
Route::middleware('auth:sanctum')->controller(AuthController::class)->group(function () {
    Route::get("/me", "me");
    Route::post("/me", "me");
    Route::post("/logout", "logout");
});
