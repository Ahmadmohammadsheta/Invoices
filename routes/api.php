<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Auth::routes();
// Route::get('/', function () {
//     return redirect()->route('home');
// });
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//-----------------------------------------------------------------------------------------------------------
// Route::middleware('auth:sanctum')->group(function () {
// });
//______________________________________________________________________________________________________________________



//-----------------------------------------------------------------------------------------------------------
// Route::prefix("auth")->group(function () {
//     Route::controller(LoginController::class)->group(function () {
//         Route::post('/register', 'register')->name('users.register');
//         Route::post('/login', 'login')->name('users.login');
//     });
// });
//______________________________________________________________________________________________________________________


/**
 * middleware all
 */
// Route::middleware('auth:sanctum')->group(function () {
//     //-----------------------------------------------------------------------------------------------------------
    Route::prefix("users")->group(function(){
        Route::controller(UserController::class)->group(function () {
            Route::post('/register', 'register')->name('users.register');
            Route::post('/login', 'login')->name('users.login');
        });
    });
    Route::resource('/users', UserController::class)->except('show');
    Route::resource('/sections', SectionController::class);
    Route::prefix("sections")->group(function(){
        Route::controller(SectionController::class)->group(function () {
            Route::put('/update', 'update')->name('sections.updating');
        });
    });
//     //______________________________________________________________________________________________________________________

//     //-----------------------------------------------------------------------------------------------------------
//     Route::prefix("newTraders")->group(function(){
//         Route::controller(TraderController::class)->group(function () {
//             Route::get('/trader', 'trader');
//         });
//         Route::resource('/', TraderController::class)->only('destroy', 'update', 'store', 'edit');
//     });
//     //______________________________________________________________________________________________________________________

//     //-----------------------------------------------------------------------------------------------------------
//     Route::prefix("traders")->group(function(){
//         Route::controller(TraderController::class)->group(function () {
//             Route::put('/forgetting_password', 'forgettingPassword');
//         });
//     });
//     //______________________________________________________________________________________________________________________

//     //-----------------------------------------------------------------------------------------------------------
//     Route::resource('levels', LevelController::class)->only('store', 'update', 'destroy');
//     //______________________________________________________________________________________________________________________

// });
//______________________________________________________________________________________________________________________
