<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    DashboardController,
  
};

use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
// Route::get('password', [PasswordController::class, 'index'])->name('password.index');
// Route::put('password', [PasswordController::class, 'update'])->name('password.update');

Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::group(['prefix' => 'role-management'], function () {
    Route::resource('role', RoleController::class)->except('show');
    // Route::get('permission', PermissionController::class)->name('permission.index');
    Route::resource('user', UserController::class);
});
