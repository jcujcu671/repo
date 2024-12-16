<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index');

Route::get('/faq', [\App\Http\Controllers\PageController::class, 'faq'])->name('faq');
Route::get('/contacts', [\App\Http\Controllers\PageController::class, 'contacts'])->name('contacts');
Route::get('/terms', [\App\Http\Controllers\PageController::class, 'terms'])->name('terms');
Route::get('/affiliate', [\App\Http\Controllers\PageController::class, 'affiliate'])->name('affiliate');
Route::get('/about', [\App\Http\Controllers\PageController::class, 'about'])->name('about');

Route::get('/password-reset/{token}', function (Request $request, string $token) {
    return redirect('/')->with([
        'reset_token' => $token,
        'reset_email' => $request->get('email'),
    ]);
})->name('password.reset');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {

    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/deposit', [\App\Http\Controllers\DashboardController::class, 'deposit'])->name('dashboard.deposit.index');
    Route::get('/referrals', [\App\Http\Controllers\DashboardController::class, 'referrals'])->name('dashboard.referral.index');
    Route::get('/bonuses', [\App\Http\Controllers\DashboardController::class, 'bonuses'])->name('dashboard.bonus.index');
    Route::get('/telegram', [\App\Http\Controllers\DashboardController::class, 'telegram'])->name('dashboard.telegram.index');

});
