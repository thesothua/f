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
use App\Http\Controllers\Api\V1\DonationController;
use App\Http\Controllers\Api\V1\CampaignController;
use App\Http\Controllers\Api\V1\NotificationController;
use App\Http\Controllers\Api\V1\SettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public Auth routes
Route::post("/login", [AuthController::class, "login"]);
Route::post("/forgot-password", [AuthController::class, "forgotPassword"]);
Route::post("/reset-password", [AuthController::class, "resetPassword"]);

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

// Donations routes
Route::prefix('donations')->controller(DonationController::class)->group(function () {
    Route::get("/", "index");
    Route::get("/{id}", "show");
    Route::delete("/{id}", "destroy");
    // Public routes to initiate and confirm payments
    Route::post("/initiate", "initiate");
    Route::post("/verify", "verify");
});

// Subscriptions routes
Route::prefix('subscriptions')->controller(DonationController::class)->group(function () {
    Route::get("/", "subscriptions");
    Route::get("/{id}", "showSubscription");
    Route::put("/{id}", "updateSubscription");
    Route::post("/{id}/cancel", "cancelSubscription");
});

// Campaigns routes
Route::prefix('campaigns')->controller(CampaignController::class)->group(function () {
    Route::get("/", "index");
    Route::get("/{id}", "show");
    Route::post("/", "store");
    Route::put("/{id}", "update");
    Route::post("/{id}", "update"); // Supporting file uploads in update
    Route::delete("/{id}", "destroy");
});

// Public Settings route
Route::get("/settings/public", [SettingController::class, "publicIndex"]);

// Authenticated Auth routes
Route::middleware('auth:sanctum')->controller(AuthController::class)->group(function () {
    Route::get("/me", "me");
    Route::post("/me", "updateProfile");
    Route::post("/logout", "logout");
});

// Notifications routes
Route::middleware('auth:sanctum')->prefix('notifications')->controller(NotificationController::class)->group(function () {
    Route::get("/", "index");
    Route::put("/read-all", "markAllAsRead");
    Route::put("/{id}/read", "markAsRead");
    Route::delete("/{id}", "destroy");
});

// Settings routes
Route::middleware('auth:sanctum')->prefix('settings')->controller(SettingController::class)->group(function () {
    Route::get("/", "index");
    Route::put("/", "update");
});
