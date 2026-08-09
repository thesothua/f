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
use App\Http\Controllers\Api\V1\AnimalReportController;
use App\Http\Controllers\Api\V1\DashboardController;
use App\Http\Controllers\Api\V1\RescueCaseController;
use App\Http\Controllers\Api\V1\PageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes (Guest access)
|--------------------------------------------------------------------------
*/

// Public Auth routes
Route::post("/login", [AuthController::class, "login"]);
Route::post("/register", [AuthController::class, "register"]);
Route::post("/auth/google", [AuthController::class, "googleLogin"]);
Route::post("/forgot-password", [AuthController::class, "forgotPassword"]);
Route::post("/reset-password", [AuthController::class, "resetPassword"]);

// Public Settings route
Route::get("/settings/public", [SettingController::class, "publicIndex"]);

// Public Pages route (by slug)
Route::get("/pages/by-slug/{slug}", [PageController::class, "showBySlug"]);

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

// Public Volunteer Submission & Public Volunteers Listing & Roles
Route::get("/volunteer-roles/public", [RoleController::class, "publicVolunteerRoles"]);
Route::get("/volunteers/public", [VolunteerController::class, "publicVolunteers"]);
Route::post("/volunteers", [VolunteerController::class, "store"]);

// Public Animal Report Submission
Route::post("/animal-reports", [AnimalReportController::class, "store"]);

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

    // Dashboard Stats
    Route::get('/dashboard/stats', [DashboardController::class, 'getStats'])->middleware('permission:view dashboard');

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

    // Administrative Animal Reports routes
    Route::prefix('animal-reports')->controller(AnimalReportController::class)->group(function () {
        Route::get("/", "index")->middleware('permission:view animal reports');
        Route::get("/{id}", "show")->middleware('permission:view animal reports');
        Route::put("/{id}", "update")->middleware('permission:edit animal reports');
        Route::post("/{id}/accept", "accept")->middleware('permission:edit animal reports');
        Route::delete("/{id}", "destroy")->middleware('permission:delete animal reports');
    });

    // Administrative Rescue Cases routes
    Route::prefix('rescue-cases')->controller(RescueCaseController::class)->group(function () {
        Route::get("/", "index")->middleware('permission:view rescue cases');
        Route::get("/{id}", "show")->middleware('permission:view rescue cases');
        Route::get("/{id}/download", "downloadReport")->middleware('permission:view rescue cases');
        Route::post("/{id}/send-report", "sendReportToReporter")->middleware('permission:edit rescue cases');
        Route::put("/{id}", "update")->middleware('permission:edit rescue cases');
        Route::delete("/{id}", "destroy")->middleware('permission:delete rescue cases');
    });

    // Administrative Donations routes
    Route::prefix('donations')->controller(DonationController::class)->group(function () {
        Route::get("/", "index")->middleware('permission:view donations');
        Route::post("/", "store")->middleware('permission:create donations');
        Route::get("/{id}", "show")->middleware('permission:view donations');
        Route::post("/{id}/send-invoice", "sendInvoice")->middleware('permission:send donations invoice');
        Route::post("/{id}/verify-qr", "verifyQrCode")->middleware('permission:create donations');
        Route::delete("/{id}", "destroy")->middleware('permission:delete donations');
    });

    // Administrative Subscriptions routes
    Route::prefix('subscriptions')->controller(DonationController::class)->group(function () {
        Route::get("/", "subscriptions")->middleware('permission:view subscriptions');
        Route::get("/{id}", "showSubscription")->middleware('permission:view subscriptions');
        Route::put("/{id}", "updateSubscription")->middleware('permission:edit subscriptions');
        Route::post("/{id}/cancel", "cancelSubscription")->middleware('permission:cancel subscriptions');
    });

    // Notifications routes (accessible to all authenticated users)
    Route::prefix('notifications')->controller(NotificationController::class)->group(function () {
        Route::get("/", "index");
        Route::put("/read-all", "markAllAsRead");
        Route::put("/{id}/read", "markAsRead");
        Route::delete("/{id}", "destroy");
    });

    // Administrative Settings routes
    Route::prefix('settings')->controller(SettingController::class)->group(function () {
        Route::get("/", "index")->middleware('permission:view settings');
        Route::put("/", "update")->middleware('permission:edit settings');
    });

    // Administrative Pages & Page Sections (CMS) routes
    Route::prefix('pages')->controller(PageController::class)->group(function () {
        Route::get("/", "index")->middleware('permission:view pages');
        Route::post("/", "store")->middleware('permission:create pages');
        Route::get("/{id}", "show")->middleware('permission:view pages');
        Route::put("/{id}", "update")->middleware('permission:edit pages');
        Route::delete("/{id}", "destroy")->middleware('permission:delete pages');

        // Section management sub-routes
        Route::post("/{pageId}/sections", "storeSection")->middleware('permission:edit pages');
        Route::put("/sections/{sectionId}", "updateSection")->middleware('permission:edit pages');
        Route::delete("/sections/{sectionId}", "destroySection")->middleware('permission:edit pages');
        Route::put("/{pageId}/reorder-sections", "reorderSections")->middleware('permission:edit pages');
    });
});
