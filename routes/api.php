<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function (){
    Route::get('/user-list' , [UserController::class , 'index']);
    Route::post('/add-user' , [UserController::class , 'store']);
    Route::get('/companies' , [CompanyController::class , 'index']);
    // Route::get('/')

});

Route::post('/login' , [UserController::class , 'login']);