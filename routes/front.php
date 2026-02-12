<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\DashboardController as UserDashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserDashboard::class, 'index'])->name('dashboard');
    Route::get('/profile/{id}', [UserDashboard::class, 'showProfile'])->name('profile.show');
});
