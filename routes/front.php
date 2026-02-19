<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\DashboardController as UserDashboard;
use App\Http\Controllers\Front\InterestController;
use App\Http\Controllers\UserProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserDashboard::class, 'index'])->name('dashboard');
    Route::get('/profile/{id}', [UserDashboard::class, 'showProfile'])->name('profile.show');


    // 1. Interest bhejne ke liye (AJAX Route)
    Route::post('/interest/send', [InterestController::class, 'send'])->name('interest.send');

    // 2. Received Interests dekhne ke liye (Jahan user accept/decline karega)
    Route::get('/interests/received', [InterestController::class, 'received'])->name('interest.received');

    // 3. Sent Interests ki history dekhne ke liye
    Route::get('/interests/sent', [InterestController::class, 'sent'])->name('interest.sent');

    // 4. Interest Accept ya Decline karne ke liye
    Route::post('/interest/update-status', [InterestController::class, 'updateStatus'])->name('interest.update');

    Route::get('/my-profile', [UserProfileController::class, 'create'])->name('my-profile.create');
    Route::post('/my-profile', [UserProfileController::class, 'store'])->name('my-profile.store');
});
