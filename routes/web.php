<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;



Route::get('user/login-user', fn() => view('user.login-user'));
Route::get('user/signup-user', fn() => view('user.signup-user'));
Route::get('user/signup-successful-user', fn() => view('user.signup-successful-user'));
Route::get('user/info-user', fn() => view('user.info-user'));
Route::get('user/setting-user', fn() => view('user.setting-user'));
Route::get('user/help-user', fn() => view('user.help-user'));
Route::get('user/search-book-user', fn() => view('user.search-book-user'));
Route::prefix('user')->group(function () {
    Route::view('/trangphat', 'user.trangphat')->name('user.trangphat');
    Route::view('/content-trangphat', 'user.content-trangphat');
    Route::view('/content-trangphat-thanhtoan', 'user.content-trangphat-thanhtoan');
});

Route::get('/login', fn() => redirect()->route('admin.login-admin'))->name('login');

Route::prefix('admin')->group(function () {
    Route::get('/login-admin', [AdminAuthController::class, 'showLoginForm'])
        ->name('admin.login-admin'); // tên route = admin.login

    Route::post('/login-admin', [AdminAuthController::class, 'login'])
        ->name('admin.login.submit'); // tên route = admin.login.submit

    Route::post('/logout', [AdminAuthController::class, 'logout'])
        ->name('admin.logout');

    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/homepage-admin', function () {
            return view('admin.homepage-admin');
        })->name('admin.homepage-admin');
    });
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/signup-admin', [AdminAuthController::class, 'signupForm'])->name('admin.signup-admin');
});

use App\Http\Controllers\Admin\DashBoardController;

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('dashboard-admin', [DashBoardController::class, 'dashboard'])->name('admin.dashboard-admin');
});

Route::get('/admin/dashboard-stats', [App\Http\Controllers\Admin\DashBoardController::class, 'stats'])
    ->name('admin.dashboard-admin.stats');


use App\Http\Controllers\Admin\SignupController;

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/signup-admin', [SignupController::class, 'showForm'])->name('admin.signup-admin');
    Route::post('/signup-admin', [SignupController::class, 'register'])->name('admin.signup.submit');
});

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::view('/signup-successful-admin', 'admin.signup-successful-admin')
        ->name('admin.signup-successful-admin');
});

use App\Http\Controllers\Admin\BookController;

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/book-management-admin', [BookController::class, 'index'])->name('admin.books.index');
    Route::post('/book-management-admin', [BookController::class, 'store'])->name('admin.books.store');
    Route::put('/book-management-admin/{id}', [BookController::class, 'update'])->name('admin.books.update');
    Route::delete('/book-management-admin/{id}', [BookController::class, 'destroy'])->name('admin.books.destroy');
});


use App\Http\Controllers\Admin\CategoryController;

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/category-management-admin', [CategoryController::class, 'index'])->name('admin.categories');
    Route::post('/category-management-admin', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::put('/category-management-admin/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/category-management-admin/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
});


use App\Http\Controllers\Admin\ReaderController;

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/reader-management-admin', [ReaderController::class, 'index'])->name('admin.readers');
    Route::get('/reader-management-admin/export', [ReaderController::class, 'export'])->name('admin.readers.export');
    Route::put('/reader-management-admin/resetpw/{id}', [ReaderController::class, 'resetPassword'])->name('admin.readers.resetpw');
});

use App\Http\Controllers\Admin\BorrowReturnController;

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/borrow-return-management-admin', [BorrowReturnController::class, 'index'])
        ->name('admin.borrow-returns');
});
Route::post('/admin/borrow-returns/{id}/update-status', [BorrowReturnController::class, 'updateStatus'])
    ->name('admin.borrow-returns.update-status');

use App\Http\Controllers\Admin\FineMoneyController;

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/finemoney-management-admin', [FineMoneyController::class, 'index'])
        ->name('admin.fine.index');

    Route::post('/fine/{id}/toggle-status', [FineMoneyController::class, 'toggleStatus'])
        ->name('admin.fine.toggleStatus');
});

use App\Http\Controllers\HomepageLoginController;

Route::get('/', [HomepageLoginController::class, 'index']);
Route::get('/user/homepage-login-user', [HomepageLoginController::class, 'index'])
    ->name('user.homepage.login');

use App\Http\Controllers\UserAuthController;

Route::prefix('user')->group(function () {
    Route::get('/login-user', [UserAuthController::class, 'showLoginForm'])->name('user.login');
    Route::post('/login-user', [UserAuthController::class, 'login'])->name('user.login.submit');

    Route::post('/logout', [UserAuthController::class, 'logout'])->name('user.logout');

    Route::get('/homepage-user', [UserAuthController::class, 'homepage'])
        ->middleware(['auth', 'role:reader']);
});

use App\Http\Controllers\User\HomepageUserController;

Route::middleware(['auth', 'role:reader'])->group(function () {
    Route::get('/user/homepage-user', [HomepageUserController::class, 'index'])
        ->name('user.homepage-user');
});


