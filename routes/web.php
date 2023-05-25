<?php

use App\Http\Controllers\EmpolyeeController;
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
    return view('main_dashbord');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/**
 * Empolyee controller start
 */

    Route::middleware('auth')->group(function () {
        Route::get('/create/empolyee', [EmpolyeeController::class, 'create'])->name('create.empolyee');
        Route::post('/create/empolyee', [EmpolyeeController::class, 'store'])->name('store.empolyee');
        Route::get('/show/all/empolyee', [EmpolyeeController::class, 'index'])->name('show.empolyee');
        Route::get('/edit/empolyee/{empolyee}', [EmpolyeeController::class, 'edit'])->name('edit.empolyee');
        Route::post('/edit/empolyee/{id}', [EmpolyeeController::class, 'update'])->name('update.empolyee');
        Route::get('/single/view/empolyee/{empolyee}', [EmpolyeeController::class, 'show'])->name('single.empolyee');
        Route::get('/restore/empolyee/{id}', [EmpolyeeController::class, 'restore'])->name('restore.empolyee');
        Route::get('/destroy/all/empolyee/{empolyee}', [EmpolyeeController::class, 'destroy'])->name('destroy.empolyee');
        Route::get('/delete/empolyee/{empolyee}', [EmpolyeeController::class, 'delete'])->name('delete.empolyee');
    });


 /**
 * Empolyee controller End
 */
require __DIR__.'/auth.php';
