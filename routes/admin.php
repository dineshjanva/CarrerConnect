<?php

use App\Http\Controllers\Admin\AdsController;
use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Admin\CMSController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WebsiteAnalyticsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminAuthController;
use Illuminate\Support\Facades\Route;




// admin Auth
Route::controller(AdminAuthController::class)->group(function () {
    Route::get('/login', 'adminAuth')->name('Auth.login');
    Route::post('/login', 'authCheck')->name('admin_login');
});



// Admin DashBoard
Route::middleware('admin_Auth')->get('/', DashboardController::class)->name('admin');

// Other links 
Route::middleware('admin_Auth')->group(function () {

    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('adminUsersPage');
    });

    Route::controller(CompanyController::class)->group(function () {
        Route::get('/all_companies', 'index')->name('admin.allCompanies');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'index')->name('adminProfile');
        Route::post('/profile', 'update')->name('adminprofileUpdate');
        Route::post('/profile/update-password', 'passwordUpdate')->name('passwordUpdate');
    });

    Route::controller(SettingController::class)->group(function () {
        Route::get('/setting-Page', 'setting')->name('admin.setting');
        Route::post('/setting-image', 'uploadLogo')->name('admin.setting.image');
    });

    Route::controller(WebsiteAnalyticsController::class)->group(function () {
        Route::get('/website-analysis', 'index')->name('admin.website-analysis');
    });

    Route::controller(CMSController::class)->group(function () {
        Route::get('/cms', 'index')->name('admin.CMS');
        Route::get('/cms/add', 'create')->name('admin.CMS.add');
    });

    Route::controller(AdsController::class)->group(function () {
        Route::get('/ads', 'index')->name('admin.ads');
        Route::get('/ads-create', 'create')->name('admin.ads.create');
        Route::post('/ads-create', 'store')->name('admin.ads.createdata');

        Route::get('ads/{id}/edit', 'edit')->name('admin.ads.edit');
        Route::put('ads/{id}', 'update')->name('admin.ads.update');
        // Route::delete('ads/{id}', 'destroy')->name('ads.destroy');
        // Pause Campaign
        Route::post('ads/{id}/pause', 'pause')->name('admin.ads.pause');
        // Ad Statistics (optional)
        Route::get('ads/{id}/stats', 'stats')->name('admin.ads.stats');
    });

    Route::controller(ContactUsController::class)->group(function () {
        Route::get('/contact-developer', 'index')->name('admin.contact_developer');
        Route::view('/master', 'admin.master2');
    });

});

Route::view('admin/web', 'admin.website_analysis.index');




// // Route::controller
// Route::middleware('admin_Auth')->controller(AdminController::class)->group(function () {
//     // Route::get('dashboard', DashboardController::class)->name('admin.dashboard');



// });