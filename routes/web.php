<?php

use App\Models\Event;
use App\Models\Service;
use App\Models\PriceIncrement;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CanineController;
use App\Http\Controllers\BreederController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\VeternarianController;
use App\Http\Controllers\PriceIncrementController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\ServiceCategoryController;

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

Route::middleware('splade')->group(function () {
    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/', function () {
        return view('welcome');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', DashboardController::class)->middleware(['verified'])->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // Settings
        Route::resource('/dashboard/settings/service', ServiceController::class);
        Route::resource('/dashboard/settings/service_category', ServiceCategoryController::class);
        Route::resource('/dashboard/settings/price_increments', PriceIncrementController::class);
        Route::resource('/dashboard/settings/reserves', ReserveController::class);

        Route::resource('/dashboard/canines', CanineController::class);
        Route::resource('/dashboard/veternarians', VeternarianController::class);
        Route::resource('/dashboard/breeders', BreederController::class);
        Route::resource('/dashboard/events', EventController::class);
    });

    require __DIR__ . '/auth.php';
});
