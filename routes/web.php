<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
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
            Route::post('/update/{id}', 'update')->name('about.update');
        });
    });
});

Auth::routes();

?>
