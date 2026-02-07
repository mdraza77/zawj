<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
// use App\Http\Controllers\Admin\CompanySettingController;
use App\Http\Controllers\Admin\DashboardController;

Route::middleware(['auth', 'role:Admin|Super Admin'])->prefix('admin')->group(function () {

    // Dashboard
    // Route::get('/dashboard', function () {
    //     return view('admin.dashboard.index');
    // })->name('admin.dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // ............................................Profile Routes............................................
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/edit-profile', 'index')->name('profile_edit');
        Route::post('/profile-update/{id}', 'pro_update')->name('profile_update');
        Route::post('/password-update/{id}', 'password_reset')->name('pass_update');
    });

    // ............................................user module............................................
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('users.create');
    Route::post('user/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/user/show/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('user/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::delete('/user/resoter/{id}', [UserController::class, 'resoter'])->name('users.resoter');

    // ............................................role module............................................
    Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/role/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/role/store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/role/show/{id}', [RoleController::class, 'show'])->name('roles.show');
    Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/role/update/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::get('/role/delete/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

    // ............................................Company Setting............................................
    // Route::get('company', [CompanySettingController::class, 'index'])->name('company');
    // Route::post('company-update', [CompanySettingController::class, 'update'])->name('setting.company_update');
});
