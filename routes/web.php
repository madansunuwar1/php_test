<?php

use App\Http\Controllers\Api\PermissionAllocationController;
use App\Http\Controllers\Api\PermissionsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Verification\bcio\VerificationController as BcioVerificationController;
use App\Http\Controllers\Verification\bcpn\VerificationController as BcpnVerificationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('/', HomeController::class);
Route::get('blog', function () {
    return view('blog.index');
});
Route::get('news', function () {
    return view('news.index');
});
Route::get('bcpn', function () {
    return view('news.bcpn');
});
Route::get('bcpnP', function () {
    return view('bcpn.index');
});
Route::get('bridge', function () {
    return view('bridge.index');
});
Route::get('activity', function () {
    return view('bridge.activity');
});
Route::get('email', function () {
    return view('emails.verification-status');
});

Route::middleware('auth:sanctum')->group(function () {

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::delete('/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
        //Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        //Route::put('bcio/{profile}/update', [ProfileController::class, 'update'])->name('profile.update');
    });

    Route::middleware(['role:admin'])->group(function () {
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', [UserController::class, 'index'])->name('user.index');
            Route::get('/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
            Route::put('/update/{user}', [UserController::class, 'update'])->name('user.update');
            Route::get('/destroy', [UserController::class, 'destroy'])->name('user.destroy');
        });
        Route::group(['prefix' => 'role'], function () {
            Route::get('/', [RoleController::class, 'index'])->name('role.index');
            Route::get('/create', [RoleController::class, 'create'])->name('role.create');
            Route::post('/store', [RoleController::class, 'store'])->name('role.store');
            Route::get('/edit/{role}', [RoleController::class, 'edit'])->name('role.edit');
            Route::get('/destroy', [RoleController::class, 'destroy'])->name('role.destroy');
            Route::put('/update/{role}', [RoleController::class, 'update'])->name('role.update');
        });
    });

    Route::middleware(['role:bcio'])->group(function () {
        Route::get('verification/bcio', [BcioVerificationController::class, 'index'])->name('verification.bcio.index');
    });

    Route::middleware(['role:bcpn'])->group(function () {
        Route::get('verification/bcpn', [BcpnVerificationController::class, 'index'])->name('verification.bcpn.index');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::put('/update-status-bcio/{id}', [BcioVerificationController::class, 'updateStatus'])->name('verification.bcio.update');
    Route::put('bcpn/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/update-status/{id}', [BcpnVerificationController::class, 'updateStatus'])->name('verification.bcpn.update');

    Route::resource('slider', SliderController::class);

});
require __DIR__ . '/auth.php';
