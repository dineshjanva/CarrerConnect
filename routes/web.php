<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Jobseeker\JobApplicationController;
use App\Http\Controllers\LanguageController;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\Controllers\UserController;
use App\Http\Controllers\Company\EmployeerController;

use App\Http\Controllers\MessageController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Website\WebsiteController;


Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Language Controller
Route::get('lang/{locale}', [LanguageController::class, 'languageChanger'])->name('lang');

// User Authenticate
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginData')->name('loginData');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerData')->name('registerData');
});

// Guest links
Route::middleware('set_locale')->controller(WebsiteController::class)->group(function () {
    //Home
    Route::get('/', 'index')->name('home');

    Route::get('/resourse', 'resourse')->name('resourse');
    Route::get('/about', 'about')->name('about');

    Route::get('/find-jobs', 'findJob')->name('user.find_job');

    // Other links
    Route::get('/companies', 'company')->name('company');
});

//  job Seeker
Route::middleware(['set_locale'])->controller(UserController::class)->group(function () {
    Route::post('/search/job', 'searchJob')->name('job.search');
});

Route::middleware(['auth', 'set_locale'])->controller(UserController::class)->group(function () {
    Route::get('candidate', 'allUser')->name('websiteUser');
    Route::get('/profile/{id}', 'profiledata')->name('viewProfile');
    Route::post('/profile-Image', 'profileDataInfo')->name('profileDataInfo');

    // Main route add education,experience,skill.
    Route::post('/profile-education', 'addeduaction')->name('addeduaction');

    Route::get('/profile-experience', 'experience')->name('experience');
    Route::get('/profile-education', 'education')->name('education');

    Route::get('/profile-education-update/{id}', 'educationPage')->name('updateEducation');
    Route::post('profile-education-update/{id}', 'UpdateProfileEducation')->name('UpdateProfileEducation');

    Route::get('/profile-experience-update/{id}', 'experiencePage')->name('updateExperience');
    Route::post('profile-experience-update/{id}', 'updateProfileexperience')->name('UpdateProfileExperience');

    Route::post('profile-experience-delete/{id}', 'deleteProfileexperience')->name('deleteProfileExperience');
    Route::post('profile-education-delete/{id}', 'deleteProfileeducation')->name('deleteProfileEducation');

    // Skills Route
    Route::get('/profile-skills', 'skillsPage')->name('skillsPage');

    // Profile page
    Route::get('/profile', 'profile')->name('user.profile');
    Route::post('/profile', 'profileUpdate')->name('ProfileUpdate');

    Route::get('/companydetail/{id}', 'companypos')->name('companypos');
    Route::get('/notification', 'userNotification')->name('noti');
    Route::get('/logout', 'logout')->name('logout');
});

// job Controller
Route::middleware(['auth', 'set_locale'])->controller(JobApplicationController::class)->group(function () {
    Route::get('/apply-job/{id}', 'applyJob')->name('user.applyjob');
    Route::post('/apply-job', 'jobData')->name('Applyed');
});

// Employeer
Route::middleware(['auth', 'set_locale'])->controller(EmployeerController::class)->group(function () {
    Route::post('/profile/update', 'companyProfileUpdate')->name('companyprofileupdated');
    Route::get('/add-Post', 'add_jobs')->name('addJob.page');
    Route::post('/add-Post', 'addJobPost')->name('addJob.data');
});

// chats
Route::middleware('auth')->group(function () {
    Route::get('/chat', [MessageController::class, 'index'])->name('chat');
    Route::post('/chat/send', [MessageController::class, 'store'])->name('chat.send');
});

// Company Dashboard
Route::middleware(['set_locale'])->controller(CompanyController::class)->prefix('company')->group(function () {

    Route::get('/dashboard', 'index')->name('dashboard');
    // Route::get('/job', 'companyJobPost')->name('companyjobpostpage');
    Route::get('/job-application', 'companyApplyCandidate')->name('companyApplyCandidate');
    // Route::get('/job-application/data', 'getApplicationsData')->name('company.getApplications');

    Route::get('/posts', 'companyPostedJob')->name('companyPostedJob');

    Route::get('/edit-post/{id}', 'editJobPost')->name('editpost');
    Route::post('/edit-post-data/{id}', 'editJobPostData')->name('editpostdata');

    Route::post('/delete', 'deleteJobPost')->name('deletePost');

});


Route::view('/faq', 'admin.faq.index');
Route::view('/admin/setting', 'coupon.setting.index');


Route::view('/produts', 'coupon.product');
Route::view('/payment', 'coupon.payment');
Route::view('/trans', 'coupon.transaction');
Route::view('/reg', 'coupon.register');