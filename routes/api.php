<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserStatsController;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// use App\Http\Controllers\Api\OrderController;

// Route::controller(OrderController::class)->group(function () {

//     Route::post('login', 'login')->name('login');

// });

Route::get('/user-growth/{period}', [UserStatsController::class, 'userGrowth']);
Route::get('/user-types/{period}', [UserStatsController::class, 'userTypes']);

// Route::middleware('auth:sanctum')->controller(OrderController::class)->group(function () {
//     Route::post('createOrder', 'store')->name('createOrder');
//     Route::get('Allorder', 'index')->name('allOrders');

//     Route::get('/AllComplete-Product', 'completeOrder')->name('completeOrder');
//     Route::delete('/order/{id}', 'destroy');
//     Route::get('/complete-user/{id}', 'getdatabyuserid')->name('user');
// });

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Controllers\UserApiController;

// // 🔐 Admin Login
// Route::post('/admin-login', [UserApiController::class, 'adminLogin']);

// // ✅ Authenticated User APIs
// // Route::middleware('auth:sanctum')->group(function () {
// Route::get('/user-profile', [UserApiController::class, 'profile']);

// // 🔽 Get Data Routes
// Route::get('/get-location', [UserApiController::class, 'getLocation']);
// Route::get('/get-bank', [UserApiController::class, 'getBank']);
// Route::get('/get-kyc', [UserApiController::class, 'getKYC']);
// Route::get('/get-security', [UserApiController::class, 'getSecurity']);
// Route::get('/get-additional', [UserApiController::class, 'getAdditional']);

// // Save Data Routes 
// Route::post('/save-location', [UserApiController::class, 'saveLocation']);
// Route::post('/save-bank', [UserApiController::class, 'saveBank']);
// Route::post('/save-kyc', [UserApiController::class, 'saveKYC']);
// Route::post('/save-security', [UserApiController::class, 'saveSecurity']);
// Route::post('/save-additional', [UserApiController::class, 'saveAdditional']);
// });