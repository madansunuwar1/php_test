<?php

use App\Helper\Helper;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\PageContentController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PageSectionController;
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

Route::middleware('auth')->group(function () {

    $permission = 'CheckRole:hasAccess';

    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
        Route::delete('/delete', [ProfileController::class, 'destroy'])->name('destroy');
        //Route::patch('/profile', [ProfileController::class, 'update'])->name('update');
        //Route::put('bcio/{profile}/update', [ProfileController::class, 'update'])->name('update');
    });

    Route::group(['middleware' => ['CheckRole:admin']], function () {
        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
            Route::put('/update/{user}', [UserController::class, 'update'])->name('update');
            Route::get('/destroy', [UserController::class, 'destroy'])->name('destroy');
        });
        Route::group(['prefix' => 'role', 'as'=>'role.'], function () {
            Route::get('/', [RoleController::class, 'index'])->name('index');
            Route::get('/create', [RoleController::class, 'create'])->name('create');
            Route::post('/store', [RoleController::class, 'store'])->name('store');
            Route::get('/edit/{role}', [RoleController::class, 'edit'])->name('edit');
            Route::get('/destroy', [RoleController::class, 'destroy'])->name('destroy');
            Route::put('/update/{role}', [RoleController::class, 'update'])->name('update');
        });
    });

    Route::group(['middleware' => ['CheckRole:bcio'], 'as' => 'verification.bcio.'], function () {
        Route::get('verification/bcio', [BcioVerificationController::class, 'index'])->name('index');
    });

    Route::group(['middleware' => ['CheckRole:bcpn'],'as'=>'verification.bcpn.'], function () {
        Route::get('verification/bcpn', [BcpnVerificationController::class, 'index'])->name('index');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::put('/update-status-bcio/{id}', [BcioVerificationController::class, 'updateStatus'])->name('verification.bcio.update');
    Route::put('bcpn/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/update-status/{id}', [BcpnVerificationController::class, 'updateStatus'])->name('verification.bcpn.update');

    Route::resource('slider', SliderController::class)->middleware($permission);
    Route::resource('page', PageController::class)->middleware($permission);

    if(Helper::getPageSections(\App\Helper\Constant::HOME_PAGE)) {

        Route::group(['middleware' => [$permission],'prefix' => "home/sections", 'as'=>'section.'], function () {
            Route::get('/', [PageSectionController::class, 'index'])->name('index');
            Route::get('/create', [PageSectionController::class, 'create'])->name('create');
            Route::post('/store', [PageSectionController::class, 'store'])->name('store');
            Route::get('/edit/{section}', [PageSectionController::class, 'edit'])->name('edit');
            Route::put('/update/{section}', [PageSectionController::class, 'update'])->name('update');
            Route::delete('/destroy/{section}', [PageSectionController::class, 'destroy'])->name('destroy');
            Route::post('/sort-order', [PageSectionController::class, 'sortOrder'])->name('sort');
        });
        foreach (Helper::getPageSections(\App\Helper\Constant::HOME_PAGE) as $setting) {
            if($setting->section_slug == 'home-introduction'){
                $permission = 'CheckRole:admin';
            }
            $name = implode('_', explode('-', $setting->section_slug));
            Route::resource('home/'.$setting->section_slug, PageContentController::class)->middleware($permission)->names([
                'edit' => "{$name}.edit",
                'update' => "{$name}.update",
                'destroy' => "{$name}.destroy"
            ]);
        }
    }

});
require __DIR__ . '/auth.php';
