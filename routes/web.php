<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Superadmin\SupervisorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {

    Route::group(['middleware' => 'role:super_admin'], function() {
        Route::prefix('superadmin')->group(function () {
            Route::name('superadmin.')->group(function () {
                Route::resource('/supervisor', SupervisorController::class);
                Route::resource('/criteria', \App\Http\Controllers\Superadmin\Criteria::class);
                Route::get('/update_criteria_main/{id}', [\App\Http\Controllers\Superadmin\Criteria::class, 'update_criteria_main'])->name('update_criteria_main');
                Route::get('/update_criteria_dop/{id}', [\App\Http\Controllers\Superadmin\Criteria::class, 'update_criteria_dop'])->name('update_criteria_dop');
                Route::post('/store_update_criteria_main', [\App\Http\Controllers\Superadmin\Criteria::class, 'store_update_criteria_main'])->name('store_update_criteria_main');
                Route::post('/store_update_criteria_dop', [\App\Http\Controllers\Superadmin\Criteria::class, 'store_update_criteria_dop'])->name('store_update_criteria_dop');
                Route::post('/store_criteria_main', [\App\Http\Controllers\Superadmin\Criteria::class, 'store_criteria_main'])->name('store_criteria_main');
                Route::get('/medicine/supervisor',[SupervisorController::class, 'getSupervisorMedicine'])->name('supervisor.medicine');
                Route::get('/medicine/social',[SupervisorController::class, 'getSupervisorSocial'])->name('supervisor.social');
            });
        });
    });

    Route::any('/destroy', [AuthenticatedSessionController::class, 'destroy'])->name('destroy');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login_post');
});
