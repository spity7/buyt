<?php

use Illuminate\Support\Facades\Route;

Route::permanentRedirect('/', 'main');

Route::get('main', function () {
    return view('buyt.main');
})->name('main');

Route::get('add', function () {
    return view('buyt.add');
})->name('add');


Route::get('donation', function () {
    return view('buyt.donation');
})->name('donation');

Route::get('associations', function () {
    return view('buyt.associations');
})->name('associations');

Route::get('account', function () {
    return view('buyt.account');
})->name('account');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
