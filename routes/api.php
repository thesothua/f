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

/*
|--------------------------------------------------------------------------
| Public Routes (Guest access)
|--------------------------------------------------------------------------
*/

// Public Auth routes
Route::post("/login", [AuthController::class, "login"]);
Route::post("/forgot-password", [AuthController::class, "forgotPassword"]);
Route::post("/reset-password", [AuthController::class, "resetPassword"]);

// Public Settings route
Route::get("/settings/public", [SettingController::class, "publicIndex"]);

// Public Blogs routes
Route::prefix('blogs')->controller(BlogController::class)->group(function () {
    Route::get("/", "index");
    Route::get("/{id}", "show");
});

// Public Campaigns routes
Route::prefix('campaigns')->controller(CampaignController::class)->group(function () {
    Route::get("/", "index");
    Route::get("/{id}", "show");
});

// Public Plans routes
Route::prefix('plans')->controller(PlanController::class)->group(function () {
    Route::get("/", "index");
    Route::get("/{id}", "show");
});

// Public Galleries / Media routes
Route::prefix('galleries')->controller(GalleryController::class)->group(function () {
    Route::get("/", "index");
    Route::get("/{id}", "show");
});
Route::prefix('media')->controller(GalleryController::class)->group(function () {
    Route::get("/", "index");
    Route::get("/{id}", "show");
});

// Public Contact Submission
Route::post("/contacts", [ContactController::class, "store"]);

// Public Volunteer Submission
Route::post("/volunteers", [VolunteerController::class, "store"]);

// Public Team Members route
Route::get("/team", [UserController::class, "teamMembers"]);

// Public Donation/Razorpay Payment Initiation & Verification
Route::prefix('donations')->controller(DonationController::class)->group(function () {
    Route::post("/initiate", "initiate");
    Route::post("/verify", "verify");
});


/*
|--------------------------------------------------------------------------
| Authenticated Routes (Requires auth:sanctum)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {

    // Authenticated User Profile & Logout
    Route::controller(AuthController::class)->group(function () {
        Route::get("/me", "me");
        Route::post("/me", "updateProfile");
        Route::post("/logout", "logout");
    });

    // Roles routes
    Route::get("/roles", [RoleController::class, "index"])->middleware('permission:view roles');
    Route::get("/permissions", [RoleController::class, "permissions"])->middleware('permission:view roles');
    Route::post("/roles", [RoleController::class, "store"])->middleware('permission:create roles');
    Route::put("/roles/{id}", [RoleController::class, "update"])->middleware('permission:edit roles');
    Route::delete("/roles/{id}", [RoleController::class, "destroy"])->middleware('permission:delete roles');

    // Administrative Attachments routes
    Route::prefix('attachments')->controller(AttachmentController::class)->group(function () {
        Route::get("/", "index")->middleware('permission:view media');
        Route::get("/{id}", "show")->middleware('permission:view media');
        Route::post("/", "store")->middleware('permission:create media');
        Route::delete("/{id}", "destroy")->middleware('permission:delete media');
    });

    // Administrative Blogs routes
    Route::prefix('blogs')->controller(BlogController::class)->group(function () {
        Route::post("/", "store")->middleware('permission:create blogs');
        Route::put("/{id}", "update")->middleware('permission:edit blogs');
        Route::delete("/{id}", "destroy")->middleware('permission:delete blogs');
    });

    // Administrative Campaigns routes
    Route::prefix('campaigns')->controller(CampaignController::class)->group(function () {
        Route::post("/", "store")->middleware('permission:create campaigns');
        Route::put("/{id}", "update")->middleware('permission:edit campaigns');
        Route::post("/{id}", "update")->middleware('permission:edit campaigns'); // Supporting file uploads in update
        Route::delete("/{id}", "destroy")->middleware('permission:delete campaigns');
    });

    // Administrative Plans routes
    Route::prefix('plans')->controller(PlanController::class)->group(function () {
        Route::post("/", "store")->middleware('permission:create plans');
        Route::put("/{id}", "update")->middleware('permission:edit plans');
        Route::delete("/{id}", "destroy")->middleware('permission:delete plans');
    });

    // Administrative Media routes
    Route::prefix('galleries')->controller(GalleryController::class)->group(function () {
        Route::post("/", "store")->middleware('permission:create media');
        Route::put("/{id}", "update")->middleware('permission:edit media');
        Route::delete("/{id}", "destroy")->middleware('permission:delete media');
    });
    Route::prefix('media')->controller(GalleryController::class)->group(function () {
        Route::post("/", "store")->middleware('permission:create media');
        Route::put("/{id}", "update")->middleware('permission:edit media');
        Route::delete("/{id}", "destroy")->middleware('permission:delete media');
    });

    // Administrative Users routes
    Route::prefix('users')->controller(UserController::class)->group(function () {
        Route::get("/", "index")->middleware('permission:view users');
        Route::get("/{id}", "show")->middleware('permission:view users');
        Route::post("/", "store")->middleware('permission:create users');
        Route::put("/{id}", "update")->middleware('permission:edit users');
        Route::delete("/{id}", "destroy")->middleware('permission:delete users');
    });

    // Administrative Contacts routes
    Route::prefix('contacts')->controller(ContactController::class)->group(function () {
        Route::get("/", "index")->middleware('permission:view contacts');
        Route::get("/{id}", "show")->middleware('permission:view contacts');
        Route::put("/{id}", "update")->middleware('permission:edit contacts');
        Route::delete("/{id}", "destroy")->middleware('permission:delete contacts');
    });

    // Administrative Volunteers routes
    Route::prefix('volunteers')->controller(VolunteerController::class)->group(function () {
        Route::get("/", "index")->middleware('permission:view volunteers');
        Route::get("/{id}", "show")->middleware('permission:view volunteers');
        Route::put("/{id}", "update")->middleware('permission:edit volunteers');
        Route::delete("/{id}", "destroy")->middleware('permission:delete volunteers');
    });

    // Administrative Donations routes
    Route::prefix('donations')->controller(DonationController::class)->group(function () {
        Route::get("/", "index")->middleware('permission:view donations');
        Route::get("/{id}", "show")->middleware('permission:view donations');
        Route::post("/{id}/send-invoice", "sendInvoice")->middleware('permission:send donations invoice');
        Route::delete("/{id}", "destroy")->middleware('permission:delete donations');
    });

    // Administrative Subscriptions routes
    Route::prefix('subscriptions')->controller(DonationController::class)->group(function () {
        Route::get("/", "subscriptions")->middleware('permission:view subscriptions');
        Route::get("/{id}", "showSubscription")->middleware('permission:view subscriptions');
        Route::put("/{id}", "updateSubscription")->middleware('permission:edit subscriptions');
        Route::post("/{id}/cancel", "cancelSubscription")->middleware('permission:cancel subscriptions');
    });

    // Administrative Notifications routes
    Route::prefix('notifications')->controller(NotificationController::class)->group(function () {
        Route::get("/", "index")->middleware('permission:view dashboard');
        Route::put("/read-all", "markAllAsRead")->middleware('permission:view dashboard');
        Route::put("/{id}/read", "markAsRead")->middleware('permission:view dashboard');
        Route::delete("/{id}", "destroy")->middleware('permission:view dashboard');
    });

    // Administrative Settings routes
    Route::prefix('settings')->controller(SettingController::class)->group(function () {
        Route::get("/", "index")->middleware('permission:view settings');
        Route::put("/", "update")->middleware('permission:edit settings');
    });
});
