<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Home;
use App\Livewire\Admin\Series;
use App\Livewire\Admin\Categories;
use App\Livewire\SeriesByCategory;
use App\Livewire\Admin\Dashboard;
use App\Http\Controllers\Auth\PasswordController;
use App\Livewire\Admin\Users;
use App\Livewire\ShowSerie;

Route::get('/', SeriesByCategory::class);
Route::post('/login-manual', [App\Http\Controllers\Auth\LoginController::class, 'store'])->name('login.manual');
Route::get('/categoria/{slug}', SeriesByCategory::class);
Route::get( '/serie/{slug}', ShowSerie::class )->name('serie.show');
Route::middleware(['auth'])->group(function () {

    Route::middleware(['role:admin|user'])->group(function () {
        Route::get('/admin/dashboard', Dashboard::class)->name('dashboard');

        Route::get('/admin/series', Series::class)->name('admin.series');

        Route::get('/admin/categories', Categories::class)->name('admin.categories');

    });
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/users', Users::class)->name('admin.users');
    });

});

require __DIR__.'/auth.php';