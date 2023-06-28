<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmpolyeeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SelaryController;
use App\Http\Controllers\SelaryEmpController;
use App\Http\Controllers\SettingController;
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


 /**
 * product controller start
 */

 Route::resource("Product",ProductController::class);
 //product import and export page show
 Route::get('import/product',[ProductController::class,'import_product'])->name('import_Export_product_page');
 //product export
 Route::get('export/product',[ProductController::class,'export'])->name('export.product');
 //product export
 Route::post('import/product',[ProductController::class,'import'])->name('import.product');

 /**
 * product controller End
 */


 /**
 * Expense controller start
 */

 Route::resource("expense",ExpenseController::class);
/**
* Expense controller End
*/


 /**
 * attendance controller start
 */

 Route::resource("attendance",AttendanceController::class);
 Route::post('update',[AttendanceController::class, 'update_attendance'])->name('attendance.update');
/**
* attendance controller End
*/



 /**
 * setting controller start
 */

 Route::resource("setting",SettingController::class);
/**
* setting controller End
*/

 /**
 * Pos controller start
 */

 Route::controller(PosController::class)->group(function () {
    Route::get('/pos', 'index')->name('pos.index');
});
/**
* Pos controller End
*/

 /**
 * Cart controller start
 */

 Route::controller(CartController::class)->group(function () {
    Route::post('/add/cart', 'add_cart')->name('add.cart');
    Route::post('/cart/update/{rowId}', 'cart_update')->name('update.cart');
    Route::get('/cart/item/remove/{rowId}', 'cart_item_remove')->name('remove.cart.item');

    Route::post('/create/invoice', 'invoice')->name('cart.invoice');//show all cart and customar information in invoice
    Route::post('/order/store', 'order_store')->name('store.order');//order information save in database
    //panding order
    Route::get('/panding/order', 'panding_order')->name('panding.order');
    Route::get('view/panding/order/{id}', 'view_panding_order')->name('view.panding.order');//view selected panding order full dateils
    Route::get('panding/order/status/change/{id}', 'order_status_change')->name('order.status.change');//view selected panding order full dateils
    //panding order
    Route::get('/complete/order', 'complete_order')->name('complete.order');
    //invoice download  pdf
     Route::get('/download/invoice/{id}', 'download_invoice')->name('download.invoice');

});
/**
* Cart controller End
*/
require __DIR__.'/auth.php';
