<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Home;
use App\Livewire\Admin\Series;
use App\Livewire\Admin\Categories;
use App\Livewire\SeriesByCategory;
use App\Livewire\Admin\Dashboard;

Route::get('/', SeriesByCategory::class);

Route::get('/categoria/{slug}', SeriesByCategory::class);

Route::middleware(['auth'])->group(function () {

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', Dashboard::class)->name('dashboard');

        Route::get('/admin/series', Series::class)->name('admin.series');

        Route::get('/admin/categories', Categories::class)->name('admin.categories');

    });

});

require __DIR__.'/auth.php';