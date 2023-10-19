<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ChartController;

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
/**
 * for Api routes
 */
// Route::get('/login', function () {
//     return response()->json([
//         'auth' => "Unauthenticated",
//     ]);
// })->name('login');

// Route::view('/{any_path?}', 'welcome')->where('any_path', '(.*)');








Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes(['register' => false]);
// Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::middleware('auth:sanctum')->group(function () {

    //-----------------------------------------------------------------------------------------------------------
    /**
     * sections pages routes
     */
    Route::resource('sections', SectionController::class);
    Route::prefix("sections")->group(function(){
        Route::controller(SectionController::class)->group(function () {
            Route::put('/update', 'update')->name('sections.updating');
        });
    });
    //______________________________________________________________________________________________________________________

// });


//-----------------------------------------------------------------------------------------------------------
/**
 * products pages routes
 */
Route::resource('products', ProductController::class);

Route::prefix("products")->group(function(){
    Route::controller(ProductController::class)->group(function () {
        Route::get('/get_product/{id}', 'getProduct')->name('products.getProduct');
        Route::get('/get_products/{id}', 'getProducts')->name('products.getProducts');
    });
});
//______________________________________________________________________________________________________________________



//-----------------------------------------------------------------------------------------------------------
/**
 * Invoices pages routes
 */
Route::prefix("invoices")->group(function(){
    Route::get('/export/', [InvoiceController::class, 'export'])->name('invoices.export');
    Route::controller(InvoiceController::class)->group(function () {
        Route::get('/printing_page/{invoice}', 'printingPage')->name('invoices.printingPage');
    });
});
Route::resource('invoices', InvoiceController::class);
//______________________________________________________________________________________________________________________

//-----------------------------------------------------------------------------------------------------------
/**
 * invoices_details pages routes
 */
Route::resource('invoices_details', InvoicesDetailController::class);
//______________________________________________________________________________________________________________________

//-----------------------------------------------------------------------------------------------------------
/**
 * charts pages routes
 */
Route::resource('charts', ChartController::class);
//______________________________________________________________________________________________________________________


//-----------------------------------------------------------------------------------------------------------
/**
 * invoices_attachments pages routes
 */
Route::resource('invoices_attachments', InvoicesAttachmentController::class);
Route::prefix("invoices_attachments")->group(function(){
    Route::controller(InvoicesAttachmentController::class)->group(function () {
        Route::get('/download/{invoicesAttachment}', 'download')->name('invoices.download');
    });
});

//______________________________________________________________________________________________________________________

//-----------------------------------------------------------------------------------------------------------


/**
 * invoices_attachments pages routes
 */
// Route::middleware(['auth', 'role:admim'])->name('admins.')->prefix('admins')->group(function () {
//     Route::resource('/roles', RoleController::class);
// });;
//______________________________________________________________________________________________________________________











//-----------------------------------------------------------------------------------------------------------
/**
 * Permissions && Role routes
 */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Our resource routes
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});
//______________________________________________________________________________________________________________________



//-----------------------------------------------------------------------------------------------------------
/**
 * Admin pages routes
 * It must be in the end of all routes
 */
Route::prefix("")->group(function(){
    Route::controller(AdminController::class)->group(function () {
        Route::get('/{page}', 'index');
    });
});
//______________________________________________________________________________________________________________________



