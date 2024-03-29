<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
Route::prefix('/admin')->namespace('App\Http\Controller\Admin')->group(function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::get('dashboard', [AdminController::class, 'dashboard']);
        Route::get('logout', [AdminController::class, 'logout']);
    });
    Route::get('login', [AdminController::class, 'login']);
    Route::post('login', [AdminController::class, 'login']);
});

require __DIR__.'/auth.php';
