<?php

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

Route::get('/', function () {
    return view('front.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('bcpn/update', [ProfileController::class, 'update'])->name('profile.update');
// Route::put('bcio/{profile}/update', [ProfileController::class, 'update'])->name('profile.update');
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

Route::get('verification/bcio', [BcioVerificationController::class, 'index'])->name('verification.bcio.index');
Route::get('verification/bcpn', [BcpnVerificationController::class, 'index'])->name('verification.bcpn.index');
Route::put('/update-status-bcio/{id}', [BcioVerificationController::class, 'updateStatus'])->name('verification.bcio.update');
Route::put('/update-status/{id}', [BcpnVerificationController::class, 'updateStatus'])->name('verification.bcpn.update');
Route::get('user', [UserController::class, 'index'])->name('user.index');
Route::get('role', [RoleController::class, 'index'])->name('role.index');
Route::get('role/create', [RoleController::class, 'create'])->name('role.create');
Route::post('role/store',[RoleController::class, 'store'])->name('role.store');
Route::get('/roles/{role}/edit', [RoleController::class,'edit'])->name('role.edit');
Route::get('role/destroy', [RoleController::class, 'destroy'])->name('role.destroy');
Route::put('role/{role}/update', [RoleController::class, 'update'])->name('role.update');
Route::get('user', [UserController::class, 'index'])->name('user.index');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('user/{user}/update', [UserController::class, 'update'])->name('user.update');
Route::get('user/destroy', [UserController::class, 'destroy'])->name('user.destroy');

require __DIR__.'/auth.php';
