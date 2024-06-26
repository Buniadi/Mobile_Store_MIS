<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PhoneController;
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
    // Route::get('/')
    
    Route::get('/companies' , [CompanyController::class , 'index']);
    Route::get('/allcompanies' , [CompanyController::class , 'getall']);
    Route::post('/add-company', [CompanyController::class , 'store']);
    Route::get('/companies/{id}/edit', [CompanyController::class , 'edit']);
    Route::post('/companies/update', [CompanyController::class, 'update']);
    Route::delete('/comapanies/delete/{id}', [CompanyController::class, 'delete']);
    // Route::get('/test', function (){
    //     return 
    // });
    Route::post('/add-phone', [PhoneController::class , 'store']);
    Route::get('/allphone', [PhoneController::class , 'index']);
    Route::get('/phone/{id}/edit', [PhoneController::class , 'edit']);
    Route::post('/phone/update', [PhoneController::class , 'update']);
    Route::delete('/phone/{id}/delete', [PhoneController::class , 'destroy']);
});


Route::post('/add-user' , [UserController::class , 'store']);
Route::post('/login' , [UserController::class , 'login']);