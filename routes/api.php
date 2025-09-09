<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\CawRefController;
use App\Http\Controllers\Api\CancerFormController;

// 🔐 Login & Logout
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');

// 📦 Master Data (CAW)
Route::get('/cawref/{type}', [CawRefController::class, 'fetch']);

// 👤 Authenticated User Info
Route::middleware('auth:sanctum')->get('/user', [LoginController::class, 'user']);

// 🔧 Change Password
Route::middleware('auth:sanctum')->post('/change-password', [ProfileController::class, 'changePassword']);

// 📥 บันทึกแบบฟอร์มมะเร็ง
Route::middleware('auth:sanctum')->post('/cancer-form', [CancerFormController::class, 'store']);

// 📄 (Optional) ดึงรายการแบบฟอร์มย้อนหลัง
Route::middleware('auth:sanctum')->get('/cancer-form', [CancerFormController::class, 'index']);

// 📄 (Optional) export PDF รายคน
Route::middleware('auth:sanctum')->get('/cancer-form/{id}/pdf', [CancerFormController::class, 'exportPdf']);


Route::middleware('auth:sanctum')->get('/cancer-form', [CancerFormController::class, 'index']);

// 🛡️ Admin Only
Route::middleware(['auth:sanctum', 'is_admin'])->group(function () {
    Route::get('/dashboard/admin', [AdminController::class, 'index']);
});
