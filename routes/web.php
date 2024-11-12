<?php

use App\Http\Controllers\AssociationController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\HousingController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::permanentRedirect('/', 'main');

Route::get('main', [MainController::class, 'index'])->name('main');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('housings', HousingController::class);
    Route::get('account', function () {
        return view('buyt.account');
    })->name('account');
    Route::resource('associations', AssociationController::class)->middleware('role:admin');
    Route::resource('users', UserController::class);
    Route::get('pending_housings', [HousingController::class, 'pending_housings'])->name('pending_housings')->middleware('role:admin');
    Route::put('accept_pending/{housing}', [HousingController::class, 'accept_pending'])->name('accept_pending')->middleware('role:admin');
    Route::put('reject_pending/{housing}', [HousingController::class, 'reject_pending'])->name('reject_pending')->middleware('role:admin');
});

Route::resource('donations', DonationController::class);

Route::get('associations_page', [AssociationController::class, 'associations_page'])->name('associations_page');
Route::get('housings_page', [HousingController::class, 'housings_page'])->name('housings_page');
Route::get('centers_page', [HousingController::class, 'centers_page'])->name('centers_page');

Auth::routes(['verify' => true]);

Route::get('/us', function () {
    return view('partials.us');
})->name('us');
