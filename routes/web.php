<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Auth;
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

// force logout routes, temporary for debugging
Route::get('/force/logout', function () {
    Auth::guard('web')->logout();
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    // Home Routes
    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    // About Routes
    Route::prefix('about')->group(function () {
        Route::controller(AboutController::class)->group(function () {
            Route::get('/', 'index')->name('about.index');
            Route::put('/update/{id}', 'update')->name('about.update');
        });
    });

    // Skill Routes
    Route::prefix('skill')->group(function () {
        Route::controller(SkillController::class)->group(function () {
            Route::get('/', 'index')->name('skill.index');
            Route::get('/add', 'create')->name('skill.create');
            Route::post('/store', 'store')->name('skill.store');
            Route::get('/{id}/edit', 'edit')->name('skill.edit');
            Route::put('/{id}/update', 'update')->name('skill.update');
            Route::delete('/{id}/delete', 'destroy')->name('skill.destroy');
        });
    });

    // Education Routes
    Route::prefix('education')->group(function () {
        Route::controller(EducationController::class)->group(function () {
            Route::get('/', 'index')->name('education.index');
            Route::get('/add', 'create')->name('education.create');
            Route::post('/store', 'store')->name('education.store');
            Route::get('/{id}/edit', 'edit')->name('education.edit');
            Route::put('/{id}/update', 'update')->name('education.update');
            Route::delete('/{id}/delete', 'destroy')->name('education.destroy');
        });
    });

    // Experience Routes
    Route::prefix('experience')->group(function () {
        Route::controller(ExperienceController::class)->group(function () {
            Route::get('/', 'index')->name('experience.index');
            Route::get('/add', 'create')->name('experience.create');
            Route::post('/store', 'store')->name('experience.store');
            Route::get('/{id}/edit', 'edit')->name('experience.edit');
            Route::put('/{id}/update', 'update')->name('experience.update');
            Route::delete('/{id}/delete', 'destroy')->name('experience.destroy');
        });
    });

    // Portfolio Routes
    Route::prefix('portfolio')->group(function () {
        Route::controller(PortfolioController::class)->group(function () {
            Route::get('/', 'index')->name('portfolio.index');
            Route::get('/add', 'create')->name('portfolio.create');
            Route::post('/store', 'store')->name('portfolio.store');
            Route::get('/{id}/edit', 'edit')->name('portfolio.edit');
            Route::put('/{id}/update', 'update')->name('portfolio.update');
            Route::delete('/{id}/delete', 'destroy')->name('portfolio.destroy');
        });
    });

    // Award Routes
    Route::prefix('award')->group(function () {
        Route::controller(AwardController::class)->group(function () {
            Route::get('/', 'index')->name('award.index');
            Route::get('/add', 'create')->name('award.create');
            Route::post('/store', 'store')->name('award.store');
            Route::get('/{id}/edit', 'edit')->name('award.edit');
            Route::put('/{id}/update', 'update')->name('award.update');
            Route::delete('/{id}/delete', 'destroy')->name('award.destroy');
        });
    });

    // Message Routes
    Route::prefix('message')->group(function () {
        Route::controller(MessageController::class)->group(function () {
            Route::get('/', 'index')->name('message.index');
            Route::get('/{id}/show', 'show')->name('message.show');
            Route::get('/{id}/send', 'send')->name('message.send');
            Route::get('/{id}/postemail', 'postemail')->name('message.postemail');
        });
    });
});

Auth::routes();

?>
