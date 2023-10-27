<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Livewire\Complete;
use App\Http\Livewire\Confirm;
use App\Http\Livewire\RealValid;
use App\Http\Controllers\Admin\ProfileController as ProfileOfAdminController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/',[MainController::class,'index']);
Route::get('/on_register',RealValid::class)->name('real-valid');
Route::get('/confirm', Confirm::class)->name('confirm');
Route::get('/complete', Complete::class)->name('complete');

require __DIR__.'/auth.php';

// 追記

Route::prefix('admin')->name('admin.')->group(function(){
    // Route::get('/dashboard', function () {
    //     return view('admin.dashboard');
    // })->middleware(['auth:admin', 'verified'])->name('dashboard');

    Route::get('/dashboard',[AdminController::class,'dash'])->middleware(['auth:admin', 'verified'])->name('dashboard');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/profile', [ProfileOfAdminController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileOfAdminController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileOfAdminController::class, 'destroy'])->name('profile.destroy');
        Route::get('/detail/{id}', [AdminController::class,'detail'])->name('detail');
        Route::post('/detail/{id}', [AdminController::class,'edit'])->name('detail');
        Route::get('/photos/{path?}', [AdminController::class,'checkassets'])->where('path', '.*')->name('checkassets');
    });

    require __DIR__.'/admin.php';
});