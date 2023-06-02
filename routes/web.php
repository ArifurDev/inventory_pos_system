<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmpolyeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SelaryController;
use App\Http\Controllers\SelaryEmpController;
use App\Http\Controllers\SupplierController;
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

 /**
 * Customer controller start
 */

 Route::resource('customer',CustomerController::class);
 Route::get('customer/delete/{id}',[CustomerController::class,'delete'])->name('customer.delete');
 Route::get('customer/restore/{id}',[CustomerController::class,'restore'])->name('customer.restore');
 Route::get('customer/single/view/{id}',[CustomerController::class,'view'])->name('customer.view');
/**
* Customer controller End
*/

 /**
 * Supplier controller start
 */

 Route::resource('supplier',SupplierController::class);

 Route::get('supplier/delete/{id}',[SupplierController::class,'delete'])->name('supplier.delete');
 Route::get('supplier/restore/{id}',[SupplierController::class,'restore'])->name('supplier.restore');
 Route::get('customer/single/view/{id}',[SupplierController::class,'view'])->name('customer.view');
/**
* Supplier controller End
*/


 /**
 * Selary controller start
 */

 Route::resource('Selary',SelaryController::class);
 Route::get('Selary/edit/{id}',[SelaryController::class,'edit'])->name('empolyee.Selary.edit');
 Route::post('Selary/edit/{id}',[SelaryController::class,'update'])->name('empolyee.Selary.update');
 Route::get('Selary/destroy/{id}',[SelaryController::class,'destroy'])->name('empolyee.Selary.destroy');


/**
* Selary controller End
*/



 /**
 * Category controller start
 */

 Route::resource('Category',CategoryController::class);
 Route::get('Category/restore/{id}',[CategoryController::class,'restore'])->name('Category.restore');
 Route::get('Category/delete/{id}',[CategoryController::class,'delete'])->name('Category.delete');
/**
* Category controller End
*/
require __DIR__.'/auth.php';
